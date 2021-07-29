<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ExamType;

class ExamTypeController extends Controller
{
    public function viewexamtype(){
        $data['allData'] = ExamType::all();
        return view('backend.setup.exam_type.view_exam_type',$data);
    }
    public function addexamtype(){
        return view('backend.setup.exam_type.add_exam_type');
    }
    public function storeexamtype(Request $request){
        $validated = $request->validate([
            'name'=>'required|unique:exam_types,name'
        ]);
        $data = new ExamType();
        $data->name = $request->name;
        $data->save();
        $notification = array(
            'message'=> 'Examtype added successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('exam.type.view')->with($notification);
    }
    public function editexamtype($id){
        $editdata = ExamType::find($id);
        return view('backend.setup.exam_type.edit_exam_type',compact('editdata'));
    }
    public function updateexamtype(Request $request,$id){
        $data = ExamType::find($id);
        $validated = $request->validate([
            'name'=>'required|unique:exam_types,name,'.$data->id,
        ]);
        $data->name = $request->name;
        $data->save();
        $notification = array(
            'message'=> 'Examtype updated successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('exam.type.view')->with($notification);

    }
    public function deleteexamtype($id){
        $year = ExamType::find($id);
        $year->delete();
        $notification = array(
            'message'=> 'Examtype deleted successfully',
            'alert-type' => 'info'
        );
        return redirect()->route('exam.type.view')->with($notification);
    }
}
