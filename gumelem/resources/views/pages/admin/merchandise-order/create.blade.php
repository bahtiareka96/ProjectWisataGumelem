@extends('layouts.admin')

@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Tambah Merchandise</h1>
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

    <div class="card shadow">
        <div class="card-body">
            <form action="{{ route('merchandise-order.store') }}" method="POST">
             @csrf
            <div class="form-group my-2">
                <label for="title">Title</label>
                <input type="text" class="form-control" name="title" placeholder="Title" value="{{ old('title') }}">
            </div>
            <div class="form-group my-2">
                <label for="title">About</label>
                <textarea name="about" rows="10" class="d-block w-100 form-control ">{{  old('about')  }}</textarea>
            </div>
            <div class="form-group mt-2 mb-4">
                <label for="title">Quantity</label>
                <input type="number" class="form-control" name="quantity" placeholder="Quantity" value="{{ old('quantity') }}">
            </div>
            <div class="form-group mt-2 mb-4">
                <label for="title">Weight</label>
                <input type="number" class="form-control" name="weight" placeholder="Weight" value="{{ old('weight') }}">
            </div>
            <div class="form-group mt-2 mb-4">
                <label for="title">Price</label>
                <input type="number" class="form-control" name="price" placeholder="Price" value="{{ old('price') }}">
            </div>
            <button type="submit" class="btn btn-primary btn-block ">
                Simpan
            </button>
            </form>
        </div>
    </div>
@endsection
