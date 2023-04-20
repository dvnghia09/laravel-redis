<?php

use Illuminate\Support\Facades\Route;
use App\Events\NewMessage;
use App\Http\Controllers\Messages;
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

    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    Route::get('/', function () {
        return view('welcome')->with('authUser', Auth::user());
    });

    Route::post('/test-event', [Messages::class, 'storeMessage'])->name('message-store');


    // Route::get('/messages', 'MessageController@index')->middleware('auth');

    // Route::post('/messages', 'MessageController@store')->middleware('auth');
});
