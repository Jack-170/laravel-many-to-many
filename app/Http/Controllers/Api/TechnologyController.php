<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TechnologyController extends Controller
{
    public function getTest()
    {

        return response()->json([

            'status' => 'succes',
            'message' => 'This is a test message'

        ]);

    }

}
