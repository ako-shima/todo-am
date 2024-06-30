<?php

use App\Http\Controllers\CommentController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;


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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', function () {
    return view('top');
});

Route::middleware(['auth'])->group(function () {
   Route::get('/tasks/{id}/edit', [TaskController::class, 'edit'])->name('tasks.edit');
   Route::get('/tasks/create', [TaskController::class, 'create'])->name('tasks.create');

Route::put('/tasks/{id}', [TaskController::class, 'update'])->name('tasks.update');

Route::get('/tasks/{id}', [TaskController::class, 'show'])->name('tasks.show');


});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/tasks', [TaskController::class, 'index'])->name('tasks.index');

Route::post('/tasks', [TaskController::class, 'store'])->name('tasks.store');

Route::delete('/tasks/{id}', [TaskController::class, 'destroy'])->name('tasks.destroy');

Route::get('/tasks/{id}/comment', [CommentController::class, 'create'])->name('comments.create');

Route::post('/tasks/{id}/comment', [CommentController::class, 'store'])->name('comments.store');
