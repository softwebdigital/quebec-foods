<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\InvestmentResource;
use App\Http\Resources\ReferralResource;
use App\Models\InternationalBank;
use App\Models\Setting;
use App\Models\User;
use App\Repositories\InvestmentRepository;
use App\Repositories\TransactionRepository;
use Illuminate\Http\JsonResponse;

class HomeController extends Controller
{
    public function __construct(
        protected InvestmentRepository $investmentRepository,
        protected TransactionRepository $transactionRepository
    )
    {
        $this->middleware('auth:sanctum');
    }

    public function index(): JsonResponse
    {
        return $this->success(data: [
            'totalInvestments' => round($this->investmentRepository->getTotalInvestmentsAmount(), 2),
            'activeInvestments' => round($this->investmentRepository->getActiveInvestmentsAmount(), 2),
            'pendingInvestments' => round($this->investmentRepository->getPendingInvestmentsAmount(), 2),
            'pendingTransactions' => round($this->transactionRepository->getPendingTransactionsAmount(), 2),
            'investment' => [
                'active' => InvestmentResource::collection($this->investmentRepository->getActiveInvestments()),
                'chart' => $this->investmentRepository->getChart()
            ],
            'wallet' => [
                'balance' => round(request()->user()->wallet->balance,2),
                'chart' => $this->transactionRepository->getChart()
            ]
        ]);
    }

    public function referrals(): JsonResponse
    {
        return $this->success(data: ReferralResource::collection(request()->user()->referrals()->latest()->get()));
    }

    public function currency(): JsonResponse
    {
        return $this->success(data: ['currency' => Setting::query()->first()?->base_currency, 'symbol' => getCurrency()]);
    }

    public function bankAccount(): JsonResponse
    {
        return $this->success(data: [
            'local' => Setting::query()->first(['bank_name', 'account_name', 'account_number']),
            'international' => InternationalBank::query()->first(['bank_name', 'account_name', 'account_number', 'added_information'])
        ]);
    }

    public function countries(): JsonResponse
    {
        $countriesList = User::$countries;
        $phoneCodes = array_column($countriesList, 'phonecode');
        uasort($phoneCodes, fn($a, $b) => $a > $b ? 1 : -1);
        $phoneCodes = array_values(array_unique(array_filter($phoneCodes, fn($item) => $item > 0)));
        $countries = json_decode(file_get_contents(public_path('assets/data/countries.json')), TRUE);
        return $this->success(data: [
            'countries' => $countries,
            'phone_codes' => $phoneCodes
        ]);
    }
}
