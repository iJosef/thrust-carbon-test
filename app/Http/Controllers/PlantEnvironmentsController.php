<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CreatePlantEnviromentRequest;

class PlantEnvironmentsController extends Controller
{
    public function create(CreatePlantEnviromentRequest $request)
    {
        $request->validated($request->all());

    }
}
