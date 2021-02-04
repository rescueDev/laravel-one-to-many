<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Task;

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
}
