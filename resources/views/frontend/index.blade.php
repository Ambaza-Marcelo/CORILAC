<!doctype html>
<html lang="en">
  <head>
    <title>CORILAC</title>
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
     @if($imageSlider)
    <div class="site-blocks-cover overlay" style="background-image: url({{ asset('storage/sliders/'.$imageSlider->image)}});" data-aos="" id="home-section">
        @endif
      <div class="container">
        <div class="row align-items-center justify-content-center">

          
          <div class="col-md-10 mt-lg-5 text-center">
            <div class="single-text owl-carousel">
              @foreach($sliders as $slider)
              <div class="slide">
                <h1 class="text-uppercase">{{ $slider->title }}</h1>
                <p class="mb-5 desc">{{ $slider->subtitle }}</p>
                <div>
                  <a href="{{ route('site.coricash')}}" target="_blank" class="btn  btn-primary mr-2 mb-2">Savoir plus...</a>
                </div>
              </div>
              @endforeach
            </div>
          </div>
            
        </div>
      </div>

      <a href="#next" class="mouse smoothscroll">
        <span class="mouse-icon">
          <span class="mouse-wheel"></span>
        </span>
      </a>
    </div>  


    <div class="site-section cta-big-image" id="about-section">
      <div class="container">
        <div class="row mb-5 justify-content-center">
          <div class="col-md-8 text-center">
            <h2 class="section-title mb-3">
            A Propos de CORILAC</h2>
            <p class="lead"></p>
          </div>
        </div>
        @if($about)
        <div class="row">
          <div class="col-lg-6 mb-5">
            <figure class="circle-bg">
            <img src="{{ asset('storage/abouts')}}/{{$about->image}}" alt="" class="img-fluid">
            </figure>
          </div>
          <div class="col-lg-5 ml-auto">
            
            <h3 class="text-black mb-4">{{ $about->title }}</h3>

            <p>{{ $about->description }}</p>
            
          </div>
        </div>    
        @endif
      </div>  
    </div>

    <section class="site-section">
      <div class="container"> 
        <div class="row align-items-lg-center" >
          <div class="col-lg-6 mb-5">

            <div class="owl-carousel slide-one-item-alt circle-bg">
              @foreach($accounts as $account)
              <img src="{{ asset('storage/accounts')}}/{{ $account->image}}" alt="Image" class="img-fluid">
              @endforeach
            </div>
            <div class="custom-direction">
              <a href="#" class="custom-prev"><span><span class="icon-keyboard_backspace"></span></span></a><a href="#" class="custom-next"><span><span class="icon-keyboard_backspace"></span></span></a>
            </div>

          </div>
          <div class="col-lg-5 ml-auto">
            
            <div class="owl-carousel slide-one-item-alt-text">
              @foreach($accounts as $account)
              <div>
                <h2 class="section-title mb-3">{{$account->title}}</h2>
                <p>{{ $account->description }}</p>

                <p><a href="#" class="btn btn-primary mr-2 mb-2">plus..</a></p>
              </div>  
              @endforeach
            </div>
            
          </div>
        </div>
      </div>
    </section>
    <section class="site-section">
      <div class="container"> 
        <div class="row align-items-lg-center" >
          <div class="col-lg-6 mb-5">

            <div class="owl-carousel slide-one-item-alt circle-bg">
              @foreach($credits as $credit)
              <img src="{{ asset('storage/credits')}}/{{$credit->image}}" alt="Image" class="img-fluid">
              @endforeach
            </div>
            <div class="custom-direction">
              <a href="#" class="custom-prev"><span><span class="icon-keyboard_backspace"></span></span></a><a href="#" class="custom-next"><span><span class="icon-keyboard_backspace"></span></span></a>
            </div>

          </div>
          <div class="col-lg-5 ml-auto">
            
            <div class="owl-carousel slide-one-item-alt-text">
              @foreach($credits as $credit)
              <div>
                <h2 class="section-title mb-3">{{$credit->title}}</h2>
                <p>{{ $credit->description }}</p>

                <p><a href="#" class="btn btn-primary mr-2 mb-2">plus..</a></p>
              </div>  
              @endforeach
            </div>
            
          </div>
        </div>
      </div>
    </section>

    
    

    <section class="site-section border-bottom bg-light" id="services-section">
      <div class="container">
        <div class="row mb-5">
          <div class="col-12 text-center">
            <h2 class="section-title mb-3">Nos Services</h2>
          </div>
        </div>
        <div class="row align-items-stretch">
          @foreach($services as $service)
          <div class="col-md-6 col-lg-4 mb-4 mb-lg-4">
            <div class="unit-4">
              <div class="unit-4-icon">
                <img src="{{ asset('storage/services')}}/{{$service->image}}" alt="" class="img-fluid w-25 mb-4">
              </div>
              <div>
                <h3>{{ $service->title }}</h3>
                <p>{{ $service->description }}</p>
                <p><a href="#">Savoir plus</a></p>
              </div>
            </div>
          </div>
          @endforeach
      </div>
    </section>

    <section class="site-section" id="about-section">
      <div class="container">

        <div class="row">
          <div class="col-lg-6 mb-5" data-aos-delay="">
            <figure class="circle-bg">
            <img src="{{ asset('frontend/images/undraw_transfer_money.svg')}}" alt="" class="img-fluid">
            </figure>
          </div>
          <div class="col-lg-5 ml-auto" data-aos-delay="100">
            
            <div class="sidebar-box">
              <div class="categories">
                <li><a href="#">PAY/TRANSFER</a></li>
                <li><a href="#">TAX PAY</a></li>
                <li><a href="#">BILL PAY</a></li>
                <li><a href="#">AIRTIME</a></li>
                <li><a href="#">TV</a></li>
                <li><a href="#">CHECK BALANCE</a></li>
              </div>
            </div>

        
      </div>
    </section>
  
    <section class="site-section" id="blog-section">
      <div class="container">
        <div class="row mb-5">
          <div class="col-12 text-center">
            <h2 class="section-title mb-3">Actualités</h2>
          </div>
        </div>

        <div class="row">
          @foreach($actualites as $actualite)
          <div class="col-md-6 col-lg-4 mb-4 mb-lg-4" data-aos-delay="">
            <div class="h-entry">
              <a href="{{ route('site.actualite-show',$actualite->id)}}">
                <img src="{{ asset('storage/actualites')}}/{{$actualite->image}}" alt="Image" class="img-fluid">
              </a>
              <h2 class="font-size-regular"><a href="{{ route('site.actualite-show',$actualite->id)}}">{{$actualite->title}}</a></h2>
              <div class="meta mb-4">Ambaza Marcellin<span class="mx-2">&bullet;</span>Le {{ \Carbon\Carbon::parse($actualite->created_at)->format('d/m/Y h:i:s') }}<span class="mx-2">&bullet;</span></div>
              <p>
                {{ substr(strip_tags($actualite->description), 0, 100) }}
              </p>
              @if( strlen(strip_tags($actualite->description)) > 100 )
              <p>
                <a href="{{ route('site.actualite-show',$actualite->id)}}">lire plus...</a>
              </p>
              @endif
            </div> 
          </div>
          @endforeach
        </div>
      </div>
    </section>

    @include('frontend.footer')
  </div> 

  @include('frontend.scripts')

  
  </body>
</html>