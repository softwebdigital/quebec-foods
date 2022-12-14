<?php

namespace App\Repositories;

use App\Models\Package;
use Illuminate\Database\Eloquent\Collection;

class PackageRepository extends AbstractRepository
{
    public function __construct(Package $package)
    {
        parent::__construct($package);
    }

    public function model()
    {
        return app(Package::class);
    }

    public function getAll(array $columns = ['*'], string $order = 'created_at', string $dir = 'desc', $type = null, $status = null): Collection|array
    {
        $model = $this->model()->query();
        if ($type) $model = $model->where('type', $type);
        if ($status) $model = $model->where('status', $status);
        return $model->orderBy($order, $dir)
            ->offset(get_per_page() * (get_page() - 1))
            ->limit(get_per_page())
            ->get($columns);
    }
}
