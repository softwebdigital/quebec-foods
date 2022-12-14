<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\TransactionResource;
use App\Models\Transaction;
use App\Repositories\TransactionRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Gate;

class TransactionController extends Controller
{
    public function __construct(protected TransactionRepository $transactionRepository)
    {
        $this->middleware('auth:sanctum');
    }

    public function index(): JsonResponse
    {
        $type = request()->input('type');
        return $this->success(data: TransactionResource::collection($this->transactionRepository->getForUser(type: $type)));
    }

    public function show(Transaction $transaction): JsonResponse
    {
        Gate::authorize('view', $transaction);
        return $this->success(data: new TransactionResource($transaction));
    }
}
