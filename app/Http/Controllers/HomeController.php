<?php

namespace App\Http\Controllers;

use Image;
use Carbon\Carbon;
use App\Models\Package;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Validator;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    public function index()
    {
        $walletHistory = auth()->user()->transactions()->latest()->where('status', 'approved')->limit(6)->get();
        collect($walletHistory)->map(function($item) {
            $item['amount'] = self::formatHumanFriendlyNumber($item['amount']);
        });

        Carbon::setLocale('en_US');
        $weekTransactions = [];
        for ($i=0; $i < 7; $i++) {
            $weekTransactions[] = round(auth()->user()->transactions()->where('status', 'approved')->whereDate('created_at', Carbon::now()->startOfWeek()->addDays($i))->sum('amount'));
        }

        $monthTransactions = [];
        $monthTransactionsKeys = [];
        for ($day = 1; $day <= date('t'); $day++){
            $monthTransactionsKeys[] = date('M')." {$day}";
            $monthTransactions[] = round(auth()->user()->transactions()
                ->where('status', 'approved')
                ->whereDate('created_at', date('Y-m') . '-' . $day)
                ->sum('amount'));
        }

        $yearTransactions = [];
        for ($month = 1; $month <= 12; $month++){
            $yearTransactions[] = round(auth()->user()->transactions()
                ->where('status', 'approved')
                ->whereMonth('created_at', $month)
                ->sum('amount'));
        }

        $investments = auth()->user()->investments()->where('status', 'active')->orWhere('status', 'settled');
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
                'balance' => self::formatHumanFriendlyNumber(auth()->user()->wallet['balance']),
                'history' => $walletHistory,
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

        return view('user.dashboard.index', compact('data'));
    }

    public function profile()
    {
        try {
            $banks = json_decode(Http::get('https://api.paystack.co/bank')->getBody(), true)['data'];
        }catch (\Exception $exception){
            $banks = [];
        }
        return view('user.profile.index', compact('banks'));
    }

    // Create Directory to store files.
    public static function createDirectoryIfNotExists($path)
    {
        if (!file_exists($path)) {
            File::makeDirectory($path);
        }
    }

    public function update2fa(Request $request)
    {
        auth()->user()->update([
            'two_factor_enabled' => (isset($request['2fa']) && $request['2fa'] === 'yes')
        ]);
        return back()->with('success', '2FA updated successfully');
    }

    // Update User Profile
    public function updateProfile(Request $request)
    {
        // Validate request
        $validator = Validator::make($request->all(), [
            'first_name' => ['required'],
            'last_name' => ['required'],
            'phone' => ['required'],
            'state' => ['required'],
            'country' => ['required'],
            'city' => ['required'],
            'address' => ['required'],
            'nk_name' => ['required'],
            'nk_phone' => ['required'],
            'nk_address' => ['required'],
            'avatar' => ['sometimes', 'mimes:jpg,png,jpeg', 'max:2048'],
        ],[
            'nk_name.required' => 'The next of kin name is required',
            'nk_phone.required' => 'The next of kin phone is required',
            'nk_address.required' => 'The next of kin address is required'
        ]);
        if ($validator->fails()){
            return back()->withInput()->withErrors($validator)->with('error', 'Invalid input data');
        }
        // Collect data from request
        $data = $request->only([
            'first_name', 'last_name', 'phone', 'state', 'country', 'city',
            'address', 'nk_name', 'nk_phone', 'nk_address']);
        // Check if user uploaded file and save
        if ($request->file('avatar') || $request['avatar_remove']){
            if ($oldAvatar = auth()->user()['avatar'])
                try {
                    unlink($oldAvatar);
                    $data['avatar'] = null;
                } catch(\Exception $e){}
            if ($request->file('avatar')) {
                $destinationPath = 'assets/photos'; // upload path
                static::createDirectoryIfNotExists($destinationPath);
                $transferImage = \auth()->user()['id'].'-'. time() . '.' . $request['avatar']->getClientOriginalExtension();
                $image = Image::make($request->file('avatar'));
                $image->save($destinationPath . '/' . $transferImage, 40);
                $data['avatar'] = $destinationPath ."/".$transferImage;
            }
        }
        // Update profile
        if (auth()->user()->update($data)){
            if (auth()->user()['gotMail'] == 0) {
                NotificationController::sendWelcomeEmailNotification(auth()->user());
                auth()->user()->update(['gotMail' => 1]);
            }
            return back()->with('success', 'Profile updated successfully');
        }
        return back()->withInput()->with('error', 'Error updating profile');
    }

    // Update Password
    public function updatePassword(Request $request): \Illuminate\Http\RedirectResponse
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

    private function getPackageInvestments($type, $limit = 10)
    {
        return auth()->user()->investments()->latest()->whereHas('package', function($query) use ($type) {
            $query->where('type', $type);
        })->limit($limit)->get();
    }

    public static function formatHumanFriendlyNumber($num)
    {
        $num = (int) $num;
        if($num>1000) {
            $x = round($num);
            $x_number_format = number_format($x);
            $x_array = explode(',', $x_number_format);
            $x_parts = array('K', 'M', 'B', 'T');
            $x_count_parts = count($x_array) - 1;
            $x_display = $x;
            $x_display = $x_array[0] . ((int) $x_array[1][0] !== 0 ? '.' . $x_array[1][0] : '');
            $x_display .= $x_parts[$x_count_parts - 1];
            return $x_display;
        }
        return $num;
    }
}
