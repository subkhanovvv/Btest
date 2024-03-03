<?php

use App\Http\Controllers\Controller;
use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

  Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();});

//Маршрут для функции создания
  Route::post('data/store', [Controller::class, 'store']);
//Маршрут для функции чтения всех данных 
  Route::get('data', [Controller::class, 'index']);
//Маршрут для функции чтения данных по id
  Route::get('data/{id}/show', [Controller::class, 'show']);
//Маршрут для  функции обновления
  Route::post('data/{id}/update', [Controller::class, 'update']);
//Маршрут для функции удаления
  Route::delete('data/{id}/delete', [Controller::class, 'destroy']);

