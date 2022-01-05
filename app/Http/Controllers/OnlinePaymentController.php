<?php

namespace App\Http\Controllers;

use App\Models\OnlinePayment;
use App\Http\Requests\StoreOnlinePaymentRequest;
use App\Http\Requests\UpdateOnlinePaymentRequest;

class OnlinePaymentController extends Controller
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
     * @param  \App\Http\Requests\StoreOnlinePaymentRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreOnlinePaymentRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\OnlinePayment  $onlinePayment
     * @return \Illuminate\Http\Response
     */
    public function show(OnlinePayment $onlinePayment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\OnlinePayment  $onlinePayment
     * @return \Illuminate\Http\Response
     */
    public function edit(OnlinePayment $onlinePayment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateOnlinePaymentRequest  $request
     * @param  \App\Models\OnlinePayment  $onlinePayment
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateOnlinePaymentRequest $request, OnlinePayment $onlinePayment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\OnlinePayment  $onlinePayment
     * @return \Illuminate\Http\Response
     */
    public function destroy(OnlinePayment $onlinePayment)
    {
        //
    }
}
