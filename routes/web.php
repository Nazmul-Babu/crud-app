<?php

use App\Http\Controllers\phonebookcontroller;
use App\Http\Controllers\userController;
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
Route::redirect('/','/list');
Route::get('/home', function () {
    return view('welcome');
});
Route::get('register',[userController::class,'show_register'])->name('show_register');
Route::POST('register',[userController::class,'register'])->name('register.save');
Route::get('email_verification/{email}/{code}',[userController::class,'verifyUser'])->name('verifyUser');

Route::get('/list',[phonebookcontroller::class, 'index'])->name('list');
Route::post('/list/create',[phonebookcontroller::class, 'create'])->name('createContact');
Route::get('/list/{id}/edit',[phonebookcontroller::class, 'show_edit'])->name('edit_show');
Route::post('/list/{id}/edit',[phonebookcontroller::class, 'edit'])->name('update_show');
Route::get('/list/{id}/delete',[phonebookcontroller::class, 'delete'])->name('delete');
// email:ljgoofufuyjakqql


