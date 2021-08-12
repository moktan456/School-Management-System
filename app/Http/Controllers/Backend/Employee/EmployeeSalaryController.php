<?php

namespace App\Http\Controllers\Backend\Employee;

use App\Http\Controllers\Controller;
use App\Models\Designation;
use App\Models\User;
use App\Models\EmployeeSallaryLog;
use App\Models\StudentYear;
use Illuminate\Http\Request;

class EmployeeSalaryController extends Controller
{
    
    public function index()
    {
        $data['allData'] = User::where('usertype','Employee')->get();
        return view('backend.employee.emp_salary.emp_salary_view',$data);
    }

   
    public function create()
    {
        //
    }

    
    public function store(Request $request)
    {
        //
    }

   
    public function show($id)
    {
        //
    }

   
    public function edit($id)
    {
        //
    }

    
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
