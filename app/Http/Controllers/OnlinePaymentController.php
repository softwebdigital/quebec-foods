<?php

namespace App\Http\Controllers;

use App\Models\Package;
use App\Models\Setting;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Models\OnlinePayment;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Http;

class OnlinePaymentController extends Controller
{
    public static function initializeOnlineTransaction($amount, $data, $gateway, $currency = 'USD', $api = false): JsonResponse|RedirectResponse
    {
        $data['channel'] = 'web';
        if ($gateway == 'flutterwave' || $currency == 'USD') {
            $paymentData = [
                'amount' => $currency == 'USD' ? $amount : self::getAmountInNaira($amount),
                'tx_ref' => self::genTranxRef(),
                'currency' => $currency,
                'redirect_url' => route('payment.callback', 'flw'),
                'customer' => [
                    'email' => auth()->user()['email'],
                    'phonenumber' => auth()->user()['phone'],
                    'name' => auth()->user()['name']
                ],
                'customizations' => [
                    'title' => env('APP_NAME'),
                    'logo' => asset(env('LOGO'))
                ]
            ];

            if ($api) {
                auth()->user()->payments()->create([
                    'reference' => $paymentData['tx_ref'],
                    'amount' => $amount,
                    'amount_in_naira' => self::getAmountInNaira($amount),
                    'type' => $data['type'],
                    'gateway' => 'flutterwave',
                    'meta' => json_encode($data)
                ]);
                return (new OnlinePaymentController)->success(
                    'Payment initialized successfully',
                    ['reference' => $paymentData['tx_ref'], 'amount' => $amount, 'currency' => $paymentData['currency']]
                );
            }

            try {
                $response = json_decode(Http::withHeaders(['Authorization' => 'Bearer '.env('FLW_SECRET_KEY')])
                    ->post('https://api.flutterwave.com/v3/payments', $paymentData), true);
                if ($response['status'] == 'success') {
                    auth()->user()->payments()->create([
                        'reference' => $paymentData['tx_ref'],
                        'amount' => $amount,
                        'amount_in_naira' => self::getAmountInNaira($amount),
                        'type' => $data['type'],
                        'gateway' => 'flutterwave',
                        'meta' => json_encode($data)
                    ]);
                    return redirect($response['data']['link']);
                }
                return back()->with('error', 'Could not start transaction, try again.');
            } catch (Exception $e) {
                return back()->with('error', 'Could not start transaction, try again.');
            }
        } else {
            $totalAmount = self::getAmountInNaira($amount);
            if ($totalAmount >= 10000000)
                return redirect()->route('dashboard')->with('error', "We can\'t process card payment of {$currency}10,000,000 and above");

            // return back()->with('info', 'Card payment through paystack is currently disabled, try another payment gateway.');
            $paymentData = [
                'amount' => $totalAmount * 100,
                'reference' => paystack()->genTranxRef(),
                'email' => auth()->user()['email'],
                'currency' => 'NGN',
                'metadata' => json_encode($data),
            ];
            auth()->user()->payments()->create([
                'reference' => $paymentData['reference'],
                'amount' => $amount,
                'amount_in_naira' => $totalAmount,
                'type' => $data['type'],
                'gateway' => 'paystack',
                'meta' => json_encode($data)
            ]);
            if ($api)
                return (new OnlinePaymentController)->success(
                    'Payment initialized successfully',
                    ['reference' => $paymentData['reference'], 'amount' => $amount, 'currency' => $paymentData['currency']]
                );
            \request()->merge($paymentData);
            try {
                return paystack()->getAuthorizationUrl()->redirectNow();
            } catch (Exception $e) {
                return back()->with('error', 'The paystack token has expired. Please refresh the page and try again.');
            }
        }
    }

    public function handlePaymentCallback(Request $request, string $gateway)
    {
        if ($gateway == 'flw') {
            $payment = OnlinePayment::query()->where('reference', $request['tx_ref'])->first();
            $meta = json_decode($payment['meta'], true);
            $type = $meta['type'];
            $package = $type == 'investment' ? Package::find($meta['package']['id']) : null;
            if ($request['status'] == 'successful') {
                return view('user.payments.success', compact('type', 'payment', 'package'));
            }
            elseif ($request['status'] == 'cancelled') {
                $payment->delete();
                return redirect()->route('dashboard')->with('error', 'Payment Cancelled.');
            }
            else {
                if ($payment['status'] == 'pending')
                    $payment->update(['status' => 'failed']);
                return view('user.payments.error', compact('type', 'payment'));
            }
        }
        else {
            $paymentDetails = paystack()->getPaymentData();
            $res = $paymentDetails['data'];
            $payment = OnlinePayment::query()->where('reference', $res['reference'])->first();
            if (isset($paymentDetails['status'])) {
                if (isset($res)) {
                    $data = json_decode($payment['meta'], true);
                    $type = $data['type'];
                    $package = $type == 'investment' ? Package::find($data['package']['id']) : null;
                    if ($res["status"] == 'success') {
                        return view('user.payments.success', compact('type', 'payment', 'package'));
                    } else {
                        if ($payment['status'] == 'pending')
                            $payment->update(['status' => 'failed']);
                        return view('user.payments.error', compact('type', 'payment'));
                    }
                }
            }
        }
        return redirect()->route('dashboard')->with('error', 'Something went wrong');
    }

    public function handlePaymentWebhook(Request $request)
    {
        logger('Pinged');
        $res = $request['data'];
        logger('Paystack payment');
        if ((strtoupper($_SERVER['REQUEST_METHOD']) != 'POST') || !array_key_exists('HTTP_X_PAYSTACK_SIGNATURE', $_SERVER)) {
            http_response_code(401);
            exit();
        }
        logger('Paystack signature present');
        //This verifies the webhook is sent from paystack
        $payload = @file_get_contents("php://input");
        if($_SERVER['HTTP_X_PAYSTACK_SIGNATURE'] !== hash_hmac('sha512', $payload, env('PAYSTACK_SECRET_KEY'))) {
            http_response_code(401);
            exit();
        }
        logger('Paystack signature verified');
        // if it is a charge event, verify and confirm it is a successful transaction
        if ($request['event'] == 'charge.success' && $res['status'] == 'success') {
            $payment = OnlinePayment::query()->where('reference', $res['reference'])->first();
            if ($payment && $payment['status'] == 'pending') {
                $meta = $res['metadata'];
                self::processTransaction($payment, $meta);
                logger('Payment processed and settled');
                http_response_code(200);
            }
        }
        http_response_code(400);
    }

    public function handleFlwWebhook(Request $request)
    {
        logger('Pinged');
        $res = $request->input('data');
        logger('Payment Reference: ' . $res['tx_ref'] ?? null);
        $payment = OnlinePayment::query()->where('reference', $res['tx_ref'])->first();
        if ($request->input('event') == 'charge.completed' && $res['status'] == 'successful') {
            if ($payment && $payment['status'] == 'pending') {
                $meta = json_decode($payment['meta'], true);
                self::processTransaction($payment, $meta);
                logger('Payment processed and settled');
                http_response_code(200);
                exit();
            }
        } else {
            if ($payment['status'] == 'pending')
                $payment->update(['status' => 'failed']);
            logger('Payment Unsuccessful');
            http_response_code(200);
            exit();
        }
    }


    public static function processTransaction($payment, $meta) {
        $type = $meta['type'] ?? $meta['event_type'];
        switch ($type) {
            case 'deposit':
                $payment->user->wallet()->increment('balance', $payment['amount']);
                $transaction = $payment->user->transactions()->create([
                    'type' => 'deposit', 'amount' => $payment['amount'],
                    'description' => 'Deposit', 'channel' => $meta['channel'] ?? 'mobile',
                    'method' => 'card' ,'status' => 'approved'
                ]);
                if ($transaction)
                    try {
                        NotificationController::sendDepositSuccessfulNotification($transaction);
                    } catch (Exception $e) {
                        logger($e->getMessage());
                        $emailError = true;
                    }
                break;
            case 'investment':
                $package = Package::find($meta['package']['id']);
                if ($package->type == 'farm')
                    $returns = $meta['slots'] * $package['price'] * (( 100 + $package['roi'] ) / 100 );
                else
                    $returns = $package->getPlantTotalROI($meta['slots'] * $package['price']);
                if (Carbon::make($package['start_date'])->lt(now()))
                    $startDate = now();
                else
                    $startDate = $package['start_date'];

                $investment = $payment->user->investments()->create([
                    'package_id'=>$package['id'], 'slots' => $meta['slots'],
                    'amount' => $meta['slots'] * $package['price'],
                    'total_return' => $returns,
                    'investment_date' => now()->format('Y-m-d H:i:s'),
                    'rollover' => isset($request['rollover']) && $request['rollover'] == 'yes',
                    'start_date' => $startDate, 'payment' => 'approved',
                    'package_data' => json_encode($package)
                ]);

                if ($investment) {
                    try {
                        TransactionController::storeInvestmentTransaction($investment, 'card', false, $meta['channel'] ?? 'mobile');
                        NotificationController::sendInvestmentCreatedNotification($investment);
                    } catch (Exception $e) { $emailError = true; }
                }
            break;
        }
        return $payment->update(['status' => 'success']);
    }

    public static function getAmountInNaira($amount): float|int
    {
        $settings = Setting::query()->first(['usd_to_ngn', 'rate_plus', 'base_currency']);
        if ($settings['base_currency'] != 'USD') return $amount;
        return $amount * ($settings['usd_to_ngn'] + $settings['rate_plus']);
    }

    public static function genTranxRef(): string
    {
        return sha1(time());
    }
}
