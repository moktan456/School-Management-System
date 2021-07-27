<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Backend\UserController;
use App\Http\Controllers\Backend\ProfileController;
use App\Http\Controllers\Backend\Setup\StudentClassController;
use App\Http\Controllers\Backend\Setup\StudentYearController;
use App\Http\Controllers\Backend\Setup\StudentGroupController;
use App\Http\Controllers\Backend\Setup\StudentShiftController;
use App\Http\Controllers\Backend\Setup\FeeCategoryController;
use App\Http\Controllers\Backend\Setup\FeeAmountController;

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
    
    //Student shift
    Route::get('student/shift/view',[StudentShiftController::class,'viewshift'])->name('student.shift.view');
    Route::get('student/shift/add',[StudentShiftController::class,'addshift'])->name('student.shift.add');
    Route::post('student/shift/store',[StudentShiftController::class,'storeshift'])->name('student.shift.store');
    Route::get('student/shift/edit/{id}',[StudentShiftController::class,'editshift'])->name('student.shift.edit');
    Route::post('student/shift/update/{id}',[StudentShiftController::class,'updateshift'])->name('student.shift.update');
    Route::get('student/shift/delete/{id}',[StudentShiftController::class,'deleteshift'])->name('student.shift.delete');
    
    //Route for fees
    Route::get('fee/category/view',[FeeCategoryController::class,'viewfeecat'])->name('fee.category.view');
    Route::get('fee/category/add',[FeeCategoryController::class,'addfeecat'])->name('fee.category.add');
    Route::post('fee/category/store',[FeeCategoryController::class,'storefeecat'])->name('fee.category.store');
    Route::get('fee/category/edit/{id}',[FeeCategoryController::class,'editfeecat'])->name('fee.category.edit');
    Route::post('fee/category/update/{id}',[FeeCategoryController::class,'updatefeecat'])->name('fee.category.update');
    Route::get('fee/category/delete/{id}',[FeeCategoryController::class,'deletefeecat'])->name('fee.category.delete');
    
    //Route for fee category amount
    Route::get('fee/amount/view',[FeeAmountController::class,'viewfeeamt'])->name('fee.amount.view');
    Route::get('fee/amount/add',[FeeAmountController::class,'addfeeamt'])->name('fee.amount.add');
    Route::post('fee/amount/store',[FeeAmountController::class,'storefeeamt'])->name('fee.amount.store');
    Route::get('fee/amount/edit/{id}',[FeeAmountController::class,'editfeeamt'])->name('fee.category.edit');
    Route::post('fee/amount/update/{id}',[FeeAmountController::class,'updatefeeamt'])->name('fee.amount.update');
    Route::get('fee/amount/delete/{id}',[FeeAmountController::class,'deletefeeamt'])->name('fee.amount.delete');
    
});
//Route for 