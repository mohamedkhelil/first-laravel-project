<?php
use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
// Pages principales
Route::get('/', [PageController::class, 'home']);
Route::get('/home', [PageController::class, 'home']);
Route::get('/about', [PageController::class, 'about']);
Route::get('/services', [PageController::class, 'services']);
Route::get('/contact', [PageController::class, 'contact']);
Route::resource('tasks', TaskController::class);
Route::get('/blog', [PageController::class, 'blog']);
Route::get('/blog/{id}', [PageController::class, 'article'])->where('id', '[0-9]+');

// Routes dynamiques exemples
Route::get('/calculer/{a}/{b}', [PageController::class, 'calculer'])->where(['a'=>'[0-9]+','b'=>'[0-9]+']);
Route::get('/age/{age}', [PageController::class, 'age'])->where('age', '[0-9]+');
Route::get('/equipe/{membre?}', [PageController::class, 'equipe']);
