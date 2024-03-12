<?php

use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function() {
    $nome = "viviane";
    $idade = 21;
    $descricao = 'Esta é uma descrição deste evento que ira acontecer no dia 02/01';

    return view('welcome', [
        'nome' => $nome, 
        'idade' => $idade,
        'descricao' => $descricao
    ]);

});

Route::get('/produto', function() {

    return view('produtos');

});

Route::get('/produto/{id}', function($id) {

    return view('produto', ['id' => $id]);

});





Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

require __DIR__.'/auth.php';
