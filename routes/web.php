<?php

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
Route::get('/', function () {
    $todos = DB::table('todos')->get();
    return view('welcome', compact('todos'));
})->name('todos');


/**
 *
 * todo create
 *
 */
Route::post('/todo-create', function (Request $request) {

    $request->validate([
        'name' => 'required|max:255',
        'dec' => 'required'
    ]);


    DB::table('todos')->insert([
        'name' => $request->name,
        'dec' => $request->dec
    ]);
    return redirect()->route('todos');
})->name('todos.create');

/**
 *
 * todo delete
 *
 */
Route::get('/todos/{id}/delete', function ($id) {
    DB::table('todos')->where('id', $id)->delete();

    return redirect()->route('todos');
})->name('todo.delete');

/**
 *
 *
 * todo edit
 *
 *
 */
Route::get('/todo/{id}/edit', function ($id) {
    $todo = DB::table('todos')->where('id', $id)->first();


    if (!$todo) {
        return view('error');
    }
    $todos = DB::table('todos')->get();
    return view('welcome', compact('todos', 'todo'));
})->name('todo.edit');


/**
 *
 * todo update
 *
 */
Route::post('/todo/{id}/update', function ($id, Request $request) {
    $request->validate([
        'name' => 'required|max:255',
        'dec' => 'required'
    ]);

    $todo = DB::table('todos')->where('id', $id)->update([
        'name' => $request->name,
        'dec' => $request->dec
    ]);
    return redirect()->route('todos');
})->name('todo.update');
