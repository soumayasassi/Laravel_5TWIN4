<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/welcome/{id}/{nom}', function ($id) {
   echo "Hello"  . $id ;
});

Route::get('/page1', function () {
    return view('page1', ['titre'=> 'my first page']);
});
Route::get('/page2/{nom?}/id', function ($nom=null) {
    if($nom === null)
    {
        $msg = "Good Bye" ;
    }
    else {
        $msg = "Good Evening" ;
    }
    return view('page2', ['message'=> $msg]);
})->where('nom' , '[a-zA-Z]+')
    ->where('id' , '[0-9]+');

Route::get("/contact", [\App\Http\Controllers\HomeController::class , 'contact'])
->name('contact.form');
Route::get("/index", [\App\Http\Controllers\HomeController::class , 'index']) ;
Route::post("/contact", [\App\Http\Controllers\HomeController::class , 'submitForm']) ;
Route::get('/restricted', function()
{
    return "You are allowed to access this page" ;

}) ->middleware('verif.age');
Route::resource('product',\App\Http\Controllers\ProductController::class);
