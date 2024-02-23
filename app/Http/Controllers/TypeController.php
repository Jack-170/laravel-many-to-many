<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\type;

class TypeController extends Controller
{
    public function index()
    {
        $types = Type::all();
        return view('pages.types', compact('types'));
    }
}
