
<footer class="site-footer">
      <div class="container">
        <div class="row">
          <div class="col-md-9">
            <div class="row">
              <div class="col-md-5">
                @if($settings)
                <h2 class="footer-heading mb-4"><img src="{{ asset('storage/logo')}}/{{ $settings->logo }}" width="100"></h2>
                @endif
                @if($about)
                <p>{{ $about->description }}</p>
                @endif
              </div>
              <div class="col-md-3 ml-auto footer-social">
                <h2 class="footer-heading mb-4">NOS SERVICES</h2>
                <ul class="list-unstyled">
                  @foreach($services as $service)
                  <li><a href="#about-section" class="smoothscroll">{{$service->title}}</a></li>
                  @endforeach
                </ul>
              </div>
              <div class="col-md-3 ml-auto footer-social">
                <h2 class="footer-heading mb-4">CONTACT INFO & HEURES D'OUVERTURES</h2>
                @if($settings)
                <ul class="list-unstyled">
                  <li><a href="#about-section" class="smoothscroll">{{$settings->quartier}}</a></li>
                  <li><a href="#about-section" class="smoothscroll">{{$settings->rue}}</a></li>
                  <li><a href="#about-section" class="smoothscroll">{{$settings->telephone1}}</a></li>
                  <li><a href="#about-section" class="smoothscroll">{{$settings->email}}</a></li>
                  <li class="smoothscroll">Lun - Ven 8:00 - 17:00</li>
                </ul>
                @endif
              </div>
            </div>
          </div>
          <div class="col-md-3 footer-social">
            <h2 class="footer-heading mb-4">ABONNEZ-VOUS!</h2>
            <form action="{{ route('site.subscriber.store') }}" method="post" class="footer-subscribe">
              @csrf
              <div class="input-group mb-3">
                <input type="text" name="email" class="form-control border-secondary text-white bg-transparent" placeholder="Entrer Email" aria-label="Enter Email" aria-describedby="button-addon2">
                <div class="input-group-append">
                  <button class="btn btn-primary text-black" type="submit" id="button-addon2">SUBSCRIBE</button>
                </div>
              </div>
            </form>
            @if($settings)
                <a href="{{ $settings->facebook }}" target="_blank" class="pl-0 pr-3"><span class="icon-facebook"></span></a>
                <a href="{{ $settings->facebook }}" target="_blank" class="pl-3 pr-3"><span class="icon-twitter"></span></a>
                <a href="https://api.whatsapp.com/send?phone=71945964" target="_blank" class="pl-3 pr-3"><span class="icon-whatsapp"></span></a>
                <a href="{{ $settings->linkedln }}" target="_blank" class="pl-3 pr-3"><span class="icon-linkedin"></span></a>
            @endif
          </div>
        </div>
        <div class="row pt-5 mt-5 text-center">
          <div class="col-md-12">
            <div class="border-top pt-5">
              <p>Copyright &copy;
                <script>document.write(new Date().getFullYear());</script> Tous les droits sont reservés | Designed by <i class="icon-heart-o" aria-hidden="true"></i>@if($settings) {{$settings->developpeur}} @endif
              </p>
        
            </div>
          </div>
          
        </div>
      </div>
    </footer>