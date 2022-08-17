<?php

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

//Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//    return $request->user();
//});
Route::apiResource('/modules/{module}/lessons', \App\Http\Controllers\Api\LessonController::class);
Route::apiResource('/courses/{course}/modules', \App\Http\Controllers\Api\ModuleController::class);
Route::put('/courses/{course}', [\App\Http\Controllers\Api\CourseController::class, 'update']);
Route::delete('/courses/{identify}', [\App\Http\Controllers\Api\CourseController::class, 'destroy']);
Route::get('/courses/{identify}', [\App\Http\Controllers\Api\CourseController::class, 'show']);
Route::post('/courses', [\App\Http\Controllers\Api\CourseController::class, 'store']);
Route::get('/courses', [\App\Http\Controllers\Api\CourseController::class, 'index']);


