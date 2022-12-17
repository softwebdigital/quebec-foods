<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\BankRequest;
use App\Http\Resources\BankResource;
use App\Models\BankAccounts;
use App\Repositories\BankRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Http;

class BankController extends Controller
{
    public function __construct(protected BankRepository $bankRepository)
    {
        $this->middleware('auth:sanctum');
    }

    public function index(): JsonResponse
    {
        return $this->success(data: BankResource::collection($this->bankRepository->getUserBanks()));
    }

    public function store(BankRequest $request): JsonResponse
    {
        $data = $request->validated();
        $data['user_id'] = auth()->id();
        if ($request->user()->bankAccounts()->count() >= 3)
            return $this->failure('You can have a maximum of 3 account numbers', status: 400);
        if ($bank = $this->bankRepository->create($data))
            return $this->success('Bank account added successfully!', data: new BankResource($bank));
        return $this->failure('Error adding bank!', status: 400);
    }

    public function show(BankAccounts $bank): JsonResponse
    {
        Gate::authorize('view', $bank);
        return $this->success(data: new BankResource($bank));
    }

    public function update(BankRequest $request, BankAccounts $bank): JsonResponse
    {
        Gate::authorize('update', $bank);
        $this->bankRepository->update($bank['id'], $request->validated());
        $bank = $this->bankRepository->find($bank['id']);
        return $this->success(message: 'Bank updated successfully!', data: new BankResource($bank));
    }

    public function delete(BankAccounts $bank): JsonResponse
    {
        Gate::authorize('delete', $bank);
        $this->bankRepository->destroy($bank['id']);
        return $this->success(message: 'Bank deleted successfully!');
    }

    public function verify(Request $request): JsonResponse
    {
        extract($request->only(['account_number', 'bank_code']));
        $data = json_decode(
            Http::withHeaders(['Authorization' => 'Bearer '.env('PAYSTACK_SECRET_KEY')])
                ->get("https://api.paystack.co/bank/resolve?account_number=$account_number&bank_code=$bank_code"),
            true
        );
        if (isset($data['data'])) return $this->success(message: $data['message'], data: $data['data']);
        else return $this->failure(message: $data['message'], status: 400);
    }

    public function list(): JsonResponse
    {
        $data = json_decode(Http::get("https://api.paystack.co/bank"), true);
        if (isset($data['data'])) return $this->success(message: $data['message'], data: $data['data']);
        else return $this->failure(message: $data['message'], status: 400);
    }
}
