<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use \App\Models\Coricash;

class CoricashController extends Controller
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
    	$coricashs = DB::table('coricashes')->orderBy('created_at','desc')->get();
    	return view('backend.pages.coricash.index',compact('coricashs'));
    }

    public function create()
    {
    	return view('backend.pages.coricash.create');
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

        $storagepath = $request->file('image')->store('public/coricash');
        $fileName = basename($storagepath);

        $data = $request->all();
        $data['image'] = $fileName;

        Coricash::create($data);
        session()->flash('success', 'Coricash a été créé!!');

        return redirect()->route('admin.coricash.index');
    }



    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Coricash  $coricash
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $coricash = Coricash::findOrFail($id);
        return view('backend.pages.coricash.edit', compact('coricash'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Coricash  $coricash
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

        $coricash = Coricash::findOrFail($id);

        $data = $request->all();

        if($request->hasFile('image')){
            $file_path = "public/coricash".$coricash->image;
            Storage::delete($file_path);

            $storagepath = $request->file('image')->store('public/coricash');
            $fileName = basename($storagepath);
            $data['image'] = $fileName;

        }

        $coricash->fill($data);
        $coricash->save();
        session()->flash('success', 'Coricash a été modifié!!');
        return redirect()->route('admin.coricash.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Coricash  $coricash
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $coricash = Coricash::findOrFail($id);
        $file_path = "public/coricash/".$coricash->image;
            Storage::delete($file_path);
        $coricash->delete();
        session()->flash('success', 'Coricash a été supprimé!!');
        return redirect()->back();
    }
}
