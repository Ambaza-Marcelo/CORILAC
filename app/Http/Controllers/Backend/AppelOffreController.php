<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use \App\Models\AppelsOffre;

class AppelOffreController extends Controller
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
    	$appels_offres = DB::table('appels_offres')->orderBy('created_at','desc')->get();
    	return view('backend.pages.appels_offres.index',compact('appels_offres'));
    }
    public function create()
    {
    	return view('backend.pages.appels_offres.create');
    }

     public function store(Request $request)
    {
        //
        $request->validate([
        	'date' => 'required',
        	'code' => 'required',
            'title' => 'required',
            'description' => 'required',
            'file' => 'required|mimes:jpeg,jpg,png,svg|max:3072',

        ]);

        $storagepath = $request->file('file')->store('public/appels_offres');
        $fileName = basename($storagepath);

        $data = $request->all();
        $data['file'] = $fileName;

        AppelsOffre::create($data);
        session()->flash('success', 'Appels d\'Offre a été créé!!');

        return redirect()->route('admin.appels_offres.index');
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
        return view('backend.pages.appels_offres.edit', compact('appels_offre'));
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
        	'code' => 'required',
            'title' => 'required',
            'description' => 'required',
            'file' => 'required|mimes:jpeg,jpg,png,svg|max:3072',

        ]);

        $appels_offre = AppelsOffre::findOrFail($id);

        $data = $request->all();

        if($request->hasFile('file')){
            $file_path = "public/appels_offres".$appels_offre->file;
            Storage::delete($file_path);

            $storagepath = $request->file('file')->store('public/appels_offres');
            $fileName = basename($storagepath);
            $data['file'] = $fileName;

        }

        $appels_offre->fill($data);
        $appels_offre->save();
        session()->flash('success', 'Appels d\'offres a été modifié!!');
        return redirect()->route('admin.appels_offres.index');
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
        $file_path = "public/appels_offres/".$appels_offre->file;
            Storage::delete($file_path);
        $appels_offre->delete();
        session()->flash('success', 'Appels d\'offres a été supprimé!!');
        return redirect()->back();
    }
}
