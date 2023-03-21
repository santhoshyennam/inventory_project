<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Person;
use App\Http\Middleware\PublicAccessMiddleware;
use Illuminate\Support\Facades\Auth;


class PersonController extends Controller
{
    public function __construct(){
    }    

    /**
     * Display a listing of persons.
     */
    public function index()
    {
        $persons = Person::all();
        return view('person.index', compact('persons'));
    }

    /**
     * Show the form for creating a new person.
     */
    public function create()
    {
        if(!Auth::check()){
            return view('auth.login');
        }
        return view('person.create');
    }

    /**
     * Store a newly created person in storage.
     */
    public function store(Request $request)
    {
        try {
            if(!Auth::check()){
                return response('Unauthorized',401);
            }
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
     * Display the specified person.
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
     * Show the form for editing the person.
     */
    public function edit(string $person_id)
    {
        if(!Auth::check()){
            return view('auth.login');
        }
        $person = person::findOrFail($person_id);
        return view('person.edit', compact('person'));     
    }

    /**
     * Update the person in storage.
     */
    public function update(Request $request, string $person_id)
    {
        try {

            if(!Auth::check()){
                return response('Unauthorized',401);
            }  
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
     * Remove the person from storage.
     */
    public function destroy(string $person_id)
    {
        if(!Auth::check()){
            return response('Unauthorized',401);
        }
        $person = Person::findOrFail($person_id);
        $person->delete();
        
        return redirect('/person')->with('person_deleted', $person);
    }
}
