<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use \App\Models\Actionnariat;

class ActionnariatController extends Controller
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
    	$actionnariats = DB::table('actionnariats')->orderBy('created_at','desc')->get();
    	return view('backend.pages.actionnariat.index',compact('actionnariats'));
    }
    public function create()
    {
    	return view('backend.pages.actionnariat.create');
    }

     public function store(Request $request)
    {
        //
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'percent' => 'required',

        ]);

        $actionnariat = new Actionnariat();
        $actionnariat->title = $request->title;
        $actionnariat->percent = $request->percent;
        $actionnariat->description = $request->description;
        $actionnariat->save();

        session()->flash('success', 'Actionnariat est créé !!');

        return redirect()->route('admin.actionnariat.index');
    }



    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Actionnariat  $actionnariat
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $actionnariat = Actionnariat::findOrFail($id);
        return view('backend.pages.actionnariat.edit', compact('actionnariat'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Actionnariat  $actionnariat
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'percent' => 'required',

        ]);

        $actionnariat = Actionnariat::findOrFail($id);

        $actionnariat->title = $request->title;
        $actionnariat->percent = $request->percent;
        $actionnariat->description = $request->description;
        $actionnariat->save();
        session()->flash('success', 'Actionnariat est modifié !!');
        return redirect()->route('admin.actionnariat.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Actionnariat  $actionnariat
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $actionnariat = Actionnariat::findOrFail($id);
        $actionnariat->delete();
        session()->flash('success', 'Actionnariat est supprimé !!');
        return redirect()->back();
    }
}
