<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PollController;
use App\Models\Options;


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

Route::resource('/polls', PollController::class);
#Route::get('/polls', [PollController::class, 'index']);
#Route::post('/polls', [PollController::class, 'store']);

Route::post('/register', [UserController::class, 'register']);

Route::get('users', function () {
    return User::All();
});

Route::get('/', function () { 
    //Illuminate\Support\Facades\Mail::send(new App\Mail\SendMail());
    $options = Options::All();  
    return view('vote', ['options' => $options]); //return view('welcome');
});
