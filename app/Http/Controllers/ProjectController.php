<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
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

    public function show($id)
    {

        $project = Project::find($id);

        return view('pages.show', compact('project'));
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

        $img = $data['image'];

        $img_path = Storage::disk('public')->put('images', $img);



        $type = Type::find($data['type_id']);

        $project = new project();

        $project->title = $data['title'];
        $project->type()->associate($type);
        $project->image = $img_path;

        $project->save();

        $project->technologies()->attach($data['technology_id']);

        return redirect()->route('project.show', $project->id);

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
    $project = Project::findOrFail($id);
    $data = $request->all();

    // Aggiornamento dei dati del progetto
    $project->title = $data['title'];
    $project->type()->associate(Type::find($data['type_id']));

    // Aggiornamento dell'immagine, se necessario
    if ($request->hasFile('image')) {
        $img = $request->file('image');
        $img_path = Storage::disk('public')->put('images', $img);
        $project->image = $img_path;
    }

    $project->save();

    // Aggiornamento delle tecnologie associate al progetto
    $project->technologies()->sync($data['technology_id']);

    return redirect()->route('project.show', $project->id);
}


}


