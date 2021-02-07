<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Task;
use App\Employee;
use App\Typology;

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
    public function edit($id)
    {
        $employees = Employee::all();
        $task = Task::findOrFail($id);
        // dd($task);
        return view('pages.task-edit', compact('task', 'employees'));
    }
    public function update(Request $request, $id)
    {
        // dd($request->all());
        $task = Task::findOrFail($id);
        $employee = Employee::findOrFail($request->get('employee_id'));
        $task->employee()->associate($employee);
        $task->update($request->all());


        return redirect()->route('tasks.index');
    }
    public function destroy($id)
    {

        $task = Task::findOrFail($id);
        // dd($task);
        $task->delete();

        return redirect()->route('tasks.index');
    }
}
