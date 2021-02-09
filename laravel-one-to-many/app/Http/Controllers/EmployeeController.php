<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Employee;
use App\Task;
use Illuminate\Support\Facades\Validator;

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
        $data = $request->all();
        Validator::make($data, [
            'name' => 'required|min:3|max:60|alpha',
            'lastname' => 'required|min:3|max:60|alpha',
            'dateOfBirth' => 'required|date|before:2003-01-01'

        ])->validate();
        $newEmpl = Employee::create($request->all());
        // dd($newEmpl);

        return redirect()->route('employees.show', $newEmpl->id);
    }
    public function edit($id)
    {
        $employee = Employee::findOrFail($id);
        // dd($employee);
        return view('pages.employee-edit', compact('employee'));
    }
    public function update(Request $request, $id)
    {
        // dd($request->all());
        $data = $request->all();

        Validator::make($data, [
            'name' => 'required|min:3|max:60|alpha',
            'lastname' => 'required|min:3|max:60|alpha',
            'dateOfBirth' => 'required|date|before:2003-01-01'

        ])->validate();
        $employee = Employee::findOrFail($id);
        $employee->update($request->all());
        return redirect()->route('employees.show', $employee->id);
    }
    public function destroy($id)
    {
        $employee = Employee::findOrFail($id);
        // dd($employee);
        $employee->delete();
        return redirect()->route('employees.index');
    }
}
