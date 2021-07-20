<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\StudentClass;

class StudentClassController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function viewclass()
    {
        $data['allData'] = StudentClass::all();
        return view('backend.setup.student_class.view_class',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function addclass()
    {
        return view('backend.setup.student_class.add_class');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeclass(Request $request)
    {
        $validated = $request->validate([
            'name'=>'required|unique:student_classes,name'
        ]);
        $data = new StudentClass();
        $data->name = $request->name;
        $data->save();
        $notification = array(
            'message'=> 'Class added successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('student.class.view')->with($notification);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function editclass($id)
    {
        $editdata = StudentClass::find($id);
        return view('backend.setup.student_class.edit_class',compact('editdata'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateclass(Request $request, $id)
    {
        // $validated = $request->validate([
        //     'name'=>'required|unique:student_classes,name',
        // ]);
        // StudentClass::find($id)->update([
        //     'name' => $request->name,
        // ]);
        // $notification = array(
        //     'message'=> 'Class updated successfully',
        //     'alert-type' => 'info'
        // );
        // return redirect()->route('student.class.view')->with($notification);
        
        //Option 2
        $data = StudentClass::find($id);
        $validated = $request->validate([
            'name'=>'required|unique:student_classes,name,'.$data->id,
        ]);
      
        $data->name = $request->name;
        $data->save();

        $notification = array(
            'message'=> 'Class updated successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('student.class.view')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function deleteclass($id)
    {
        $stdclass = StudentClass::find($id);
        $stdclass->delete();
        $notification = array(
            'message'=> 'Class deleted successfully',
            'alert-type' => 'info'
        );
        return redirect()->route('student.class.view')->with($notification);
    }
}
