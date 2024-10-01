<!doctype html>
<html lang="en">
  <head>
    <title>Actionnariat</title>
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
            <h2>ACTIONNARIAT</h2>
            Aujourd'hui le capital social de CORILAC arrêté à 600.000.000 BIF il est représenté par 450.000.000 actions, soit :
            <br>
            <div class="row">
              <div class="col-md-4">
                <div>
                  <p>Groupe Privé</p>
                  <p><button class="btn btn-primary"> 83% </button></p>
                </div>
              </div>
              <div class="col-md-4">
                <div>
                  <p>Groupe Public</p>
                  <p><button class="btn btn-primary"> 0.1% </button></p>
                </div>
              </div>
              <div class="col-md-4">
                <div>
                  <p>INSS</p>
                  <p><button class="btn btn-primary"> 3.9% </button></p>
                </div>
              </div>
              <div class="col-md-4">
                <div>
                  <p>SOCABU</p>
                  <p><button class="btn btn-primary"> 11% </button></p>
                </div>
              </div>
            </div>
          </div>
      </div>       
    </section>
    @include('frontend.footer')

  @include('frontend.scripts')

  
  </body>
</html>