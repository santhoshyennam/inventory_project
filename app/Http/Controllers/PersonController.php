<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Person;


class PersonController extends Controller
{
    public function __construct(){
        //$this->middleware('auth', ['except' => 'index', 'show']);
    }
    
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $persons = Person::all();
        return view('person.index', compact('persons'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('person.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'first_name' => 'required|max:100',
            'last_name' => 'required|max:100',
            'date_of_birth' => 'required|date',
            'email' => 'required',
        ]);
        $new_person = Person::create($validated);
        
        return redirect('/person')->with('success', 'new person is added!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $person_id)
    {
        $person = Person::find($person_id);
        return view('person.show', array('person' => $person));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $person_id)
    {
        // $person = person::findOrFail($person_id);
        return view('person.edit');
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $person_id)
    {
        $validated = $request->validate([
            'name' => 'required|max:100',
            'description' => 'required|max:255',
            'value' => 'numeric',
            'purchased' => 'date',
        ]);
        Person::whereId($person_id)->update($validated);
        
        return redirect('/person')->with('success', 'Person is updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $person_id)
    {
        $person = Person::findOrFail($person_id);
        $person->delete();
        
        return redirect('/person')->with('success', 'Person is deleted from inventory');
    }
}
