<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\project;
use App\Models\type;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::all();

        return view('pages.index', compact('projects'));
    }

    public function create()
    {
        $types = Type::all();

        return view('pages.create', compact('types'));
    }
    public function store(Request $request)
    {

        $data = $request->all();
        $type = Type::find($data['type_id']);

        $project = new project();

        $project->title = $data['title'];
        $project->type()->associate($type);

        $project->save();

        return redirect()->route('project.index');

    }


}
