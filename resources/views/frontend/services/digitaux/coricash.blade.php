<!doctype html>
<html lang="en">
  <head>
    <title>CORICASH</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    @include('frontend.styles')
    
  </head>
  <body data-spy="scroll" data-target=".site-navbar-target" data-offset="300">
  
  <div class="site-wrap">

    <div class="site-mobile-menu site-navbar-target">
      <div class="site-mobile-menu-header">
        <div class="site-mobile-menu-close mt-3">
          <span class="icon-close2 js-menu-toggle"></span>
        </div>
      </div>
      <div class="site-mobile-menu-body"></div>
    </div>
    @include('frontend.header')


    <div class="site-section cta-big-image" id="about-section">
      <div class="container">
        <div class="row">
          <div class="col-lg-6 mb-5">
            <figure class="circle-bg">
            <img src="{{ asset('frontend/images/undraw_transfer_money.svg')}}" alt="" class="img-fluid">
            </figure>
          </div>
          <div class="col-lg-5 ml-auto">
            
            <h3 class="text-black mb-4">CORICASH</h3>

            <p>le leader de toutes les microfinances
                Un moyen facile d’envoyer ou transférer l’argent dans tout le pays

                Le meilleur moyen de gérer son propre argent

            </p>

            <p>Le retrait et versement en toute sécurité
              envoyer de l’argent à une personne avec ou sans compte
              Consulter le solde de votre compte
              Etre informer sur chaque mouvement effectué sur ton compte à partir de ton téléphone</p>
            
          </div>
        </div>    
        
      </div>  
    </div>

    <div class="site-section" id="next">
      <div class="container">
        <div class="row mb-5 justify-content-center">
          <div class="col-md-8 text-center">
            <h2 class="section-title mb-3">
            Les avantages de CORICASH</h2>
            <p class="lead"></p>
          </div>
        </div>
        <div class="row mb-5">
          <div class="col-md-4 text-center">
            <img src="{{ asset('frontend/images/undraw_access.svg')}}" alt="" class="img-fluid w-25 mb-4">
            <h3 class="card-title">Accessibilité</h3>
            <p>Les gens qui possèdent ou ont accès à un téléphone mobile ont un accès à CORICASH et peuvent profiter de tous les services. Il fonctionne à travers tous les opérateurs de réseaux mobile.</p>
          </div>
          <div class="col-md-4 text-center">
            <img src="{{ asset('frontend/images/undraw_security.svg')}}" alt="" class="img-fluid w-25 mb-4">
            <h3 class="card-title">Sécurité</h3>
            <p>CORICASH utilise plusieurs méthodes d'authentication pour s'assurer que seul le propriétaire du compte a les accès.</p>
          </div>
          <div class="col-md-4 text-center">
            <img src="{{ asset('frontend/images/undraw_reminder.svg')}}" alt="" class="img-fluid w-25 mb-4">
            <h3 class="card-title">Simplicité</h3>
            <p>Votre compte CORICASH est créé instantanément lorsque vous vous inscrivez dans nos agences et votre téléphone mobile devient votre compte.</p>
          </div>
          <div class="col-md-4 text-center">
            <img src="{{ asset('frontend/images/undraw_transactions.svg')}}" alt="" class="img-fluid w-25 mb-4">
            <h3 class="card-title">Facilité</h3>
            <p>Payer est aussi facile que répondre au téléphone. Une assistance par la messagerie vocale est disponible.</p>
          </div>
          <div class="col-md-4 text-center">
            <img src="{{ asset('frontend/images/undraw_control.svg')}}" alt="" class="img-fluid w-25 mb-4">
            <h3 class="card-title">Contrôle</h3>
            <p>Le service CORICASH vous permet de contrôler vos dépenses en temps réel. Avec CORICASH vous pouvez mieux gérer et améliorer vos finances.</p>
          </div>
        </div>
      </div>
    </div>
    @include('frontend.footer')
  </div> 

  @include('frontend.scripts')

  
  </body>
</html>