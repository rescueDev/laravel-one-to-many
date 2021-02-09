<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Task;
use App\Employee;
use App\Typology;

use Illuminate\Support\Facades\Validator;


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
        Validator::make($data, [
            'title' => 'required|min:5|max:60',
            'description' => 'required|min:5|max:65000',
            'priority' => 'required|numeric|digits_between:1,5'
        ])->validate();
        $newTask = Task::make($data);

        // dd($newTask);

        // dd(gettype($data['employee_id']));
        if ($data['employee_id'] != 'null') {

            $employee = Employee::findOrFail($data['employee_id']);
            $newTask->employee()->associate($employee);
        }
        $newTask->save();
        $typologies = Typology::findOrFail($data['typologies']);
        $newTask->typologies()->attach($typologies);
        // dd($newTask);

        // dd($newTask);



        return redirect()->route('tasks.index');
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

        Validator::make($data, [
            'title' => 'required|min:5|max:60',
            'description' => 'required|min:65000',
            'priority' => 'required|numeric|digits_between:1,5'
        ])->validate();

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

        Task::destroy($id);
        // dd($task);
        // $task->destroy();

        return redirect()->route('tasks.index');
    }
    public function restore(Request $request)
    {
        $data = $request->all();
        // dd($data);
        $id = $data['title'];

        Task::where('title', $id)->restore();
        return redirect()->route('tasks.index');
    }
}
