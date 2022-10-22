<?php

namespace App\Http\Controllers\v1;

use App\Exceptions\UserException;
use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use App\Models\User;

class UserController extends Controller
{
    //
    public function index()
    {
        $users = User::all();
        throw new UserException();
        return new UserResource($users);
    }

    public function show()
    {
        $user = User::query()->where('id', 4)->first();
        return response()->json($user);
    }
}
