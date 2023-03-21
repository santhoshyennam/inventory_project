<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Asset;
use App\Models\Person;
use Illuminate\Support\Carbon;


class OwnershipController extends Controller
{
    public function __construct(){
        $this->middleware('auth', ['except' => 'index', 'show']);
    }
    
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $assets = Asset::all();
        return view('ownership.index', compact('assets'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $assets = Asset::all();
        $persons = Person::all();
        return view('ownership.create',array('assets' => $assets, "persons" => $persons));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        try {
            if ($request->input('id') == NULL) {
                return redirect()->back()->withErrors(['Asset' => 'Asset is required']);
            }
            $validated = $request->validate([
                'person_id' => 'required',
                'id' => 'required'
            ]);
            $new_ownership = Asset::whereId($request->input('id'))->update(['person_id' => $request->input('person_id'), 'purchased' => Carbon::now()]);
            
            return redirect('/owner')->with('ownership_created', $new_ownership);
            
        }
        catch( Exception $e) {
            return redirect()->back()->withErrors($e->errors())->withInput();
        }
       
    }

    /**
     * Display the specified resource.
     */
    // public function show(string $asset_id)
    // {
    //     $ownership = Asset::with('person')->findOrFail($asset_id);
    //     return view('ownership.show', array('ownership' => $ownership));
    // }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $asset_id)
    {
        $ownership = Asset::with('person')->findOrFail($asset_id);
        $persons = Person::all();
        return view('ownership.edit',array('asset' => $ownership, "persons" => $persons));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $asset_id)
    {

        try {
                if ($asset_id == NULL) {
                    return redirect()->back()->withErrors(['Asset' => 'Asset is required']);
                }
                $validated = $request->validate([
                    'person_id' => 'required',
                ]);
                $updated_ownership = Asset::whereId($asset_id)->update(['person_id' => $request->input('person_id'), 'purchased' => Carbon::now()]);
                return redirect('/owner')->with('ownership_updated',$validated);
            }
            catch( Exception $e) {
                return redirect()->back()->withErrors($e->errors())->withInput();
            }
      
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $asset_id)
    {
        $updated_ownership = Asset::whereId($asset_id)->update(['person_id' => NULL, 'purchased' => NULL]);
        return redirect('/owner')->with('ownership_deleted',$updated_ownership);
    }
}
