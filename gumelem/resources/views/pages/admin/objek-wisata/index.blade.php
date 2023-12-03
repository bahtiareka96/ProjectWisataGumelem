@extends('layouts.admin')

@section('content')

<div class="container fluid">

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Objek Wisata</h1>
        <a href="{{ route('objek-wisata.create') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
            <i class="fas fa-plus fa-sm text-white-50"></i> Tambah Objek Wisata
        </a>
    </div>

    <div class="container">
        <div class="row">
            <div class="card-body">
                <div class="table-responsive-md">
                    <table class="table table-bordered" id="dataTable" cellspacing='1'>
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Title</th>
                                <th>About</th>
                                <th>Location</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($items as $item)
                            <tr>
                                <td>{{ $item->id }}</td>
                                <td>{{ $item->title }}</td>
                                <td>{{ $item->about }}</td>
                                <td>{{ $item->location }}</td>
                                <td>
                                    <a href="{{ route('objek-wisata.edit', $item -> id) }}" class="btn btn-info my-2">
                                        <i class="fa fa-pencil-alt"></i>
                                    </a>
                                    <form action="{{ route('objek-wisata.destroy', $item -> id) }}" method="POST" class="d-inline">
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
                                <td colspan="5" class="text-center">
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
