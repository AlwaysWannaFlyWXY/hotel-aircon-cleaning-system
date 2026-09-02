<?php

use App\Http\Controllers\RoomController;
use Illuminate\Support\Facades\Route;

Route::get('/', [RoomController::class, 'index'])->name('rooms.index');
Route::get('/rooms/{room}/clean', [RoomController::class, 'createCleaning'])->name('rooms.clean.create');
Route::post('/rooms/{room}/clean', [RoomController::class, 'storeCleaning'])->name('rooms.clean.store');
