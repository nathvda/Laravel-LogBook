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
            'title' => $request['title']
        ]);

        $info->save;
        
        foreach($request['category_id'] as $category){

            if(count(EntryCategory::where('entry_id',$info->id)->where('category_id',$category)->get()) === 0){
            EntryCategory::create([
            'entry_id' => $info->id,
            'category_id' => $category
            ]);
        }
        };

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
        return view('/edit', ['entry' => $entry, 'categories' => Category::get(), 'locations' => Location::get(), 'dropdownLocations' => Location::get()]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CreateEntryRequest $request, string $id)
    {
        

        $info = Entry::find($id)->update([
            'entry' => $request['entry'],
            'locations_id' => $request['locations_id'],
            'user_id' => $request['user_id'],
            'title' => $request['title']
        ]);

    foreach($request['category_id'] as $category) 
    { 
        if(count(EntryCategory::where('entry_id',$id)->where('category_id',$category)->get()) === 0){
        
        EntryCategory::create([
            'entry_id' => $id,
            'category_id' => $category
        ]);
    }
        }

        return redirect('./');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Entry::find($id)->delete();

        return redirect('./')->with('success', 'delete properly');
    }

    public function random(){

        $random = Entry::inRandomOrder()->first();

        return view('random', ['entries' => $random, 'dropdownLocations' => Location::get()]);
    }
}
