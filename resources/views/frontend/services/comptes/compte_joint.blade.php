<!doctype html>
<html lang="en">
  <head>
    <title>Compte Conjoint</title>
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
            <img src="{{ asset('frontend/images/undraw_account.svg')}}" alt="" class="img-fluid">
            </figure>
          </div>
          <div class="col-lg-5 ml-auto">
            
            <h1 class="text-black mb-4">Compte Conjoint</h1>

            <p>Un compte joint est un compte bancaire ouvert par au moins 2 personnes (les cotitulaires) pour faciliter la gestion des dépenses communes.
            Ce compte est régi par un certain nombre de règles spécifiques, permettant à tous les signataires de détenir les mêmes droits et les mêmes responsabilités vis- à-vis du compte.

            </p>
            <p>
              Visitez l’agence CORILAC la plus proche de vous pour ouvrir votre compte courant.
            </p>
            
          </div>
        </div>    
        
      </div>  
    </div>
    @include('frontend.footer')
  </div> 

  @include('frontend.scripts')

  
  </body>
</html>