<?php
use App\Http\Controllers\LicsController;
use Illuminate\Support\Facades\Route;

Route::get('/', [LicsController::class, 'index']);
Route::post('/create', [LicsController::class, 'create']);
Route::put('/edit/{id}', [LicsController::class, 'edit']);
Route::delete('/delete/{id}', [LicsController::class, 'delete']);
