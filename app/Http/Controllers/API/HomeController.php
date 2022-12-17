<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\InvestmentResource;
use App\Models\Setting;
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

    public function currency(): JsonResponse
    {
        return $this->success(data: ['currency' => Setting::query()->first()?->base_currency, 'symbol' => getCurrency()]);
    }
}
