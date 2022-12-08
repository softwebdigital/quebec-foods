<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

abstract class AbstractRepository
{
    public function __construct(protected Model $model)
    {
    }

    public abstract function model();

    /**
     * Gets all model
     *
     * @param array $columns
     * @param string $order
     * @param string $dir
     * @return Collection|array
     */
    public function getAll(array $columns = ['*'], string $order = 'created_at', string $dir = 'desc'): Collection|array
    {
        return $this->model->query()
            ->orderBy($order, $dir)
            ->offset(get_per_page() * (get_page() - 1))
            ->limit(get_per_page())
            ->get($columns);
    }

    /**
     * Get pagination data
     * @return array
     */

    public function getMeta(): array
    {
        return [
            'page' => get_page(),
            'per_page' => get_per_page(),
            'total' => $this->model->query()->count()
        ];
    }

    /**
     * Get the last saved model
     *
     * @param array $columns
     * @return Model
     */
    public function getLast(array $columns = ['*']): Model
    {
        return $this->model->query()->latest()->first($columns);
    }

    /**
     * Find a model by ID
     *
     * @param integer $id
     * @param array $columns
     * @return object|null
     */
    public function find(int $id, array $columns = ['*']): object|null
    {
        return $this->model->query()->find($id, $columns);
    }

    /**
     * Find a model by column
     *
     * @param string $column
     * @param string $string
     * @param array $columns
     * @return object|null
     */
    public function findByColumn(string $column, string $string, array $columns = ['*']): object|null
    {
        return $this->model->query()->where("$column", $string)->first($columns);
    }

    /**
     * Create a new model
     *
     * @param array $data
     * @return mixed
     */
    public function create(array $data): mixed
    {
        $class = get_class($this->model);
        return $class::create($data);
    }

    /**
     * Updates a model by id
     *
     * @param integer $id
     * @param array $data
     * @return boolean
     */
    public function update(int $id, array $data): bool
    {
        return $this->find($id)->update($data);
    }

    /**
     * Delete a model by id
     *
     * @param integer $id
     * @return boolean
     */
    public function destroy(int $id): bool
    {
        $class = get_class($this->model);
        return $class::destroy($id);
    }
}
