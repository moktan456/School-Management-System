<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Subject;

class SubjectController extends Controller
{
    public function viewsubject(){
        $data['allData'] = Subject::all();
        return view('backend.setup.subject.view_subject',$data);
    }
    public function addsubject(){
        return view('backend.setup.subject.add_subject');
    }
    public function storesubject(Request $request){
        $validated = $request->validate([
            'name'=>'required|unique:subjects,name'
        ]);
        $data = new Subject();
        $data->name = $request->name;
        $data->save();
        $notification = array(
            'message'=> 'Subject added successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('school.subject.view')->with($notification);
    }
    public function editsubject($id){
        $editdata = Subject::find($id);
        return view('backend.setup.subject.edit_subject',compact('editdata'));
    }
    public function updatesubject(Request $request,$id){
        $data = Subject::find($id);
        $validated = $request->validate([
            'name'=>'required|unique:subjects,name,'.$data->id,
        ]);
        $data->name = $request->name;
        $data->save();
        $notification = array(
            'message'=> 'Subject updated successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('school.subject.view')->with($notification);

    }
    public function deletesubject($id){
        $year = Subject::find($id);
        $year->delete();
        $notification = array(
            'message'=> 'Subject deleted successfully',
            'alert-type' => 'info'
        );
        return redirect()->route('school.subject.view')->with($notification);
    }
}
