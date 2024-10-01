<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use \App\Models\CompteConjoint;

class CompteConjointController extends Controller
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
    	$compte_conjoint = DB::table('compte_conjoint')->orderBy('created_at','desc')->get();
    	return view('backend.pages.compte_conjoint.index',compact('compte_conjoint'));
    }

    public function create()
    {
    	return view('backend.pages.compte_conjoint.create');
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

        $storagepath = $request->file('image')->store('public/compte_conjoint');
        $fileName = basename($storagepath);

        $data = $request->all();
        $data['image'] = $fileName;

        AppelsOffre::create($data);
        session()->flash('success', 'Compte conjoint a été créé!!');

        return redirect()->route('admin.compte_conjoint.index');
    }



    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\AppelsOffre  $appels_offre
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $appels_offre = AppelsOffre::findOrFail($id);
        return view('backend.pages.compte_conjoint.edit', compact('appels_offre'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\AppelsOffre  $appels_offre
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

        $appels_offre = AppelsOffre::findOrFail($id);

        $data = $request->all();

        if($request->hasFile('image')){
            $file_path = "public/compte_conjoint".$appels_offre->image;
            Storage::delete($file_path);

            $storagepath = $request->file('image')->store('public/compte_conjoint');
            $fileName = basename($storagepath);
            $data['image'] = $fileName;

        }

        $appels_offre->fill($data);
        $appels_offre->save();
        session()->flash('success', 'Compte conjoint a été modifié!!');
        return redirect()->route('admin.compte_conjoint.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\AppelsOffre  $appels_offre
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $appels_offre = AppelsOffre::findOrFail($id);
        $file_path = "public/compte_conjoint/".$appels_offre->image;
            Storage::delete($file_path);
        $appels_offre->delete();
        session()->flash('success', 'Compte conjoint a été supprimé!!');
        return redirect()->back();
    }
}
