<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use \App\Models\SmsBanking;

class SmsBankingController extends Controller
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
    	$sms_bankings = DB::table('sms_bankings')->orderBy('created_at','desc')->get();
    	return view('backend.pages.sms_banking.index',compact('sms_bankings'));
    }
    public function create()
    {
    	return view('backend.pages.sms_banking.create');
    }

     public function store(Request $request)
    {
        //
        $request->validate([
        	'date' => 'required',
            'title' => 'required',
            'description' => 'required',
            'image' => 'required|mimes:jpeg,jpg,png,svg|max:3072',
            'file' => 'required|mimes:jpeg,jpg,png,svg,pdf|max:3072',

        ]);

        $storagepath = $request->file('file')->store('public/sms_banking/files');
        $fileName = basename($storagepath);

        $data = $request->all();
        $data['file'] = $fileName;

        $storagepath = $request->file('image')->store('public/sms_banking/images');
        $fileName = basename($storagepath);

        $data = $request->all();
        $data['image'] = $fileName;

        SmsBanking::create($data);
        session()->flash('success', 'SmsBanking a été créé!!');

        return redirect()->route('admin.sms_banking.index');
    }



    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\SmsBanking  $sms_banking
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $sms_banking = SmsBanking::findOrFail($id);
        return view('backend.pages.sms_banking.edit', compact('sms_banking'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\SmsBanking  $sms_banking
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
            'file' => 'required|mimes:jpeg,jpg,png,svg|max:3072',

        ]);

        $sms_banking = SmsBanking::findOrFail($id);

        $data = $request->all();

        if($request->hasFile('file') || $request->hasFile('image')){
            $file_path = "public/sms_banking/files".$sms_banking->file;
            Storage::delete($file_path);

            $storagepath = $request->file('file')->store('public/sms_banking/files');
            $fileName = basename($storagepath);
            $data['file'] = $fileName;

            $file_path = "public/sms_banking/images".$sms_banking->image;
            Storage::delete($file_path);

            $storagepath = $request->file('image')->store('public/sms_banking/images');
            $fileName = basename($storagepath);
            $data['image'] = $fileName;

        }

        $sms_banking->fill($data);
        $sms_banking->save();
        session()->flash('success', 'SmsBanking a été modifié!!');
        return redirect()->route('admin.sms_banking.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\SmsBanking  $sms_banking
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $sms_banking = SmsBanking::findOrFail($id);
        $file_path = "public/sms_banking/files/".$sms_banking->file;
        $file_path = "public/sms_banking/images/".$sms_banking->image;
            Storage::delete($file_path);
        $sms_banking->delete();
        session()->flash('success', 'SmsBanking a été supprimé!!');
        return redirect()->back();
    }
}
