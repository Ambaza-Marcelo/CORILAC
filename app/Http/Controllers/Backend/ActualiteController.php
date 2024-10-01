<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use \App\Models\Actualite;
use \App\Models\Category;
use \App\Models\Subscriber;

use Mail;
use App\Mail\ActualiteMail;

class ActualiteController extends Controller
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
    	$actualites = DB::table('actualites')->orderBy('created_at','desc')->get();
    	return view('backend.pages.actualites.index',compact('actualites'));
    }
    public function create()
    {
        $categories = Category::all();
    	return view('backend.pages.actualites.create',compact('categories'));
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

        $storagepath = $request->file('image')->store('public/actualites');
        $fileName = basename($storagepath);

        $data = $request->all();
        $data['image'] = $fileName;

        Actualite::create($data);
        
        $subscribers = Subscriber::all();
        $actualite = Actualite::orderBy('created_at','desc')->first();

        $url = 'http://10.10.100.89/publications/actualite/show/'.$actualite->id;
        
  
        foreach ($subscribers as $key => $subscriber) {
            Mail::to($subscriber->email)->send(new ActualiteMail($subscriber,$actualite,$url));
        }


        session()->flash('success', 'Actualite a été créé!!');

        return redirect()->route('admin.actualites.index');
    }



    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Actualite  $actualite
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $actualite = Actualite::findOrFail($id);
        $categories = Category::all();
        return view('backend.pages.actualites.edit', compact('actualite','categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Actualite  $actualite
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

        $actualite = Actualite::findOrFail($id);

        $data = $request->all();

        if($request->hasFile('image')){
            $file_path = "public/actualites".$actualite->image;
            Storage::delete($file_path);

            $storagepath = $request->file('image')->store('public/actualites');
            $fileName = basename($storagepath);
            $data['image'] = $fileName;

        }

        $actualite->fill($data);
        $actualite->save();
        session()->flash('success', 'Actualite a été modifié!!');
        return redirect()->route('admin.actualites.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Actualite  $actualite
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $actualite = Actualite::findOrFail($id);
        $file_path = "public/actualites/".$actualite->image;
            Storage::delete($file_path);
        $actualite->delete();
        session()->flash('success', 'Actualite a été supprimé!!');
        return redirect()->back();
    }
}
