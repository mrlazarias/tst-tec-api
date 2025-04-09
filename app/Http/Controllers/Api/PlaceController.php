<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Place;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class PlaceController extends Controller
{
    /**
     * Display a listing of the places.
     */
    public function index(Request $request)
    {
        $query = Place::query();

        if ($request->has('name')) {
            $query->where('name', 'like', '%' . $request->input('name') . '%');
        }

        return response()->json($query->get());
    }

    /**
     * Store a newly created place in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'state' => 'required|string|max:255',
        ]);

        $place = Place::create($validated);

        return response()->json($place, Response::HTTP_CREATED);
    }

    /**
     * Display the specified place.
     */
    public function show(Place $place)
    {
        return response()->json($place);
    }

    /**
     * Update the specified place in storage.
     */
    public function update(Request $request, Place $place)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'state' => 'required|string|max:255',
        ]);

        $place->update($validated);

        return response()->json($place);
    }

    /**
     * Remove the specified place from storage.
     */
    public function destroy(Place $place)
    {
        $place->delete();

        return response()->json(null, Response::HTTP_NO_CONTENT);
    }
}
