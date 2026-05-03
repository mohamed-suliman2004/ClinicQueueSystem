<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Department;
class DepartemntController extends Controller
{
    public function createDapartment(){
        return view('admin.department.create');
    }



    public function storeDapartment(Request $request){
        $request->validate([
            'name' => ['required'],
        ]);
        $department = new Department();
        $department->name = $request->name;
        $department->save();
        return redirect()->route('admin.departments.manage');
    }


  public function manageDepartments(){
        $departments =Department::all();
        return view('admin.department.manage',compact('departments'));
    }



        public function editDepartment($id){
        $department = Department::find($id);
        return view('admin.department.edit',compact('department'));
    }



    public function updateDepartment(Request $request,$id){
        $request->validate([
            'name' => ['required'],
        ]);
        $department = Department::find($id);
        $department->name = $request->name;
        $department->save();
        return redirect()->route('admin.departments.manage');
    }


    public function deleteDepartment($id){
        $department = Department::find($id);
        $department->delete();
        return redirect()->route('admin.departments.manage');
    }



}
