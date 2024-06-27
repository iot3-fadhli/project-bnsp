<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;

class EmployeeController extends Controller
{
    public function index(Request $request)
    {
        $employees = Employee::all();
        return view('employee.index', compact('employees'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'address' => 'required',
            'position' => 'required',
        ]);
        $employee = Employee::create($validated);
        return response()->json(['message' => 'Pegawai Berhasil Ditambahkan', 'employee' => $employee]);
    }
}
