<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
<<<<<<< HEAD
=======
use App\Models\InternationalBank;
>>>>>>> master
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class SettingController extends Controller
{
    //
    public function index()
    {
        try {
            $banks = json_decode(Http::get('https://api.paystack.co/bank')->getBody(), true)['data'];
        }catch (\Exception $exception){
            $banks = [];
        }
<<<<<<< HEAD
        return view('admin.settings.index', ['banks' => $banks, 'setting' => Setting::all()->first(), 'international' => Setting::all()->skip(1)->first()]);
=======
        return view('admin.settings.index', ['banks' => $banks, 'setting' => Setting::all()->first(), 'international' => InternationalBank::all()->first()]);
>>>>>>> master
    }

    // Save Settings
    public function saveSettings(Request $request)
    {

        // Validate request
        $validator = Validator::make($request->all(), [
<<<<<<< HEAD
            'rate_plus' => ['required', 'numeric'],
        ]);
=======
            // 'rate_plus' => ['required', 'numeric'],
        ]);

>>>>>>> master
        if ($validator->fails()){
            return back()->withErrors($validator)->withInput()->with('error', 'Invalid input data');
        }
        // Update settings
        if (Setting::all()->first()->update([
<<<<<<< HEAD
            'base_currency' => $request['base_currency'],
            'rate_plus' => $request['rate_plus'],
=======
            // 'base_currency' => $request['base_currency'],
            // 'rate_plus' => $request['rate_plus'],
>>>>>>> master
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
<<<<<<< HEAD
            return back()->with('success', 'Settings updated successfully');
=======
        return back()->with('success', 'Settings updated successfully');
>>>>>>> master
        return back()->with('error', 'Error updating settings');
    }

    public function updateBankDetails(Request $request)
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


    public function updateInternationalBankDetails(Request $request)
    {
        //        Validate request
        $validator = Validator::make($request->all(), [
            'bank_name' => ['required'],
            'account_name' => ['required'],
            'account_number' => ['required'],
<<<<<<< HEAD
=======
            'added_information' => ['required'],
>>>>>>> master
        ]);
        if ($validator->fails()){
            return back()->withErrors($validator)->withInput()->with('error', 'Invalid input data');
        }
//        Update bank details
<<<<<<< HEAD
        if (Setting::all()->skip(1)->first()->update([
            'bank_name' => $request['bank_name'],
            'account_name' => $request['account_name'],
            'account_number' => $request['account_number']
        ]))
=======
        if (InternationalBank::all()->first()->update([
            'bank_name' => $request['bank_name'],
            'account_name' => $request['account_name'],
            'account_number' => $request['account_number'],
            'added_information' => $request['added_information']
        ]));
>>>>>>> master
            return back()->with('success', 'Bank details updated successfully');
        return back()->with('error', 'Error updating bank details');
    }
}
