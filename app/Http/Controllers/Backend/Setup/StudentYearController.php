<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\StudentYear;

class StudentYearController extends Controller
{
    public function viewyear(){
        $data['allData'] = StudentYear::all();
        return view('backend.setup.year.view_year',$data);
    }
    public function addyear(){
        return view('backend.setup.year.add_year');
    }
    public function storeyear(Request $request){
        $validated = $request->validate([
            'name'=>'required|unique:student_years,name'
        ]);
        $data = new StudentYear();
        $data->name = $request->name;
        $data->save();
        $notification = array(
            'message'=> 'Year added successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('student.year.view')->with($notification);
    }
    public function edityear($id){
        $editdata = StudentYear::find($id);
        return view('backend.setup.year.edit_year',compact('editdata'));
    }
    public function updateyear(Request $request,$id){
        $data = StudentYear::find($id);
        $validated = $request->validate([
            'name'=>'required|unique:student_years,name,'.$data->id,
        ]);
        $data->name = $request->name;
        $data->save();
        $notification = array(
            'message'=> 'Year updated successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('student.year.view')->with($notification);

    }
    public function deleteyear($id){
        $year = StudentYear::find($id);
        $year->delete();
        $notification = array(
            'message'=> 'Year deleted successfully',
            'alert-type' => 'info'
        );
        return redirect()->route('student.year.view')->with($notification);
    }
}
