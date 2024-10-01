<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use \App\Models\Credit;


class CreditController extends Controller
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
    	$credits = DB::table('credits')->orderBy('created_at','desc')->get();
    	return view('backend.pages.credits.index',compact('credits'));
    }
    public function create()
    {
    	return view('backend.pages.credits.create');
    }

     public function store(Request $request)
    {
        //
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'image' => 'required|mimes:jpeg,jpg,png,svg|max:3072',

        ]);

        $storagepath = $request->file('image')->store('public/credits');
        $fileName = basename($storagepath);

        $data = $request->all();
        $data['image'] = $fileName;

        Credit::create($data);
        session()->flash('success', 'Credit has been created !!');

        return redirect()->route('admin.credits.index');
    }



    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Credit  $credit
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $credit = Credit::findOrFail($id);
        return view('backend.pages.credits.edit', compact('credit'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Credit  $credit
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

        $credit = Credit::findOrFail($id);

        $data = $request->all();

        if($request->hasFile('image')){
            $file_path = "public/credits".$credit->image;
            Storage::delete($file_path);

            $storagepath = $request->file('image')->store('public/credits');
            $fileName = basename($storagepath);
            $data['image'] = $fileName;

        }

        $credit->fill($data);
        $credit->save();

        return redirect()->route('admin.credits.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Credit  $credit
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $credit = Credit::findOrFail($id);
        $file_path = "public/credits/".$credit->image;
            Storage::delete($file_path);
        $credit->delete();
        return redirect()->back();
    }
}
