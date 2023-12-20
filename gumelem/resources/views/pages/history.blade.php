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
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">History</li>
          </ol>
        </nav>
      </div>
    </div>
    <div class="container-sm my-2">
      <div class="col-sm-8 mx-auto">
        @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ errror }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            @forelse ($item as $item)
        <div class="card card-payment-details my-2">
                    <div class="row g-2">
                        <div class="col-3">
                            <div class="title p-8 no-border text-center">
                                ID Transaksi  : {{ $item->id }}
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="image p-8  no-border text-end">
                                {{ $item->no_resi }}
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="image p-8  no-border text-end">
                                {{ $item->status }}
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="row g-2">
                        <div class="col-4 my-2">
                            <div class="image p-4 no-border text-center">
                                <img src="{{ Storage::url($item->merchandise_order->first()->image) }}" height="70">
                            </div>
                        </div>
                        <div class="col-4 my-auto">
                            <div class="title p-4 no-border text-center">
                                {{ $item->merchandise_order->title }}
                            </div>
                        </div>
                        <div class="col-4 my-auto">
                            <div class="title p-4 no-border text-center">
                                {{ $item->quantity_order }} X
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="row g-2">
                        <div class="col-2">
                            <div class="image p-2 no-border text-center">
                               Informasi
                            </div>
                        </div>
                    </div>

                    <div class="row g-2">
                        <div class="col-3">
                            <div class="image p-3 no-border text-center">
                                {{ Auth::user()->email }}
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="title p-3 no-border text-center">
                                {{ Auth::user()->phone_number }}
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="title p-3 no-border text-center">
                                {{ $item->address }}
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="title p-3 no-border text-center">
                                {{ $item->expedition }}
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="row g-2">
                        <div class="col-4">
                            <div class="image p-3 no-border text-start">
                                Rincian Pembayaran
                            </div>
                        </div>
                    </div>
                    <div class="row g-2">
                        <div class="col-3">
                            <div class="image p-3 no-border text-center">
                                Ongkos Kirim
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="title p-3 no-border text-center">

                            </div>
                        </div>
                        <div class="col-3">
                            <div class="title p-3 no-border text-center">

                            </div>
                        </div>
                        <div class="col-3">
                            <div class="title p-3 no-border text-center">
                                Rp. {{ $item->expedition_price }}
                            </div>
                        </div>
                    </div>
                    <div class="row g-2">
                        <div class="col-3">
                            <div class="image p-3 no-border text-center">
                                Harga
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="title p-3 no-border text-center">

                            </div>
                        </div>
                        <div class="col-3">
                            <div class="title p-3 no-border text-center">

                            </div>
                        </div>
                        <div class="col-3">
                            <div class="title p-3 no-border text-center">
                               Rp. {{ $item->price }}
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="row g-2">
                        <div class="col-3">
                            <div class="image p-3 no-border text-center">
                                Total Biaya
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="title p-3 no-border text-center">

                            </div>
                        </div>
                        <div class="col-3">
                            <div class="title p-3 no-border text-center">

                            </div>
                        </div>
                        <div class="col-3">
                            <div class="title p-3 no-border text-center">
                               Rp. {{ $item->total_price }}
                            </div>
                        </div>
                    </div>

        </div>
        @empty
        <tr>
            <td colspan="11" class="text-center">
                Data Kosong
            </td>
        </tr>
        @endforelse
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
{{-- <script>
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
  </script> --}}

<script>
    var defaultPrice = document.getElementById('defaultPrice');
    var price = document.getElementById('price');
    var total_price = document.getElementById('total_price');
    var expeditionPrice = document.getElementById('expedition_price');

    function handleQty(e){
        console.log(e);
        var hasil = e * parseFloat(defaultPrice.value);
        console.log(hasil);
        price.value = hasil;
        updateTotal();
    }

    function updateTotal() {
        var expedition_price = parseFloat(expeditionPrice.value);
        var product_price = parseFloat(price.value);
        var total = expedition_price + product_price;
        total_price.value = total;
    }


    window.onload = function() {
        updateTotal();
    };


    // let a = 1;
    // var defaultPrice = document.getElementById('defaultPrice');
    // var price = document.getElementById('price');
    // var expeditionPrice = document.getElementById('expedition_price')
    // var total_price = document.getElementById('total_price')
    // function handleQty(e){

    //     console.log(e)
    //     var hasil = e * defaultPrice.value
    //     console.log(hasil)
    //     price.value = hasil + handleTotal()
    // }

    // function handleTotal(){
    //     var expedition_price = parseFloat(expeditionPrice.value)
    //     return expedition_price
    // }
</script>
@endpush

