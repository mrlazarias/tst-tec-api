<?php

namespace Tests\Feature\Api;

use App\Models\Place;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PlaceControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_can_list_all_places()
    {
        Place::factory()->count(3)->create();

        $response = $this->getJson('/api/places');

        $response->assertStatus(200)
            ->assertJsonCount(3);
    }

    public function test_can_filter_places_by_name()
    {
        Place::factory()->create(['name' => 'Test Place']);
        Place::factory()->create(['name' => 'Another Place']);

        $response = $this->getJson('/api/places?name=Test');

        $response->assertStatus(200)
            ->assertJsonCount(1)
            ->assertJsonFragment(['name' => 'Test Place']);
    }

    public function test_can_create_a_place()
    {
        $placeData = [
            'name' => 'New Place',
            'city' => 'New City',
            'state' => 'New State',
        ];

        $response = $this->postJson('/api/places', $placeData);

        $response->assertStatus(201)
            ->assertJsonFragment($placeData);

        $this->assertDatabaseHas('places', $placeData);
    }

    public function test_can_show_a_place()
    {
        $place = Place::factory()->create();

        $response = $this->getJson("/api/places/{$place->id}");

        $response->assertStatus(200)
            ->assertJsonFragment([
                'name' => $place->name,
                'city' => $place->city,
                'state' => $place->state,
            ]);
    }

    public function test_can_update_a_place()
    {
        $place = Place::factory()->create();
        $updateData = [
            'name' => 'Updated Place',
            'city' => 'Updated City',
            'state' => 'Updated State',
        ];

        $response = $this->putJson("/api/places/{$place->id}", $updateData);

        $response->assertStatus(200)
            ->assertJsonFragment($updateData);

        $this->assertDatabaseHas('places', $updateData);
    }

    public function test_can_delete_a_place()
    {
        $place = Place::factory()->create();

        $response = $this->deleteJson("/api/places/{$place->id}");

        $response->assertStatus(204);
        $this->assertDatabaseMissing('places', ['id' => $place->id]);
    }

    public function test_validation_works_for_creating_place()
    {
        $response = $this->postJson('/api/places', []);

        $response->assertStatus(422)
            ->assertJsonValidationErrors(['name', 'city', 'state']);
    }

    public function test_validation_works_for_updating_place()
    {
        $place = Place::factory()->create();

        $response = $this->putJson("/api/places/{$place->id}", []);

        $response->assertStatus(422)
            ->assertJsonValidationErrors(['name', 'city', 'state']);
    }
}
