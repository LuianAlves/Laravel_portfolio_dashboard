@extends('layouts.master_home')

@section('home_content')

  <!-- ====== Slider ===== -->
  <section id="hero">
    <div id="heroCarousel" class="carousel slide carousel-fade" data-ride="carousel">

      <div class="carousel-inner" role="listbox">
        @foreach($sliders as $key => $slider)
          <div class="carousel-item {{ $key == 0 ? 'active' : '' }}" style="background-image: url({{ asset($slider->image)}});">
            <div class="carousel-container">
              <div class="carousel-content animate__animated animate__fadeInUp">
                <h2>{{ $slider->title }}</h2>
                <p>{{ $slider->description }}</p>
                <div class="text-center"><a href="" class="btn-get-started">Read More</a></div>
              </div>
            </div>
          </div>
        @endforeach
      </div>

      <a class="carousel-control-prev" href="#heroCarousel" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon icofont-simple-left" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>

      <a class="carousel-control-next" href="#heroCarousel" role="button" data-slide="next">
        <span class="carousel-control-next-icon icofont-simple-right" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>

      <ol class="carousel-indicators" id="hero-carousel-indicators"></ol>

    </div>
  </section>
  <!-- ======= About Us Section ======= -->
  <section id="about-us" class="about-us">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>About Us</strong></h2>
        </div>
        
        @foreach($abouts as $about)
            <div class="row content pt-5">
              <div class="col-lg-6" data-aos="fade-right">
                <h2>{{ $about->title }}</h2>
                <h3>{{ $about->sort_description }}</h3>
              </div>

              <div class="col-lg-6 pt-4 pt-lg-0" data-aos="fade-left">
                <p>
                  {{$about->long_description}}
                </p>
                @if($about->sub_description != '')
                  <ul>
                    <li><i class="ri-check-double-line"></i>{{ $about->sub_description }}</li>
                  </ul>
                @endif
                @if($about->long_description_sec != '')
                  <p class="font-italic">
                    {{ $about->long_description_sec }}
                  </p>
                @endif
              </div>          
            </div>
          @endforeach

      </div>
  </section><!-- End About Us Section -->
  
  <!-- ======= Portfolio Section ======= -->
  <section id="portfolio" class="portfolio">
    <div class="container">

      <div class="section-title" data-aos="fade-up">
        <h2>Portfolio</h2>
      </div>

      <div class="row portfolio-container" data-aos="fade-up">
          @foreach($portfolio as $port)
          <div class="col-4 portfolio-item">
            <img src="{{ $port->image }}" class="img-fluid" alt="">
            <div class="portfolio-info">
              <h4>{{ $port->title }}</h4>
              <p class="mt-5">{{ $port->description }}</p>
              <a href="{{ $port->image }}" data-gall="portfolioGallery" class="venobox preview-link" title="{{ $port->title }}"><i class="bx bx-plus"></i></a>
              <a href="{{ url('portfolio/detail/'.$port->id) }}" class="details-link" title="More Details"><i class="bx bx-link"></i></a>
            </div>
          </div>
          @endforeach
        </div>

    </div>
  </section><!-- End Portfolio Section -->

  <!-- ======= Our Clients Section ======= -->
  <section id="clients" class="clients">
      <div class="container" data-aos="fade-up">
        
          <div class="section-title">
            <h2>Languages</h2>
          </div>

          <div class="row" data-aos="fade-up">
            @foreach($brands as $brand)
              <div class="col-3">
                  <div class="client-logo">
                      <img src="{{ $brand->brand_image }}">
                  </div>
              </div>
            @endforeach
          </div>
      </div>
  </section><!-- End Our Clients Section -->

@endsection