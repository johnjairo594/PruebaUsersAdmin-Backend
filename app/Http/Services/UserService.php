<?php

namespace App\Http\Services;

use App\Exceptions\Custom\ConflictException;
use App\Http\Repositories\UserRepository;
use App\Models\User;

class UserService 
{
    public function __construct(
        private UserRepository $userRepository
    ) {}

    public function getAll($request) 
    {
        return $this->userRepository->all($request);
    }

    public function getById($id) 
    {
        return $this->userRepository->show($id);
    }

    public function create(array $data) 
    {
        $userByUsername = $this->userRepository->findBy('usuario', $data['usuario']);

        if ($userByUsername) {
            throw new ConflictException(__('messages.user.username_exists'));
        }

        return $this->userRepository->create($data);
    }

    public function update(User $user, array $data) 
    {
        if ($user->usuario !== $data['usuario']) {
            $userByUsername = $this->userRepository->findBy('usuario', $data['usuario']);

            if ($userByUsername) {
                throw new ConflictException(__('messages.user.username_exists'));
            }
        }

        return $this->userRepository->update($user, $data);
    }

    public function delete($id) 
    {
        return $this->userRepository->delete($id);
    }
}