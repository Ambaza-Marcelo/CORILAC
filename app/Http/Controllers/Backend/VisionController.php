<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use \App\Models\Vision;

class VisionController extends Controller
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
    	$visions = DB::table('visions')->orderBy('created_at','desc')->get();
    	return view('backend.pages.vision.index',compact('visions'));
    }
    public function create()
    {
    	return view('backend.pages.vision.create');
    }

     public function store(Request $request)
    {
        //
        $request->validate([
            'description' => 'required',

        ]);

        $vision = new Vision();
        $vision->description = $request->description;
        $vision->save();

        session()->flash('success', 'Vision est créé !!');

        return redirect()->route('admin.vision.index');
    }



    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Vision  $vision
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $vision = Vision::findOrFail($id);
        return view('backend.pages.vision.edit', compact('vision'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Vision  $vision
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $request->validate([
            'description' => 'required',

        ]);

        $vision = Vision::findOrFail($id);

        $vision->description = $request->description;
        $vision->save();
        session()->flash('success', 'Vision est modifié !!');
        return redirect()->route('admin.vision.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Vision  $vision
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $vision = Vision::findOrFail($id);
        $vision->delete();
        session()->flash('success', 'Vision est supprimé !!');
        return redirect()->back();
    }
}
