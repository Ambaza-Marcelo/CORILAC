<!doctype html>
<html lang="en">
  <head>
    <title>Vision</title>
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

    <section class="site-section" id="about-section">
        <div class="row">
          <div class="col-md-6" data-aos-delay="100">
            <div class="sidebar-box">
              <div class="categories">
                <li><a href="#">HISTORIQUE</a></li>
                <li><a href="#">PROFIL</a></li>
                <li><a href="#">ACTIONNARIAT</a></li>
                <li><a href="#">VISION</a></li>
                <li><a href="#">RESPONSABILITE</a></li>
                <li><a href="#">TOUTES NOS AGENCES</a></li>
                <li><a href="#">RAPPORT ANNUEL</a></li>
                <li><a href="#">LES ETATS FINANCIERS</a></li>
                <li><a href="#">TARIF</a></li>
              </div>
            </div>
        </div>
          <div class="col-md-6" data-aos-delay="">
            <h2>VISION</h2>
            <p>
              @if($vision)
                {{ $vision->description }}
              @endif
            </p>
          </div>
      </div>       
    </section>
    @include('frontend.footer')

  @include('frontend.scripts')

  
  </body>
</html>