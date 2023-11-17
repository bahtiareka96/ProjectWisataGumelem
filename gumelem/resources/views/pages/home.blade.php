@extends('layouts.app')

@section('title')
    Wisata Gumelem
@endsection

@section('content')
    <!-- Header -->
    <header class="text-center">
        <h1>Wonderful
           <br>
           Gumelem
        </h1>
        <a href="#" class="btn btn-get-started px-4 mt-4">
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
              <div class="col-sm-6 col-md-4 col-lg-3">
                <div class="card-travel text-center d-flex flex-column"
                style="background-image: url('frontend/images/hotspring.jpg');">
                  <div class="travel-location">Pemandian Banyu Anget Pingit</div>
                  <div class="travel-button mt-auto">
                    <a href="#" class="btn btn-travel-details px-4">
                      View Details
                    </a>
                  </div>
                </div>
              </div>
              <div class="col-sm-6 col-md-4 col-lg-3">
                <div class="card-travel text-center d-flex flex-column"
                style="background-image: url('frontend/images/grave.jpg');">
                  <div class="travel-location">Makam Pademangan</div>
                  <div class="travel-button mt-auto">
                    <a href="#" class="btn btn-travel-details px-4">
                      View Details
                    </a>
                  </div>
                </div>
              </div>
              <div class="col-sm-6 col-md-4 col-lg-3">
                <div class="card-travel text-center d-flex flex-column"
                style="background-image: url('frontend/images/grave.jpg');">
                  <div class="travel-location">Makam Ki Ageng Giring</div>
                  <div class="travel-button mt-auto">
                    <a href="/details" class="btn btn-travel-details px-4">
                      View Details
                    </a>
                  </div>
                </div>
              </div>
              <div class="col-sm-6 col-md-4 col-lg-3">
                <div class="card-travel text-center d-flex flex-column"
                style="background-image: url('frontend/images/grave.jpg');">
                  <div class="travel-location">Makam Sunan Geseng</div>
                  <div class="travel-button mt-auto">
                    <a href="#" class="btn btn-travel-details px-4">
                      View Details
                    </a>
                  </div>
                </div>
              </div>
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
              <!-- <div class="col-md-4">
                <div class="card-merchandise d-flex flex-column align-items-center"
                style="background-image: url('frontend/images/merch.png');">
                </div>
              </div> -->
            </div>
          </div>
        </section>
        <section class="section-merchandise-content" id="merchandiseContent">
          <div class="container">
            <div class="section-merchandise-item row justify-content-center">
              <div class="col-sm-6 col-md-4 col-lg-3">
                <div class="card-merchandise-item text-center d-flex flex-column"
                style="background-image: url('frontend/images/hotspring.jpg');">
                  <div class="item-location">Motif A</div>
                  <div class="item-button mt-auto">
                    <a href="#" class="btn btn-merchandise-details px-4">
                      View Details
                    </a>
                  </div>
                </div>
              </div>
              <div class="col-sm-6 col-md-4 col-lg-3">
                <div class="card-merchandise-item text-center d-flex flex-column"
                style="background-image: url('frontend/images/hotspring.jpg');">
                  <div class="item-location">Motif B</div>
                  <div class="item-button mt-auto">
                    <a href="#" class="btn btn-merchandise-details px-4">
                      View Details
                    </a>
                  </div>
                </div>
              </div>
              <div class="col-sm-6 col-md-4 col-lg-3">
                <div class="card-merchandise-item text-center d-flex flex-column"
                style="background-image: url('frontend/images/hotspring.jpg');">
                  <div class="item-location">Motif C</div>
                  <div class="item-button mt-auto">
                    <a href="#" class="btn btn-merchandise-details px-4">
                      View Details
                    </a>
                  </div>
                </div>
              </div>
              <div class="col-sm-6 col-md-4 col-lg-3">
                <div class="card-merchandise-item text-center d-flex flex-column"
                style="background-image: url('frontend/images/hotspring.jpg');">
                  <div class="item-location">Motif D</div>
                  <div class="item-button mt-auto">
                    <a href="#" class="btn btn-merchandise-details px-4">
                      View Details
                    </a>
                  </div>
                </div>
              </div>
              <div class="col-sm-6 col-md-4 col-lg-3">
                <div class="card-merchandise-item text-center d-flex flex-column"
                style="background-image: url('frontend/images/hotspring.jpg');">
                  <div class="item-location">Motif A</div>
                  <div class="item-button mt-auto">
                    <a href="#" class="btn btn-merchandise-details px-4">
                      View Details
                    </a>
                  </div>
                </div>
              </div>
              <div class="col-sm-6 col-md-4 col-lg-3">
                <div class="card-merchandise-item text-center d-flex flex-column"
                style="background-image: url('frontend/images/hotspring.jpg');">
                  <div class="item-location">Motif A</div>
                  <div class="item-button mt-auto">
                    <a href="#" class="btn btn-merchandise-details px-4">
                      View Details
                    </a>
                  </div>
                </div>
              </div>
              <div class="col-sm-6 col-md-4 col-lg-3">
                <div class="card-merchandise-item text-center d-flex flex-column"
                style="background-image: url('frontend/images/hotspring.jpg');">
                  <div class="item-location">Motif A</div>
                  <div class="item-button mt-auto">
                    <a href="#" class="btn btn-merchandise-details px-4">
                      View Details
                    </a>
                  </div>
                </div>
              </div>
              <div class="col-sm-6 col-md-4 col-lg-3">
                <div class="card-merchandise-item text-center d-flex flex-column"
                style="background-image: url('frontend/images/hotspring.jpg');">
                  <div class="item-location">Motif A</div>
                  <div class="item-button mt-auto">
                    <a href="#" class="btn btn-merchandise-details px-4">
                      View Details
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
      </main>
@endsection
