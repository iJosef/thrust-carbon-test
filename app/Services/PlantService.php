<?php

namespace App\Services;

use App\Models\Plant;
use App\Traits\HttpResponses;
use App\Http\Resources\PlantResource;

class PlantService
{
    use HttpResponses;

    public function create($payload)
    {
        $plant = Plant::create([
            'name' => $payload['name'],
            'share' => $payload['share']
        ]);

        return $this->success([
            'plant' => new PlantResource($plant)
        ], 201, 'Plant created successfully!');
    }
}
