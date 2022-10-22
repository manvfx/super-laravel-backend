<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Http\JsonResponse;

class UserException extends Exception
{
    //
    public function render($request)
    {
        return $request->expectsJson() ? new JsonResponse([
            'message' => 'user is lock',
            'status' => 403,
        ], 403) : view("error");
    }
}
