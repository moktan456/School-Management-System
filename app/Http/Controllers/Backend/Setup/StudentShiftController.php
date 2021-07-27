<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\StudentShift;

class StudentShiftController extends Controller
{
    public function viewshift(){
        $data['allData'] = StudentShift::all();
        return view('backend.setup.shift.view_shift',$data);
    }
    public function addshift(){
        return view('backend.setup.shift.add_shift');
    }
    public function storeshift(Request $request){
        $validated = $request->validate([
            'name'=>'required|unique:student_shifts,name'
        ]);
        $data = new StudentShift();
        $data->name = $request->name;
        $data->save();
        $notification = array(
            'message'=> 'Shift added successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('student.shift.view')->with($notification);
    }
    public function editshift($id){
        $editdata = StudentShift::find($id);
        return view('backend.setup.shift.edit_shift',compact('editdata'));
    }
    public function updateshift(Request $request,$id){
        $data = StudentShift::find($id);
        $validated = $request->validate([
            'name'=>'required|unique:student_shifts,name,'.$data->id,
        ]);
        $data->name = $request->name;
        $data->save();
        $notification = array(
            'message'=> 'Shift updated successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('student.shift.view')->with($notification);

    }
    public function deleteshift($id){
        $shift = StudentShift::find($id);
        $shift->delete();
        $notification = array(
            'message'=> 'Shift deleted successfully',
            'alert-type' => 'info'
        );
        return redirect()->route('student.shift.view')->with($notification);
    }
}
