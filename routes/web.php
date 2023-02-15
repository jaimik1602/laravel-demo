<?php

use App\Http\Controllers\DemoController;
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
    return view('users.index');
}); 

Route::get('posts', function () {
    return view('posts.index');
}); 

Route::get('demo', function (){
    return 'this is demo';
});

Route::get('demo-controller', [DemoController::class, 'demo']);

Route::get('data/{data?}', function ($data = null){
    return $data;
});

Route::get('demo-controller/{data}', [DemoController::class, 'getValue']);

Route::get('blade-data/{data}/{data1?}', [DemoController::class, 'redirectToBlade']);