@extends('layouts.admin')

@section('content')

<div class="container fluid">

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Merchandise Gallery</h1>
        <a href="{{ route('merchandise-gallery.create') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
            <i class="fas fa-plus fa-sm text-white-50"></i> Tambah Merchandise Gallery
        </a>
    </div>

    <div class="container mx-auto">
        <div class="row">
            <div class="card-body">
                <div class="table-responsive-md">
                    <table class="table table-bordered" id="dataTable" cellspacing='1'>
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Merchandise</th>
                                <th>Gambar</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($items as $item)
                            <tr>
                                <td>{{ $item->merchandise_order->id }}</td>
                                <td>{{ $item->merchandise_order->title }}</td>
                                <td>
                                    <img src="{{ Storage::url($item->image) }}" alt="" style="width: 150px" class="img-thumbnail"/>
                                </td>
                                <td>
                                    <a href="{{ route('merchandise-gallery.edit', $item -> id) }}" class="btn btn-info my-2">
                                        <i class="fa fa-pencil-alt"></i>
                                    </a>
                                    <form action="{{ route('merchandise-gallery.destroy', $item -> id) }}" method="POST" class="d-inline">
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
                                <td colspan="4" class="text-center">
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
