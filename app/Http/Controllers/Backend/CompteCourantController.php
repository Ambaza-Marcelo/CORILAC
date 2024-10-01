<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use \App\Models\CompteCourant;

class CompteCourantController extends Controller
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
    	$compte_courant = DB::table('compte_courant')->orderBy('created_at','desc')->get();
    	return view('backend.pages.compte_courant.index',compact('compte_courant'));
    }

    public function create()
    {
    	return view('backend.pages.compte_courant.create');
    }

    public function store(Request $request)
    {
        //
        $request->validate([
        	'date' => 'required',
            'title' => 'required',
            'description' => 'required',
            'image' => 'required|mimes:jpeg,jpg,png,svg|max:3072',

        ]);

        $storagepath = $request->file('image')->store('public/compte_courant');
        $fileName = basename($storagepath);

        $data = $request->all();
        $data['image'] = $fileName;

        CompteCourant::create($data);
        session()->flash('success', 'Compte courant a été créé!!');

        return redirect()->route('admin.compte_courant.index');
    }



    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\CompteCourant  $compte_courant
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $compte_courant = CompteCourant::findOrFail($id);
        return view('backend.pages.compte_courant.edit', compact('compte_courant'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\CompteCourant  $compte_courant
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

        ]);

        $compte_courant = CompteCourant::findOrFail($id);

        $data = $request->all();

        if($request->hasFile('image')){
            $file_path = "public/compte_courant".$compte_courant->image;
            Storage::delete($file_path);

            $storagepath = $request->file('image')->store('public/compte_courant');
            $fileName = basename($storagepath);
            $data['image'] = $fileName;

        }

        $compte_courant->fill($data);
        $compte_courant->save();
        session()->flash('success', 'Compte courant a été modifié!!');
        return redirect()->route('admin.compte_courant.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\CompteCourant  $compte_courant
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $compte_courant = CompteCourant::findOrFail($id);
        $file_path = "public/compte_courant/".$compte_courant->image;
            Storage::delete($file_path);
        $compte_courant->delete();
        session()->flash('success', 'Compte courant a été supprimé!!');
        return redirect()->back();
    }
}
