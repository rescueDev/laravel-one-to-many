<?php

namespace App\Http\Controllers;

use App\Typology;
use Illuminate\Http\Request;

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
        return view('pages.typ', compact('typology'));
    }
}
