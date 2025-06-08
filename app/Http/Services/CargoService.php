<?php

namespace App\Http\Services;

use App\Exceptions\Custom\ConflictException;
use App\Http\Repositories\CargoRepository;
use App\Models\Cargo;

class CargoService 
{
    public function __construct(
        private CargoRepository $cargoRepository
    ) {}

    public function getAll($request) 
    {
        return $this->cargoRepository->all($request);
    }

    public function getById($id) 
    {
        return $this->cargoRepository->show($id);
    }

    public function create(array $data) 
    {
        $cargoByCodigo = $this->cargoRepository->findBy('codigo', $data['codigo']);

        if ($cargoByCodigo) {
            throw new ConflictException(__('messages.cargo.cargo_codigo_exists'));
        }

        return $this->cargoRepository->create($data);
    }

    public function update(Cargo $cargo, array $data) 
    {
        if ($cargo->codigo !== $data['codigo']) {
            $cargoByCodigo = $this->cargoRepository->findBy('codigo', $data['codigo']);

            if ($cargoByCodigo) {
                throw new ConflictException(__('messages.cargo.cargo_codigo_exists'));
            }
        }

        return $this->cargoRepository->update($cargo, $data);
    }

    public function delete($id) 
    {
        return $this->cargoRepository->delete($id);
    }
}