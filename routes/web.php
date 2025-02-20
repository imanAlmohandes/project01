<?php

use Illuminate\Support\Facades\DB;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\UsersController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/view1', function () {
//     $name = 'iman awni';
//     $lang = [
//     ];
//     return view('view1', compact('name', 'lang'));
// });

// Route::post('/view1', function () {
//     $name = $_POST['name'];
//     $lang = [
//         '1' => 'php',
//         '2' => 'java',
//         '3' => 'c++',
//     ];
//     return view('view1', compact('name', 'lang'));
// });

// Route::get('/about', function () {
//     $name = 'iman awni';
//     return view('about', compact('name'));
// });

// Route::get('/tasks', [TaskController::class, 'index']);

// Route::post('/create', [TaskController::class, 'create']);

// Route::post('/delete/{id}', [TaskController::class, 'destroy']);

// Route::post('/edit/{id}', [TaskController::class, 'edit']);

// Route::post('/update', [TaskController::class, 'update']);
// php artisan make:controller TaskController


// Routes Users
Route::get('/users', [UsersController::class, 'index']);
Route::post('/create', [UsersController::class, 'create']);
Route::post('/delete/{id}', [UsersController::class, 'destroy']);
Route::post('/edit/{id}', [UsersController::class, 'edit']);
Route::post('/update', [UsersController::class, 'update']);

// Route::get('/master', function () {
//     return view('layout.master');
// });
