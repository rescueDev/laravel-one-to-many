<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Task;
use App\Employee;

class TaskController extends Controller
{
    public function index()
    {
        $tasks = Task::all();
        // dd($tasks);
        return view('pages.tasks-index', compact('tasks'));
    }
    public function show($id)
    {
        $task = Task::findOrFail($id);
        return view('pages.task-show', compact('task'));
        // dd($task);
    }
    public function create()
    {
        $employees = Employee::all();
        // dd($employees);
        return view('pages.task-create', compact('employees'));
    }
    public function store(Request $request)
    {
        // dd($request->all());
        $newTask = Task::make($request->all());
        $employee = Employee::findOrFail($request->get('employee_id'));
        $newTask->employee()->associate($employee);
        $newTask->save();
        return redirect()->route('tasks.show', $newTask->id);
    }
}
