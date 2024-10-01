<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use \App\Models\Newsletter;

class NewsletterController extends Controller
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
    	$newsletter = DB::table('newsletter')->orderBy('created_at','desc')->get();
    	return view('backend.pages.newsletter.index',compact('newsletter'));
    }
    public function create()
    {
    	return view('backend.pages.newsletter.create');
    }

     public function store(Request $request)
    {
        //
        $request->validate([
        	'date' => 'required',
        	'code' => 'required',
            'title' => 'required',
            'description' => 'required',
            'image' => 'required|mimes:jpeg,jpg,png,svg|max:3072',
            'file' => 'required|mimes:jpeg,jpg,png,svg|max:3072',

        ]);

        $storagepath = $request->file('file')->store('public/newsletter/files');
        $fileName = basename($storagepath);

        $data = $request->all();
        $data['file'] = $fileName;

        $storagepath = $request->file('image')->store('public/newsletter/images');
        $fileName = basename($storagepath);

        $data = $request->all();
        $data['image'] = $fileName;

        Newsletter::create($data);
        session()->flash('success', 'Newsletter a été créé!!');

        return redirect()->route('admin.newsletter.index');
    }



    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Newsletter  $newsletter
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $newsletter = Newsletter::findOrFail($id);
        return view('backend.pages.newsletter.edit', compact('newsletter'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Newsletter  $newsletter
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
            'image' => 'required|mimes:jpeg,jpg,png,svg|max:3072',
            'file' => 'required|mimes:jpeg,jpg,png,svg|max:3072',

        ]);

        $newsletter = Newsletter::findOrFail($id);

        $data = $request->all();

        if($request->hasFile('file') || $request->hasFile('image')){
            $file_path = "public/newsletter/files".$newsletter->file;
            Storage::delete($file_path);

            $storagepath = $request->file('file')->store('public/newsletter/files');
            $fileName = basename($storagepath);
            $data['file'] = $fileName;

            $file_path = "public/newsletter/images".$newsletter->image;
            Storage::delete($file_path);

            $storagepath = $request->file('image')->store('public/newsletter/images');
            $fileName = basename($storagepath);
            $data['image'] = $fileName;

        }

        $newsletter->fill($data);
        $newsletter->save();
        session()->flash('success', 'Newsletter a été modifié!!');
        return redirect()->route('admin.newsletter.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Newsletter  $newsletter
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $newsletter = Newsletter::findOrFail($id);
        $file_path = "public/newsletter/files/".$newsletter->file;
        $file_path = "public/newsletter/images/".$newsletter->image;
            Storage::delete($file_path);
        $newsletter->delete();
        session()->flash('success', 'Newsletter a été supprimé!!');
        return redirect()->back();
    }
}
