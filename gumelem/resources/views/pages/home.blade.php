@extends('layouts.app')

@section('title')
    Wonderful Gumelem
@endsection

@section('content')
    <!-- Header -->
    <header class="text-center">
        <h1>Wonderful
           <br>
           Gumelem
        </h1>
        <a href="{{ url('about/'.$dataAbout->slug) }}" class="btn btn-get-started px-4 mt-4">
          Get Started
        </a>
      </header>
      <!-- Main -->
      <main>
        <section class="section-wisata" id="wisata">
           <div class="container">
            <div class="row">
              <div class="col text-center section-wisata-heading">
                <h2>Objek Wisata</h2>
                <p>Explore The Destinations</p>
              </div>
            </div>
           </div>
        </section>
        <section class="section-wisata-content" id="wisataContent">
          <div class="container">
            <div class="section-wisata-travel row justify-content-center">
              @foreach ($dataGalleries as $item)
                <div class="col-sm-6 col-md-4 col-lg-3">
                    <div class="card-travel text-center d-flex flex-column"
                    style="background-image: url('{{ $item->wisata_galleries->count() ? Storage::url($item->wisata_galleries->first()->image) : '' }}');">
                    <div class="travel-location">{{ $item->title }}</div>
                    <div class="travel-button mt-auto">
                        <a href="{{ route('detail', $item->slug) }}" class="btn btn-travel-details px-4">
                        View Details
                        </a>
                    </div>
                    </div>
                </div>
              @endforeach
            </div>
          </div>
        </section>
        <section class="section section-merchandise" id="merchandise">
          <div class="contrainer">
            <div class="section-merchandise row justify-content-center">
              <div class="col-md-4">
               <h3>Merchandise</h3>
               <p>Find Our Authentics Merchandise
                <br>
                Lorem ipsum, dolor sit amet consectetur adipisicing elit.
               </p>
               <div class="merchandise-button mt-auto">
              </div>
              </div>
            </div>
          </div>
        </section>
        <section class="section-merchandise-content" id="merchandiseContent">
          <div class="container">
            <div class="section-merchandise-item row justify-content-center">
              <div class="container text-center my-3">
                <div class="row mx-auto my-auto justify-content-center">
                    <div id="recipeCarousel" class="carousel slide" data-bs-ride="carousel">
                        <div class="carousel-inner" role="listbox">
                               @foreach ($dataMerchandises as $item)
                               <div class="carousel-item active">
                                    <div class="col-sm-6 col-md-4 col-lg-3">
                                        <div class="card-merchandise-item text-center d-flex flex-column"
                                            style="background-image: url('{{ $item->merchandise_galleries->count() ? Storage::url($item->merchandise_galleries->first()->image) : '' }}');">
                                            <div class="item-location">{{ $item->title }}</div>
                                                <div class="item-button mt-auto">
                                                    <a href="{{ route('order', $item->slug) }}" class="btn btn-merchandise-details px-4">
                                                        View Details
                                                    </a>
                                                </div>
                                        </div>
                                    </div>
                                </div>
                               @endforeach
                        </div>
                        <a class="carousel-control-prev bg-dark w-aut" href="#recipeCarousel" role="button" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        </a>
                        <a class="carousel-control-next bg-dark w-aut" href="#recipeCarousel" role="button" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        </a>
                    </div>
                </div>
            </div>
            </div>
          </div>
        </section>
        <section class="section-morefromus-heading" id="morefromusHeading">
          <div class="container">
            <div class="row">
              <div class="col text-center">
                <h2>More Form Us</h2>
                <p>Benefits When Using Our Service </p>
              </div>
            </div>
          </div>
        </section>
        <section class="section section-morefromus-content" id="morefromusContent">
          <div class="contrainer">
            <div class="section-popular-travel row justify-content-center">
              <div class="col-sm-5 col-md-4 mb-3">
                <div class="card card-morefromus text-center">
                  <div class="morefromus-content">
                    <img src="./frontend/images/icon1.png"
                    alt="tour-guide"
                    class="mb-4"/>
                    <h3 class="mb-4">Tour Guide</h3>
                    <p class="icon1">
                      Helping To Decide On Destinations.
                      <br>
                      Background Story
                      <br>
                      Of Your Destination.
                    </p>
                  </div>
                </div>
              </div>
              <div class="col-sm-5 col-md-4 mb-3">
                <div class="card card-morefromus text-center">
                  <div class="morefromus-content">
                    <img src="./frontend/images/icon2.png"
                    alt="tour-guide"
                    class="mb-4"/>
                    <h3 class="mb-4">Culinary</h3>
                    <p class="icon1">
                      Helping To Decide On Destinations.
                      <br>
                      Background Story
                      <br>
                      Of Your Destination.
                    </p>
                  </div>
                </div>
              </div>
              <div class="col-sm-5 col-md-4 mb-3">
                <div class="card card-morefromus text-center">
                  <div class="morefromus-content">
                    <img src="./frontend/images/icon3.png"
                    alt="tour-guide"
                    class="mb-4"/>
                    <h3 class="mb-4">Homestay</h3>
                    <p class="icon1">
                      Helping To Decide On Destinations.
                      <br>
                      Background Story
                      <br>
                       Of Your Destination.
                    </p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
        <h5 class="text-center">Are you interested?</h5>
        <div class="row">
            <div class="col-12 text-center">
                <a href="{{ route('register') }}" class="btn btn-join-now px-4 mt-4">Join Us</a>
            </div>
        </div>
      </main>
@endsection
