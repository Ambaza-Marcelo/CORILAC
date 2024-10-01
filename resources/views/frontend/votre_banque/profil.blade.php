<!doctype html>
<html lang="en">
  <head>
    <title>Profil</title>
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
            Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
            tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
            quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
            consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
            cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
            proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
            <br>
            <div class="row">
              <div class="col-md-4">
                <div>
                  <p>Groupe Privé</p>
                  <p>83%</p>
                </div>
              </div>
              <div class="col-md-4">
                <div>
                  <p>Groupe Public</p>
                  <p>0.1%</p>
                </div>
              </div>
              <div class="col-md-4">
                <div>
                  <p>INSS</p>
                  <p>3.9%</p>
                </div>
              </div>
              <div class="col-md-4">
                <div>
                  <p>SOCABU</p>
                  <p>11%</p>
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