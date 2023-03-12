<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TodoController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', [TodoController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';


Route::controller(TodoController::class)->prefix('todo_items')->group(function(){
//    Route::get('/dashboard', 'index')->name('dashboard');
    Route::get('create', 'create')->name('todo_items.create');
    Route::post('create', 'store')->name('todo_items.store');
    Route::post('edit/{todo_item}', 'update')->name('todo_items.update');
    Route::get('edit/{todo_item}', 'edit')->name('todo_items.edit');
    Route::delete('done/{todo_item}', 'done')->name('todo_items.done');
    Route::put('restore/{todo_item}', 'restore')->name('todo_items.restore');
    Route::get('archive', 'archive')->name('todo_items.archive');
});
