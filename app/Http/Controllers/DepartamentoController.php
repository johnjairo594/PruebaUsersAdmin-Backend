<?php

namespace App\Http\Controllers;

use App\Http\Requests\DepartamentoRequest;
use App\Http\Services\DepartamentoService;
use App\Models\Departamento;
use App\Traits\RestResponseTrait;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;

class DepartamentoController extends Controller
{
    use RestResponseTrait;

    public function __construct(
        private DepartamentoService $departamentoService
    ) {}

    public function index(Request $request)
    {
        return $this->success($this->departamentoService->getAll($request));
    }

    public function show($id)
    {
        return $this->success($this->departamentoService->getById($id));
    }

    public function create(DepartamentoRequest $request)
    {
        DB::beginTransaction();

        $result = $this->departamentoService->create($request->all());

        DB::commit();

        return $this->success($result, Response::HTTP_CREATED);
    }

    public function update(DepartamentoRequest $request, Departamento $departamento)
    {
        DB::beginTransaction();

        $result = $this->departamentoService->update($departamento, $request->all());

        DB::commit();

        return $this->success($result);
    }

    public function delete(Departamento $departamento)
    {
        $this->departamentoService->delete($departamento->id);
        return $this->success([], Response::HTTP_NO_CONTENT);
    }
}
