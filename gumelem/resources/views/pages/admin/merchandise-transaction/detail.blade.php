@extends('layouts.admin')

@section('content')
  <div class="container">
    <div class="d-sm-flex align-items-center justify-content-between my-2">
        <h1 class="h3 mb-0 text-gray-800">Detail Transaksi {{ $item->user->name }}</h1>
      </div>
</div>

    @if ($errors->any())
        <div class="alert alert-anger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>

    @endif

    <div class="card shadow m-5">
        <div class="card-body">
            <table class="table table-bordered">
                <tr>
                    <th>ID</th>
                    <td>{{ $item->id }}</td>
                </tr>
                <tr>
                    <th>Produk</th>
                    <td>{{ $item->merchandise_order->title }}</td>
                </tr>
                <tr>
                    <th>Jumlah Produk</th>
                    <td>{{ $item->quantity_order }}</td>
                </tr>
                <tr>
                    <th>Email</th>
                    <td>{{ $item->user->email }}</td>
                </tr>
                <tr>
                    <th>Alamat</th>
                    <td>{{ $item->address }}</td>
                </tr>
                <tr>
                    <th>Pengiriman</th>
                    <td>{{ $item->expedition}}</td>
                </tr>
                <tr>
                    <th>Harga</th>
                    <td>{{ $item->price }}</td>
                </tr>
                <tr>
                    <th>Ongkos Kirim</th>
                    <td>{{ $item->expedition_price }}</td>
                </tr>
                <tr>
                    <th>Total Biaya</th>
                    <td>{{ $item->total_price }}</td>
                </tr>
                <tr>
                    <th>Status</th>
                    <td>{{ $item->status }}</td>
                </tr>
            </table>
        </div>
    </div>




@endsection
