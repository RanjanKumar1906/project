<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', function () {
    return view('home');
});

Route::get('/about', function () {
    return view('about');
});

Route::get('/contact', function () {
    return view('contact');
});

Route::get('/user/{name}/{age}/{reg}', function ($name, $age, $reg) {
    return "Hello, " . $name . ", You are " . $age . " years old." . " Your registration number is " . $reg;
});

Route::get('/hello', function () {
    return view('hello')->with ('name', 'Ranjan');
});

Route::get('/student', function () {
    return view('student',[
        'name' => 'Ranjan',
        'age' => 21,
        'course' => 'Computer Science'
    ]);
});