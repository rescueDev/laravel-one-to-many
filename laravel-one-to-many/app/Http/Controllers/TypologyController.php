<?php

namespace App\Http\Controllers;

use App\Typology;
use Illuminate\Http\Request;
use App\Employee;
use App\Task;

class TypologyController extends Controller
{
    public function index()
    {
        $typologies = Typology::all();
        return view('pages.typ-index', compact('typologies'));
    }
    public function show($id)
    {
        $typology = Typology::findOrFail($id);
        return view('pages.typ-show', compact('typology'));
    }
    public function create()
    {
        $tasks = Task::all();
        return view('pages.typ-create', compact('tasks'));
    }
    public function store(Request $request)
    {
        // dd($request->all());
        $data = $request->all();
        $newTypology = Typology::create($request->all());
        $tasks = Task::findOrFail($data['tasks']);
        $newTypology->tasks()->attach($tasks);

        // dd($newTypology);

        return redirect()->route('typologies.show', $newTypology->id);
    }
    public function edit($id)
    {
        $tasks = Task::all();
        $typology = Typology::findOrFail($id);
        return view('pages.typ-edit', compact('tasks', 'typology'));
    }
    public function update(Request $request, $id)
    {
        $data = $request->all();
        $typology = Typology::findOrFail($id);
        $typology->update($data);
        $tasks = Task::findOrFail($data['tasks']);
        $typology->tasks()->sync($tasks);
        // dd($typology);
        return redirect()->route('typologies.show', $typology->id);
    }
}
