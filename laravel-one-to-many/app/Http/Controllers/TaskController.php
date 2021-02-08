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
        $typologies = Typology::all();
        // dd($employees);
        return view('pages.task-create', compact('employees', 'typologies'));
    }
    public function store(Request $request)
    {
        $data = $request->all();
        $newTask = Task::make($data);

        $employee = Employee::findOrFail($data['employee_id']);
        $newTask->employee()->associate($employee);
        $newTask->save();

        $typologies = Typology::findOrFail($data['typologies']);
        $newTask->typologies()->attach($typologies);

        // dd($newTask);



        return redirect()->route('tasks.show', $newTask->id);
    }
    public function edit($id)
    {
        $typologies = Typology::all();
        $employees = Employee::all();


        $task = Task::findOrFail($id);
        // dd($task);
        return view('pages.task-edit', compact('task', 'employees', 'typologies'));
    }
    public function update(Request $request, $id)
    {
        // dd($request->all());
        $data = $request->all();

        $task = Task::findOrFail($id);
        $employee = Employee::findOrFail($data['employee_id']);

        $task->update($data);

        $task->save();

        $task->employee()->associate($employee);
        $task->update($request->all());


        $typologies = Typology::findOrFail($data['typologies']);
        $task->typologies()->sync($typologies);

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
