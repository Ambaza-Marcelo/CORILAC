<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use \App\Models\About;

class AboutController extends Controller
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
    	$abouts = DB::table('abouts')->orderBy('created_at','desc')->get();
    	return view('backend.pages.abouts.index',compact('abouts'));
    }
    public function create()
    {
    	return view('backend.pages.abouts.create');
    }

     public function store(Request $request)
    {
        //
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'image' => 'required|mimes:jpeg,jpg,png,svg|max:3072',

        ]);

        $storagepath = $request->file('image')->store('public/abouts');
        $fileName = basename($storagepath);

        $data = $request->all();
        $data['image'] = $fileName;

        About::create($data);
        session()->flash('success', 'About has been created !!');

        return redirect()->route('admin.abouts.index');
    }



    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\About  $about
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $about = About::findOrFail($id);
        return view('backend.pages.abouts.edit', compact('about'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\About  $about
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            //'image' => 'required|mimes:jpeg,jpg,png,svg|max:3072',

        ]);

        $about = About::findOrFail($id);

        $data = $request->all();

        if($request->hasFile('image')){
            $file_path = "public/abouts".$about->image;
            Storage::delete($file_path);

            $storagepath = $request->file('image')->store('public/abouts');
            $fileName = basename($storagepath);
            $data['image'] = $fileName;

        }

        $about->fill($data);
        $about->save();

        return redirect()->route('admin.abouts.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\About  $about
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $about = About::findOrFail($id);
        $file_path = "public/abouts/".$about->image;
            Storage::delete($file_path);
        $about->delete();
        return redirect()->back();
    }
}
