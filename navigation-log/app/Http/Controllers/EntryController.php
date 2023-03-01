<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CreateEntryRequest;
use App\Models\Entry;
use App\Models\Location;

class EntryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('index', ['entries' => Entry::with('location')->get()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('create', ['locations' => Location::get()]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateEntryRequest $request)

    {

        Entry::create([
            'entry' => $request['entry'],
            'locations_id' => $request['locations_id'],
            'title' => $request['title']
        ]);

        return redirect('./');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Entry $entry)
    {
        return view('/edit', ['entry' => $entry, 'locations' => Location::get()]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CreateEntryRequest $request, string $id)
    {
        

        Entry::find($id)->update([
            'entry' => $request['entry'],
            'locations_id' => $request['locations_id'],
            'title' => $request['title']
        ]);

        return redirect('./');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Entry::find($id)->delete();

        return redirect('./');
    }
}
