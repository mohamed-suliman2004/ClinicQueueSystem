<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Doctor;
use Illuminate\Http\Request;
use App\Models\Department;
use Illuminate\Support\Facades\DB;

class DoctorController extends Controller
{
    public function createDoctor(){
        $departments = Department::all();
        return view('admin.doctor.create',compact('departments'));
    }


    public function storeDoctor(Request $request){
        $request->validate([
            'name' => ['required'],
            'email' => ['required'],
            'phone' => ['required'],
            'department' => ['required'],
        ]);
        Doctor::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'department_id' => $request->department
        ]);
        return redirect()->route('admin.doctors.manage');
    }



    public function manageDoctors(){
        $doctors = Doctor::all();
        return view('admin.doctor.manage',compact('doctors'));
    }


    public function editDoctor($id){
        $doctor = Doctor::find($id);
        $departments=Department::all();
        return view('admin.doctor.edit',compact('doctor','departments'));
    }


    public function updateDoctor(Request $request,$id){
        $request->validate([
            'name' => ['required'],
            'email' => ['required'],
            'phone' => ['required'],
            'department' => ['required'],
        ]);
        $doctor = Doctor::find($id);
        $doctor->name = $request->name;
        $doctor->email = $request->email;
        $doctor->phone = $request->phone;
        $doctor->department_id = $request->department;
        $doctor->save();
        return redirect()->route('admin.doctors.manage');
    }


    public function deleteDoctor($id){
        $doctor = Doctor::find($id);
        $doctor->delete();
        return redirect()->route('admin.doctors.manage');
    }
}
