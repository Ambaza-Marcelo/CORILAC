<?php

use Illuminate\Support\Facades\Route;

use Illuminate\Http\Request;
 
Route::middleware('auth:api')->get('ebms_api/getLogin', function(Request $request) {
    return view('backend.pages.ebms_api.login');
});
Auth::routes();

Route::get('/', 'Frontend\SiteController@index')->name('index');
Route::get('/home', 'HomeController@index')->name('home');

//Route::get('/index', 'WelcomeController@index')->name('index');

 Route::get('/votre-banque/profil','Frontend\SiteController@profil')->name('site.profil');
 Route::get('/votre-banque/historique','Frontend\SiteController@historique')->name('site.historique');
 Route::get('/votre-banque/actionnariat','Frontend\SiteController@actionnariat')->name('site.actionnariat');
 Route::get('/contact','Frontend\SiteController@contact')->name('site.contact');
 Route::get('/votre-banque/vision','Frontend\SiteController@vision')->name('site.vision');
 Route::get('/votre-banque/responsabilite','Frontend\SiteController@responsabilite')->name('site.responsabilite');
 Route::get('/votre-banque/tarif','Frontend\SiteController@tarif')->name('site.tarif');
 Route::get('/votre-banque/nos-agences','Frontend\SiteController@agence')->name('site.nos_agences');
 Route::get('/votre-banque/rapport-annuel','Frontend\SiteController@rapportAnnuel')->name('site.rapport_annuel');
 Route::get('/votre-banque/etat-financier','Frontend\SiteController@etatFinancier')->name('site.etat_financier');

 Route::get('/comptes/compte-courant','Frontend\SiteController@compteCourant')->name('site.compte_courant');
 Route::get('/comptes/compte-joint','Frontend\SiteController@compteJoint')->name('site.compte_joint');
 Route::get('/comptes/compte-epargne','Frontend\SiteController@compteEpargne')->name('site.compte_epargne');
 Route::get('/comptes/compte-devise','Frontend\SiteController@compteDevise')->name('site.compte_devise');
 Route::get('/comptes/compte-epargne-junior','Frontend\SiteController@compteEpargneJunior')->name('site.compte_epargne_junior');
 Route::get('/comptes/compte-etudiant','Frontend\SiteController@compteEtudiant')->name('site.compte_etudiant');

 Route::get('/services-digitaux/sms-banking','Frontend\SiteController@smsBanking')->name('site.sms_banking');
 Route::get('/services-digitaux/coricash','Frontend\SiteController@coricash')->name('site.coricash');
 Route::get('/services-digitaux/ecocash','Frontend\SiteController@ecocash')->name('site.ecocash');

 Route::get('/credits/credit-groupe','Frontend\SiteController@creditGroupe')->name('site.credit_groupe');
 Route::get('/credits/credit-salarie','Frontend\SiteController@creditSalarie')->name('site.credit_salarie');
 Route::get('/credits/credit-commercial','Frontend\SiteController@creditCommercial')->name('site.credit_commercial');
 Route::get('/credits/credit-artisanal','Frontend\SiteController@creditArtisanal')->name('site.credit_artisanal');
 Route::get('/credits/credit-logement','Frontend\SiteController@creditLogement')->name('site.credit_logement');
 Route::get('/credits/credit-agricole','Frontend\SiteController@creditAgricole')->name('site.credit_agricole');
 Route::get('/credits/decouvert','Frontend\SiteController@decouvert')->name('site.decouvert');

 Route::get('/publications/newsletter','Frontend\SiteController@newsletter')->name('site.newsletter');
 Route::get('/publications/actualite','Frontend\SiteController@actualite')->name('site.actualite');
 Route::get('/publications/actualite/show/{id}','Frontend\SiteController@actualiteShow')->name('site.actualite-show');
 Route::get('/publications/appels-d-offres','Frontend\SiteController@appelsOffres')->name('site.appels_offres');

//comments
Route::get('comments/create', 'Frontend\SiteController@create')->name('site.comments.create');
Route::post('comments/store', 'Frontend\SiteController@postComment')->name('site.comments.store');

//subscriber
Route::post('subscriber', 'Frontend\SiteController@subscribe')->name('site.subscriber.store');

//contact
Route::post('post-message', 'Frontend\SiteController@postContact')->name('site.contact.store');
/**
 * Admin routes
 */
Route::group(['prefix' => 'admin'], function () {
    Route::get('/', 'Backend\DashboardController@index')->name('admin.dashboard');
    Route::resource('roles', 'Backend\RolesController', ['names' => 'admin.roles']);
    Route::resource('users', 'Backend\UsersController', ['names' => 'admin.users']);
    Route::resource('admins', 'Backend\AdminsController', ['names' => 'admin.admins']);



    // Login Routes
    Route::get('/login', 'Backend\Auth\LoginController@showLoginForm')->name('admin.login');
    Route::post('/login/submit', 'Backend\Auth\LoginController@login')->name('admin.login.submit');

    // Logout Routes
    Route::post('/logout/submit', 'Backend\Auth\LoginController@logout')->name('admin.logout.submit');

    // Forget Password Routes
    Route::get('/password/reset', 'Backend\Auth\ForgetPasswordController@showLinkRequestForm')->name('admin.password.request');
    Route::post('/password/reset/submit', 'Backend\Auth\ForgetPasswordController@reset')->name('admin.password.update');
    
    //change language
    Route::get('/changeLang','Backend\DashboardController@changeLang')->name('changeLang');

    //abouts routes
    Route::get('abouts/index', 'Backend\AboutController@index')->name('admin.abouts.index');
    Route::get('abouts/create', 'Backend\AboutController@create')->name('admin.abouts.create');
    Route::post('abouts/store', 'Backend\AboutController@store')->name('admin.abouts.store');
    Route::get('abouts/edit/{id}', 'Backend\AboutController@edit')->name('admin.abouts.edit');
    Route::put('abouts/update/{id}', 'Backend\AboutController@update')->name('admin.abouts.update');
    Route::delete('abouts/destroy/{id}', 'Backend\AboutController@destroy')->name('admin.abouts.destroy');

    //accounts routes
    Route::get('accounts/index', 'Backend\AccountController@index')->name('admin.accounts.index');
    Route::get('accounts/create', 'Backend\AccountController@create')->name('admin.accounts.create');
    Route::post('accounts/store', 'Backend\AccountController@store')->name('admin.accounts.store');
    Route::get('accounts/edit/{id}', 'Backend\AccountController@edit')->name('admin.accounts.edit');
    Route::put('accounts/update/{id}', 'Backend\AccountController@update')->name('admin.accounts.update');
    Route::delete('accounts/destroy/{id}', 'Backend\AccountController@destroy')->name('admin.accounts.destroy');

    //credits routes
    Route::get('credits/index', 'Backend\CreditController@index')->name('admin.credits.index');
    Route::get('credits/create', 'Backend\CreditController@create')->name('admin.credits.create');
    Route::post('credits/store', 'Backend\CreditController@store')->name('admin.credits.store');
    Route::get('credits/edit/{id}', 'Backend\CreditController@edit')->name('admin.credits.edit');
    Route::put('credits/update/{id}', 'Backend\CreditController@update')->name('admin.credits.update');
    Route::delete('credits/destroy/{id}', 'Backend\CreditController@destroy')->name('admin.credits.destroy');

    //actionnariat routes
    Route::get('actionnariat/index', 'Backend\ActionnariatController@index')->name('admin.actionnariat.index');
    Route::get('actionnariat/create', 'Backend\ActionnariatController@create')->name('admin.actionnariat.create');
    Route::post('actionnariat/store', 'Backend\ActionnariatController@store')->name('admin.actionnariat.store');
    Route::get('actionnariat/edit/{id}', 'Backend\ActionnariatController@edit')->name('admin.actionnariat.edit');
    Route::put('actionnariat/update/{id}', 'Backend\ActionnariatController@update')->name('admin.actionnariat.update');
    Route::delete('actionnariat/destroy/{id}', 'Backend\ActionnariatController@destroy')->name('admin.actionnariat.destroy');

    //actualites routes
    Route::get('actualites/index', 'Backend\ActualiteController@index')->name('admin.actualites.index');
    Route::get('actualites/create', 'Backend\ActualiteController@create')->name('admin.actualites.create');
    Route::post('actualites/store', 'Backend\ActualiteController@store')->name('admin.actualites.store');
    Route::get('actualites/edit/{id}', 'Backend\ActualiteController@edit')->name('admin.actualites.edit');
    Route::put('actualites/update/{id}', 'Backend\ActualiteController@update')->name('admin.actualites.update');
    Route::delete('actualites/destroy/{id}', 'Backend\ActualiteController@destroy')->name('admin.actualites.destroy');

    //appels_offres routes
    Route::get('appels_offres/index', 'Backend\AppelsOffreController@index')->name('admin.appels_offres.index');
    Route::get('appels_offres/create', 'Backend\AppelsOffreController@create')->name('admin.appels_offres.create');
    Route::post('appels_offres/store', 'Backend\AppelsOffreController@store')->name('admin.appels_offres.store');
    Route::get('appels_offres/edit/{id}', 'Backend\AppelsOffreController@edit')->name('admin.appels_offres.edit');
    Route::put('appels_offres/update/{id}', 'Backend\AppelsOffreController@update')->name('admin.appels_offres.update');
    Route::delete('appels_offres/destroy/{id}', 'Backend\AppelsOffreController@destroy')->name('admin.appels_offres.destroy');

    //compte_courant routes
    Route::get('compte_courant/index', 'Backend\CompteCourantController@index')->name('admin.compte_courant.index');
    Route::get('compte_courant/create', 'Backend\CompteCourantController@create')->name('admin.compte_courant.create');
    Route::post('compte_courant/store', 'Backend\CompteCourantController@store')->name('admin.compte_courant.store');
    Route::get('compte_courant/edit/{id}', 'Backend\CompteCourantController@edit')->name('admin.compte_courant.edit');
    Route::put('compte_courant/update/{id}', 'Backend\CompteCourantController@update')->name('admin.compte_courant.update');
    Route::delete('compte_courant/destroy/{id}', 'Backend\CompteCourantController@destroy')->name('admin.compte_courant.destroy');

    //compte_devise routes
    Route::get('compte_devise/index', 'Backend\CompteDeviseController@index')->name('admin.compte_devise.index');
    Route::get('compte_devise/create', 'Backend\CompteDeviseController@create')->name('admin.compte_devise.create');
    Route::post('compte_devise/store', 'Backend\CompteDeviseController@store')->name('admin.compte_devise.store');
    Route::get('compte_devise/edit/{id}', 'Backend\CompteDeviseController@edit')->name('admin.compte_devise.edit');
    Route::put('compte_devise/update/{id}', 'Backend\CompteDeviseController@update')->name('admin.compte_devise.update');
    Route::delete('compte_devise/destroy/{id}', 'Backend\CompteDeviseController@destroy')->name('admin.compte_devise.destroy');

    //compte_conjoint routes
    Route::get('compte_conjoint/index', 'Backend\CompteConjointController@index')->name('admin.compte_conjoint.index');
    Route::get('compte_conjoint/create', 'Backend\CompteConjointController@create')->name('admin.compte_conjoint.create');
    Route::post('compte_conjoint/store', 'Backend\CompteConjointController@store')->name('admin.compte_conjoint.store');
    Route::get('compte_conjoint/edit/{id}', 'Backend\CompteConjointController@edit')->name('admin.compte_conjoint.edit');
    Route::put('compte_conjoint/update/{id}', 'Backend\CompteConjointController@update')->name('admin.compte_conjoint.update');
    Route::delete('compte_conjoint/destroy/{id}', 'Backend\CompteConjointController@destroy')->name('admin.compte_conjoint.destroy');

    //contacts routes
    Route::get('contacts/index', 'Backend\ContactController@index')->name('admin.contacts.index');
    Route::get('contacts/create', 'Backend\ContactController@create')->name('admin.contacts.create');
    Route::post('contacts/store', 'Backend\ContactController@store')->name('admin.contacts.store');
    Route::get('contacts/edit/{id}', 'Backend\ContactController@edit')->name('admin.contacts.edit');
    Route::put('contacts/update/{id}', 'Backend\ContactController@update')->name('admin.contacts.update');
    Route::delete('contacts/destroy/{id}', 'Backend\ContactController@destroy')->name('admin.contacts.destroy');

    //coricash routes
    Route::get('coricash/index', 'Backend\CoricashController@index')->name('admin.coricash.index');
    Route::get('coricash/create', 'Backend\CoricashController@create')->name('admin.coricash.create');
    Route::post('coricash/store', 'Backend\CoricashController@store')->name('admin.coricash.store');
    Route::get('coricash/edit/{id}', 'Backend\CoricashController@edit')->name('admin.coricash.edit');
    Route::put('coricash/update/{id}', 'Backend\CoricashController@update')->name('admin.coricash.update');
    Route::delete('coricash/destroy/{id}', 'Backend\CoricashController@destroy')->name('admin.coricash.destroy');

    //decouvert routes
    Route::get('decouvert/index', 'Backend\DecouvertController@index')->name('admin.decouvert.index');
    Route::get('decouvert/create', 'Backend\DecouvertController@create')->name('admin.decouvert.create');
    Route::post('decouvert/store', 'Backend\DecouvertController@store')->name('admin.decouvert.store');
    Route::get('decouvert/edit/{id}', 'Backend\DecouvertController@edit')->name('admin.decouvert.edit');
    Route::put('decouvert/update/{id}', 'Backend\DecouvertController@update')->name('admin.decouvert.update');
    Route::delete('decouvert/destroy/{id}', 'Backend\DecouvertController@destroy')->name('admin.decouvert.destroy');

    //historiques routes
    Route::get('historiques/index', 'Backend\HistoriqueController@index')->name('admin.historiques.index');
    Route::get('historiques/create', 'Backend\HistoriqueController@create')->name('admin.historiques.create');
    Route::post('historiques/store', 'Backend\HistoriqueController@store')->name('admin.historiques.store');
    Route::get('historiques/edit/{id}', 'Backend\HistoriqueController@edit')->name('admin.historiques.edit');
    Route::put('historiques/update/{id}', 'Backend\HistoriqueController@update')->name('admin.historiques.update');
    Route::delete('historiques/destroy/{id}', 'Backend\HistoriqueController@destroy')->name('admin.historiques.destroy');

    //newsletter routes
    Route::get('newsletter/index', 'Backend\NewsletterController@index')->name('admin.newsletter.index');
    Route::get('newsletter/create', 'Backend\NewsletterController@create')->name('admin.newsletter.create');
    Route::post('newsletter/store', 'Backend\NewsletterController@store')->name('admin.newsletter.store');
    Route::get('newsletter/edit/{id}', 'Backend\NewsletterController@edit')->name('admin.newsletter.edit');
    Route::put('newsletter/update/{id}', 'Backend\NewsletterController@update')->name('admin.newsletter.update');
    Route::delete('newsletter/destroy/{id}', 'Backend\NewsletterController@destroy')->name('admin.newsletter.destroy');

    //services routes
    Route::get('services/index', 'Backend\ServiceController@index')->name('admin.services.index');
    Route::get('services/create', 'Backend\ServiceController@create')->name('admin.services.create');
    Route::post('services/store', 'Backend\ServiceController@store')->name('admin.services.store');
    Route::get('services/edit/{id}', 'Backend\ServiceController@edit')->name('admin.services.edit');
    Route::put('services/update/{id}', 'Backend\ServiceController@update')->name('admin.services.update');
    Route::delete('services/destroy/{id}', 'Backend\ServiceController@destroy')->name('admin.services.destroy');

    //sliders routes
    Route::get('sliders/index', 'Backend\SliderController@index')->name('admin.sliders.index');
    Route::get('sliders/create', 'Backend\SliderController@create')->name('admin.sliders.create');
    Route::post('sliders/store', 'Backend\SliderController@store')->name('admin.sliders.store');
    Route::get('sliders/edit/{id}', 'Backend\SliderController@edit')->name('admin.sliders.edit');
    Route::put('sliders/update/{id}', 'Backend\SliderController@update')->name('admin.sliders.update');
    Route::delete('sliders/destroy/{id}', 'Backend\SliderController@destroy')->name('admin.sliders.destroy');

    //sms_banking routes
    Route::get('sms_banking/index', 'Backend\SmsBankingController@index')->name('admin.sms_banking.index');
    Route::get('sms_banking/create', 'Backend\SmsBankingController@create')->name('admin.sms_banking.create');
    Route::post('sms_banking/store', 'Backend\SmsBankingController@store')->name('admin.sms_banking.store');
    Route::get('sms_banking/edit/{id}', 'Backend\SmsBankingController@edit')->name('admin.sms_banking.edit');
    Route::put('sms_banking/update/{id}', 'Backend\SmsBankingController@update')->name('admin.sms_banking.update');
    Route::delete('sms_banking/destroy/{id}', 'Backend\SmsBankingController@destroy')->name('admin.sms_banking.destroy');

    //subscribers routes
    Route::get('subscribers/index', 'Backend\SubscriberController@index')->name('admin.subscribers.index');
    Route::get('subscribers/create', 'Backend\SubscriberController@create')->name('admin.subscribers.create');
    Route::post('subscribers/store', 'Backend\SubscriberController@store')->name('admin.subscribers.store');
    Route::get('subscribers/edit/{id}', 'Backend\SubscriberController@edit')->name('admin.subscribers.edit');
    Route::put('subscribers/update/{id}', 'Backend\SubscriberController@update')->name('admin.subscribers.update');
    Route::delete('subscribers/destroy/{id}', 'Backend\SubscriberController@destroy')->name('admin.subscribers.destroy');

    //categories routes
    Route::get('categories/index', 'Backend\CategoryController@index')->name('admin.categories.index');
    Route::get('categories/create', 'Backend\CategoryController@create')->name('admin.categories.create');
    Route::post('categories/store', 'Backend\CategoryController@store')->name('admin.categories.store');
    Route::get('categories/edit/{id}', 'Backend\CategoryController@edit')->name('admin.categories.edit');
    Route::put('categories/update/{id}', 'Backend\CategoryController@update')->name('admin.categories.update');
    Route::delete('categories/destroy/{id}', 'Backend\CategoryController@destroy')->name('admin.categories.destroy');

    //comments routes
    Route::get('comments/index', 'Backend\CommentController@index')->name('admin.comments.index');
    Route::get('comments/create', 'Backend\CommentController@create')->name('admin.comments.create');
    Route::post('comments/store', 'Backend\CommentController@store')->name('admin.comments.store');
    Route::get('comments/edit/{id}', 'Backend\CommentController@edit')->name('admin.comments.edit');
    Route::put('comments/update/{id}', 'Backend\CommentController@update')->name('admin.comments.update');
    Route::put('comments/publish/{id}', 'Backend\CommentController@publish')->name('admin.comments.publish');
    Route::delete('comments/destroy/{id}', 'Backend\CommentController@destroy')->name('admin.comments.destroy');

    //tarif routes
    Route::get('tarif/index', 'Backend\TarifController@index')->name('admin.tarif.index');
    Route::get('tarif/create', 'Backend\TarifController@create')->name('admin.tarif.create');
    Route::post('tarif/store', 'Backend\TarifController@store')->name('admin.tarif.store');
    Route::get('tarif/edit/{id}', 'Backend\TarifController@edit')->name('admin.tarif.edit');
    Route::put('tarif/update/{id}', 'Backend\TarifController@update')->name('admin.tarif.update');
    Route::delete('tarif/destroy/{id}', 'Backend\TarifController@destroy')->name('admin.tarif.destroy');

    //vision routes
    Route::get('vision/index', 'Backend\VisionController@index')->name('admin.vision.index');
    Route::get('vision/create', 'Backend\VisionController@create')->name('admin.vision.create');
    Route::post('vision/store', 'Backend\VisionController@store')->name('admin.vision.store');
    Route::get('vision/edit/{id}', 'Backend\VisionController@edit')->name('admin.vision.edit');
    Route::put('vision/update/{id}', 'Backend\VisionController@update')->name('admin.vision.update');
    Route::delete('vision/destroy/{id}', 'Backend\VisionController@destroy')->name('admin.vision.destroy');

    //responsabilite routes
    Route::get('responsabilite/index', 'Backend\ResponsabiliteController@index')->name('admin.responsabilite.index');
    Route::get('responsabilite/create', 'Backend\ResponsabiliteController@create')->name('admin.responsabilite.create');
    Route::post('responsabilite/store', 'Backend\ResponsabiliteController@store')->name('admin.responsabilite.store');
    Route::get('responsabilite/edit/{id}', 'Backend\ResponsabiliteController@edit')->name('admin.responsabilite.edit');
    Route::put('responsabilite/update/{id}', 'Backend\ResponsabiliteController@update')->name('admin.responsabilite.update');
    Route::delete('responsabilite/destroy/{id}', 'Backend\ResponsabiliteController@destroy')->name('admin.responsabilite.destroy');

    //setting routes
    Route::get('settings/index', 'Backend\SettingController@index')->name('admin.settings.index');
    Route::get('settings/create', 'Backend\SettingController@create')->name('admin.settings.create');
    Route::post('settings/store', 'Backend\SettingController@store')->name('admin.settings.store');
    Route::get('settings/edit/{id}', 'Backend\SettingController@edit')->name('admin.settings.edit');
    Route::put('settings/update/{id}', 'Backend\SettingController@update')->name('admin.settings.update');
    Route::delete('settings/destroy/{id}', 'Backend\SettingController@destroy')->name('admin.settings.destroy');
    
    Route::get('/404/muradutunge/ivyomwasavye-ntibishoboye-kuboneka',function(){
        return view('errors.404');
    });
});
