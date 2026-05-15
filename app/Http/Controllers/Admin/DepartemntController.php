<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Department;
use App\Models\Doctor;

class DepartemntController extends Controller
{
    public function createDapartment()
    {
        return view('admin.department.create');
    }


    public function storeDapartment(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255', 'unique:departments,name'],
        ]);

       Department::create([
            'name' => $request->name,
        ]);

        return redirect()->route('admin.departments.manage')->with('success', 'Department created successfully');
    }



    public function manageDepartments()
    {
        $departments = Department::all();

        return view('admin.department.manage', compact('departments'));
    }


    public function editDepartment($id)
    {
        $department = Department::findOrFail($id);

        return view('admin.department.edit', compact('department'));
    }


    public function updateDepartment(Request $request, $id)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255', 'unique:departments,name,' . $id],
        ]);

        $department = Department::findOrFail($id);

        $department->name = $request->name;

        $department->save();

        return redirect()
            ->route('admin.departments.manage')
            ->with('success', 'Department updated successfully');
    }


    public function deleteDepartment($id)
    {
        $department = Department::findOrFail($id);

        // check if doctors linked to this department
        $doctorCount = Doctor::where('department_id', $id)->count();

        if ($doctorCount > 0) {
            return redirect()
                ->route('admin.departments.manage')
                ->with('error', 'Cannot delete department because doctors are linked to it');
        }

        $department->delete();

        return redirect()
            ->route('admin.departments.manage')
            ->with('success', 'Department deleted successfully');
    }
}
