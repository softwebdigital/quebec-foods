<?php

namespace App\Http\Controllers;

use App\Models\Investment;
use App\Http\Requests\StoreInvestmentRequest;
use App\Http\Requests\UpdateInvestmentRequest;
use App\Models\Package;
use App\Models\Setting;

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
     * @param  \App\Http\Requests\StoreInvestmentRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreInvestmentRequest $request)
    {
        //
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
        $packages = Package::all()->where('investment', 'enabled')->where('type', $type);
        return view('user.investments.create', compact('packages', 'setting', 'type'));
    }
}
