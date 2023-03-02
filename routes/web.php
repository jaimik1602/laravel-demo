<?php

use App\Http\Controllers\CrudController;
use App\Http\Controllers\DemoController;
use App\Http\Controllers\FetchDataController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\UserController;
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
    return view('dashboard.dashboard');
});

Route::get('get-data', [FetchDataController::class, 'fetchData']);
Route::get('store', [CrudController::class, 'store']);
Route::get('update/{id}', [CrudController::class, 'update']);
Route::get('delete/{id}', [CrudController::class, 'delete']);
Route::get('get/{id}', [CrudController::class, 'get']);

Route::get('users', [UserController::class, 'index'])->name('users.index');
Route::get('create-user', [UserController::class, 'create']);
Route::post('create-user', [UserController::class, 'store']);
Route::get('edit-user/{id}', [UserController::class, 'edit']);
Route::post('update-user/{id}', [UserController::class, 'update']);
Route::get('delete-user/{id}', [UserController::class, 'destroy']);

// send mail
Route::get('send-mail', [DemoController::class, 'sendMail']);
Route::view('email', 'email');

// Session 
Route::controller(SessionController::class)->group(function () {
    Route::get('set', 'set');
    Route::get('get', 'get');
    Route::get('forget', 'forget');
});

// Route::get('posts', function () {
//     return view('posts.index');
// }); 

// Route::get('demo', function (){
//     return 'this is demo';
// });

// Route::get('demo-controller', [DemoController::class, 'demo']);

// Route::get('data/{data?}', function ($data = null){
//     return $data;
// });

// Route::get('demo-controller/{data}', [DemoController::class, 'getValue']);

// Route::get('blade-data/{data}/{data1?}', [DemoController::class, 'redirectToBlade']);