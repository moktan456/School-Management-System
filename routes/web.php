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
use App\Http\Controllers\Backend\Setup\ExamTypeController;
use App\Http\Controllers\Backend\Setup\SubjectController;
use App\Http\Controllers\Backend\Setup\AssignSubjectController;
use App\Http\Controllers\Backend\Setup\DesignationController;
use App\Http\Controllers\Backend\Student\StdRegController;
use App\Http\Controllers\Backend\Employee\EmployeeRegController;
use App\Http\Controllers\Backend\Employee\EmployeeSalaryController;
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

Route::group(['middleware'=>'auth'],function(){
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
        
        //Route for fee category
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
        Route::get('fee/amount/edit/{fee_category_id}',[FeeAmountController::class,'editfeeamt'])->name('fee.amount.edit');
        Route::post('fee/amount/update/{fee_category_id}',[FeeAmountController::class,'updatefeeamt'])->name('fee.amount.update');
        Route::get('fee/amount/details/{fee_category_id}',[FeeAmountController::class,'detailfeeamt'])->name('fee.amount.detail');
        Route::get('fee/amount/delete/{fee_category_id}',[FeeAmountController::class,'deletefeeamt'])->name('fee.amount.delete');
        
        //Route for exam type
        Route::get('exam/type/view',[ExamTypeController::class,'viewexamtype'])->name('exam.type.view');
        Route::get('exam/type/add',[ExamTypeController::class,'addexamtype'])->name('exam.type.add');
        Route::post('exam/type/store',[ExamTypeController::class,'storeexamtype'])->name('exam.type.store');
        Route::get('exam/type/edit/{id}',[ExamTypeController::class,'editexamtype'])->name('exam.type.edit');
        Route::post('exam/type/update/{id}',[ExamTypeController::class,'updateexamtype'])->name('exam.type.update');
        Route::get('exam/type/delete/{id}',[ExamTypeController::class,'deleteexamtype'])->name('exam.type.delete');

        //Route for subject
        Route::get('school/subject/view',[SubjectController::class,'viewsubject'])->name('school.subject.view');
        Route::get('school/subject/add',[SubjectController::class,'addsubject'])->name('school.subject.add');
        Route::post('school/subject/store',[SubjectController::class,'storesubject'])->name('school.subject.store');
        Route::get('school/subject/edit/{id}',[SubjectController::class,'editsubject'])->name('school.subject.edit');
        Route::post('school/subject/update/{id}',[SubjectController::class,'updatesubject'])->name('school.subject.update');
        Route::get('school/subject/delete/{id}',[SubjectController::class,'deletesubject'])->name('school.subject.delete');
        
        //Route for assign subject
        Route::get('assign/subject/view',[AssignSubjectController::class,'viewssnsub'])->name('assign.subject.view');
        Route::get('assign/subject/add',[AssignSubjectController::class,'addssnsub'])->name('assign.subject.add');
        Route::post('assign/subject/store',[AssignSubjectController::class,'storessnsub'])->name('assign.subject.store');
        Route::get('assign/subject/edit/{class_id}',[AssignSubjectController::class,'editssnsub'])->name('assign.subject.edit');
        Route::post('assign/subject/update/{class_id}',[AssignSubjectController::class,'updatessnsub'])->name('assign.subject.update');
        Route::get('assign/subject/details/{class_id}',[AssignSubjectController::class,'detailssnsub'])->name('assign.subject.detail');
        //Route::get('assign/subject/delete/{fee_category_id}',[AssignSubjectController::class,'deletessnsub'])->name('assign.subject.delete');
        
        //Route for designation
        Route::get('designation/view',[DesignationController::class,'index'])->name('designation.view');
        Route::get('designation/add',[DesignationController::class,'create'])->name('designation.add');
        Route::post('designation/store',[DesignationController::class,'store'])->name('designation.store');
        Route::get('designation/edit/{id}',[DesignationController::class,'edit'])->name('designation.edit');
        Route::post('designation/update/{id}',[DesignationController::class,'update'])->name('designation.update');
        Route::get('designation/delete/{id}',[DesignationController::class,'destroy'])->name('designation.delete');
    });
    //Route for student registration
    Route::prefix('students')->group(function(){
        Route::get('reg/view',[StdRegController::class,'index'])->name('std.reg.view');
        Route::get('custom/view',[StdRegController::class,'customsearch'])->name('std.custom.search');
        Route::get('reg/add',[StdRegController::class,'create'])->name('std.reg.add');
        Route::post('reg/store',[StdRegController::class,'store'])->name('std.reg.store');
        Route::get('reg/edit/{student_id}',[StdRegController::class,'edit'])->name('std.reg.edit');
        Route::post('reg/update/{student_id}',[StdRegController::class,'update'])->name('std.reg.update');
        Route::get('reg/promote/{student_id}',[StdRegController::class,'promote'])->name('std.reg.promote');
        Route::post('reg/promoteupdate/{student_id}',[StdRegController::class,'promoteupdate'])->name('std.reg.promoteupdate'); 
    });
     //Route for Employee registration
     Route::prefix('employees')->group(function(){
        Route::get('emp/view',[EmployeeRegController::class,'index'])->name('emp.view');
        Route::get('emp/add',[EmployeeRegController::class,'create'])->name('emp.add');
        Route::post('emp/store',[EmployeeRegController::class,'store'])->name('emp.store');
        Route::get('emp/edit/{id}',[EmployeeRegController::class,'edit'])->name('emp.edit');
        Route::post('emp/update/{id}',[EmployeeRegController::class,'update'])->name('emp.update');
        Route::get('emp/details/{id}',[EmployeeRegController::class,'details'])->name('emp.details');
        

        //for salary
        Route::get('emp/salary/view',[EmployeeSalaryController::class,'index'])->name('emp.salary.view');
        Route::get('emp/salary/add',[EmployeeSalaryController::class,'create'])->name('emp.salary.add');
        Route::post('emp/salary/increment/{id}',[EmployeeSalaryController::class,'increment'])->name('emp.salary.increment');
    });
});