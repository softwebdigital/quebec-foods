<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Referral;
use Illuminate\Http\Request;
use App\Models\User;

class ReferralController extends Controller
{
    //
    public function index()
    {
        $users = User::whereHas('referrals')
                        ->with('referrals')
                        ->withCount('referrals')
                        ->orderBy('referrals_count', 'desc')
                        ->get();
        return view('admin.referral.index', compact('users'));
    }
}
