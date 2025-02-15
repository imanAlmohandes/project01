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
    $tasks= DB::table('tasks')->get();
    return view('tasks' ,compact('tasks'));
});
Route::post('/create', function () {
    $task_name = $_POST['name'];
    DB::table('tasks')->insert(['name' => $task_name]);
    return redirect()->back();
});
Route::post('/delete/{id}', function ($id) {
    DB::table('tasks')->where('id', $id)->delete();
    return redirect()->back();
});
Route::post('/edit/{id}', function ($id) {
    $task=DB::table('tasks')->where('id', $id)->first();
    $tasks=DB::table('tasks')->get();
    return view('tasks',compact('task','tasks'));
    // return redirect()->back();
});
Route::post('/update', function () {
    $id=$_POST['id'];
    DB::table('tasks')->where('id', $id)->update(['name'=>$_POST['name']]);

    return redirect('tasks');
});
