<!doctype html>
<html lang="en">
  <head>
    <title>Compte Courant</title>
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
            
            <h1 class="text-black mb-4">Compte Courant</h1>

            <p>Le compte courant est un compte classique, disponible en Francs Burundais (FBU). Il permet à son titulaire de gérer ses opérations quotidiennes donnant ainsi accès à une large gamme de services offerts par CORILAC. Simple et souple d’utilisation, le compte courant s’adapte à vos besoins actuels et futurs.

            </p>
            <p>
              Ce compte peut être utilisé pour recevoir des crédits, bénéficier des découverts bancaires, effectuer des virements automatiques, ou d'émettre et recevoir des transferts/paiements nationaux et internationaux. Après avoir ouvert votre compte courant, vous pouvez ouvrir un compte coricash qui vous donne accès à votre argent 24h/24 et 7j/7 à travers notre large réseau des agents coricash.
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