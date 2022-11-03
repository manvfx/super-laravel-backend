<?php

namespace App\Http\Controllers\v2;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\LoginResource;
use App\Models\User;

class LoginController extends Controller
{
    public function index()
    {
    }

    public function login(Request $request)
    {
        $data = $this->validate($request, [
            'email' => 'required|email|exists:users,email|min:3',
            'password' => 'required|string|min:3',
        ]);

        if (!auth()->attempt($data)) {
            return response([
                'data' => [
                    'messages' => 'invalid user data',
                    'status' => 'error'
                ]
            ], 403);
        }

        return new LoginResource(auth()->user());
    }
}
