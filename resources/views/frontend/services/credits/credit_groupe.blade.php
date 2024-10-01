<!doctype html>
<html lang="en">
  <head>
    <title>CRÉDIT GROUPE</title>
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
            <img src="{{ asset('frontend/images/undraw_credit.svg')}}" alt="" class="img-fluid">
            </figure>
          </div>
          <div class="col-lg-5 ml-auto">
            
            <h1 class="text-black mb-4">CRÉDIT GROUPE</h1>

            <p>Dans un environnement où le coût de la vie devient de plus en plus cher, beaucoup d'employés ont besoin d'un appui financier. CORILAC vous offre le Crédit Groupe.
            </p>
            <p>
              <strong>Le Crédit Groupe</strong> offre des facilités aux employés des sociétés, des Organismes Publics, du Système des Nations Unies, des ONG et ASBL qui présentent leurs demandes de crédit en groupe.
            </p>
            <p>
              Le Crédit Groupe peut avoir une durée de remboursement allant jusqu'à 5 ans pour autant que le contrat avec l'employeur soit de même durée.
            </p>
            
          </div>
        </div> 
        <div class="row">
          <div class="col-lg-5 ml-auto">
            
            <h1 class="text-black mb-4">CARACTERISTIQUES :</h1>
            <p>
              <ul class="list-unstyled ul-check success">
                <li>Crédit Sur Salaire En Groupe</li>
                <li>Taux D'intérêt De Faveur</li>
                <li>Durée De Remboursement Allant Jusqu'à 5 Ans</li>
                <li>Garanti Par La Cession De Salaire Et La Caution Solidaire</li>
                <li>Mensualité Retenue Par L'employeur Et Versée À La Banque</li>
              </ul>
            </p>
            
          </div>
          <div class="col-lg-6 mb-5">
            <figure class="circle-bg">
            <img src="{{ asset('frontend/images/undraw_credit_card_payments.svg')}}" alt="" class="img-fluid">
            </figure>
          </div>
        </div>     
        
      </div>  
    </div>
    @include('frontend.footer')
  </div> 

  @include('frontend.scripts')

  
  </body>
</html>