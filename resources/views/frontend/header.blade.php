

<header class="site-navbar js-sticky-header site-navbar-target" role="banner">

      <div class="container">
        <div class="row align-items-center">
          
          <div class="col-6 col-xl-2">
            @if($settings)
            <h1 class="mb-0 site-logo"><a href="{{ url('index')}}" class="h2 mb-0"><img src="{{ asset('storage/logo')}}/{{$settings->logo}}" width="100"></a></h1>
            @endif
          </div>

          <div class="col-12 col-md-10 d-none d-xl-block">
            <nav class="site-navigation position-relative text-right" role="navigation">

              <ul class="site-menu main-menu js-clone-nav mr-auto d-none d-lg-block">
                <li class="has-children">
                  <a href="{{ route('index')}}" class="nav-link">VOTRE BANQUE</a>
                  <ul class="dropdown">
                    <li><a href="{{ route('site.historique')}}" class="nav-link">Historique</a></li>
                    <li><a href="" class="nav-link">Profil</a></li>
                    <li><a href="{{ route('site.actionnariat')}}" class="nav-link">Actionnariat</a></li>
                    <li><a href="{{ route('site.vision')}}" class="nav-link">Vision</a></li>
                    <li><a href="{{ route('site.responsabilite')}}" class="nav-link">Responsabilité</a></li>
                    <li><a href="{{ route('site.nos_agences')}}" class="nav-link">Toutes Nos Agences</a></li>
                    <li><a href="{{ route('site.rapport_annuel')}}" class="nav-link">Rapport Annuel</a></li>
                    <li><a href="{{ route('site.etat_financier')}}" class="nav-link">Les Etats Financiers</a></li>
                    <li><a href="{{ route('site.tarif')}}" class="nav-link">Tarif</a></li>
                  </ul>
                </li>
                <li class="has-children">
                  <a href="" class="nav-link">PRODUITS ET SERVICES</a>
                  <ul class="dropdown">
                    <li class="has-children">
                      <a href="#">PRODUITS ET SERVICES DIGITAUX</a>
                      <ul class="dropdown">
                        <li><a href="{{ route('site.coricash')}}">Coricash</a></li>
                        <li><a href="{{ route('site.sms_banking')}}">Sms Banking</a></li>
                      </ul>
                    </li>
                    <li class="has-children">
                      <a href="#">COMPTES COURANTS</a>
                      <ul class="dropdown">
                        <li><a href="{{ route('site.compte_courant')}}">Compte courant</a></li>
                        <li><a href="{{ route('site.compte_devise')}}">Compte devise</a></li>
                        <li><a href="{{ route('site.compte_joint')}}">Compte conjoint</a></li>
                        <li><a href="{{ route('site.compte_epargne')}}">Compte épargne</a></li>
                        <li><a href="{{ route('site.compte_epargne_junior')}}">Compte épargne junior</a></li>
                        <li><a href="{{ route('site.compte_etudiant')}}">Compte étudiant</a></li>
                      </ul>
                    </li>
                    <li class="has-children">
                      <a href="#">CREDITS</a>
                      <ul class="dropdown">
                        <li><a href="{{ route('site.decouvert')}}">Découvert</a></li>
                        <li><a href="{{ route('site.credit_groupe')}}">Crédit groupe</a></li>
                        <li><a href="{{ route('site.credit_agricole')}}">Crédit agricole</a></li>
                        <li><a href="{{ route('site.credit_commercial')}}">Crédit commercial</a></li>
                        <li><a href="{{ route('site.credit_salarie')}}">Crédit salarié</a></li>
                        <li><a href="{{ route('site.credit_logement')}}">Crédit logement k'umuhana</a></li>
                        <li><a href="{{ route('site.credit_artisanal')}}">Crédit artisanal</a></li>
                      </ul>
                    </li>
                  </ul>
                </li>
                <li class="has-children">
                  <a href="#about-section" class="nav-link">PUBLICATIONS</a>
                  <ul class="dropdown">
                    <li><a href="{{ route('site.newsletter')}}" class="nav-link">Newsletter</a></li>
                    <li><a href="{{ route('site.appels_offres')}}" class="nav-link">Appels d'offres</a></li>
                    <li><a href="{{ route('site.actualite')}}" class="nav-link">Actualités</a></li>
                  </ul>
                </li>
                <li><a href="{{ route('site.contact') }}" class="nav-link">Contact</a></li>
                @if($settings)
                <li class="social"><a href="{{$settings->facebook}}" target="_blank" class="nav-link"><span class="icon-facebook"></span></a></li>
                <li class="social"><a href="{{$settings->facebook}}" target="_blank" class="nav-link"><span class="icon-twitter"></span></a></li>
                <li class="social"><a href="{{$settings->linkedln}}" target="_blank" class="nav-link"><span class="icon-linkedin"></span></a></li>
                <li class="social"><a href="https://api.whatsapp.com/send?phone=71945964" target="_blank" class="nav-link"><span class="icon-whatsapp"></span></a></li>
                @endif
              </ul>
            </nav>
          </div>


          <div class="col-6 d-inline-block d-xl-none ml-md-0 py-3" style="position: relative; top: 3px;"><a href="#" class="site-menu-toggle js-menu-toggle float-right"><span class="icon-menu h3"></span></a></div>

        </div>
      </div>
    </header>