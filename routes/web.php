<?php

use App\Http\Controllers\FakturaController;
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


Route::get('faktura', [FakturaController::class, 'faktura']);

Route::post('/faktura', [FakturaController::class, 'gemFaktura']);