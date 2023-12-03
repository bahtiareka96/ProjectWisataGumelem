@extends('layouts.app')

@section('title')
    Detail Merchandise
@endsection

@section('content')
<!-- Main -->
<section class="section-order-details-header"></section>
<section class="section-order-details-content">
  <div class="container">
    <div class="row">
      <div class="col p-0 pl-3 pl-lg-0">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
            <li class="breadcrumb-item" aria-current="page">Merchandise</li>
            <li class="breadcrumb-item active" aria-current="page">Checkout</li>
          </ol>
        </nav>
      </div>
    </div>
    <div class="container-md">
      <div class="col-md-8 mx-auto">
        <div class="card card-payment-details">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ errror }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <h2>Produk</h2>
          <div class="product">
            <table class="table table-responsive-sm text-center">
                <thead>
                    <tr>
                        <td>Produk</td>
                        <td></td>
                        <td>Jumlah</td>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>
                            <img src="{{ Storage::url($item->merchandise_galleries->first()->image) }}" height="60">
                        </td>
                        <td class="align-middle">{{ $item->merchandise_order->name }}</td>
                        <td class="align-middle">1</td>
                    </tr>
                </tbody>
            </table>
        </div>
          <h2>Pengiriman dan pembayaran</h2>
          <div class="row pt-2 pb-2">
            <div class="col-sm">
              <h3>Email</h3>
            </div>
            <div class="col-sm-lg">
              <h4>{{ $item->merchandise_transactions->email }}</h4>
            </div>
          </div>
          <div class="row pb-2">
            <div class="col-sm">
              <h3>Alamat</h3>
            </div>
            <div class="col-sm-lg">
              <h4>{{ $item->merchandise_transactions->address }}</h4>
            </div>
          </div>
          <div class="row pb-2">
            <div class="col-sm">
              <h3>Pengiriman</h3>
            </div>
            <div class="col-sm-lg">
              <h4>{{ $item->merchandise_transactions->expedition }}</h4>
            </div>
          </div>
          <hr class="hr" />
          <h2>Ringkasan Pembelian</h2>
          {{-- <div class="row pb-2">
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
          </div> --}}
          <div class="row pb-2">
            <div class="col-sm">
              <h3>Harga</h3>
            </div>
            <div class="col-sm-lg">
              <h4>{{ $item->merchandise_order->price }}</h4>
            </div>
          </div>
          <div class="row pb-2">
            <div class="col-sm">
              <h3>Ongkos Kirim</h3>
            </div>
            <div class="col-sm-lg">
              <h4>{{ $item->merchandise_transactions->expedition_price }}</h4>
            </div>
          </div>
          <hr class="hr" />
          <h2>Total Biaya</h2>
          <div class="row pb-2">
            <div class="col-sm-lg">
              <h4>{{ {{ $item->merchandise_transactions->total_price }} }}</h4>
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

