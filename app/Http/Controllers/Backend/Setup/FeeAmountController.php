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
        $data['allData'] = FeeCategoryAmount::all();
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
}
