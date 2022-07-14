<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Investment;
use App\Models\Package;
use App\Models\Trade;
use App\Models\Transaction;
use App\Models\User;
use App\Models\Wallet;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Validator;

class HomeController extends Controller
{
    public function dashboard()
    {
        $walletHistory = Transaction::latest()->where('status', 'approved')->limit(6)->get();
        collect($walletHistory)->map(function($item) {
            $item['amount'] = self::formatHumanFriendlyNumber($item['amount']);
        });

        $activePlantInvestment = $this->getPackageActiveInvestments('plant');
        $activeFarmInvestment = $this->getPackageActiveInvestments('farm');
<<<<<<< HEAD
        $activeTractorInvestment = $this->getPackageActiveInvestments('tractor');

        $getPlantInvestor = $this->getInvestors('plant');
        $getFarmInvestor = $this->getInvestors('farm');
        $getTractorInvestor = $this->getInvestors('tractor');

        $settledPlantInvestment = $this->getPackageSettledInvestments('plant');
        $settledFarmInvestment = $this->getPackageSettledInvestments('farm');
        $settledTractorInvestment = $this->getPackageSettledInvestments('tractor');

        $totalPlantInvestment = $this->getPackageTotalInvestments('plant');
        $totalFarmInvestment = $this->getPackageTotalInvestments('farm');
        $totalTractorInvestment = $this->getPackageTotalInvestments('tractor');
=======

        $getPlantInvestor = $this->getInvestors('plant');
        $getFarmInvestor = $this->getInvestors('farm');

        $settledPlantInvestment = $this->getPackageSettledInvestments('plant');
        $settledFarmInvestment = $this->getPackageSettledInvestments('farm');

        $totalPlantInvestment = $this->getPackageTotalInvestments('plant');
        $totalFarmInvestment = $this->getPackageTotalInvestments('farm');
>>>>>>> david

        Carbon::setLocale('en_US');
        $weekTransactions = [];
        for ($i=0; $i < 7; $i++) {
            $weekTransactions[] = round(Transaction::query()->where('status', 'approved')->whereDate('created_at', Carbon::now()->startOfWeek()->addDays($i))->sum('amount'));
        }

        $monthTransactions = [];
        $monthTransactionsKeys = [];
        for ($day = 1; $day <= date('t'); $day++){
            $monthTransactionsKeys[] = date('M')." {$day}";
            $monthTransactions[] = round(Transaction::query()
                ->where('status', 'approved')
                ->whereDate('created_at', date('Y-m') . '-' . $day)
                ->sum('amount'));
        }


        $yearTransactions = [];
        for ($month = 1; $month <= 12; $month++){
            $yearTransactions[] = round(Transaction::query()
                ->where('status', 'approved')
                ->whereMonth('created_at', $month)
                ->sum('amount'));
        }

        $investments = Investment::where('payment', 'approved');
        $data = [
            'package'     => Package::query()->latest()->where('type', 'plant')->first(),
            'investments' => [
                'plant'   => $this->getPackageInvestments('plant'),
                'farm'    => $this->getPackageInvestments('farm'),
<<<<<<< HEAD
                'tractor' => $this->getPackageInvestments('tractor'),
=======
>>>>>>> david
                'total'   => self::formatHumanFriendlyNumber($investments->sum('amount')),
                'returns' => self::formatHumanFriendlyNumber($investments->sum('total_return')),
                'slots'   => self::formatHumanFriendlyNumber($investments->sum('slots')),
            ],
            'wallet'      => [
                'balance' => self::formatHumanFriendlyNumber(Wallet::sum('balance')),
                'history' => $walletHistory,
            ],
            'plantInvestments' => [
                'active'    => (int)$activePlantInvestment->sum('amount'),
                'slots'     => self::formatHumanFriendlyNumber($totalPlantInvestment->sum('slots')),
                'total'     => self::formatHumanFriendlyNumber($totalPlantInvestment->sum('amount')),
                'returns'   => self::formatHumanFriendlyNumber($totalPlantInvestment->sum('total_return')),
                'investors' => self::formatHumanFriendlyNumber($getPlantInvestor->count('id')),
            ],
<<<<<<< HEAD
            'tractorInvestments' => [
                'active'    => (int)$activeTractorInvestment->sum('amount'),
                'slots'     => self::formatHumanFriendlyNumber($totalTractorInvestment->sum('slots')),
                'total'     => self::formatHumanFriendlyNumber($totalTractorInvestment->sum('amount')),
                'returns'   => self::formatHumanFriendlyNumber($totalTractorInvestment->sum('total_return')),
                'investors' => self::formatHumanFriendlyNumber($getTractorInvestor->count('id')),
            ],
=======
>>>>>>> david
            'farmInvestments' => [
                'active'  => (int)$activeFarmInvestment->sum('amount'),
                'slots'   => self::formatHumanFriendlyNumber($totalFarmInvestment->sum('slots')),
                'total'   => self::formatHumanFriendlyNumber($totalFarmInvestment->sum('amount')),
                'returns' => self::formatHumanFriendlyNumber($totalFarmInvestment->sum('total_return')),
                'investors' => self::formatHumanFriendlyNumber($getFarmInvestor->count('id')),
            ],
            'unSettledInvestments' => [
<<<<<<< HEAD
                'plant'   => ceil($settledPlantInvestment->sum('amount') / ($totalPlantInvestment->sum('amount') > 0 ? $totalPlantInvestment->sum('amount') : 1)) * 100,
                'farm'    => ceil($settledFarmInvestment->sum('amount') / ($totalFarmInvestment->sum('amount') > 0 ? $totalFarmInvestment->sum('amount') : 1)) * 100,
                'tractor' => ceil($settledFarmInvestment->sum('amount') / ($totalFarmInvestment->sum('amount') > 0 ? $totalFarmInvestment->sum('amount') : 1)) * 100
=======
                'plant' => ceil($settledPlantInvestment->sum('amount') / ($totalPlantInvestment->sum('amount') > 0 ? $totalPlantInvestment->sum('amount') : 1)) * 100,
                'farm'  => ceil($settledFarmInvestment->sum('amount') / ($totalFarmInvestment->sum('amount') > 0 ? $totalFarmInvestment->sum('amount') : 1)) * 100
>>>>>>> david
            ],
            'chartData'   => [
                'transactions' => [
                    'week' => $weekTransactions,
                    'month' => [
                        'keys' => $monthTransactionsKeys,
                        'data' => $monthTransactions,
                    ],
                    'year' => $yearTransactions
                ]
            ]
        ];
        return view('admin.dashboard.index', compact('data'));
    }

    public function profile()
    {
        $user = auth()->user();
        // return $user;
        return view('admin.profile.index', compact('user'));
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

    private function getPackageSettledInvestments($type)
    {
        return Investment::latest()->where('status', 'settled')->whereHas('package', function($query) use ($type) {
            $query->where('type', $type);
        })->get();
    }

    private function getPackageTotalInvestments($type)
    {
        return Investment::latest()->where('payment', 'approved')->whereHas('package', function($query) use ($type) {
            $query->where('type', $type);
        })->get();
    }

    private function getInvestors($type)
    {
        return User::whereHas('investments', function($query) use ($type) {
<<<<<<< HEAD
            $query->where('payment', 'approved')->whereHas('package', function($query) use ($type) {
=======
            $query->whereHas('package', function($query) use ($type) {
>>>>>>> david
                $query->where('type', $type);
            });
        })->distinct()->get();
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
