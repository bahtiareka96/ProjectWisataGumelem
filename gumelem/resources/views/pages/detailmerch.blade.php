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
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Merchandise</a></li>
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
            <form action="{{ route('detailmerch_process', $item->id) }}" method="POST">
                @csrf
                <div class="product">
                    <table class="table table-responsive-sm-lg text-center">
                        <thead>
                            <tr>
                                <td colspan="2">Produk</td>
                                <td>Jumlah</td>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <img src="{{ Storage::url($item->merchandise_galleries->first()->image) }}" height="60">
                                </td>
                                <td class="align-middle">{{ $item->title }}</td>
                                <td class="align-middle">
                                    <input class="num" onKeyDown="return false" min="1" max="{{ $item->quantity }}" onchange="handleQty(this.value)" type="number" value="1" name="quantity_order">
                                </td>

                            </tr>
                        </tbody>
                    </table>
                </div>
                <h2>Pengiriman dan pembayaran</h2>
                <div class="row pb-2">
                    <div class="col-sm">
                    <h3>Email</h3>
                    </div>
                    <div class="col-sm-5">
                    <input type="text" class="no-outline text-center" name="email" placeholder="Email" value="{{ Auth::user()->email }}" readonly>
                    </div>
                </div>
                <div class="row pb-2">
                    <div class="col-sm">
                    <h3>Alamat</h3>
                    </div>
                    <div class="col-sm-5">
                        <input type="text" class="form-control text-center" name="address" placeholder="Alamat" value="{{ $item->address }}" required>
                    </div>
                </div>
                <div class="row pb-2">
                    <div class="col-sm">
                    <h3>Pengiriman</h3>
                    </div>
                    <div class="col-sm-5">
                        <input type="text" class="no-outline text-center" name="expedition" placeholder="Pengiriman" value="REGULAR" readonly>
                    </div>
                </div>
                <hr class="hr" />
                <h2>Ringkasan Pembelian</h2>
                <div class="row pb-2">
                    <div class="col-sm">
                    <h3>Harga</h3>
                    </div>
                    <div class="col-sm total">
                        <a class="text-currency">Rp.</a>
                      <input class="no-outline text-right" value="{{ $item->price  }}"  type="currency" id="price" name="price" readonly>
                      <input type="text" value="{{ $item->price }}" id="defaultPrice" hidden >
                    </div>
                </div>
                <div class="row pb-2">
                    <div class="col-sm">
                    <h3>Ongkos Kirim</h3>
                    </div>
                    <div class="col-sm">
                        <a class="text-currency">Rp.</a>
                        <input type="text" class="no-outline text-right" name="expedition_price" id="expedition_price" placeholder="Harga Pengiriman" value="5000" readonly>
                    </div>
                </div>
                <hr class="hr" />
                <div class="row pb-2">
                    <div class="col-sm">
                        <h2>Total Biaya</h2>
                    </div>
                    <div class="col-sm">
                        <a class="text-currency">Rp.</a>
                        <input class="no-outline text-right" value="{{ $item->total_price  }}"  type="currency" id="total_price" name="total_price" readonly>
                    </div>
                </div>
                <div class="join-container">
                    <button type="submit" class="btn btn-block btn-join-now mt-3 py-2"
                    >Bayar
                    </button>
                </div>
            </form>
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

