<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\Slider;
use App\Models\Actualite;
use App\Models\Historique;
use App\Models\Actionnariat;
use App\Models\Responsabilite;
use App\Models\Coricash;
use App\Models\Vision;
use App\Models\Service;
use App\Models\Credit;
use App\Models\About;
use App\Models\Account;
use App\Models\Subscriber;
use App\Models\Comment;
use App\Models\Setting;
use App\Models\Contact;
use Mail;
use App\Mail\CommentMail;
use App\Mail\SubscriberMail;
use App\Mail\ContactMail;

class SiteController extends Controller
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
        $sliders = Slider::all();
        $services = Service::all();
        $credits = Credit::all();
        $actualites = Actualite::orderBy('created_at','desc')->take(3)->get();
        $accounts = Account::all();
        $about = About::orderBy('created_at','desc')->first();
        $imageSlider = Slider::orderBy('created_at','desc')->first();
        $settings = Setting::orderBy('created_at','desc')->first();

        return view('frontend.index',compact(
            'sliders',
            'services',
            'credits',
            'actualites',
            'about',
            'accounts',
            'imageSlider',
            'settings'
        ));

    }

    public function historique()
    {

        $historique = Historique::orderBy('created_at','desc')->first();
        $settings = Setting::orderBy('created_at','desc')->first();
        $services = Service::all();
        $about = About::orderBy('created_at','desc')->first();

        return view('frontend.votre_banque.historique',compact('historique','settings','services','about'));
    }

    public function actionnariat()
    {
        $settings = Setting::orderBy('created_at','desc')->first(); 
        $about = About::orderBy('created_at','desc')->first();
        $services = Service::all();

        return view('frontend.votre_banque.actionnariat' ,compact('settings','about','services'));
    }

    public function profil()
    {

        return view('frontend.votre_banque.profil');
    }

    public function responsabilite()
    {
        $settings = Setting::orderBy('created_at','desc')->first();
        $about = About::orderBy('created_at','desc')->first();
        $services = Service::all();
        $responsabilite = Responsabilite::orderBy('created_at','desc')->first();
        return view('frontend.votre_banque.responsabilite',compact('responsabilite','settings','about','services'));
    }

    public function tarif()
    {
        $settings = Setting::orderBy('created_at','desc')->first(); 
        $about = About::orderBy('created_at','desc')->first();
        $services = Service::all();

        return view('frontend.votre_banque.tarif' ,compact('settings','about','services'));
    }

    public function vision()
    {
        $vision = Vision::orderBy('created_at','desc')->first();
        $settings = Setting::orderBy('created_at','desc')->first();
        $about = About::orderBy('created_at','desc')->first();
        $services = Service::all();
        return view('frontend.votre_banque.vision',compact('vision','settings','about','services'));
    }

    public function agence()
    {
        $settings = Setting::orderBy('created_at','desc')->first(); 
        $about = About::orderBy('created_at','desc')->first();
        $services = Service::all();

        return view('frontend.votre_banque.nos_agences' ,compact('settings','about','services'));
    }

    public function rapportAnnuel()
    {
        $settings = Setting::orderBy('created_at','desc')->first();
        $about = About::orderBy('created_at','desc')->first();
        $services = Service::all();

        return view('frontend.votre_banque.rapport_annuel',compact('settings','services','about'));
    }

    public function etatFinancier()
    {
        $settings = Setting::orderBy('created_at','desc')->first();
        $services = Service::all();
        $about = About::orderBy('created_at','desc')->first();

        return view('frontend.votre_banque.etat_financier',compact('settings','services','about'));
    }

    public function compteCourant()
    {
        $settings = Setting::orderBy('created_at','desc')->first(); 
        $about = About::orderBy('created_at','desc')->first();
        $services = Service::all();

        return view('frontend.services.comptes.compte_courant' ,compact('settings','about','services'));
    }

    public function compteJoint()
    {
        $settings = Setting::orderBy('created_at','desc')->first(); 
        $about = About::orderBy('created_at','desc')->first();
        $services = Service::all();

        return view('frontend.services.comptes.compte_joint' ,compact('settings','about','services'));
    }

    public function compteDevise()
    {
        $settings = Setting::orderBy('created_at','desc')->first(); 
        $about = About::orderBy('created_at','desc')->first();
        $services = Service::all();

        return view('frontend.services.comptes.compte_devise' ,compact('settings','about','services'));
    }

    public function compteEtudiant()
    {
        $settings = Setting::orderBy('created_at','desc')->first(); 
        $about = About::orderBy('created_at','desc')->first();
        $services = Service::all();

        return view('frontend.services.comptes.compte_etudiant' ,compact('settings','about','services'));
    }

    public function compteEpargneJunior()
    {
        $settings = Setting::orderBy('created_at','desc')->first(); 
        $about = About::orderBy('created_at','desc')->first();
        $services = Service::all();

        return view('frontend.services.comptes.compte_epargne_junior' ,compact('settings','about','services'));
    }

    public function compteEpargne()
    {
        $settings = Setting::orderBy('created_at','desc')->first(); 
        $about = About::orderBy('created_at','desc')->first();
        $services = Service::all();

        return view('frontend.services.comptes.compte_epargne' ,compact('settings','about','services'));
    }

    public function creditGroupe()
    {
        $settings = Setting::orderBy('created_at','desc')->first(); 
        $about = About::orderBy('created_at','desc')->first();
        $services = Service::all();

        return view('frontend.services.credits.credit_groupe' ,compact('settings','about','services'));
    }

    public function decouvert()
    {
        $settings = Setting::orderBy('created_at','desc')->first(); 
        $about = About::orderBy('created_at','desc')->first();
        $services = Service::all();

        return view('frontend.services.credits.decouvert' ,compact('settings','about','services'));
    }

    public function creditAgricole()
    {
        $settings = Setting::orderBy('created_at','desc')->first(); 
        $about = About::orderBy('created_at','desc')->first();
        $services = Service::all();

        return view('frontend.services.credits.credit_agricole' ,compact('settings','about','services'));
    }

    public function creditCommercial()
    {
        $settings = Setting::orderBy('created_at','desc')->first(); 
        $about = About::orderBy('created_at','desc')->first();
        $services = Service::all();

        return view('frontend.services.credits.credit_commercial' ,compact('settings','about','services'));
    }

    public function creditArtisanal()
    {
        $settings = Setting::orderBy('created_at','desc')->first(); 
        $about = About::orderBy('created_at','desc')->first();
        $services = Service::all();

        return view('frontend.services.credits.credit_artisanal' ,compact('settings','about','services'));
    }

    public function creditLogement()
    {
        $settings = Setting::orderBy('created_at','desc')->first(); 
        $about = About::orderBy('created_at','desc')->first();
        $services = Service::all();

        return view('frontend.services.credits.credit_logement' ,compact('settings','about','services'));
    }

    public function creditSalarie()
    {
        $settings = Setting::orderBy('created_at','desc')->first(); 
        $about = About::orderBy('created_at','desc')->first();
        $services = Service::all();

        return view('frontend.services.credits.credit_salarie' ,compact('settings','about','services'));
    }

    public function coricash()
    {
        $settings = Setting::orderBy('created_at','desc')->first(); 
        $about = About::orderBy('created_at','desc')->first();
        $services = Service::all();

        return view('frontend.services.digitaux.coricash' ,compact('settings','about','services'));
    }

    public function smsBanking()
    {
        $settings = Setting::orderBy('created_at','desc')->first(); 
        $about = About::orderBy('created_at','desc')->first();
        $services = Service::all();

        return view('frontend.services.digitaux.sms_banking' ,compact('settings','about','services'));
    }

    public function newsletter()
    {
        $settings = Setting::orderBy('created_at','desc')->first(); 
        $about = About::orderBy('created_at','desc')->first();
        $services = Service::all();

        return view('frontend.publications.newsletter' ,compact('settings','about','services'));
    }

    public function actualite()
    {
        $settings = Setting::orderBy('created_at','desc')->first();

        $actualites = Actualite::paginate(9);
        $about = About::orderBy('created_at','desc')->first();
        $services = Service::all();
        return view('frontend.publications.actualite',compact('actualites','settings','about','services'));
    }

    public function actualiteShow($id)
    {
        //
        $settings = Setting::orderBy('created_at','desc')->first();
        $about = About::orderBy('created_at','desc')->first();
        $services = Service::all();
        $actualite = Actualite::findOrFail($id);
        $comments = Comment::where('actualite_id',$id)->where('published',1)->get();
        $total_comments = count(Comment::select('id')->where('actualite_id',$id)->where('published',1)->get());
        return view('frontend.publications.actualite-show',compact('actualite','settings','about','services','comments','total_comments'));
    }

    public function appelsOffres()
    {
        $settings = Setting::orderBy('created_at','desc')->first(); 
        $about = About::orderBy('created_at','desc')->first();
        $services = Service::all();

        return view('frontend.publications.appels_d_offres' ,compact('settings','about','services'));
    }

    public function contact()
    {
        $settings = Setting::orderBy('created_at','desc')->first(); 
        $about = About::orderBy('created_at','desc')->first();
        $services = Service::all();

        return view('frontend.contact' ,compact('settings','about','services'));
    }

    public function postComment(Request $request)
    {
        //
        $request->validate([
            'name' => 'required',
            'actualite_id' => 'required',
            'email' => 'required'

        ]);

        $comment = new Comment();
        $comment->actualite_id = $request->actualite_id;
        $comment->name = $request->name;
        $comment->email = $request->email;
        $comment->web_site = $request->web_site;
        $comment->message = $request->message;
        $comment->save();


        $mailData = [
                    'title' => 'Remerciement',
                    'name' => $comment->name,
                    ];
         
        Mail::to($comment->email)->send(new CommentMail($mailData));

        session()->flash('success', 'Votre message a été envoyé!!');

        return redirect()->back();
    }

    public function postContact(Request $request)
    {
        //
        $request->validate([
            'nom' => 'required',
            'prenom' => 'required',
            'email' => 'required',
            'sujet' => 'required',
            'message' => 'required'

        ]);

        $contact = new Contact();
        $contact->prenom = $request->prenom;
        $contact->nom = $request->nom;
        $contact->email = $request->email;
        $contact->sujet = $request->sujet;
        $contact->message = $request->message;
        $contact->save();


        $mailData = [
                    'title' => 'Message Envoyé',
                    'nom' => $contact->nom,
                    'prenom' => $contact->prenom,
                    ];
         
        Mail::to($contact->email)->send(new ContactMail($mailData));

        session()->flash('success', 'Votre message a été envoyé!!');

        return redirect()->back();
    }

    public function subscribe(Request $request)
    {
        //
        $request->validate([
            'email' => 'required|min:10|max:200|email|unique:subscribers'

        ]);

        $subscribe = new Subscriber();
        $subscribe->email = $request->email;
        $subscribe->save();

        $mailData = [
                    'title' => 'Abonnement'
                    ];
         
        Mail::to($subscribe->email)->send(new SubscriberMail($mailData));

        return redirect()->back();
    }
}
