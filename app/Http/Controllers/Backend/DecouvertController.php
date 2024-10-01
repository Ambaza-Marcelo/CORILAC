<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use \App\Models\Decouvert;

class DecouvertController extends Controller
{
    //
    public $user;

    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            $this->user = Auth::guard('admin')->user();
            return $next($request);
        });
    }

    public function index()
    {
    	$decouverts = DB::table('decouvert')->orderBy('created_at','desc')->get();
    	return view('backend.pages.decouvert.index',compact('decouverts'));
    }

    public function create()
    {
    	return view('backend.pages.decouvert.create');
    }

    public function store(Request $request)
    {
        //
        $request->validate([
        	'date' => 'required',
            'title' => 'required',
            'description' => 'required',
            'image' => 'required|mimes:jpeg,jpg,png,svg|max:3072',
            'caracteristique.*' => 'required',

        ]);

        $storagepath = $request->file('image')->store('public/decouvert');
        $fileName = basename($storagepath);

        $data = $request->all();
        $data['image'] = $fileName;

        Decouvert::create($data);
        session()->flash('success', 'Decouvert a été créé!!');

        return redirect()->route('admin.decouvert.index');
    }



    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Decouvert  $decouvert
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $decouvert = Decouvert::findOrFail($id);
        return view('backend.pages.decouvert.edit', compact('decouvert'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Decouvert  $decouvert
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $request->validate([
        	'date' => 'required',
            'title' => 'required',
            'description' => 'required',
            'image' => 'required|mimes:jpeg,jpg,png,svg|max:3072',
            'caracteristique.*' => 'required',

        ]);

        $decouvert = Decouvert::findOrFail($id);

        $data = $request->all();

        if($request->hasFile('image')){
            $file_path = "public/decouvert".$decouvert->image;
            Storage::delete($file_path);

            $storagepath = $request->file('image')->store('public/decouvert');
            $fileName = basename($storagepath);
            $data['image'] = $fileName;

        }

        $decouvert->fill($data);
        $decouvert->save();
        session()->flash('success', 'Decouvert a été modifié!!');
        return redirect()->route('admin.decouvert.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Decouvert  $decouvert
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $decouvert = Decouvert::findOrFail($id);
        $file_path = "public/decouvert/".$decouvert->image;
            Storage::delete($file_path);
        $decouvert->delete();
        session()->flash('success', 'Decouvert a été supprimé!!');
        return redirect()->back();
    }
}
