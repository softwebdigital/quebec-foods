<?php

namespace App\Http\Controllers;

use App\Models\Package;
use App\Models\Setting;
use App\Models\Investment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\StoreInvestmentRequest;
use App\Http\Requests\UpdateInvestmentRequest;

class InvestmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($type, $filter)
    {
        $investments = auth()->user()->investments()->latest()->whereHas('package', function($query) use ($type) {
            $query->where('type', $type);
        });
        if ($filter !== 'all') {
            $investments->where('status', $filter);
        }
        $investments = $investments->get();
        return view('user.investments.index', compact('investments', 'type', 'filter'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validate request
        $validator = Validator::make($request->all(), [
            'package' => ['required', 'exists:packages,name'],
            'slots' => ['required', 'numeric', 'min:1', 'integer'],
            'payment' => ['required']
        ]);
        if ($validator->fails()){
            return back()->withErrors($validator)->withInput()->with('error', 'Invalid input data');
        }
        // Check if investment is allowed
        if (Setting::all()->first()['invest'] == 0){
            return back()->with('error', 'Investment in packages is currently unavailable, check back later');
        }
        // Find package and check if investment is enabled
        $package = Package::all()->where('name', $request['package'])->first();
        if (!($package && $package->canRunInvestment())){
            return back()->with('error', 'Can\'t process investment, package not found, disabled or closed');
        }
        // Check if package is sold out.
        if ($package->isSoldOut()){
            return back()->with('error', 'Can\'t process investment, package is sold out');
        }
//        Process investment based on payment method
        switch ($request['payment']){
            case 'wallet':
                if (!auth()->user()->hasSufficientBalanceForTransaction($request['slots'] * $package['price'])){
                    return back()->withInput()->with('error', 'Insufficient wallet balance');
                }
                auth()->user()->wallet()->decrement('balance', $request['slots'] * $package['price']);
                $status = 'active';
                $msg = 'Investment created successfully';
                break;
            case 'deposit':
                $status = 'pending';
                $msg = 'Investment queued successfully';
                break;
            case 'card':
                $data = ['type' => 'investment', 'package' => $package, 'slots' => $request['slots']];
                return PaymentController::initializeOnlineTransaction($request['slots'] * $package['price'], $data);
            default:
                return back()->withInput()->with('error', 'Invalid payment method');
        }
//        Create Investment
        if ($package['duration_mode'] == 'day') {
            $returnDate = now()->addDays($package['duration'])->format('Y-m-d H:i:s');
        } elseif ($package['duration_mode'] == 'month') {
            $returnDate = now()->addMonths($package['duration'])->format('Y-m-d H:i:s');
        } else {
            $returnDate = now()->addYears($package['duration'])->format('Y-m-d H:i:s');
        }

        $investment = auth()->user()->investments()->create([
            'package_id'=>$package['id'], 'slots' => $request['slots'], 'amount' => $request['slots'] * $package['price'],
            'total_return' => $request['slots'] * $package['price'] * (( 100 + $package['roi'] ) / 100 ),
            'investment_date' => now()->format('Y-m-d H:i:s'),
            'return_date' => $returnDate, 'status' => $status
        ]);
        if ($investment) {
            TransactionController::storeInvestmentTransaction($investment, $request['payment']);
            if ($investment['status'] == 'active'){
                NotificationController::sendInvestmentCreatedNotification($investment);
            }else{
                NotificationController::sendInvestmentQueuedNotification($investment);
            }
            return redirect()->route('investments', ['filter' => 'all', 'type' => $package['type']])->with('success', $msg);
        }
        return back()->withInput()->with('error', 'Error processing investment');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Investment  $investment
     * @return \Illuminate\Http\Response
     */
    public function show($type, Investment $investment)
    {
        $packages = Package::all();
        return view('user.investments.show', compact('investment', 'packages', 'investment'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Investment  $investment
     * @return \Illuminate\Http\Response
     */
    public function edit(Investment $investment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateInvestmentRequest  $request
     * @param  \App\Models\Investment  $investment
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateInvestmentRequest $request, Investment $investment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Investment  $investment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Investment $investment)
    {
        //
    }

    public function invest($type)
    {
        $setting = Setting::all()->first();
        $packages = Package::all()->where('status', 'open')->where('type', $type);
        return view('user.investments.create', compact('packages', 'setting', 'type'));
    }
}
