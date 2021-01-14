<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\FolderController;
use App\Http\Controllers\HomeController;

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

Route::get('welcome', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

// ここから追記
//
Route::group(['middleware' => 'auth'], function() {

  // トップページ
  Route::get('/', [HomeController::class, 'index'])->name('home');
  // フォルダ作成機能
  Route::get('/folders/create', [FolderController::class, 'showCreateForm'])->name('folders.create');
  Route::post('/folders/create', [FolderController::class, 'create']);


  Route::group(['middleware' => 'can:view,folder'], function() {
    // 管理画面
    Route::get('/folders/{folder}/tasks', [TaskController::class, 'index'])->name('tasks.index');
    // タスク作成機能
    Route::get('/folders/{folder}/tasks/create', [TaskController::class, 'showCreateForm'])->name('tasks.create');
    Route::post('/folders/{folder}/tasks/create', [TaskController::class, 'create']);
    // フォルダ編集機能
    Route::get('/folders/{folder}/tasks/{task_id}/edit', [TaskController::class, 'showEditForm'])->name('tasks.edit');
    Route::post('/folders/{folder}/tasks/{task_id}/edit', [TaskController::class, 'edit']);
  });

});
