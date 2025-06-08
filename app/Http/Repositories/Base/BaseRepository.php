<?php

namespace App\Http\Repositories\Base;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;

abstract class BaseRepository
{
    /**
     * @var Model
     */
    protected $model;

    protected $relations = [];
    protected $data;

    /**
     * BaseRepository constructor.
     *
     * @param Model $model
     */
    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    /**
     * Method all
     *
     * Get all instances of model
     *
     * @return Collection|LengthAwarePaginator
     */
    public function all(Request $request): Collection|LengthAwarePaginator
    {
        if (!empty($this->relations))
            $this->model = $this->model->with($this->relations);

        return (isset($request->data) && $request->data == 'all') ? $this->model->get() : $this->model->paginate($request->size ?? 10);
    }

    /**
     * Show the record with the given id
     *
     * @param Model|int|string $model
     * @return Model|null
     */
    public function show(Model|int|string $model): ?Model
    {
        $this->model = $this->findModel($model);

        if (!empty($this->relations))
            $this->model = $this->model->load($this->relations);

        return $this->model;
    }

    /**
     * Create a new record in the database
     *
     * @param array $data
     * @return Model
     */
    public function create(array $data): Model
    {
        return $this->model->create($data);
    }

    /**
     * Update record in the database
     *
     * @param Model|int|string $model
     * @param array $data
     * @return Model
     */
    public function update(Model|int|string $model, array $data): Model
    {
        $model = $this->findModel($model);

        $model->fill($data);

        if($model->isClean()) return $model;

        $model->update($data);

        return $model;
    }

    /**
     * Remove record from the database
     *
     * @param Model|int|string $model
     * @return bool
     */
    public function delete(Model|int|string $model): bool
    {
        $model = $this->findModel($model);

        return $model->delete();
    }

    // Método para obtener el modelo (con ID o instancia de modelo)
    protected function findModel(Model|int|string $model): Model
    {
        return is_int($model) || is_string($model) ? $this->model->findOrFail($model) : $model;
    }

    /**
     * Method find
     *
     * @param
     *
     */
    public function find($id)
    {
        return $this->model->find($id);
    }

    /**
     * Method findBy
     *
     * Find a model by a specific field and value
     *
     * @param string $field
     * @param mixed $value
     * @return Model|null
     */
    public function findBy(string $field, mixed $value): ?Model
    {
        return $this->model->where($field, $value)->first();
    }
}