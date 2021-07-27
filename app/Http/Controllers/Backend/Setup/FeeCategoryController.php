<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\FeeCategory;

class FeeCategoryController extends Controller
{
    public function viewfeecat(){
        $data['allData'] = FeeCategory::all();
        return view('backend.setup.fee_category.view_fee_cat',$data);
    }
    public function addfeecat(){
        return view('backend.setup.fee_category.add_fee_cat');
    }
    public function storefeecat(Request $request){
        $validated = $request->validate([
            'name'=>'required|unique:fee_categories,name'
        ]);
        $data = new FeeCategory();
        $data->name = $request->name;
        $data->save();
        $notification = array(
            'message'=> 'Category added successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('fee.category.view')->with($notification);
    }
    public function editfeecat($id){
        $editdata = FeeCategory::find($id);
        return view('backend.setup.fee_category.edit_fee_cat',compact('editdata'));
    }
    public function updatefeecat(Request $request,$id){
        $data = FeeCategory::find($id);
        $validated = $request->validate([
            'name'=>'required|unique:fee_categories,name,'.$data->id,
        ]);
        $data->name = $request->name;
        $data->save();
        $notification = array(
            'message'=> 'Year updated successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('fee.category.view')->with($notification);

    }
    public function deletefeecat($id){
        $year = FeeCategory::find($id);
        $year->delete();
        $notification = array(
            'message'=> 'Category deleted successfully',
            'alert-type' => 'info'
        );
        return redirect()->route('fee.category.view')->with($notification);
    }
}
