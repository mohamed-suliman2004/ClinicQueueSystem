<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{

        public function manageUsers(){
            $users = User::all();
            return view('admin.user.manage', compact('users'));
        }



       public function editUser($id){
    $user=User::findorfail($id);
     return view('admin.user.edit',compact('user'));
}

public function updateUser(Request $request,$id){
    $request->validate([
       'role'=>'required'
    ]);
    $user=User::findorfail($id);
    $user->role=$request->role;
    $user->save();
    return redirect()->route('admin.users.manage')->with('success','User updated successfully');
}



        public function deleteUser($id){
            $user = User::find($id);
            $user->delete();
            return redirect()->route('admin.users.manage');
        }
    }

