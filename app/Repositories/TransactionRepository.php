<?php

namespace App\Repositories;

use App\Models\Transaction;
use App\Models\User;
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
}
