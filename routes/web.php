<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Backend\UserController;
use App\Http\Controllers\Backend\ProfileController;
use App\Http\Controllers\Backend\Setup\StudentClassController;
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
    return view('auth.login');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('admin.index');
})->name('dashboard');
//Route for admin
Route::get('/admin/logout',[AdminController::class,'logout'])->name('admin.logout');

//Route for user management
Route::prefix('users')->group(function(){
    Route::get('/view',[UserController::class,'userview'])->name('user.view');
    Route::get('/add',[UserController::class,'adduser'])->name('user.add');
    Route::post('/store',[UserController::class,'storeuser'])->name('user.store');
    Route::get('/edit/{id}',[UserController::class,'edituser'])->name('user.edit');
    Route::post('/update/{id}',[UserController::class,'updateuser'])->name('user.update');
    Route::get('/delete/{id}',[UserController::class,'deleteuser'])->name('user.delete');
});
//Route for profile management
Route::prefix('profile')->group(function(){
    Route::get('/view',[ProfileController::class,'profileview'])->name('profile.view');
    Route::get('/edit',[ProfileController::class,'editprofile'])->name('profile.edit');
    Route::post('/update',[ProfileController::class,'updateprofile'])->name('profile.update');
    Route::get('/password/view',[ProfileController::class,'passwordview'])->name('password.view');
    Route::post('/password/upate',[ProfileController::class,'passwordupdate'])->name('password.update');
    
});
//Route for setup management
Route::prefix('setups')->group(function(){
    Route::get('student/class/view',[StudentClassController::class,'viewclass'])->name('student.class.view');
    Route::get('student/class/add',[StudentClassController::class,'addclass'])->name('student.class.add');
    Route::post('student/class/store',[StudentClassController::class,'storeclass'])->name('student.class.store');
    Route::get('student/class/edit/{id}',[StudentClassController::class,'editclass'])->name('student.class.edit');
    Route::post('student/class/update/{id}',[StudentClassController::class,'updateclass'])->name('student.class.update');
    Route::get('student/class/delete/{id}',[StudentClassController::class,'deleteclass'])->name('student.class.delete');
});
//Route for fee management