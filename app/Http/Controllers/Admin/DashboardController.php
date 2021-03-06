<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class DashboardController extends Controller
{
    public function registered(){

        $users = User::all();
        return view('admin.register')->with('users',$users);
    }

    public function registeredit(Request $request,$id){
        
        $users = User::findOrFail($id);
        return view('admin.register-edit')->with('users',$users);

    }

    public function registerupdate(Request $request,$id){
        $users= User::find($id);
        if($users->usertype!='admin'){
            $users->name=$request->input('name');
            $users->usertype=$request->input('usertype');
        }
        else{
            
            $users->name=$request->input('name');
            $users->phone=$request->input('phone');
            $users->email=$request->input('email');
            // $users->usertype=$request->input('usertype');

        }
        $users->update();

        return redirect('/role')->with('success','Updated Successfully');
    }
    // public function adminupdate(Request $request,$id){
    //     $users= User::find($id);
    //     $users->name=$request->input('name');
    //      $users->phone=$request->input('phone');
    //      $users->email=$request->input('email');
    //      $users->usertype=$request->input('usertype');
    //     $users->update();

    //     return redirect('/role')->with('success','Updated Successfully');
    // }

    public function registerdelete($id){
        $users = User::findOrFail($id);
        $users->delete();
        return redirect('/role')->with('del','Deleted Successfully');
    }

    
}
