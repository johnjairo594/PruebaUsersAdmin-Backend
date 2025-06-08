<?php 

namespace App\Traits;

use Illuminate\Http\Response;

trait RestResponseTrait
{
	public function success($data = [], $code = Response::HTTP_OK): mixed
	{
		return response()->json($data, $code);
	}
}