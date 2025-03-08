<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\UsersController;

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

Route::get('/tasks', [TaskController::class, 'index'])->name('tasks.index');

Route::post('/create', [TaskController::class, 'create'])->name('tasks.create');

Route::post('/delete/{id}', [TaskController::class, 'destroy'])->name('tasks.destroy');

Route::post('/edit/{id}', [TaskController::class, 'edit'])->name('tasks.edit');
// Route::post('/update', [TaskController::class, 'update']);
Route::put('/tasks/{id}', [TaskController::class, 'update'])->name('tasks.update');

// php artisan make:controller TaskController

// Routes Users
// Route::get('/users', [UsersController::class, 'index'])->name('users.index');
// Route::post('/create', [UsersController::class, 'create'])->name('users.create');
// Route::post('/delete/{id}', [UsersController::class, 'destroy'])->name('users.destroy');
// Route::post('/edit/{id}', [UsersController::class, 'edit'])->name('users.edit');
// // Route::post('/update', [UsersController::class, 'update'])->name('users.update');
// Route::put('/users/{id}', [UsersController::class, 'update'])->name('users.update');

// Route::get('/master', function () {
//     return view('layout.master');
// });
