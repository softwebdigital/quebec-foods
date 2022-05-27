<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ReferralController extends Controller
{
    public function index()
    {
        $referrals = auth()->user()->referrals()->get();
        return view('user.referrals.index', compact('referrals'));
    }
}
