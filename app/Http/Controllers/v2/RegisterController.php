<?php

namespace App\Http\Controllers\v2;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\RegisterResource;
use App\Models\User;

class RegisterController extends Controller
{
    public function index()
    {
    }

    public function register(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string|min:3',
            'email' => 'required|email|min:3',
            'password' => 'required|string|min:3',
        ]);

        $auth = User::query()->create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);

        $user = auth()->loginUsingId($auth->id);

        return new RegisterResource($user);
    }
}
