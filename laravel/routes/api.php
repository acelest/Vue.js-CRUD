<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EleveController;


Route::get('/eleves',[EleveController::class,'index']);

Route::post('/save',[EleveController::class,'store']);

Route::put('/update/{id}',[EleveController::class,'update']);

Route::delete('/delete/{id}',[EleveController::class,'destroy']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
