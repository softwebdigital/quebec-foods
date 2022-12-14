<?php

namespace App\Repositories;

use App\Models\Investment;
use App\Models\User;
use Illuminate\Database\Eloquent\Collection;

class InvestmentRepository extends AbstractRepository
{
    public function __construct(Investment $investment)
    {
        parent::__construct($investment);
    }

    public function model()
    {
        return app(Investment::class);
    }

    public function getAll(array $columns = ['*'], string $order = 'created_at', string $dir = 'desc', string|null $type = null, $status = null): Collection|array
    {
        $model = $this->model()->query();
        $model = $this->filterInvestment($model, $type, $status);
        return $model->orderBy($order, $dir)
            ->offset(get_per_page() * (get_page() - 1))
            ->limit(get_per_page())
            ->get($columns);
    }

    public function getForUser(array $columns = ['*'], string $order = 'created_at', string $dir = 'desc', User|null $user = null, string|null $type = null, $status = null): Collection|array
    {
        $user = $user ?? auth()->user();
        $model = $user->investments();
        $model = $this->filterInvestment($model, $type, $status);
        return $model->orderBy($order, $dir)
            ->offset(get_per_page() * (get_page() - 1))
            ->limit(get_per_page())
            ->get($columns);
    }

    protected function filterInvestment($investment, $type = null, $status = null)
    {
        if ($type) $investment = $investment->whereHas('package', function ($q) use ($type) {
            $q->where('type', $type);
        });
        if ($status) $investment = $investment->whereHas('package', function ($q) use ($status) {
            $q->where('status', $status);
        });
        return $investment;
    }
}
