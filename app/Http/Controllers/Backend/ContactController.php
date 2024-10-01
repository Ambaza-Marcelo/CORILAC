<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use \App\Models\Contact;

class ContactController extends Controller
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
    	$contacts = DB::table('contact')->orderBy('created_at','desc')->get();
    	return view('backend.pages.contact.index',compact('contacts'));
    }
    public function create()
    {
    	return view('backend.pages.contact.create');
    }

     public function store(Request $request)
    {
        //
        $request->validate([
            'nom' => 'required',
            'prenom' => 'required',
            'email' => 'required|email',
            'sujet' => 'required',
            'message' => 'required',

        ]);

        $contact = new Contact();
        $contact->nom = $request->nom;
        $contact->prenom = $request->prenom;
        $contact->email = $request->email;
        $contact->sujet = $request->sujet;
        $contact->message = $request->message;
        $contact->save();

        session()->flash('success', 'Contact est créé !!');

        return redirect()->route('admin.contacts.index');
    }



    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $contact = Contact::findOrFail($id);
        return view('backend.pages.contact.edit', compact('contact'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $request->validate([
            'nom' => 'required',
            'prenom' => 'required',
            'email' => 'required|email',
            'sujet' => 'required',
            'message' => 'required',

        ]);

        $contact = Contact::findOrFail($id);

        $contact->nom = $request->nom;
        $contact->prenom = $request->prenom;
        $contact->email = $request->email;
        $contact->sujet = $request->sujet;
        $contact->message = $request->message;
        $contact->save();

        session()->flash('success', 'Contact est modifié !!');
        return redirect()->route('admin.contacts.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $contact = Contact::findOrFail($id);
        $contact->delete();
        session()->flash('success', 'Contact est supprimé !!');
        return redirect()->back();
    }
}
