<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\project;
use App\Models\type;
use App\Models\technology;

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
        $technologies = Technology::all();

        return view('pages.create', compact('types', 'technologies'));
    }
    public function store(Request $request)
    {

        $data = $request->all();
        $type = Type::find($data['type_id']);

        $project = new project();

        $project->title = $data['title'];
        $project->type()->associate($type);

        $project->save();

        $project->technologies()->attach($data['technology_id']);

        return redirect()->route('project.index');

    }

    public function edit($id)
    {

        $project = Project::find($id);

        $types = Type::all();
        $technologies = Technology::all();

        return view('pages.edit', compact('project', 'technologies', 'types'));
    }

    public function update(Request $request, $id)
    {

        $data = $request->all();
        $type = Type::find($data['type_id']);

        $project = Project::find($id);

        $project->title = $data['title'];
        $project->type()->associate($type);

        $project->save();

        $project->technologies()->sync($data['technology_id']);

        return redirect()->route('project.index');

    }

}
