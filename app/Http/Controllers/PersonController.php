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
        try {
            $validated = $request->validate([
                'first_name' => 'required|max:100',
                'last_name' => 'required|max:100',
                'date_of_birth' => 'required|max:10',
                'email' => 'required|max:50',
            ]);
            $new_person = Person::create($validated);
            
            return redirect('/person')->with('person_created', $new_person);
        }
        catch( Exception $e) {
            return redirect()->back()->withErrors($e->errors())->withInput();
        }
      
    }

    /**
     * Display the specified resource.
     */
    public function show(string $person_id)
    {
        $person = Person::findOrFail($person_id);
        return view('person.show', array('person' => $person));
    }


    /*
    if (!file_exists($file)) {
        return response('File not found', 404);
    }
    useful code for http response to other frontends or backends
    */
    
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $person_id)
    {
        $person = person::findOrFail($person_id);
        return view('person.edit', compact('person'));     
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $person_id)
    {
        try {
        $validated = $request->validate([
            'first_name' => 'required|max:100',
            'last_name' => 'required|max:100',
            'date_of_birth' => 'required|max:10',
            'email' => 'required|max:50',
        ]);
        $updated_person = Person::whereId($person_id)->update($validated);
        return redirect('/person')->with('person_updated',$validated);
        }
        catch( Exception $e) {
            return redirect()->back()->withErrors($e->errors())->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $person_id)
    {
        $person = Person::findOrFail($person_id);
        $person->delete();
        
        return redirect('/person')->with('person_deleted', $person);
    }
}
