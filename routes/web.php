<?php

use App\Http\Controllers\TarefaController;
use App\Mail\MensagemMail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('tarefa', TarefaController::class);

Route::get('mensagem-teste', function(){
    // return new MensagemMail();

    Mail::to('juniorlima.dev@gmail.com')->send(new MensagemMail());
    return 'E-mail enviado com sucesso!';
});
