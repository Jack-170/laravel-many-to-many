<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Hamcrest\Description;
use Illuminate\Http\Request;
use App\Models\technology;

class TechnologyController extends Controller
{
    public function getTest()
    {

        return response()->json([

            'status' => 'succes',
            'message' => 'This is a test message'

        ]);

    }

    public function getTechnologies()
    {

        $technologies = technology::paginate(3);
        return response()->json([

            'status' => 'succes',
            'technologies' => $technologies

        ]);


    }

    public function createTechnologies(Request $request)
    {
        $data = $request->all();

        $technology = new technology;

        $technology->name = $data['name'];

        $technology->description = $data['description'];

        $technology->save();

        return response()->json([

            'status' => 'succes',
            'technology' => $technology
        ]);


    }

}
