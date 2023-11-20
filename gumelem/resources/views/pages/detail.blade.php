@extends('layouts.app')

@section('title')
    Wisata Gumelem
@endsection

@section('content')
    <!-- Main -->
    <section class="section-details-header"></section>
      <section class="section-details-content">
        <div class="container">
          <div class="row">
            <div class="col p-0 pl-3 pl-lg-0">
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Objek Wisata</li>
                </ol>
              </nav>
            </div>
          </div>
          <div class="row">
            <div class="col-lg-8 pl-lg-0">
              <div class="card card-details">
                <h1>Pemandian Banyu Anget Pingit</h1>
                <div class="gallery">
                  <div class="xzoom-container-sm">
                    <img
                      class="xzoom"
                      id="xzoom-default"
                      src="frontend/images/Details-1.jpg"
                      xoriginal="frontend/images/Details-1.jpg"
                    />
                    <div class="xzoom-thumbs">
                      <a href="frontend/images/Details-1.jpg"
                        ><img
                          class="xzoom-gallery"
                          width="128"
                          src="frontend/images/Details-1.jpg"
                          xpreview="frontend/images/Details-1.jpg"
                      /></a>
                      <a href="frontend/images/Details-1.jpg"
                        ><img
                          class="xzoom-gallery"
                          width="128"
                          src="frontend/images/Details-1.jpg"
                          xpreview="frontend/images/Details-1.jpg"
                      /></a>
                      <a href="frontend/images/Details-1.jpg"
                        ><img
                          class="xzoom-gallery"
                          width="128"
                          src="frontend/images/Details-1.jpg"
                          xpreview="frontend/images/Details-1.jpg"
                      /></a>
                      <a href="frontend/images/Details-1.jpg"
                        ><img
                          class="xzoom-gallery"
                          width="128"
                          src="frontend/images/Details-1.jpg"
                          xpreview="frontend/images/Details-1.jpg"
                      /></a>
                      <a href="frontend/images/Details-1.jpg"
                        ><img
                          class="xzoom-gallery"
                          width="128"
                          src="frontend/images/Details-1.jpg"
                          xpreview="frontend/images/Details-1.jpg"
                      /></a>
                    </div>
                  </div>
                  <h2>Tentang Wisata</h2>
                  <p>
                    Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
                  </p>
                  <p>
                    Bali and a district of Klungkung Regency that includes the
                    neighbouring small island of Nusa Lembongan. The Badung
                    Strait separates the island and Bali.
                  </p>
                </div>
              </div>
            </div>
            <div class="col-lg-4">
              <div class="card card-details card-right">
                <h2>Trip Informations</h2>
                <br>
                <h3>Peta Lokasi</h3>
                <div class="ratio ratio-16x9">
                  <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3955.526123498345!2d109.41679267512967!3d-7.517445292495397!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e654fd15052db83%3A0x831df2015ff755c9!2sPemandian%20Air%20Panas%20Pingit!5e0!3m2!1sid!2sid!4v1699083555367!5m2!1sid!2sid" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
                <div class="join-container">
                  <a href="checkout.html" class="btn btn-block btn-join-now mt-3 py-2"
                  >Menuju Lokasi
                  </a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
    </main>
@endsection

@push('prepend-style')
    <link rel="stylesheet" href="{{ url('frontend/libraries/xzoom/xzoom.css') }}">
@endpush

@push('addon-script')
<script src="{{ url('frontend/libraries/xzoom/xzoom.min.js') }}"></script>
<script>
  $(document).ready(function() {
    $('.xzoom, .xzoom-gallery').xzoom({
      zoomWidth: 400,
      title: false,
      tint: '#333',
      Xoffset: 15
    });
  });
</script>
<script>
  $(window).scroll(function() {
    var offset = $(window).scrollTop();
    console.log(offset);
    $('.navbar').toggleClass('trans', offset < 50);
  });
</script>
@endpush
