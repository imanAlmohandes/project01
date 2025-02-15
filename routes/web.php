<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/view1', function () {
    $name = 'iman awni';
    $lang = [
    ];
    return view('view1', compact('name', 'lang'));
});

Route::post('/view1', function () {
    $name = $_POST['name'];
    $lang = [
        '1' => 'php',
        '2' => 'java',
        '3' => 'c++',
    ];
    return view('view1', compact('name', 'lang'));
});

Route::get('/about', function () {
    $name = 'iman awni';
    return view('about', compact('name'));
});

Route::get('/tasks', function () {
    return view('tasks');
});
Route::post('/create', function () {
    $task_name = $_POST['name'];
    DB::table('tasks')->insert(['name' => $task_name]);
    return view('tasks');
});
