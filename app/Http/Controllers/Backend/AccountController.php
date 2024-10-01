<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use \App\Models\Account;

class AccountController extends Controller
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
    	$accounts = DB::table('accounts')->orderBy('created_at','desc')->get();
    	return view('backend.pages.accounts.index',compact('accounts'));
    }
    public function create()
    {
    	return view('backend.pages.accounts.create');
    }

     public function store(Request $request)
    {
        //
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'image' => 'required|mimes:jpeg,jpg,png,svg|max:3072',

        ]);

        $storagepath = $request->file('image')->store('public/accounts');
        $fileName = basename($storagepath);

        $data = $request->all();
        $data['image'] = $fileName;

        Account::create($data);
        session()->flash('success', 'Account has been created !!');

        return redirect()->route('admin.accounts.index');
    }



    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Account  $account
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $account = Account::findOrFail($id);
        return view('backend.pages.accounts.edit', compact('account'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Account  $account
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

        $account = Account::findOrFail($id);

        $data = $request->all();

        if($request->hasFile('image')){
            $file_path = "public/accounts".$account->image;
            Storage::delete($file_path);

            $storagepath = $request->file('image')->store('public/accounts');
            $fileName = basename($storagepath);
            $data['image'] = $fileName;

        }

        $account->fill($data);
        $account->save();

        return redirect()->route('admin.accounts.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Account  $account
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $account = Account::findOrFail($id);
        $file_path = "public/accounts/".$account->image;
            Storage::delete($file_path);
        $account->delete();
        return redirect()->back();
    }
}
