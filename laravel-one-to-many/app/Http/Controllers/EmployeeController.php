<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Employee;

class EmployeeController extends Controller
{
    public function index()
    {
        $employees = Employee::all();
        // dd($tasks);
        return view('pages.employees-index', compact('employees'));
    }
    public function show($id)
    {
        $employees = Employee::findOrFail($id);
        return view('pages.employees-show', compact('employees'));
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
