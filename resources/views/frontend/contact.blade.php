
<!doctype html>
<html lang="en">
  <head>
    <title>Contact</title>
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
     
    <section class="site-section bg-light" id="contact-section" >
      <div class="container">
        <div class="row mb-5">
          <div class="col-12 text-center">
            <h2 class="section-title mb-3">PRENEZ CONTACT AVEC NOUS
                               OU LAISSEZ-NOUS COMMUNIQUER AVEC VOUS
            </h2>
          </div>
        </div>
        <div class="row mb-5">
          <div class="col-md-4 text-center">
            <p class="mb-4">
              <span class="icon-room d-block h2 text-primary"></span>
              <span>Rohero Avenue 18 Septembre Numéro 34</span>
            </p>
          </div>
          <div class="col-md-4 text-center">
            <p class="mb-4">
              <span class="icon-phone d-block h2 text-primary"></span>
              <a href="#">+257 22280213</a>
            </p>
          </div>
          <div class="col-md-4 text-center">
            <p class="mb-0">
              <span class="icon-mail_outline d-block h2 text-primary"></span>
              <a href="#">corilac@gmail.com</a>
            </p>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12 mb-5">
              <h2 class="h4 text-black mb-5">FORMULAIRE DE CONTACT</h2> 
              <form action="{{ route('site.contact.store') }}" class="p-5 bg-white" method="post">
              @csrf
              <div class="row form-group">
                <div class="col-md-6 mb-3 mb-md-0">
                  <label class="text-black" for="nom">Nom*</label>
                  <input type="text" id="nom" name="nom" class="form-control" placeholder="Nom*" required>
                </div>
                <div class="col-md-6">
                  <label class="text-black" for="prenom">Prenom</label>
                  <input type="text" id="prenom" name="prenom" class="form-control" placeholder="Prenom*" required>
                </div>
              </div>

              <div class="row form-group">
                
                <div class="col-md-12">
                  <label class="text-black" for="email">Email</label> 
                  <input type="email" id="email" name="email" class="form-control" placeholder="Email*" required>
                </div>
              </div>

              <div class="row form-group">
                
                <div class="col-md-12">
                  <label class="text-black" for="sujet">Sujet</label> 
                  <input type="text" id="sujet" name="sujet" class="form-control" placeholder="Sujet*" required>
                </div>
              </div>

              <div class="row form-group">
                <div class="col-md-12">
                  <label class="text-black" for="message">Message</label> 
                  <textarea name="message" id="message" cols="30" rows="7" class="form-control" placeholder="Commentaires*" required></textarea>
                </div>
              </div>

              <div class="row form-group">
                <div class="col-md-12">
                  <button class="btn btn-primary btn-md text-white" type="submit">Envoyer le message</button>
                </div>
              </div>
            </form>
          </div>
          
        </div>
        <div id="map">
        <div class="mapouter container-fluid"><div class="gmap_canvas"><iframe width="1024" height="500" id="gmap_canvas" src="https://maps.google.com/maps?q=corilac%20burundi&t=&z=13&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe><a href="https://fmovies-online.net"></a><br><style>.mapouter{position:relative;text-align:right;height:500px;width:1024px;}</style><a href="https://www.embedgooglemap.net"></a><style>.gmap_canvas {overflow:hidden;background:none!important;height:500px;width:1024px;}</style></div></div>
      </div>
      </div>
    </section>
    @include('frontend.footer')
  </div> 

   @include('frontend.scripts')
  
  </body>
</html>
