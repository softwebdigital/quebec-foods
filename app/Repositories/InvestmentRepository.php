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

    public function getMeta(User|null $user = null, string|null $type = null, string|null $status = null): array
    {
        return [
            'page' => get_page(),
            'per_page' => get_per_page(),
            'total' => count($this->getForUser(user: $user, type: $type, status: $status))
        ];
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

    public function getTotalInvestmentsAmount()
    {
        return request()->user()->investments()->where('payment', 'approved')->sum('amount');
    }

    public function getPendingInvestmentsAmount()
    {
        return request()->user()->investments()->where('status', 'pending')->sum('amount');
    }

    public function getActiveInvestmentsAmount()
    {
        return request()->user()->investments()->where('status', 'active')->sum('amount');
    }

    public function getActiveInvestments()
    {
        return request()->user()->investments()->where('status', 'active')->latest()->get()->take(3);
    }

    public function getChart(): array
    {
        return [
            'active' => request()->user()->investments()->where('status', 'active')->count(),
            'pending' => request()->user()->investments()->where('status', 'pending')->count(),
            'total' => request()->user()->investments()->whereIn('status', ['pending', 'active'])->count()
        ];
    }
}
