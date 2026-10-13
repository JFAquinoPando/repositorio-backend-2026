<?php

use App\Http\Controllers\HechiceroController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get("/jujutsu", [HechiceroController::class, "json"]);
