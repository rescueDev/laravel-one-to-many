<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Employee;
use App\Task;

class EmployeeController extends Controller
{
    public function index()
    {
        $employees = Employee::all();

        return view('pages.employees-index', compact('employees'));
    }
    public function show($id)
    {
        $employee = Employee::findOrFail($id);
        return view('pages.employee-show', compact('employee'));
        // dd($employees);
    }
    public function create()
    {

        // dd($employees);
        return view('pages.employees-create');
    }
    public function store(Request $request)
    {
        // dd($request->all());
        $newEmpl = Employee::create($request->all());

        return redirect()->route('employees.show', $newEmpl->id);
    }
}
