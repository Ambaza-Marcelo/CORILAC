<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use \App\Models\Service;

class ServiceController extends Controller
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
    	$services = DB::table('services')->orderBy('created_at','desc')->get();
    	return view('backend.pages.services.index',compact('services'));
    }
    public function create()
    {
    	return view('backend.pages.services.create');
    }

     public function store(Request $request)
    {
        //
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'image' => 'required|mimes:jpeg,jpg,png,svg|max:3072',

        ]);

        $storagepath = $request->file('image')->store('public/services');
        $fileName = basename($storagepath);

        $data = $request->all();
        $data['image'] = $fileName;

        Service::create($data);
        session()->flash('success', 'Service a été créé!!');

        return redirect()->route('admin.services.index');
    }



    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $service = Service::findOrFail($id);
        return view('backend.pages.services.edit', compact('service'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'image' => 'required|mimes:jpeg,jpg,png,svg|max:3072',

        ]);

        $service = Service::findOrFail($id);

        $data = $request->all();

        if($request->hasFile('image')){
            $file_path = "public/services".$service->image;
            Storage::delete($file_path);

            $storagepath = $request->file('image')->store('public/services');
            $fileName = basename($storagepath);
            $data['image'] = $fileName;

        }

        $service->fill($data);
        $service->save();
        session()->flash('success', 'Service a été modifié!!');
        return redirect()->route('admin.services.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $service = Service::findOrFail($id);
        $file_path = "public/services/".$service->image;
            Storage::delete($file_path);
        $service->delete();
        session()->flash('success', 'Service a été supprimé!!');
        return redirect()->back();
    }
}
