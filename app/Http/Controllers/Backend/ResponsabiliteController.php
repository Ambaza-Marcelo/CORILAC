<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use \App\Models\Responsabilite;

class ResponsabiliteController extends Controller
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
    	$responsabilites = DB::table('responsabilites')->orderBy('created_at','desc')->get();
    	return view('backend.pages.responsabilite.index',compact('responsabilites'));
    }
    public function create()
    {
    	return view('backend.pages.responsabilite.create');
    }

     public function store(Request $request)
    {
        //
        $request->validate([
            'description' => 'required',

        ]);

        $responsabilite = new Responsabilite();
        $responsabilite->description = $request->description;
        $responsabilite->save();

        session()->flash('success', 'Responsabilite est créé !!');

        return redirect()->route('admin.responsabilite.index');
    }



    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Responsabilite  $responsabilite
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $responsabilite = Responsabilite::findOrFail($id);
        return view('backend.pages.responsabilite.edit', compact('responsabilite'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Responsabilite  $responsabilite
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $request->validate([
            'description' => 'required',

        ]);

        $responsabilite = Responsabilite::findOrFail($id);

        $responsabilite->description = $request->description;
        $responsabilite->save();
        session()->flash('success', 'Responsabilite est modifié !!');
        return redirect()->route('admin.responsabilite.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Responsabilite  $responsabilite
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $responsabilite = Responsabilite::findOrFail($id);
        $responsabilite->delete();
        session()->flash('success', 'Responsabilite est supprimé !!');
        return redirect()->back();
    }
}
