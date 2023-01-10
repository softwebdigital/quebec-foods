<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use App\Models\InternationalBank;
use Exception;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class SettingController extends Controller
{
    public function index()
    {
        try {
            $banks = json_decode(Http::get('https://api.paystack.co/bank')->getBody(), true)['data'];
        }catch (Exception $exception){
            $banks = [];
        }
        return view('admin.settings.index', ['banks' => $banks, 'setting' => Setting::all()->first(), 'international' => InternationalBank::all()->first()]);
    }

    // Save Settings
    public function saveSettings(Request $request): RedirectResponse
    {

        // Validate request
        $validator = Validator::make($request->all(), [
            // 'rate_plus' => ['required', 'numeric'],
        ]);

        if ($validator->fails()){
            return back()->withErrors($validator)->withInput()->with('error', 'Invalid input data');
        }
        // Update settings
        if (Setting::all()->first()->update([
            'base_currency' => $request['base_currency'],
            'rate_plus' => $request['rate_plus'],
            'ngn_rate_plus' => $request['ngn_rate_plus'],
            'show_cash' => $request['show_cash'] == 'yes',
            'invest' => $request['invest'] == 'yes',
            'rollover' => $request['rollover'] == 'yes',
            'withdrawal' => $request['withdrawal'] == 'yes',
            'auto_delete_unverified_users' => $request['auto_delete_users'] == 'yes',
            'auto_delete_unverified_users_after' => $request['delete_duration'],
            'exchange_rate_error_mail' => $request['exchange_rate_error_mail'] == 'yes',
            'pending_transaction_mail' => $request['pending_transaction_mail'] == 'yes',
            'error_mail_interval' => $request['error_mail_interval'],
            'pending_transaction_mail_interval' => $request['pending_transaction_mail_interval'],
        ]))
        return back()->with('success', 'Settings updated successfully');
        return back()->with('error', 'Error updating settings');
    }

    public function updateBankDetails(Request $request): RedirectResponse
    {
        //        Validate request
        $validator = Validator::make($request->all(), [
            'bank_name' => ['required'],
            'account_name' => ['required'],
            'account_number' => ['required'],
        ]);
        if ($validator->fails()){
            return back()->withErrors($validator)->withInput()->with('error', 'Invalid input data');
        }
//        Update bank details
        if (Setting::all()->first()->update([
            'bank_name' => $request['bank_name'],
            'account_name' => $request['account_name'],
            'account_number' => $request['account_number']
        ]))
            return back()->with('success', 'Bank details updated successfully');
        return back()->with('error', 'Error updating bank details');
    }


    public function updateInternationalBankDetails(Request $request): RedirectResponse
    {
        //        Validate request
        $validator = Validator::make($request->all(), [
            'bank_name' => ['required'],
            'account_name' => ['required'],
            'account_number' => ['required'],
            'added_information' => ['required'],
        ]);
        if ($validator->fails()){
            return back()->withErrors($validator)->withInput()->with('error', 'Invalid input data');
        }
//        Update bank details
        if (InternationalBank::all()->first()->update([
            'bank_name' => $request['bank_name'],
            'account_name' => $request['account_name'],
            'account_number' => $request['account_number'],
            'added_information' => $request['added_information']
        ]))
            return back()->with('success', 'Bank details updated successfully');
        return back()->with('error', 'Error updating bank details');
    }

    public static function fetchRates(): ?bool
    {
        $settings = Setting::first();
        $res = Http::withHeaders(['X-API-KEY' => env('GOLD_PRICE_API_KEY')])->get('http://goldpricez.com/api/rates/currency/ngn/measure/gram/metal/all');
        $res = json_decode(json_decode($res, true), true);
        if (isset($res['usd_to_ngn']))
            return $settings->update(['usd_to_ngn' => $res['usd_to_ngn'], 'ngn_to_usd' => $res['usd_to_ngn'] - 20]);
        return false;
    }
}
