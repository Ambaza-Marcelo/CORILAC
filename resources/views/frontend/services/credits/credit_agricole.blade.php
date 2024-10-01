<!doctype html>
<html lang="en">
  <head>
    <title>Credit Agricole</title>
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
    <div class="jumbotron">
      
    </div>
     
    <div class="site-section cta-big-image" id="about-section">
      <div class="container">
        <div class="row">
          <div class="col-lg-6 mb-5">
            <figure class="circle-bg">
            <img src="{{ asset('frontend/images/undraw_taken.svg')}}" alt="" class="img-fluid">
            </figure>
          </div>
          <div class="col-lg-5 ml-auto">
            
            <h1 class="text-black mb-4">Credit Agricole</h1>

            <p>Vous souhaitez vous constituer une épargne progressive, au gré de vos rentrées de compte, CORILAC vous offre un compte d’épargne ordinaire aux conditions suivantes :

            </p>
            <p>
              <ul>
                <li>Il est alimenté par des fonds de montants variables en fonction de vos possibilités ;</li>
                <li>Les retraits ne sont autorisés qu’une fois par trimestre ;</li>
                <li>Il est rémunéré une fois, à la fin de l’année ;</li>
                <li>Pas de frais de gestion.</li>
              </ul>
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