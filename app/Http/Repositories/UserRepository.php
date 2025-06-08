<?php

namespace App\Http\Repositories;

use App\Http\Repositories\Base\BaseRepository;
use App\Models\User;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

class UserRepository extends BaseRepository
{
    protected $relations = [
        'departamento',
        'cargo',
    ];

    public function __construct(User $model)
    {
        parent::__construct($model);
    }

    public function all($request): Collection|LengthAwarePaginator
    {
        $orderBy = $request->orderBy ?? null;
        $orderType = $request->orderType ?? 'asc';

        $query = User::with($this->relations);

        if (isset($request->idDepartamento)) {
            $query->where('idDepartamento', $request->idDepartamento);
        }

        if (isset($request->idCargo)) {
            $query->where('idCargo', $request->idCargo);
        }

        if (isset($request->search)) {
            $search = $request->search;

            $words = preg_split('/\s+/', trim($search));

            $query->where(function ($q) use ($words) {
                foreach ($words as $word) {
                    $q->orWhere(function ($subQuery) use ($word) {
                        $subQuery->where('primerNombre', 'like', "%$word%")
                            ->orWhere('segundoNombre', 'like', "%$word%")
                            ->orWhere('primerApellido', 'like', "%$word%")
                            ->orWhere('segundoApellido', 'like', "%$word%")
                            ->orWhere('usuario', 'like', "%$word%");
                    });
                }
            });
        }

        if ($orderBy) {
            $query->orderBy($orderBy, $orderType);
        }

        return (isset($request->data) && $request->data == 'all') ? 
            $query->get() : 
            $query->paginate($request->size ?? 10);
    }
}