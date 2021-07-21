<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\StudentGroup;
class StudentGroupController extends Controller
{
    public function viewgroup(){
        $data['allData'] = StudentGroup::all();
        return view('backend.setup.group.view_group',$data);
    }
    public function addgroup(){
        return view('backend.setup.group.add_group');
    }
    public function storegroup(Request $request){
        $validated = $request->validate([
            'name'=>'required|unique:student_groups,name'
        ]);
        $data = new StudentGroup();
        $data->name = $request->name;
        $data->save();
        $notification = array(
            'message'=> 'Group added successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('student.group.view')->with($notification);
    }
    public function editgroup($id){
        $editdata = StudentGroup::find($id);
        return view('backend.setup.group.edit_group',compact('editdata'));
    }
    public function updategroup(Request $request,$id){
        $data = StudentGroup::find($id);
        $validated = $request->validate([
            'name'=>'required|unique:student_groups,name,'.$data->id,
        ]);
        $data->name = $request->name;
        $data->save();
        $notification = array(
            'message'=> 'Group updated successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('student.group.view')->with($notification);

    }
    public function deletegroup($id){
        $year = StudentGroup::find($id);
        $year->delete();
        $notification = array(
            'message'=> 'Group deleted successfully',
            'alert-type' => 'info'
        );
        return redirect()->route('student.group.view')->with($notification);
    }
}
