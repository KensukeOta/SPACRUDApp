<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/', function() {
    return "helloworld";
});

Route::group(["middleware" => "api"], function () {
    Route::post('/login', [LoginController::class, 'login']);
    Route::get('/current_admin_user', function () {
        return Auth::user();
    });
    Route::group(['middleware' => ['auth:api']], function () {
        
    });
});
