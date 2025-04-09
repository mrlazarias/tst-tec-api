<?php

namespace Tests\Unit;

use App\Models\Place;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PlaceModelTest extends TestCase
{
    use RefreshDatabase;

    public function test_slug_is_generated_from_name_when_creating()
    {
        $place = Place::factory()->create([
            'name' => 'Test Place'
        ]);

        $this->assertEquals('test-place', $place->slug);
    }

    public function test_slug_is_updated_when_name_is_changed()
    {
        $place = Place::factory()->create([
            'name' => 'Original Name'
        ]);

        $this->assertEquals('original-name', $place->slug);

        $place->name = 'Updated Name';
        $place->save();

        $this->assertEquals('updated-name', $place->slug);
    }

    public function test_fillable_attributes()
    {
        $place = new Place();
        
        $this->assertEquals(
            ['name', 'slug', 'city', 'state'],
            $place->getFillable()
        );
    }
} 