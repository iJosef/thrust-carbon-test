<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PlantsController;
use App\Http\Controllers\PlantEnvironmentsController;

Route::post('/plants', [PlantsController::class, 'create'])->name('create');

Route::post('/plants/{id}/environments', [PlantEnvironmentsController::class, 'create'])->name('create.environment');

