<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\ProfileController;
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
Route::get('/profile', [ProfileController::class, 'index'])->name('profile.index');
Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');

Route::put('/profile/update', [ProfileController::class, 'update'])->name('profile.update');
Route::get('/tasks/{id}/edit', [TaskController::class, 'edit'])->name('tasks.edit');
Route::get('/tasks/create', [TaskController::class, 'create'])->name('tasks.create');

Route::put('/tasks/{id}', [TaskController::class, 'update'])->name('tasks.update');

Route::get('/tasks/completed', [TaskController::class, 'getCompleted'])->name('tasks.index.completed');

Route::get('/tasks/{id}', [TaskController::class, 'show'])->name('tasks.show');


});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/tasks', [TaskController::class, 'index'])->name('tasks.index');

Route::post('/tasks/completed', [TaskController::class, 'completed'])->name('tasks.completed');

Route::post('/tasks', [TaskController::class, 'store'])->name('tasks.store');

Route::delete('/tasks/{id}', [TaskController::class, 'destroy'])->name('tasks.destroy');

Route::get('/tasks/{id}/comment', [CommentController::class, 'create'])->name('comments.create');

Route::post('/tasks/{id}/comment', [CommentController::class, 'store'])->name('comments.store');

Route::patch('/tasks/{id}/completed', [TaskController::class, 'completed'])->name('tasks.completed');



