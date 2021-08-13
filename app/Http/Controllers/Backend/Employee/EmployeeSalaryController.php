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

   
    public function increment($id)
    {
        $data['editData'] = User::find($id);
        // Do not use get method it will bring all the data
        //find($id)->get();
        return view('backend.employee.emp_salary.emp_salary_increment',$data);
        //dd($data['editData']->toArray());
    }

    
    public function incrementupdate(Request $request,$id)
    {
        $user = User::find($id);
        $previous_salary = $user->salary;
        $present_salary = (float)$previous_salary + (float)$request->increment_salary;
        $user->salary = $present_salary;
        $user->save();

        $salary_data = new EmployeeSallaryLog();
        $salary_data->employee_id = $id;
        $salary_data->previous_salary = $previous_salary;
        $salary_data->increment_salary = $request->increment_salary;
        $salary_data->present_salary = $present_salary;
        $salary_data->effected_salary = date('Y-m-d',strtotime($request->effected_salary));
        $salary_data->save();

        $notification = array(
            'message'=>'Increment updated successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('emp.salary.view')->with($notification);

    }

   
    public function salarydetails($id)
    {
        $data['details'] = User::find($id);
        $data['salary_log'] = EmployeeSallaryLog::where('employee_id',$data['details']->id)->get();
        //get() method gives all related data of $id
        //dd($data['salary_log']->toArray());
        return view('backend.employee.emp_salary.emp_salary_details',$data);
    }

   
   
}
