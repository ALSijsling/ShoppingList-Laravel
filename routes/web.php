<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controlle\GroceriesController;

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

Route::get('/groceries', [GroceriesController::class, 'index']);
Route::get('/groceries/create', [GroceriesController::class, 'create']);
Route::post('/groceries', [GroceriesController::class, 'store']);
Route::get('/groceries/{grocery}/edit', [GroceriesController::class, 'edit']);
Route::match(['put', 'patch'], '/groceries/{grocery}', [GroceriesController::class, 'update']);
Route::delete('/groceries/{grocery}', [GroceriesController::class, 'destroy']);

Route::redirect('/', '/groceries');
