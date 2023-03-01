<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CreateLocationRequest;
use App\Models\Location;
use App\Models\Entry;

class LocationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('/locations/create', ['dropdownLocations' => Location::get()] );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateLocationRequest $request)
    {

        Location::create([
            'location' => $request['location']
        ]);

        return redirect('/entry/create');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return view('/locations/index', ['locations' => Location::find($id), 'dropdownLocations' => Location::get()]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
