<?php

namespace App\Http\Controllers\setup;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\User;

class NewUserController extends Controller
{
    function index(){
        $user = User::paginate(10);
        return view('setup.userlist',['users'=>$user]);      
    }

    function create(){

        return view('setup.newuser');
    }

    function store(Request $request){

        $users = New User;

        $users->name            = $request->input('name');
        $users->username        = $request->input('username');
        $users->role_name       = $request->input('role_name');
        $users->password        = Hash::make($request->input('password')); 
       

        $users->save();
         
        return redirect('userlist')->with('status','New User Created succesfully');

       
    }


    function show($id){     
       
        $users = User::find($id);    
        return view('setup.edituser', compact('users'));
        
    }

    function update(Request $request, $id){     
       
        $users = User::find($id); 

        $users->name                        = $request->input('name');
        $users->username                    = $request->input('username');
        $users->role_name                   = $request->input('role_name');
        $password_confirmation              = $request->input('password_confirmation');
       
        if( $request->input('password') ===   $password_confirmation && $request->input('password') != NULL){

            $users->password = Hash::make($request->input('password')); 
            $users->update(); 
           
        }else{
            $users->update(); 
        }
       
        return redirect('userlist')->with('status','User Updated Successfully');       
              
       
    }


    function delete($id){     
       
        $users = User::find($id);
    
        
        if($users->username != 'admin' && $users->role_name != 'Admin'){
            $users->delete();  
            return redirect('userlist')->with('status',' succesfully Deleted');
        }else{
            return redirect('userlist')->with('status',' You are not authorized to Delete this user');         
        }       
         
       
    }




}
