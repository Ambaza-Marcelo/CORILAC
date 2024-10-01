<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use \App\Models\CompteDevise;

class CompteDeviseController extends Controller
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
    	$compte_devise = DB::table('compte_devise')->orderBy('created_at','desc')->get();
    	return view('backend.pages.compte_devise.index',compact('compte_devise'));
    }

    public function create()
    {
    	return view('backend.pages.compte_devise.create');
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

        $storagepath = $request->file('image')->store('public/compte_devise');
        $fileName = basename($storagepath);

        $data = $request->all();
        $data['image'] = $fileName;

        CompteDevise::create($data);
        session()->flash('success', 'Compte devise a été créé!!');

        return redirect()->route('admin.compte_devise.index');
    }



    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\CompteDevise  $compte_devise
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $compte_devise = CompteDevise::findOrFail($id);
        return view('backend.pages.compte_devise.edit', compact('compte_devise'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\CompteDevise  $compte_devise
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

        $compte_devise = CompteDevise::findOrFail($id);

        $data = $request->all();

        if($request->hasFile('image')){
            $file_path = "public/compte_devise".$compte_devise->image;
            Storage::delete($file_path);

            $storagepath = $request->file('image')->store('public/compte_devise');
            $fileName = basename($storagepath);
            $data['image'] = $fileName;

        }

        $compte_devise->fill($data);
        $compte_devise->save();
        session()->flash('success', 'Compte devise a été modifié!!');
        return redirect()->route('admin.compte_devise.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\CompteDevise  $compte_devise
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $compte_devise = CompteDevise::findOrFail($id);
        $file_path = "public/compte_devise/".$compte_devise->image;
            Storage::delete($file_path);
        $compte_devise->delete();
        session()->flash('success', 'Compte devise a été supprimé!!');
        return redirect()->back();
    }
}
