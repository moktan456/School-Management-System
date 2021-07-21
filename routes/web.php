<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Backend\UserController;
use App\Http\Controllers\Backend\ProfileController;
use App\Http\Controllers\Backend\Setup\StudentClassController;
use App\Http\Controllers\Backend\Setup\StudentYearController;
use App\Http\Controllers\Backend\Setup\StudentGroupController;
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
    //for academic year
    Route::get('student/year/view',[StudentYearController::class,'viewyear'])->name('student.year.view');
    Route::get('student/year/add',[StudentYearController::class,'addyear'])->name('student.year.add');
    Route::post('student/year/store',[StudentYearController::class,'storeyear'])->name('student.year.store');
    Route::get('student/year/edit/{id}',[StudentYearController::class,'edityear'])->name('student.year.edit');
    Route::post('student/year/update/{id}',[StudentYearController::class,'updateyear'])->name('student.year.update');
    Route::get('student/year/delete/{id}',[StudentYearController::class,'deleteyear'])->name('student.year.delete');

    //Student group
    Route::get('student/group/view',[StudentGroupController::class,'viewgroup'])->name('student.group.view');
    Route::get('student/group/add',[StudentGroupController::class,'addgroup'])->name('student.group.add');
    Route::post('student/group/store',[StudentGroupController::class,'storegroup'])->name('student.group.store');
    Route::get('student/group/edit/{id}',[StudentGroupController::class,'editgroup'])->name('student.group.edit');
    Route::post('student/group/update/{id}',[StudentGroupController::class,'updategroup'])->name('student.group.update');
    Route::get('student/group/delete/{id}',[StudentGroupController::class,'deletegroup'])->name('student.group.delete');


});
//Route for 