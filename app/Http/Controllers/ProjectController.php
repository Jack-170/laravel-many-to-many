<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\project;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::all();

        return view('pages.index', compact('projects'));
    }
}
