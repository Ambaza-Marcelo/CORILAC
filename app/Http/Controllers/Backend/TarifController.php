<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use \App\Models\Tarif;

class TarifController extends Controller
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
    	$tarifs = DB::table('tarifs')->orderBy('created_at','desc')->get();
    	return view('backend.pages.tarif.index',compact('tarifs'));
    }

    public function create()
    {
    	return view('backend.pages.tarif.create');
    }

    public function store(Request $request)
    {
        //
        $request->validate([
        	'date' => 'required',
            'title' => 'required',
            'file' => 'required|mimes:jpeg,jpg,png,svg,pdf|max:9216',

        ]);

        $storagepath = $request->file('file')->store('public/tarif');
        $fileName = basename($storagepath);

        $data = $request->all();
        $data['file'] = $fileName;

        Tarif::create($data);
        session()->flash('success', 'Tarif a été créé!!');

        return redirect()->route('admin.tarif.index');
    }



    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Tarif  $tarif
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $tarif = Tarif::findOrFail($id);
        return view('backend.pages.tarif.edit', compact('tarif'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Tarif  $tarif
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $request->validate([
        	'date' => 'required',
            'title' => 'required',
            'file' => 'required|mimes:jpeg,jpg,png,svg|max:3072',

        ]);

        $tarif = Tarif::findOrFail($id);

        $data = $request->all();

        if($request->hasFile('file')){
            $file_path = "public/tarif".$tarif->file;
            Storage::delete($file_path);

            $storagepath = $request->file('file')->store('public/tarif');
            $fileName = basename($storagepath);
            $data['file'] = $fileName;

        }

        $tarif->fill($data);
        $tarif->save();
        session()->flash('success', 'Tarif a été modifié!!');
        return redirect()->route('admin.tarif.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Tarif  $tarif
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $tarif = Tarif::findOrFail($id);
        $file_path = "public/tarif/".$tarif->file;
            Storage::delete($file_path);
        $tarif->delete();
        session()->flash('success', 'Tarif a été supprimé!!');
        return redirect()->back();
    }
}
