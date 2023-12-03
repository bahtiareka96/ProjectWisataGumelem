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
                  <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Objek Wisata</li>
                </ol>
              </nav>
            </div>
          </div>
          <div class="row">
            <div class="col-lg-8 pl-lg-0">
              <div class="card card-details">
                <h1>{{ $item->title }}</h1>
                @if ($item->wisata_galleries->count())
                <div class="gallery">
                    <div class="xzoom-container-sm">
                      <img
                        class="xzoom mb-2"
                        id="xzoom-default"
                        src="{{ Storage::url($item->wisata_galleries->first()->image) }}"
                        xoriginal="{{ Storage::url($item->wisata_galleries->first()->image) }}"
                      />
                      <div class="xzoom-thumbs">
                        @foreach ($item->wisata_galleries as $gallery)
                            <a href="{{ Storage::url($gallery->image) }}"
                                ><img
                                class="xzoom-gallery"
                                width="128"
                                src="{{ Storage::url($gallery->image) }}"
                                xpreview="{{ Storage::url($gallery->image) }}"/>
                            </a>
                        @endforeach
                      </div>
                    </div>
                    <h2>Tentang Wisata</h2>
                    <p>
                        {!! $item->about !!}
                    </p>
                  </div>
                @endif
              </div>
            </div>
            <div class="col-lg-4">
              <div class="card card-details card-right">
                <h2>Trip Informations</h2>
                <br>
                <h3>Peta Lokasi</h3>
                <div class="ratio ratio-16x9">
                  <iframe src="{{ $item->location }}"></iframe>
                </div>
                <div class="join-container">
                  <a href="{{ $item->location }}" target="_blank" class="btn btn-block btn-join-now mt-3 py-2"
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
