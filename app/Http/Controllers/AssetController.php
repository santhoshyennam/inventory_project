<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Asset;
use Illuminate\Support\Facades\Auth;


class AssetController extends Controller
{
    public function __construct(){
    }
    
    /**
     * Display a listing of Assets.
     */
    public function index()
    {
        $assets = Asset::all();
        return view('asset.index', compact('assets'));
    }

    /**
     * Show the form for creating a new Asset.
     */
    public function create()
    {
        if(!Auth::check()){
            return view('auth.login');
        }
        return view('asset.create');
    }

    /**
     * Store a newly created Asset in storage.
     */
    public function store(Request $request)
    {

        try {
            if(!Auth::check()){
                return response('Unauthorized',401);
            }
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
     * Display the specified Asset.
     */
    public function show(string $asset_id)
    {
        $asset = Asset::findOrFail($asset_id);
        return view('asset.show', array('asset' => $asset));
    }

    /**
     * Show the form for editing the specified Asset.
     */
    public function edit(string $asset_id)
    {
        if(!Auth::check()){
            return view('auth.login');
        }
        $asset = Asset::findOrFail($asset_id);
        return view('asset.edit', compact('asset'));   
    }

    /**
     * Update the specified Asset in storage.
     */
    public function update(Request $request, string $asset_id)
    {

        try {
            if(!Auth::check()){
                return response('Unauthorized',401);
            }
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
     * Remove the specified Asset from storage.
     */
    public function destroy(string $asset_id)
    {
        if(!Auth::check()){
            return response('Unauthorized',401);
        }
        $asset = Asset::findOrFail($asset_id);
        $asset->delete();
        
        return redirect('/asset')->with('asset_deleted',$asset);
    }
}
