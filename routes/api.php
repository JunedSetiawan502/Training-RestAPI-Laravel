<?php

use App\Http\Controllers\API\StudentController;
use Illuminate\Http\Request;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::group(['prefix' => '/api'], function () {
    // All routes defined here will be prefixed with 'v1'
    Route::get('students', [StudentController::class, 'get']);
    Route::get('student/{id}', [StudentController::class, 'show']);

    Route::post('student', [StudentController::class, 'store']);

    Route::put('student/{id}', [StudentController::class, 'update']);
    Route::delete('student/{id}', [StudentController::class, 'destroy']);
});
