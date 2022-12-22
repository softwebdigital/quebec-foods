<?php

namespace App\Repositories;

use App\Models\Transaction;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;

class TransactionRepository extends AbstractRepository
{
    public function __construct(Transaction $transaction)
    {
        parent::__construct($transaction);
    }

    public function model()
    {
        return app(Transaction::class);
    }

    public function getForUser(array $columns = ['*'], string $order = 'created_at', string $dir = 'desc', User|null $user = null, $type = null): Collection|array
    {
        $user = $user ?? auth()->user();
        $model = $user->transactions();
        if ($type) $model = $model->where('type', $type);
        return $model->orderBy($order, $dir)
            ->offset(get_per_page() * (get_page() - 1))
            ->limit(get_per_page())
            ->get($columns);
    }

    public function getMeta(User|null $user = null, string|null $type = null): array
    {
        return [
            'page' => get_page(),
            'per_page' => get_per_page(),
            'total' => count($this->getForUser(user: $user, type: $type))
        ];
    }

    public function getPendingTransactionsAmount()
    {
        return request()->user()->transactions()->where('status', 'pending')->sum('amount');
    }

    public function getWalletHistory(array $columns = ['*'], string $order = 'created_at', string $dir = 'desc', User|null $user = null, int|null $per_page = null): Collection|array
    {
        $user = $user ?? auth()->user();
        $model = $user->transactions()->where(function ($q) {
            $q->where('type', 'withdrawal')
                ->orWhere('type', 'deposit')
                ->orWhere(function ($q) {
                    $q->where('type', 'investment')
                        ->where('method', 'wallet');
                });
        });
        $per_page = $per_page ?? get_per_page();
        return $model->orderBy($order, $dir)
            ->offset($per_page * (get_page() - 1))
            ->limit($per_page)
            ->get($columns);
    }

    public function getChart(): array
    {
        $data = [];
        for ($i = 6; $i >= 0; $i--) {
            $day = Carbon::now()->subDays($i);
            $data[$day->format('D')] = number_format((float)
                request()->user()->transactions()
                    ->whereIn('type', ['payout', 'deposit'])
                    ->where('status', 'approved')
                    ->whereDate('created_at', $day->format('Y-m-d'))
                    ->sum('amount'), 2, '.', '');
        }
        return $data;
    }
}
