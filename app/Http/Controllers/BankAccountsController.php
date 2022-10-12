<?php

namespace App\Http\Controllers;

use App\Models\BankAccounts;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class BankAccountsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'bank_name' => ['required'],
            'account_name' => ['required'],
            'account_number' => ['required'],
        ]);
        if ($validator->fails()){
            return back()->withInput()->withErrors($validator)->with('error', 'Invalid input data');
        }
        $data = $request->only(['bank_name', 'account_name', 'account_number']);
        if (auth()->user()->bankAccounts()->count() >= 3) {
            return back()->withInput()->with('error', 'You can have a maximum of 3 account numbers');
        }
        if (auth()->user()->bankAccounts()->where($data)->exists()) {
            return back()->withInput()->with('error', 'Bank account already exists');
        }
        $data = $request->only(['bank_name', 'account_name', 'account_number']);
        if (auth()->user()->bankAccounts()->create($data)) {
            return back()->with('success', 'Bank account added successfully');
        }
        return back()->withInput()->with('error', 'Error adding bank');
    }

    public function storeInt(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'bank_name' => ['required'],
            'account_name' => ['required'],
            'account_number' => ['required'],
            'added_information' => ['required'],
        ]);
        if ($validator->fails()){
            return back()->withInput()->withErrors($validator)->with('error', 'Invalid input data');
        }
        $data = $request->only(['bank_name', 'account_name', 'account_number', 'added_information']);
        if (auth()->user()->bankAccounts()->count() >= 3) {
            return back()->withInput()->with('error', 'You can have a maximum of 3 account numbers');
        }
        if (auth()->user()->bankAccounts()->where($data)->exists()) {
            return back()->withInput()->with('error', 'Bank account already exists');
        }
        $data = $request->only(['bank_name', 'account_name', 'account_number', 'added_information']);
        if (auth()->user()->bankAccounts()->create($data)) {
            return back()->with('success', 'Bank account added successfully');
        }
        return back()->withInput()->with('error', 'Error adding bank');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\BankAccounts  $bankAccounts
     * @return \Illuminate\Http\Response
     */
    public function show(BankAccounts $bankAccounts)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\BankAccounts  $bankAccounts
     * @return \Illuminate\Http\Response
     */
    public function edit(BankAccounts $bankAccounts)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  \App\Models\BankAccounts  $bank
     * @return \Illuminate\Http\Response
     */

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\BankAccounts  $bank
     * @return \Illuminate\Http\Response
     */
    public function destroy(BankAccounts $bank)
    {
        $bank->delete();
        return back()->with('success', 'Bank account deleted successfully');
    }
}
