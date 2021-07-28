<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\FeeCategory;
use App\Models\StudentClass;
use App\Models\FeeCategoryAmount;

class FeeAmountController extends Controller
{
    public function viewfeeamt(){
        // $data['allData'] = FeeCategoryAmount::all();
        $data['allData'] = FeeCategoryAmount::select('fee_category_id')->groupBy('fee_category_id')->get();
        return view('backend.setup.fee_amount.view_fee_amt',$data);
    }
    public function addfeeamt(){
        $data['fee_categories'] = FeeCategory::all();
        $data['classes'] = StudentClass::all();
        return view('backend.setup.fee_amount.add_fee_amt',$data);
    }
   public function storefeeamt(Request $request){
       //To accept multiple data
       $countClass = count($request->class_id);
       if ($countClass !=NULL) {
           for ($i=0; $i <$countClass ; $i++) { 
               $fee_amount = new FeeCategoryAmount();
               $fee_amount->fee_category_id = $request->fee_category_id;
               $fee_amount->class_id = $request->class_id[$i];
               $fee_amount->amount = $request->amount[$i];
               $fee_amount->save();
           } // End For Loop
       }// End If Condition
       $notification = array(
           'message' => 'Fee Amount Inserted Successfully',
           'alert-type' => 'success'
       );
       return redirect()->route('fee.amount.view')->with($notification);
   }
   public function editfeeamt($fee_category_id){
    $data['editdata'] = FeeCategoryAmount::where('fee_category_id',$fee_category_id)->orderBy('class_id','asc')->get();
    //dd($data['editdata']->toArray());
    $data['fee_categories'] = FeeCategory::all();
    $data['classes'] = StudentClass::all();
    return view('backend.setup.fee_amount.edit_fee_amt',$data);
   }

   public function updatefeeamt($fee_category_id,Request $request){
        //Condition to avoid empty updation
        if($request->class_id ==NULL){
            $notification = array(
                'message' => 'Sorry, you did not select any class amount',
                'alert-type' => 'error'
            );
            return redirect()->route('fee.amount.edit',$fee_category_id)->with($notification);
        }else{
            $countClass = count($request->class_id);
            FeeCategoryAmount::where('fee_category_id',$fee_category_id)->delete();
                for ($i=0; $i <$countClass ; $i++) { 
                    $fee_amount = new FeeCategoryAmount();
                    $fee_amount->fee_category_id = $request->fee_category_id;
                    $fee_amount->class_id = $request->class_id[$i];
                    $fee_amount->amount = $request->amount[$i];
                    $fee_amount->save();
                } // End For Loop
           
            
        }
        $notification = array(
            'message' => 'Fee Amount Updated Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('fee.amount.view')->with($notification);  
   }
   public function detailfeeamt($fee_category_id){
    $data['detaildata'] = FeeCategoryAmount::where('fee_category_id',$fee_category_id)->orderBy('class_id','asc')->get();
    //dd($data['editdata']->toArray());
    return view('backend.setup.fee_amount.detail_fee_amt',$data);  
   }
}
