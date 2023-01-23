<?php

namespace App\Repositories;

use App\Models\User;
use Illuminate\Database\Eloquent\Collection;

class UserRepository extends AbstractRepository
{
    public function __construct(User $user)
    {
        parent::__construct($user);
    }

    public function model()
    {
        return app(User::class);
    }

    public function getAll(array $columns = ['*'], string $order = 'created_at', string $dir = 'desc', $filter = null): Collection|array
    {
        $users = $this->model();
        if ($filter == 'verified')
            $users = $users->where('email_verified_at', '!=', null);
        elseif ($filter == 'unverified')
            $users = $users->where('email_verified_at', null);
        return $users->orderBy($order, $dir)
            ->offset(get_per_page() * (get_page() - 1))
            ->limit(get_per_page())
            ->get($columns);
    }

    public function getMeta($filter = null): array
    {
        return [
            'page' => get_page(),
            'per_page' => get_per_page(),
            'total' => count($this->getAll(filter: $filter))
        ];
    }

    public function getSearchMeta(string $search, $filter = null): array
    {
        return [
            'page' => get_page(),
            'per_page' => get_per_page(),
            'total' => count($this->search($search, $filter))
        ];
    }

    public function search(?string $string, $filter = null, string $order = 'created_at', string $dir = 'desc', array $columns = ['*'])
    {
        $users = $this->model()->where(function ($q) use ($string) {
            $q->where('name', 'LIKE', "%$string%")
                ->orWhere('address', 'LIKE', "%$string%");
        });
        if ($filter == 'verified')
            $users = $users->where('email_verified_at', '!=', null);
        elseif ($filter == 'unverified')
            $users = $users->where('email_verified_at', null);
        return $users->orderBy($order, $dir)
            ->offset(get_per_page() * (get_page() - 1))
            ->limit(get_per_page())
            ->get($columns);
    }
}
