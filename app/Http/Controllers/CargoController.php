<?php

namespace App\Http\Controllers;

use App\Http\Requests\CargoRequest;
use App\Http\Services\CargoService;
use App\Models\Cargo;
use App\Traits\RestResponseTrait;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;

class CargoController extends Controller
{
    use RestResponseTrait;

    public function __construct(
        private CargoService $cargoService
    ) {}

    public function index(Request $request)
    {
        return $this->success($this->cargoService->getAll($request));
    }

    public function show($id)
    {
        return $this->success($this->cargoService->getById($id));
    }

    public function create(CargoRequest $request)
    {
        DB::beginTransaction();

        $result = $this->cargoService->create($request->all());

        DB::commit();

        return $this->success($result, Response::HTTP_CREATED);
    }

    public function update(CargoRequest $request, Cargo $cargo)
    {
        DB::beginTransaction();

        $result = $this->cargoService->update($cargo, $request->all());

        DB::commit();

        return $this->success($result);
    }

    public function delete(Cargo $cargo)
    {
        $this->cargoService->delete($cargo->id);
        return $this->success([], Response::HTTP_NO_CONTENT);
    }
}
