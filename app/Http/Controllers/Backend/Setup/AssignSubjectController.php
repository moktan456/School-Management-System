<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Subject;
use App\Models\StudentClass;
//use App\Models\FeeCategoryAmount;
use App\Models\AssignSubject;

class AssignSubjectController extends Controller
{
    public function viewssnsub(){
        // $data['allData'] = StudentClass::all();
          $data['allData'] = AssignSubject::select('class_id')->groupBy('class_id')->get();
          //dd($data);
        //  return view('backend.setup.fee_amount.view_fee_amt',$data);
        return view('backend.setup.assign_sub.view_assign_sub', $data); 
    }
    public function addssnsub(Request $request){
        $data['subjects'] = Subject::all();
        $data['classes'] = StudentClass::all();
        return view('backend.setup.assign_sub.add_assign_sub',$data);
    }
}
