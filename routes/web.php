<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController; //これがないとコントローラーを探してくれない
use App\Http\Controllers\FolderController; //これがないとコントローラーを探してくれない
use App\Http\Controllers\HomeController; //これがないとコントローラーを探してくれない


// 管理ページ
Route::get('/folders/{id}/tasks', [TaskController::class, 'index'])->name('tasks.index');
// フォルダ作成機能
Route::get('/folders/create', [FolderController::class, 'showCreateForm'])->name('folders.create');
Route::post('/folders/create', [FolderController::class, 'create']);
// タスク作成機能
Route::get('/folders/{id}/tasks/create', [TaskController::class, 'showCreateForm'])->name('tasks.create');
Route::post('/folders/{id}/tasks/create', [TaskController::class, 'create']);
// タスク編集機能
Route::get('/folders/{id}/tasks/{task_id}/edit', [TaskController::class, 'showEditForm'])->name('tasks.edit');
Route::post('/folders/{id}/tasks/{task_id}/edit', [TaskController::class, 'edit']);
// トップページ
Route::get('/', [HomeController::class, 'index'])->name('home');
