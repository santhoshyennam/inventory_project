<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Asset;


class AssetController extends Controller
{
    public function __construct(){
        //$this->middleware('auth', ['except' => 'index', 'show']);
    }
    
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $assets = Asset::all();
        return view('asset.index', compact('assets'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('asset.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        try {
            $validated = $request->validate([
                'name' => 'required|max:100',
                'description' => 'required|max:255',
                'value' => 'numeric',
                'purchased' => 'date',
            ]);
            $new_asset = Asset::create($validated);
            
            return redirect('/asset')->with('asset_created', $new_asset);
            
        }
        catch( Exception $e) {
            return redirect()->back()->withErrors($e->errors())->withInput();
        }
       
    }

    /**
     * Display the specified resource.
     */
    public function show(string $asset_id)
    {
        $asset = Asset::findOrFail($asset_id);
        return view('asset.show', array('asset' => $asset));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $asset_id)
    {
        $asset = Asset::findOrFail($asset_id);
        return view('asset.edit', compact('asset'));   
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $asset_id)
    {

        try {
                $validated = $request->validate([
                    'name' => 'required|max:100',
                    'description' => 'required|max:255',
                    'value' => 'numeric',
                    'purchased' => 'date',
                ]);
                $updated_asset = Asset::whereId($asset_id)->update($validated);
                return redirect('/asset')->with('asset_updated',$validated);
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
        $asset = Asset::findOrFail($asset_id);
        $asset->delete();
        
        return redirect('/asset')->with('asset_deleted',$asset);
    }
}
