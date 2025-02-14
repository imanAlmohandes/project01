<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/view1' , function (){
    $name = 'iman awni';
    $lang = [
    ];
    return view('view1' , compact('name' , 'lang'));
});

Route::post('/view1' , function (){
    $name = $_POST['name'] ;
    $lang = [
        '1' => 'php',
        '2' => 'java',
        '3' => 'c++'
    ];
    return view ('view1' , compact('name' , 'lang'));
});
