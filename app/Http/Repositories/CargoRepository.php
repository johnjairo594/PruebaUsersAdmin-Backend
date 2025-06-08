<?php

namespace App\Http\Repositories;

use App\Models\Cargo;
use App\Http\Repositories\Base\BaseRepository;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

class CargoRepository extends BaseRepository
{
    protected $relations = [
        'user',
    ];

    public function __construct(Cargo $model)
    {
        parent::__construct($model);
    }

    public function all($request): Collection|LengthAwarePaginator
    {
        $orderBy = $request->orderBy ?? null;
        $orderType = $request->orderType ?? 'asc';

        $query = Cargo::with($this->relations);

        if (isset($request->idUserCreacion)) {
            $query->where('idUserCreacion', $request->idUserCreacion);
        }

        if (isset($request->isActive)) {
            $query->where('isActive', $request->isActive);
        }

        if (isset($request->search)) {
            $query->where('name', 'like', '%' . $request->search . '%');
        }

        if ($orderBy) {
            $query->orderBy($orderBy, $orderType);
        }

        return (isset($request->data) && $request->data == 'all') ? 
            $query->get() : 
            $query->paginate($request->size ?? 10);
    }
}