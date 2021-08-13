<?php

namespace App\Http\Controllers\Backend\Employee;

use App\Http\Controllers\Controller;
use App\Models\EmployeeLeave;
use App\Models\LeavePurpose;
use App\Models\User;
use Illuminate\Http\Request;

class EmployeeLeaveController extends Controller
{
    
    public function index()
    {
        $data['allData'] = EmployeeLeave::orderBy('id','desc')->get();
        return view('backend.employee.emp_leave.emp_leave_view',$data);
    }

   
    public function create()
    {
        $data['employees'] = User::where('usertype','Employee')->get();
        $data['leave_purposes'] = LeavePurpose::all();
        return view('backend.employee.emp_leave.emp_leave_add',$data);
    }

   
    public function store(Request $request)
    {
        if($request->leave_purpose_id=="0"){
            $new_leave_purpose = new LeavePurpose();
            $new_leave_purpose->name = $request->name;
            $new_leave_purpose->save();
            $leave_purpose_id = $new_leave_purpose->id;
        }else{
            $leave_purpose_id = $request->leave_purpose_id;
        } //end else
        $data = new EmployeeLeave();
        $data->employee_id = $request->employee_id;
        $data->leave_purpose_id = $leave_purpose_id;
        $data->start_date = date('Y-m-d',strtotime($request->start_date));
        $data->end_date = date('Y-m-d',strtotime($request->end_date));
        $data->save();
        $notification = array(
            'message'=> 'Leave added successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('emp.leave.view')->with($notification);
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

    
    public function destroy($id)
    {
        //
    }
}
