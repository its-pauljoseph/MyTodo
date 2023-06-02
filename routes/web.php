<?php

use App\Http\Controllers\TodosController;
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

Route::get('/', [TodosController::class, 'index']);

Route::get('create', [TodosController::class, 'create']);

Route::get('details/{todo}', [TodosController::class, 'details']);

Route::get('edit/{todo}', [TodosController::class, 'edit']);

Route::post('update/{todo}', [TodosController::class, 'update']);

Route::get('delete/{todo}', [TodosController::class, 'delete']);

Route::post('store-data', [TodosController::class, 'store']);
