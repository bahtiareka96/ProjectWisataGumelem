@extends('layouts.app')

@section('title')
    Detail Merchandise
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
            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Merchandise</li>
          </ol>
        </nav>
      </div>
    </div>
    <div class="row">
      <div class="col-lg-8 pl-lg-0">
        <div class="card card-details">
          <h1>Batik Gumelem Model A</h1>
          <div class="gallery">
            <div class="xzoom-container">
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
            <h2>Tentang Produk</h2>
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
      <div class="col-sm">
        <div class="card card-details text-center card-right">
          <h2>Pengiriman dan pembayaran</h2>
          <div class="row pb-2">
            <div class="col-sm">
              <h3>Email</h3>
            </div>
            <div class="col-sm-lg">
              <h4>abc@gmail.com</h4>
            </div>
          </div>
          <div class="row pb-2">
            <div class="col-sm">
              <h3>Alamat</h3>
            </div>
            <div class="col-sm-lg">
              <h4>Jl.Sarwoendah 2, Purwokerto Kidul, Purwokerto Selatan, Kab. Banyumas</h4>
            </div>
          </div>
          <div class="row pb-2">
            <div class="col-sm">
              <h3>Pengiriman</h3>
            </div>
            <div class="col-sm-lg">
              <h4>Reguler</h4>
            </div>
          </div>
          <hr class="hr" />
          <h2>Ringkasan Pembelian</h2>
          <div class="row pb-2">
            <div class="col-sm">
              <h3>Jumlah</h3>
            </div>
            <div class="col-sm-lg">
              <div class="wrapper wrapper-1">
                <span class="minus">-</span>
                <span class="num">01</span>
                <span class="plus">+</span>
              </div>
            </div>
          </div>
          <div class="row pb-2">
            <div class="col-sm">
              <h3>Harga</h3>
            </div>
            <div class="col-sm-lg">
              <h4>Rp.5000</h4>
            </div>
          </div>
          <div class="row pb-2">
            <div class="col-sm">
              <h3>Ongkos Kirim</h3>
            </div>
            <div class="col-sm-lg">
              <h4>Rp.0</h4>
            </div>
          </div>
          <hr class="hr" />
          <h2>Total Biaya</h2>
          <div class="row pb-2">
            <div class="col-sm-lg">
              <h4>Rp.5000</h4>
            </div>
          </div>
          <div class="join-container">
            <a href="checkout.html" class="btn btn-block btn-join-now mt-3 py-2"
              >Bayar
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
  <script>
    const plus = document.querySelector(".plus"),
    minus = document.querySelector(".minus"),
    num  = document.querySelector(".num");

    let a = 1;

    plus.addEventListener("click" , () => {
      a++;
      a = (a < 10) ? "0" + a : a;
      num.innerText = a;
      console.log(a);
    });

    minus.addEventListener("click" , () => {
      if(a>1){
        a--;
        a = (a < 10) ? "0" + a : a;
        num.innerText = a;
        console.log(a);
      }
    });
  </script>
@endpush

