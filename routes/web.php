<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\QuartaController;
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
    return redirect()->route('home');
});


Route::get('/quarta', [QuartaController::class, 'index'])->name('home');
Route::get('/quarta/create', [QuartaController::class, 'create']);
Route::get('/quarta/download', [QuartaController::class, 'store']);
Route::get('/quarta/destroy', [QuartaController::class, 'destroy']);
