<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Designation;

class DesignationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['allData'] = Designation::all();
        return view('backend.setup.designation.view_designation',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.setup.designation.add_designation');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required|unique:designations,name'
        ]);
        $data = new Designation();
        $data->name = $request->name;
        $data->save();
        $notification = array(
            'message'=> 'Designation added successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('designation.view')->with($notification);
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
    public function edit($id)
    {
        $editdata = Designation::find($id);
        return view('backend.setup.designation.edit_designation',compact('editdata'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = Designation::find($id);
        $request->validate([
            'name'=>'required|unique:designations,name,'.$data->id,
        ]);
        $data->name = $request->name;
        $data->save();
        $notification = array(
            'message'=> 'Designation updated successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('designation.view')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Designation::find($id)->delete();
        $notification = array(
            'message'=> 'Designation deleted successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('designation.view')->with($notification);
    }
}
