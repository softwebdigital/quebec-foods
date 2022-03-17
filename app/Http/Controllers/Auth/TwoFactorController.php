<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Notifications\TwoFactorCode;

class TwoFactorController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'two_factor']);
    }

    public function index()
    {
        return view('auth.two-factor');
    }

    public function store(Request $request)
    {
        $request->validate([
            'input1' => 'integer|required',
            'input2' => 'integer|required',
            'input3' => 'integer|required',
            'input4' => 'integer|required',
            'input5' => 'integer|required',
            'input6' => 'integer|required',
        ]);

        $token = $request['input1'].$request['input2'].$request['input3'].$request['input4'].$request['input5'].$request['input6'];
        $user = auth()->user();

        if($token == $user->two_factor_code)
        {
            $user->resetTwoFactorCode();

            return redirect()->route('dashboard');
        }

        return redirect()->back()->with('error', 'The two factor code you have entered does not match');
    }

    public function resend()
    {
        $user = auth()->user();
        $user->generateTwoFactorCode();
        $user->notify(new TwoFactorCode());

        return redirect()->back()->with('success', 'The two factor code has been sent again');
    }
}
