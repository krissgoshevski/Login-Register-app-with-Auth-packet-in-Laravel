<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\EditorController;



Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
Route::get('/register', [RegisterController::class, 'add'])->name('register');


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('my.check.role');

Route::get('/admin', [App\Http\Controllers\HomeController::class, 'admin'])->name('admin')->middleware('admin');
Route::get('/editor', [App\Http\Controllers\HomeController::class, 'editor'])->name('editor')->middleware('editor');
Route::get('/regular', [App\Http\Controllers\HomeController::class, 'regular'])->name('regular')->middleware('regular');



Route::get('/deactivate/{id}', [HomeController::class, 'deactivate'])->name('deactivate')->middleware('actions');
Route::get('/activate/{id}', [HomeController::class, 'activate'])->name('activate')->middleware('actions');
Route::delete('/delete/{id}',[HomeController::class, 'destroy'])->name('delete')->middleware('actions');





// // AdminController 
// Route::controller(AdminController::class)->group(function () {
//     Route::get('/admin/deactivate/{id}', 'deactivate')->name('admin.deactivate');
//     Route::get('/admin/activate/{id}', 'activate')->name('admin.activate');
//     Route::delete('/admin/delete/{id}', 'destroy')->name('admin.delete');
//     });
    




// // EditorController 
// Route::controller(EditorController::class)->group(function () {
// Route::get('/editor/deactivate/{id}', 'deactivate')->name('editor.deactivate');
// Route::get('/editor/activate/{id}', 'activate')->name('editor.activate');
// Route::delete('/editor/delete/{id}', 'destroy')->name('editor.delete');
// });





