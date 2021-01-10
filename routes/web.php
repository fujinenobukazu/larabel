<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController; //これがないとコントローラーを探してくれない
use App\Http\Controllers\FolderController; //これがないとコントローラーを探してくれない


Route::get('/folders/{id}/tasks', [TaskController::class, 'index'])->name('tasks.index');

Route::get('/folders/create', [FolderController::class, 'showCreateForm'])->name('folders.create');

Route::post('/folders/create', [FolderController::class, 'create']);

// Route::get('/folders/{id}/tasks', 'TaskController@index')->name('tasks.index');
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
