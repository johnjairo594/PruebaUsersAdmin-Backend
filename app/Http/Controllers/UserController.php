<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Http\Services\UserService;
use App\Models\User;
use App\Traits\RestResponseTrait;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    use RestResponseTrait;

    public function __construct(
        private UserService $userService
    ) {}

    public function index(Request $request)
    {
        return $this->success($this->userService->getAll($request));
    }

    public function show($id)
    {
        return $this->success($this->userService->getById($id));
    }

    public function create(UserRequest $request)
    {
        DB::beginTransaction();

        $result = $this->userService->create($request->all());

        DB::commit();

        return $this->success($result, Response::HTTP_CREATED);
    }

    public function update(UserRequest $request, User $user)
    {
        DB::beginTransaction();

        $result = $this->userService->update($user, $request->all());

        DB::commit();

        return $this->success($result);
    }

    public function delete(User $user)
    {
        $this->userService->delete($user->id);
        return $this->success([], Response::HTTP_NO_CONTENT);
    }
}
