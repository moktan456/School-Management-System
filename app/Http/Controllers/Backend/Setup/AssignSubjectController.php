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
    public function storessnsub(Request $request){
         //To accept multiple data
       $subjectCount = count($request->subject_id);
       if ($subjectCount !=NULL) {
           for ($i=0; $i <$subjectCount ; $i++) { 
               $assign_sub = new AssignSubject();
               $assign_sub->class_id = $request->class_id;
               $assign_sub->subject_id = $request->subject_id[$i];
               $assign_sub->full_mark = $request->full_mark[$i];
               $assign_sub->pass_mark = $request->pass_mark[$i];
               $assign_sub->subjective_mark = $request->subjective_mark[$i];
               $assign_sub->save();
           } // End For Loop
       }// End If Condition
       $notification = array(
           'message' => 'Subject assigned Successfully',
           'alert-type' => 'success'
       );
       return redirect()->route('assign.subject.view')->with($notification);
    }
    public function editssnsub($class_id){
        $data['editdata'] = AssignSubject::where('class_id',$class_id)->orderBy('subject_id','asc')->get();
        //dd($data['editdata']->toArray());
        $data['subjects'] = Subject::all();
        $data['classes'] = StudentClass::all();
        return view('backend.setup.assign_sub.edit_assign_sub',$data);
       }
    public function updatessnsub(Request $request,$class_id){
        //Condition to avoid empty updation
        if ($request->subject_id == NULL) {
       
            $notification = array(
                'message' => 'Sorry you did not select any Subject',
                'alert-type' => 'error'
            );
    
            return redirect()->route('assign.subject.edit',$class_id)->with($notification);
                 
            }else{
                 
        $countClass = count($request->subject_id);
        $subjects = AssignSubject::where('class_id',$class_id);
        $subjects->delete();
                for ($i=0; $i <$countClass ; $i++) { 
                    $assign_subject = new AssignSubject();
                        $assign_subject->class_id = $request->class_id;
                        $assign_subject->subject_id = $request->subject_id[$i];
                        $assign_subject->full_mark = $request->full_mark[$i];
                        $assign_subject->pass_mark = $request->pass_mark[$i];
                        $assign_subject->subjective_mark = $request->subjective_mark[$i];
                        $assign_subject->save();
    
                } // End For Loop	 
    
            }// end Else
    
           $notification = array(
                'message' => 'Data Updated Successfully',
                'alert-type' => 'success'
            );
    
            return redirect()->route('assign.subject.view')->with($notification);
        } // end Method 
    
}
