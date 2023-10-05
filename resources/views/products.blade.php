@extends('layouts.master')
@section('title')
    الرئيسية
@endsection
  <main id="main">
    @section('content')
    <section id="portfolio" class="portfolio mt-5">

        <div class="container" data-aos="fade-up">
  
          <header class="section-header">
            <h2>{{__("messages.Products")}}</h2>
            <p>{{__("messages.Our Products")}}</p>
          </header>
  
          <div class="row" data-aos="fade-up" data-aos-delay="100">
            <div class="col-lg-12 d-flex justify-content-center">
              <ul id="portfolio-flters">
                <li data-filter="*" class="filter-active">{{__("messages.All")}}</li>
                @foreach ($categories as $category)
                  <li data-filter=".filter-{{$category->name}}">{{$category->display_name}}</li>
                @endforeach
              </ul>
            </div>
          </div>
  
          <div class="row gy-4 portfolio-container" data-aos="fade-up" data-aos-delay="200">
  
            @foreach ($products as $product)
            <div class="col-lg-4 col-md-6 portfolio-item filter-{{ $product->category->name}}">
                <div class="portfolio-wrap">
                    @php
                        $mainImage = $product->images[0]->path;
                    @endphp
                    <img src="{{asset("images/$mainImage ")}}" class="img-fluid" alt="">
                    <div class="portfolio-info">
                    <h4>{{$product->name}}</h4>
                    <p>{{$product->sub_name}}</p>
                        <div class="portfolio-links">
                            <a href="assets/img/portfolio/portfolio-1.jpg" data-gallery="portfolioGallery" class="portfokio-lightbox" title="App 1"><i class="bi bi-plus"></i></a>
                            <a href="portfolio-details.html" title="More Details"><i class="bi bi-link"></i></a>
                        </div>
                    </div>
                </div>
            </div>
    
            @endforeach

        



          </div>
  
        </div>
  
      </section>
    @endsection
  </main>
