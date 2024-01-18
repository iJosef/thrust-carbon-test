<?php

namespace Tests\Unit;

use App\Services\PlantService;
use Tests\TestCase;
use App\Http\Resources\PlantResource;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CreatePlantTest extends TestCase
{
    use RefreshDatabase;

    // Create a plant with valid name and share values
    public function test_create_valid_name_and_share()
    {
        $payload =  [
            'name' => 'Plant A',
            'share' => true
        ];

        $plantService = new PlantService();
        $response = $plantService->create($payload);

        $jsonContent = json_decode($response->getContent(), true);

        $this->assertEquals(201, $response->getStatusCode());
        $this->assertEquals('Plant created successfully!', $jsonContent['message']);
        $this->assertInstanceOf(PlantResource::class, new PlantResource($jsonContent['data']['plant']));
    }

        // Return a success response with status code 201 and the created plant resource
    public function test_create_success_response()
    {
        $payload =  [
            'name' => 'Plant A',
            'share' => true
        ];

        $plantService = new PlantService();
        $response = $plantService->create($payload);

        $jsonContent = json_decode($response->getContent(), true);

        $this->assertEquals(201, $response->getStatusCode());
        $this->assertEquals('Plant created successfully!', $jsonContent['message']);
        $this->assertInstanceOf(PlantResource::class, new PlantResource($jsonContent['data']['plant']));
    }

        // Create a plant with empty payload
    public function test_create_empty_payload()
    {
        $payload =  [];

        $response = $this->postJson('/api/v1/plants', $payload);

        $response->assertJson([
            'message' => $response['message']
        ]);
    }

        // Create a plant with missing name value
    public function test_create_missing_name()
    {
        $payload =  [
            'share' => true
        ];

        $response = $this->postJson('/api/v1/plants', $payload);

        $response->assertJson([
            'message' => $response['message']
        ]);
    }

        // Create a plant with missing share value
    public function test_create_missing_share()
    {
        $payload =  [
            'name' => 'Plant A'
        ];

        $response = $this->postJson('/api/v1/plants', $payload);

        $response->assertJson([
            'message' => $response['message']
        ]);
    }

        // Create a plant with invalid share value (not a boolean)
    public function test_create_invalid_share()
    {
        $payload =  [
            'name' => 'Plant A',
            'share' => 'invalid'
        ];

        $response = $this->postJson('/api/v1/plants', $payload);

        $response->assertStatus(422)
        ->assertJson([
            'message' => $response['message']
        ]);
    }

}
