<?php

use App\Http\Controllers\TodoController;
use Illuminate\Http\Request;
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

/**
 *
 * todos
 *
 */
Route::get('/', [TodoController::class, 'index'])->name('todos');

// Route::get('/', 'TodoController@index')->name('todos');


/**
 *
 * todo create
 *
 */
Route::post('/todo-create', [TodoController::class, 'create'])->name('todos.create');

/**
 *
 * todo delete
 *
 */
Route::get('/todos/{id}/delete', [TodoController::class, 'delete'])->name('todo.delete');

/**
 *
 *
 * todo edit
 *
 *
 */
Route::get('/todo/{id}/edit', [TodoController::class, 'edit'])->name('todo.edit');


/**
 *
 * todo update
 *
 */
Route::post('/todo/{id}/update', [TodoController::class, 'update'])->name('todo.update');
