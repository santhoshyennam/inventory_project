<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Asset;
use App\Models\Person;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;


class OwnershipController extends Controller
{
    public function __construct(){
    }
    
    /**
     * Display a listing of the Assets which doesn't have owner.
     */
    public function index()
    {
        $assets = Asset::all();
        return view('ownership.index', compact('assets'));
    }

    /**
     * Show the form for creating a new Ownership.
     */
    public function create()
    {
        if(!Auth::check()){
            return view('auth.login');
        }
        $assets = Asset::all();
        $persons = Person::all();
        return view('ownership.create',array('assets' => $assets, "persons" => $persons));
    }

    /**
     * Store a newly created Ownership in storage.
     */
    public function store(Request $request)
    {

        try {
            if(!Auth::check()){
                return response('Unauthorized',401);
            }
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

    public function show(string $asset_id)
    {
        return response('File not found', 404); 
    }

    /**
     * Show the form for editing the Owner for particular Asset.
     */
    public function edit(string $asset_id)
    {
        if(!Auth::check()){
            return view('auth.login');
        }
        $ownership = Asset::with('person')->findOrFail($asset_id);
        $persons = Person::all();
        return view('ownership.edit',array('asset' => $ownership, "persons" => $persons));
    }

    /**
     * Update the Ownership in storage.
     */
    public function update(Request $request, string $asset_id)
    {

        try {
                if(!Auth::check()){
                    return response('Unauthorized',401);
                }
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
     * Remove the owner of particular Asset.
     */
    public function destroy(string $asset_id)
    {
        if(!Auth::check()){
            return response('Unauthorized',401);
        }
        $updated_ownership = Asset::whereId($asset_id)->update(['person_id' => NULL, 'purchased' => NULL]);
        return redirect('/owner')->with('ownership_deleted',$updated_ownership);
    }
}
