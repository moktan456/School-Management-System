<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function userview(){
       $data['userdata'] = User::where('usertype','Admin')->get();
       return view('backend.user.view_user',$data);
    }
    public function adduser(){
        return view('backend.user.add_user');
    }
    public function storeuser(Request $request){
        $validated = $request->validate([
            'email' => 'required|unique:users',
            'name' => 'required',
        ]);
        $userdata = new User();
        //To generate password/code
        $code = rand(0000,9999);
        $userdata->usertype = 'Admin';
        $userdata->role = $request->role;
        $userdata->name = $request->name;
        $userdata->email = $request->email;
        $userdata->password = bcrypt($code);
        $userdata->code = $code;
        $userdata->save();
        $notification = array(
            'message'=> 'User sdded successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('user.view')->with($notification);
    }
    public function edituser($id){
        //dd("Hello");
        $editdata = User::find($id);
        return view('backend.user.edit_user',compact('editdata'));
    }

    public function updateuser(Request $request, $id){
        $userdata = User::find($id);
        $userdata->role = $request->role;
        $userdata->name = $request->name;
        $userdata->email = $request->email;
        $userdata->save();
        $notification = array(
            'message'=> 'User updated successfully',
            'alert-type' => 'info'
        );
        return redirect()->route('user.view')->with($notification);
    }

    public function deleteuser($id){
        // $user = User::find($id)->delete();
        $user = User::find($id);
        $user->delete();
        // $notification = array(
        //     'message'=> 'User deleted successfully',
        //     'alert-type' => 'info'
        // );
        // return redirect()->route('user.view')->with($notification);
        return redirect()->route('user.view');
    }
}
