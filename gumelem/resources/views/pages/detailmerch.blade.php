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
            <li class="breadcrumb-item"><a href="{{ route('order', $item->slug) }}">Merchandise</a></li>
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
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <h2>Produk</h2>
            <form id="formTrx" action="{{ route('detailmerch_process', $item->id) }}" method="POST" data-item-id="{{ $item->id }}">
                @csrf
                <div class="product">
                    <table class="table table-responsive-sm-lg text-center">
                        <thead>
                            <tr>
                                <td colspan="2">Produk</td>
                                <td class="" colspan="2">Berat</td>
                                <td>Jumlah</td>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <img src="{{ Storage::url($item->merchandise_galleries->first()->image) }}" height="60">
                                </td>
                                <td class="align-middle">{{ $item->title }}</td>
                                <td class="align-middle text-end">g</td>
                                <td class="align-middle text-start" id="td-weight" >
                                    {{ $item->weight }}
                                 </td>
                                 {{-- {{ dd($item->weight) }} --}}



                                <td class="align-middle">
                                    <input class="num" onKeyDown="return false" min="1" max="{{ $item->quantity }}" onchange="handleQty(this.value)" type="number" value="1" name="quantity_order">
                                </td>

                            </tr>
                        </tbody>
                    </table>
                </div>
                <div id="weight-input">
                    <input type="number" id="weight" name="weight" value="{{ $item->weight }}"  hidden>
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
                    <h3>Nomor Hp</h3>
                    </div>
                    <div class="col-sm-5">
                    <input type="number" class="no-outline text-center" name="phone_number" placeholder="Phone Number" value="{{ Auth::user()->phone_number }}" readonly>
                </div>
                </div>

                <div class="card card-payment-details">
                    <h2>Atur Alamat dan Pengiriman</h2>
                    <div class="row pb-2">
                        <div class="col-sm">
                        <h3>Provinsi</h3>
                        </div>
                        <div class="col-sm-5">
                            {{-- {{ dd($daftarProvinsi) }} --}}
                            <select class="form-select form-select-md mb-3" id="province" name="province" onchange="getKota(this.value)" required>
                                <option value=""> Pilih Provinsi</option>
                                @foreach ($daftarProvinsi as $option)

                                    <option value="{{ $option['province_id'] }}" >{{ $option['province'] }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="row pb-2">
                        <div class="col-sm">
                        <h3>Kota</h3>
                        </div>
                        <div id="kota1212" class="col-sm-5">
                            <select class="form-select form-select-md mb-3" id="kota"  name="kota" required>
                                <option value=""> Pilih Kota</option>
                            </select>
                            {{-- <input type="text" class="form-control text-center" name="address" placeholder="Alamat" value="{{ $item->address }}" required> --}}
                        </div>
                    </div>
                    <div class="row pb-2">
                        <div class="col-sm">
                        <h3>Alamat</h3>
                        </div>
                        <div class="col-sm-5">
                            <input type="text" class="form-control text-center" name="address" placeholder="Alamat" value="{{ Auth::user()->address }}" required>
                        </div>
                    </div>
                    <div class="row pb-2 pt-3">
                        <div class="col-sm">
                        <h3>Pengiriman</h3>
                        </div>
                        <div class="col-sm-5">
                            <select class="form-select form-select-md mb-3" name="courier" id="courier" onchange="getBiayaPengiriman()" id="" required>
                                <option value=""> Pilih Courier</option>
                                <option value="tiki"> Pilih TIKI</option>
                                <option value="jne"> Pilih JNE</option>
                                <option value="pos"> Pilih POS</option>

                            </select>
                        </div>
                    </div>
                    <div class="row pb-2">
                        <div class="col-sm">
                        <h3>Type Pengiriman</h3>
                        </div>
                        <div class="col-sm-5">
                            <select class="form-select form-select-md mb-3" name="type-pengiriman" onchange="handleChangeType()" id="type-pengiriman">
                            </select>
                        </div>
                    </div>
                    <a class="btn btn-join-now ml-2" id="btn-ongkir" onclick="getOngkir()">Generate Ongkir</a>
                </div>
                <hr class="hr" />
                <h2>Ringkasan Pembelian</h2>
                <div class="row">
                    <div class="col-sm">
                        <h3 class="mb-3 mb-sm-0">Harga</h3>
                    </div>
                    <div class="col-sm">
                        <div class="input-group">
                            <span class="input-group-text text-currency no-outline bg-white">Rp.</span>
                            <input class="form-control text-right no-outline" value="{{ $item->price }}" type="text" id="price" name="price" readonly>
                            <input type="text" value="{{ $item->price }}" id="defaultPrice" hidden>
                        </div>
                    </div>
                </div>

                <div class="row mt-3">
                    <div class="col-sm">
                        <h3 class="mb-3 mb-sm-0">Ongkos Kirim</h3>
                    </div>
                    <div class="col-sm">
                        <div class="input-group">
                            <span class="input-group-text text-currency no-outline bg-white">Rp.</span>
                            <input type="text" class="form-control text-right no-outline" name="expedition_price" id="expedition_price" value="" readonly>

                        </div>
                    </div>
                </div>

                <hr class="hr" />
                <div class="row">
                    <div class="col-sm">
                        <h2>Total Biaya</h2>
                    </div>
                    <div class="col-sm">
                        <div class="input-group">
                            <span class="input-group-text text-currency no-outline bg-white">Rp.</span>
                        <input class="form-control text-right no-outline" value="{{ $item->total_price  }}"  type="currency" id="total_price" name="total_price" readonly>
                        </div>
                    </div>
                </div>
                <hr class="hr" />
                <div class="join-container">
                    <button type="button" id="payment-button" class="btn btn-block btn-join-now mt-3 py-2">Bayar</button>
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
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="{{ config('midtrans.client_key') }}"></script>
<script>
  $(document).ready(function() {
    $('#payment-button').click(function(event) {
      event.preventDefault();

      var formElement = $('#formTrx')[0];
      var formData = new FormData(formElement);

      for (var pair of formData.entries()) {
        console.log(pair[0] + ': ' + pair[1]);
      }

      $.ajax({
        url: '/detailtransaction/' + formElement.dataset.itemId,
        type: 'POST',
        data: formData,
        processData: false,
        contentType: false,
        success: function(data) {
          console.log('snap', data)
          if (data.snapToken) {
            snap.pay(data.snapToken, {
              onSuccess: function(result) {
                console.log('sukses');
                alert('Pembayaran berhasil! Status: ' + result.status_message);
                // Opsional: Submit form atau lakukan tindakan lain
                 window.location.href = '/';
              },
              onPending: function(result) {
                console.log('pending');
                alert('Pembayaran tertunda. Status: ' + result.status_message);
                // Opsional: Lakukan tindakan untuk pembayaran tertunda
              },
              onError: function(result) {
                console.log('salah');
                alert('Terjadi kesalahan. Status: ' + result.status_message);
                // Opsional: Lakukan tindakan untuk error pembayaran
              },
              onClose: function() {
                console.log('tutup');
                alert('Anda menutup jendela pembayaran.');
                // Opsional: Lakukan tindakan ketika pengguna menutup modal pembayaran
              }
            });
          }
        },
        error: function(error) {
          console.log('error');
          alert('Terjadi kesalahan saat mengirim data: ' + error.responseText);
        }
      });

      console.log('hit');
    });
  });
</script>

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

    $('#currency-ongkir').hide()
    document.getElementById('weight-input').innerHTML='<input type="number" id="weight" name="weight" value="'+ hasilWeight +'"  hidden>'
});

$(window).scroll(function() {
    var offset = $(window).scrollTop();
    $('.navbar').toggleClass('trans', offset < 50);
});


    var defaultPrice = document.getElementById('defaultPrice');
    var price = document.getElementById('price');
    var total_price = document.getElementById('total_price');
    var expeditionPrice = document.getElementById('expedition_price');
    var weight = document.getElementById('weight');
    var defaultWeight = {!! $item->weight !!}
    console.log(defaultWeight);


    function handleQty(e) {
        var divWeight = document.getElementById('weight-input')

        var defaultPrice = document.getElementById('defaultPrice');

        var price = document.getElementById('price');
        var tdweight = document.getElementById('td-weight');
        console.log('weight:', weight);
        var hasil = e * parseFloat(defaultPrice.value);
        var hasilWeight = defaultWeight * e;

        tdweight.innerHTML = hasilWeight;
        price.value = hasil;


        divWeight.innerHTML = '<input type="number" id="weight" name="weight" value="'+ hasilWeight +'"  hidden>'
        // weight.value = hasilWeight;
        console.log(hasilWeight);
        updateTotal();
    }


    function handleChangeType(){
        $('#btn-ongkir').show();
        $('#expedition_price').val('');

    }

    function getOngkir(){
        var selectedOption  = $('#type-pengiriman').find(':selected');

        var dataHargaValue = selectedOption.data('harga');
        $('#currency-ongkir').show()
        $('#btn-ongkir').hide();
        $('#expedition_price').val(dataHargaValue)
        // $('#btn-ongkir').html('<p> '+  +' </p>');
        updateTotal();

    }


    function getKota(e){
        $.ajax({
            url: "/get-kota/"+e,
            type: "GET",
            dataType: "json",
            success: function(response) {
                // Handle the response data

                $.each(response, function(index, value) {

                    $('#kota').append(' <option value="' + value.city_id + '">' + value.city_name + '</option>');
                });
            },
            error: function(error) {
            }
        });
    }

    function getBiayaPengiriman(){
        var valKota     = $('#kota').val()
        // var valProvince = $('#province').val()
        var valCourier = $('#courier').val()

        var valWeight = $('#weight').val()

        var csrfToken = $('meta[name="csrf-token"]').attr('content');

        var param = {
            kota : valKota,
            courier : valCourier,
            weight :valWeight
        }

        $.ajax({
            url: "/get-biaya-pengiriman",
            type: "POST",
            data: param,
            headers: {
                'X-CSRF-TOKEN': csrfToken
            },
            dataType: "json",
            success: function(response) {

                // id="type-pengiriman"
                $.each(response.rajaongkir.results[0].costs, function(index, value) {
                    $('#type-pengiriman').append(' <option data-harga='+ value.cost[0].value +' value="' + value.service + '">' + value.service + '(' + value.cost[0].value + ')' + '</option>');
                });

            },
            error: function(error) {
                // Handle the error here
            }
        })
    }

    function updateTotal() {
        var expedition_price = parseFloat(expeditionPrice.value);
        var product_price = parseFloat(price.value);
        var total = expedition_price + product_price;
        total_price.value = total;
    }


    function handleTotal(){
        var expedition_price = parseFloat(expeditionPrice.value)
        return expedition_price
    }

</script>
@endpush
