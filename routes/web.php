<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/home', function () {
//     return view('home');
// });

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


use App\Http\Controllers\HomeController;
Route::get('/home', [HomeController::class, 'index']);

use App\Http\Middleware\CheckUserRole;
Route::get('/admin', function () {
    return " Welcome to the admin dashboard!";
})->middleware(CheckUserRole::class);


use App\Http\Controllers\PostController;

Route::resource('/postcontroller/all', PostController::class);

Route::get('/postcontroller/index',[PostController::class,'index']);
Route::get('/postcontroller/create',[PostController::class,'create']);
Route::get('/postcontroller/store',[PostController::class,'store']);
Route::get('/postcontroller/{id}/show',[PostController::class,'show']);
Route::post('/postcontroller/{id}/edit',[PostController::class,'edit']);
Route::put('/postcontroller/{id}/update',[PostController::class,'update']);
Route::delete('/postcontroller/{id}/destroy',[PostController::class,'destroy']);


Route::get("/b",function(){
    return view("b");
});

//prefix route + group route
Route::prefix("admin")->group(function()
{
    Route::get("/dashboard",function(){
        return "dashboard";
    });
    Route::get("/profile",function(){
        return "profile";
    });
});

//domain route
 //1. Fixed Domain
Route::domain('admin.lvh.me')->group(function () {
    Route::get('/admin', function () {       
    return "Admin Panel";
    });
});
 //2. Dynamic Subdomain
Route::domain('{user}.lvh.me')->group(function () {    
Route::get('/user/{user}', function ($user) {       
return "Hello " . $user;
    });
});

//URL Generation-Current URL
Route::get('/test', function () {
        return url()->current();
        });

 //Full URL (with query)
Route::get('/testurl/{id}', function () {
        return url()->full();
        });

// 3. Using Request
Route::get('/testrequest', function () {
        return request()->url();
        });