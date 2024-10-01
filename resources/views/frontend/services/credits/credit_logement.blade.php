<!doctype html>
<html lang="en">
  <head>
    <title>CREDIT LOGEMENT</title>
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
            <img src="{{ asset('frontend/images/undraw_taken.svg')}}" alt="" class="img-fluid">
            </figure>
          </div>
          <div class="col-lg-5 ml-auto">
            
            <h1 class="text-black mb-4">CREDIT LOGEMENT</h1>

            <p>CREDIT LOGEMENT est un crédit à court terme vous permettant de financer vos besoins d'urgence.
            </p>  
          </div>
        </div> 
        <div class="row">
          <div class="col-lg-5 ml-auto">
            
            <h1 class="text-black mb-4">CARACTERISTIQUES :</h1>
            <p>
              <ul class="list-unstyled ul-check success">
                <li>Avance Sur Salaire Jusqu'à 80% Du Salaire Net</li>
                <li>Utilisable Sur Durée De 6 Mois</li>
                <li>Fonds Disponibles En Moins De 12h</li>
                <li>Garanti Par La Cession De Salaire</li>
              </ul>
            </p>
            <p>
              Pour toute information complémentaire veuillez contactez l'Agence de corilac la plus proche.
            </p>
            
          </div>
          <div class="col-lg-6 mb-5">
            <figure class="circle-bg">
            <img src="{{ asset('frontend/images/undraw_credit_card.svg')}}" alt="" class="img-fluid">
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