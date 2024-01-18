<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\PlantService;
use App\Http\Requests\CreatePlantRequest;

class PlantsController extends Controller
{
    /** @var PlantService */
    protected $service;

    public function __construct(PlantService $service)
    {
        $this->service = $service;
    }

    public function create(CreatePlantRequest $request)
    {
        $request->validated($request->all());

        return $this->service->create($request);
    }
}
