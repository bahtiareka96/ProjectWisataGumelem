@extends('layouts.admin')

@section('content')

<div class="container fluid">

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Transaksi</h1>
    </div>

    <div class="container">
        <div class="row">
            <div class="card-body">
                <div class="table-responsive-md">
                    <table class="table table-bordered" id="dataTable" cellspacing='1'>
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Email</th>
                                <th>Alamat</th>
                                <th>Merchandise</th>
                                <th>Jumlah</th>
                                <th>Ekspedisi</th>
                                <th>Harga</th>
                                <th>Biaya Ekspedisi</th>
                                <th>Harga Total</th>
                                <th>Status</th>
                                <th>Nomor Resi</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($items as $item)
                            <tr>
                                <td>{{ $item->id }}</td>
                                <td>{{ $item->user->email }}</td>
                                <td>{{ $item->address }}</td>
                                <td>{{ $item->merchandise_order->title }}</td>
                                <td>{{ $item->quantity_order }}</td>
                                <td>{{ $item->expedition }}</td>
                                <td>{{ $item->price }}</td>
                                <td>{{ $item->expedition_price }}</td>
                                <td>{{ $item->total_price }}</td>
                                <td>{{ $item->status }}</td>
                                <td>{{ $item->no_resi }}</td>

                                <td>
                                    <a href="{{ route('merchandise-transaction.show', $item->id) }}" class="btn btn-info my-2">
                                        <i class="fa fa-eye"></i>
                                    </a><a href="{{ route('merchandise-transaction.edit', $item->id) }}" class="btn btn-info my-2">
                                        <i class="fa fa-pencil-alt"></i>
                                    </a>
                                    <form action="{{ route('merchandise-transaction.destroy', $item->id) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('delete')
                                        <button class="btn btn-danger">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="11" class="text-center">
                                    Data Kosong
                                </td>
                            </tr>

                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection
