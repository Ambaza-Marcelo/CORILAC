<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use \App\Models\Historique;

class HistoriqueController extends Controller
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
    	$historiques = DB::table('historiques')->orderBy('created_at','desc')->get();
    	return view('backend.pages.historique.index',compact('historiques'));
    }
    public function create()
    {
    	return view('backend.pages.historique.create');
    }

    public function store(Request $request)
    {
        //
        $request->validate([
            'description' => 'required',

        ]);

        $historique = new Historique();
        $historique->description = $request->description;
        $historique->save();

        session()->flash('success', 'Historique est créé !!');

        return redirect()->route('admin.historiques.index');
    }



    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Historique  $historique
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $historique = Historique::findOrFail($id);
        return view('backend.pages.historique.edit', compact('historique'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Historique  $historique
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $request->validate([
            'description' => 'required',

        ]);

        $historique = Historique::findOrFail($id);

        $historique->description = $request->description;
        $historique->save();
        session()->flash('success', 'Historique est modifié !!');
        return redirect()->route('admin.historiques.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Historique  $historique
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $historique = Historique::findOrFail($id);
        $historique->delete();
        session()->flash('success', 'Historique est supprimé !!');
        return redirect()->back();
    }
}
