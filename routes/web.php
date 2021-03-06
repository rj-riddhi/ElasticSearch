<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ItemsController;

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

Route::get('/',[ItemsController::class,'home'] );
Route::get('/ItemSearch',[ItemsController::class,'index']);
Route::POST('/ItemSearchCreate',[ItemsController::class,'create']);

