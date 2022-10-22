<?php

use App\Http\Controllers\v1\UserController;
// use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group(['prefix' => 'v1'], function ($router) {
    $router->get('users', [UserController::class, 'index']);
    $router->get('user', [UserController::class, 'show']);
});

// Route::group([], function ($router) {
//     $router->get('users', [UserController::class, 'index']);
//     $router->get('user', [UserController::class, 'show']);
// });

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });
