<!doctype html>
<html lang="en">
  <head>
    <title>Compte Devise</title>
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
            
            <h1 class="text-black mb-4">Compte Devise</h1>

            <p>Le compte devise de CORILAC est un compte courant en monnaie étrangère non rémunéré qui est associé à une carte bancaire internationale (Visa Prépayé, Electron, Classique et Visa Gold selon votre choix) et qui vous donne accès à votre argent 24h/24 et 7j/7.

            </p>
            <p>
              Ce compte vous permet de recevoir des virements provenant de l’étranger en devises, de recevoir des revenus de l’étranger et de bénéficier d’une carte visa pour régler vos dépenses, préparez votre voyage ou retirez de l’argent à l’étranger en toute tranquillité.
            </p>
            <p>
              Visitez l’agence CORILAC la plus proche de vous pour ouvrir votre compte devise.
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