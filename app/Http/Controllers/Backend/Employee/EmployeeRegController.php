<?php

namespace App\Http\Controllers\Backend\Employee;

use App\Http\Controllers\Controller;
use App\Models\Designation;
use App\Models\User;
use App\Models\EmployeeSallaryLog;
use App\Models\StudentYear;
use Illuminate\Http\Request;
use DB;
use pdf;

class EmployeeRegController extends Controller
{
  
    public function index()
    {
        $data['allData'] = User::where('usertype','Employee')->get();
        return view('backend.employee.emp_reg.emp_view',$data);
    }

   
    public function create()
    {
        $data['designation'] = Designation::all();
        return view('backend.employee.emp_reg.emp_add',$data);
    }

   
    public function store(Request $request)
    {
        DB::transaction(function() use($request){
            $checkYear = date('Ym',strtotime($request->join_date));
            //dd($checkYear);
            $employee = User::where('usertype','Employee')->orderBy('id','DESC')->first();
            //Code to generate unique ID for student
            if ($employee==null) {
                $firstReg = 0;
                $employeeId = $firstReg + 1;
                if ($employeeId < 10) {
                    $id_no = '000'.$employeeId;
                }elseif ($employeeId < 100) {
                    $id_no = '00'.$employeeId;
                }elseif ($employeeId < 1000) {
                    $id_no = '0'.$employeeId;
                }
            }else {
                $employee = User::where('usertype','Employee')->orderBy('id','DESC')->first()->id; //Id of last std entry
                $employeeId = $employee + 1;
                if ($employeeId < 10) {
                    $id_no = '000'.$employeeId;
                }elseif ($employeeId < 100) {
                    $id_no = '00'.$employeeId;
                }elseif ($employeeId < 1000) {
                    $id_no = '0'.$employeeId;
                }
            } //End outer else
            $final_id_no = $checkYear.$id_no;
            $user = new User();
            $code = rand(0000,9999);
            $user->id_no = $final_id_no;
            $user->password = bcrypt($code);
            $user->usertype = 'Employee';
            $user->code = $code;
            $user->name = $request->name;
            $user->fname = $request->fname;
            $user->mname = $request->mname;
            $user->mobile = $request->mobile;
            $user->address = $request->address;
            $user->gender = $request->gender;
            $user->religion = $request->religion;
            $user->salary = $request->salary;
            $user->designation_id = $request->designation_id; 
            $user->dob = date('Y-m-d',strtotime($request->dob));
            $user->join_date = date('Y-m-d',strtotime($request->join_date));
            //For image
            if($request->file('image')){
                $file = $request->file('image');
               // @unlink(public_path('upload/employee_images/'.$data->image)); //To delete the previous photo
                $filename = date('YmdHi').$file->getClientOriginalName();
                $file->move(public_path('upload/employee_images'),$filename);
                $user['image']= $filename;
            }
            $user->save();

            $employee_salary = new EmployeeSallaryLog();
            $employee_salary->employee_id = $user->id;
            $employee_salary->effected_salary = date('Y-m-d',strtotime($request->join_date));
            $employee_salary->previous_salary = $request->salary;
            $employee_salary->present_salary = $request->salary;
            $employee_salary->increment_salary = '0';
            $employee_salary->save();
            
        });
        $notification = array(
            'message'=>'Emloyee registered successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('emp.view')->with($notification);
    }

   
    public function show($id)
    {
        //
    }

    
    public function edit($id)
    {
        $data['editData'] = User::find($id);
        $data['designation'] = Designation::all();
        return view('backend.employee.emp_reg.emp_edit',$data);
    }

   
    public function update(Request $request, $id)
    {
       
            $user = User::find($id);
            $user->name = $request->name;
            $user->fname = $request->fname;
            $user->mname = $request->mname;
            $user->mobile = $request->mobile;
            $user->address = $request->address;
            $user->gender = $request->gender;
            $user->religion = $request->religion;
            //$user->salary = $request->salary;
            $user->designation_id = $request->designation_id; 
            $user->dob = date('Y-m-d',strtotime($request->dob));
            //$user->join_date = date('Y-m-d',strtotime($request->join_date));
            //For image
            if($request->file('image')){
                $file = $request->file('image');
                @unlink(public_path('upload/employee_images/'.$user->image)); //To delete the previous photo
                $filename = date('YmdHi').$file->getClientOriginalName();
                $file->move(public_path('upload/employee_images'),$filename);
                $user['image']= $filename;
            }
            $user->save();

        $notification = array(
            'message'=>'Emloyee updated successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('emp.view')->with($notification);
    }

    
    public function details($id)
    {
        $data['details'] = User::find($id);
        //$pdf = PDF::loadview('')
    }
}
