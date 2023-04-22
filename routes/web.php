<?php

use Illuminate\Support\Facades\Route;
use App\Events\NewMessage;
use App\Http\Controllers\Messages;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Auth;

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


Auth::routes();


Route::middleware(['auth'])->group(function () {

    Route::get('/', [HomeController::class, 'index']);

    Route::post('/messages-store', [Messages::class, 'storeMessage'])->name('message-store');

    Route::get('/messages', [Messages::class, 'index'])->name('message');
    // Route::get('/messages', 'MessageController@index')->middleware('auth');

    // Route::post('/messages', 'MessageController@store')->middleware('auth');
    Route::any('/{all?}', function () {
        return view('index');
    })->where(['all'=>'.*']);
});

