<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Investment;
use App\Models\Package;
use App\Models\Trade;
use App\Models\Transaction;
use App\Models\User;
use App\Models\Wallet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Validator;

class HomeController extends Controller
{
    public function dashboard()
    {
        $walletHistory = Transaction::latest()->where('method', 'wallet')->limit(6)->get();
        collect($walletHistory)->map(function($item) {
            $item['amount'] = self::formatHumanFriendlyNumber($item['amount']);
        });

        $activePlantInvestment = $this->getPackageActiveInvestments('plant');
        $activeFarmInvestment = $this->getPackageActiveInvestments('farm');

        $investments = Investment::where('status', 'active')->orWhere('status', 'settled');
        $data = [
            'package'     => Package::query()->latest()->where('type', 'plant')->first(),
            'investments' => [
                'plant'   => $this->getPackageInvestments('plant'),
                'farm'    => $this->getPackageInvestments('farm'),
                'total'   => self::formatHumanFriendlyNumber($investments->sum('amount')),
                'returns' => self::formatHumanFriendlyNumber($investments->sum('total_return')),
                'slots'   => self::formatHumanFriendlyNumber($investments->sum('slots')),
            ],
            'wallet'      => [
                'balance' => self::formatHumanFriendlyNumber(Wallet::sum('balance')),
                'history' => $walletHistory,
            ],
            'plantInvestments' => [
                'active'  => (int)$activePlantInvestment->sum('amount'),
                'slots'   => self::formatHumanFriendlyNumber($activePlantInvestment->sum('slots')),
                'total'   => self::formatHumanFriendlyNumber($activePlantInvestment->sum('amount')),
                'returns' => self::formatHumanFriendlyNumber($activePlantInvestment->sum('total_return')),
            ],
            'farmInvestments' => [
                'active'  => (int)$activeFarmInvestment->sum('amount'),
                'slots'   => self::formatHumanFriendlyNumber($activeFarmInvestment->sum('slots')),
                'total'   => self::formatHumanFriendlyNumber($activeFarmInvestment->sum('amount')),
                'returns' => self::formatHumanFriendlyNumber($activeFarmInvestment->sum('total_return')),
            ]
        ];
        return view('admin.dashboard.index', compact('data'));
    }

    public function profile()
    {
        return view('admin.profile.index');
    }

    public function updateProfile(Request $request): \Illuminate\Http\RedirectResponse
    {
    // Validate request
        $validator = Validator::make($request->all(), [
            'name' => ['required'],
        ]);
        if ($validator->fails()){
            return back()->withInput()->withErrors($validator)->with('error', 'Invalid input data');
        }
    // Update profile
        if (auth()->user()->update(['name' => $request['name']])){
            return back()->with('success', 'Profile updated successfully');
        }
        return back()->with('error', 'Error updating profile');
    }

    public function changePassword(Request $request): \Illuminate\Http\RedirectResponse
    {
    // Validate request
        $validator = Validator::make($request->all(), [
            'old_password' => ['required'],
            'new_password' => ['required', 'min:8', 'same:confirm_password'],
        ]);
        if ($validator->fails()){
            return back()->withErrors($validator)->with('error', 'Invalid input data');
        }
    // Check if old password matches
        if (!Hash::check($request['old_password'], auth()->user()['password'])){
            return back()->with('error', 'Old password incorrect');
        }
    // Change password
        if (auth()->user()->update(['password' => Hash::make($request['new_password'])])){
            return back()->with('success', 'Password changed successfully');
        }
        return back()->with('error', 'Error changing password');
    }

    private function getPackageInvestments($type, $limit = 3)
    {
        return Investment::latest()->whereHas('package', function($query) use ($type) {
            $query->where('type', $type);
        })->limit($limit)->get();
    }

    private function getPackageActiveInvestments($type)
    {
        return Investment::latest()->where('status', 'active')->whereHas('package', function($query) use ($type) {
            $query->where('type', $type);
        })->get();
    }

    protected function formatHumanFriendlyNumber($num)
    {
        $num = (int) $num;
        if($num>1000) {
            $x = round($num);
            $x_number_format = number_format($x);
            $x_array = explode(',', $x_number_format);
            $x_parts = array('K', 'M', 'B', 'T ');
            $x_count_parts = count($x_array) - 1;
            $x_display = $x;
            $x_display = $x_array[0] . ((int) $x_array[1][0] !== 0 ? '.' . $x_array[1][0] : '');
            $x_display .= $x_parts[$x_count_parts - 1];
            return $x_display;
        }
        return $num;
    }
}
