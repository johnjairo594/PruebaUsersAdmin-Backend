<?php

namespace App\Http\Services;

use App\Exceptions\Custom\ConflictException;
use App\Http\Repositories\DepartamentoRepository;
use App\Models\Departamento;

class DepartamentoService 
{
    public function __construct(
        private DepartamentoRepository $departamentoRepository
    ) {}

    public function getAll($request) 
    {
        return $this->departamentoRepository->all($request);
    }

    public function getById($id) 
    {
        return $this->departamentoRepository->show($id);
    }

    public function create(array $data) 
    {
        $departamentoByCodigo = $this->departamentoRepository->findBy('codigo', $data['codigo']);

        if ($departamentoByCodigo) {
            throw new ConflictException(__('messages.departamento.departamento_codigo_exists'));
        }

        return $this->departamentoRepository->create($data);
    }

    public function update(Departamento $departamento, array $data) 
    {
        if ($departamento->codigo !== $data['codigo']) {
            $departamentoByCodigo = $this->departamentoRepository->findBy('codigo', $data['codigo']);

            if ($departamentoByCodigo) {
                throw new ConflictException(__('messages.departamento.departamento_codigo_exists'));
            }
        }

        return $this->departamentoRepository->update($departamento, $data);
    }

    public function delete($id) 
    {
        return $this->departamentoRepository->delete($id);
    }
}