<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RecipeController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/recipes/search', [RecipeController::class, 'index'])->name('recipes.index');
Route::post('/recipes/search', [RecipeController::class, 'search'])->name('recipes.search');