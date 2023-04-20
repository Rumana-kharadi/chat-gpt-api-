<?php

use Illuminate\Support\Facades\Route;
// use App\Http\Controllers\GptApiController;
// use App\Http\Controllers\TextApiController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('/index', function () {
    return view('index');
});
Route::get('/chat', function () {
    return view('chatgpt');
});

Route::post('/ai_assist', 'App\Http\Controllers\TextApiController@ai_assist');
Route::post('/chatGptApi', 'App\Http\Controllers\GptApiController@chatGptApi');
