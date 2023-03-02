<?php

namespace App\Http\Controllers;

use App\Models\Entry;
use App\Models\Category;
use App\Models\Location;
use Illuminate\Http\Request;
use App\Http\Requests\CreateEntryRequest;
use App\Models\EntryCategory;

class EntryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Entry $entry)
    {

        $entry = Entry::latest();

       if (request('search')){
        $entry
            ->where('title', 'like', '%'.request('search').'%')
            ->orWhere('entry','like', '%'.request('search').'%');
       }
        return view('index', ['entries' => $entry->paginate(5), 'dropdownLocations' => Location::get()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('create', ['locations' => Location::get(), 'categories' => Category::get(), 'dropdownLocations' => Location::get()]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateEntryRequest $request)

    {

        $info =  Entry::create([
            'entry' => $request['entry'],
            'locations_id' => $request['locations_id'],
            'user_id' => $request['user_id'],
            'category_id' => $request['category_id'],
            'title' => $request['title']
        ]);

        $info->save;

        EntryCategory::create([
            'entry_id' => $info->id,
            'category_id' => $request['category_id']
        ]);

        session()->flash('success', 'your entry has been created');

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
        return view('/edit', ['entry' => $entry, 'locations' => Location::get(), 'dropdownLocations' => Location::get()]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CreateEntryRequest $request, string $id)
    {
        

        Entry::find($id)->update([
            'entry' => $request['entry'],
            'locations_id' => $request['locations_id'],
            'user_id' => $request['user_id'],
            'category_id' => $request['category_id'],
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
