@extends('layouts.app')

@section('title')
    Merchandise
@endsection

@section('content')
<!-- Main -->
<section class="section-order-header"></section>
<section class="section-order-content">
  <div class="container">
    <div class="row">
      <div class="col p-0 pl-3 pl-lg-0">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Merchandise</li>
          </ol>
        </nav>
      </div>
    </div>
    <div class="row">
      <div class="col-lg-8 pl-lg-0">
        <div class="card card-details">
          <h1>{{ $item->title }}</h1>
          @if ($item->merchandise_galleries->count())
                <div class="gallery">
                    <div class="xzoom-container-sm">
                      <img
                        class="xzoom mb-2"
                        id="xzoom-default"
                        src="{{ Storage::url($item->merchandise_galleries->first()->image) }}"
                        xoriginal="{{ Storage::url($item->merchandise_galleries->first()->image) }}"
                      />
                      <div class="xzoom-thumbs">
                        @foreach ($item->merchandise_galleries as $gallery)
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
                    <p style="text-align: justify;">
                        {!! $item->about !!}
                    </p>
                  </div>
                @endif
        </div>
      </div>
      <div class="col-sm">
        <div class="card card-details text-center card-right">
          <h2>Detail Produk</h2>
          <div class="join-container">
            @auth
                <div class="row pb-2">
                    <div class="col-sm">
                        <h3>Stok Barang</h3>
                    </div>
                    <div class="col-sm-lg quanti">
                        <div class="wrapper wrapper-1">
                            <a class="num">{{ $item->quantity }}</a>
                        </div>
                    </div>
                </div>
                <div class="row pb-2">
                    <div class="col-sm">
                        <h3>Harga</h3>
                    </div>
                    <div class="input-group-sm-lg total">
                        <a class="text-currency">Rp.</a>
                        <input class="no-outline text-right" value="{{ $item->price }}" type="currency" id="price" name="price" readonly>
                        <input type="text" value="{{ $item->price }}" id="defaultPrice" hidden>
                    </div>
                </div>
                @if ($item->quantity > 0)
                    <a type="button" class="btn btn-block btn-join-now" href="{{ route('detailmerch', $item->id) }}">
                        Beli
                    </a>
                @else
                    <button type="button" class="btn btn-block btn-join-now" disabled>
                        Habis
                    </button>
                @endif
            @endauth
            @guest
                <a href="{{ route('login') }}" class="btn btn-block btn-join-now mt-3 py-2">Masuk untuk melanjutkan</a>
            @endguest
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
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

