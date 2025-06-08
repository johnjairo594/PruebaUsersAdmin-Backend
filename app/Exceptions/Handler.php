<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Throwable;
use App\Exceptions\Custom\ConflictException as CustomConflictException;
use Illuminate\Http\JsonResponse;

class Handler extends ExceptionHandler
{
    protected $levels = [];

    protected $dontReport = [];

    protected $dontFlash = [];

    public function register(): void
    {
        //
    }

    public function render($request, Throwable $exception): JsonResponse
    {
        if ($exception instanceof CustomConflictException) {
            return response()->json([
                'message' => $exception->getMessage(),
            ], $exception->getStatusCode());
        }

        return response()->json([
            'message' => 'Ocurrió un error inesperado. Por favor, intenta más tarde.',
        ], 500);
    }
}
