<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Student_Controller;
use App\Http\Controllers\TeachersController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get("/student",[ Student_Controller::class, 'index']);
Route::get("/student/{id}",[ Student_Controller::class, 'show']);
Route::post("/student",[ Student_Controller::class, 'store']);
Route::put("/student/{id}",[ Student_Controller::class, 'update']);
Route::delete("/student/{id}",[ Student_Controller::class, 'destroy']);

Route::get('/teachers', [TeachersController::class, 'index']);
Route::get('/teachers/{id}', [TeachersController::class, 'show']);
Route::post('/teachers', [TeachersController::class, 'store']);
Route::put('/teachers/{id}', [TeachersController::class, 'update']);
Route::delete('/teachers/{id}', [TeachersController::class, 'destroy']);