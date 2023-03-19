<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\asset;


class OwnershipController extends Controller
{
    public function __construct(){
        //$this->middleware('auth', ['except' => 'index', 'show']);
    }
    
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $asset = Asset::all();
        return view('ownership.index', compact('asset'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('ownership.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|max:100',
            'description' => 'required|max:255',
            'value' => 'numeric',
            'purchased' => 'date',
        ]);
        $item = Asset::create($validated);
        
        return redirect('/owner')->with('success', 'owner is assigned to the asset');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $asset_id)
    {
        $ownership = Asset::find($asset_id);
        return view('ownership.show', array('ownership' => $ownership));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $asset_id)
    {
        $ownership = Asset::findOrFail($asset_id);
        return view('ownership.edit', compact('ownership'));
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $asset_id)
    {
        $validated = $request->validate([
            'name' => 'required|max:100',
            'description' => 'required|max:255',
            'value' => 'numeric',
            'purchased' => 'date',
        ]);
        Asset::whereId($asset_id)->update($validated);
        
        return redirect('/owner')->with('success', 'ownership is updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $asset_id)
    {
        $asset = Asset::findOrFail($asset_id);
        $asset->delete();
        
        return redirect('/owner')->with('success', 'owner for the asset is deleted successfully');
    }
}
