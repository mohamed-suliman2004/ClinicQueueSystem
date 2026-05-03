<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Doctor;
use App\Models\Department;

class IndexController extends Controller
{
      public function index(){
        // Get current month appointments
        $currentMonth = now()->month;
        $currentYear = now()->year;
        return view('admin.index.index', [
            'users' => User::count(),
            'doctors' => Doctor::count(),
            'departments' => Department::count(),
            'patients' => User::where('role', 'patient')->count(),
            'receptionists' => User::where('role', 'reception')->count(),
            'recentUsers' => User::latest()->take(5)->get(),
            'recentDoctors' => Doctor::get(),
        ]);
    }
}
