@extends('layouts.admin')

@section('content')
  <div class="container">
    <div class="d-sm-flex align-items-center justify-content-between my-2">
        <h1 class="h3 mb-0 text-gray-800">Edit Merchandise {{ $item->title }}</h1>
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
            <form action="{{ route('merchandise-order.update', $item->id) }}" method="POST">
                @method('PUT')
             @csrf
            <div class="form-group my-2">
                <label for="title">Title</label>
                <input type="text" class="form-control" name="title" placeholder="Title" value="{{ $item->title }}">
            </div>
            <div class="form-group my-2">
                <label for="title">About</label>
                <textarea name="about" rows="10" class="d-block w-100 form-control ">{{ $item->about }}</textarea>
            </div>
            <div class="form-group mt-2 mb-4">
                <label for="title">Quantity</label>
                <input type="number" class="form-control" name="quantity" placeholder="Quantity" value="{{ $item->quantity }}">
            </div>
            <div class="form-group mt-2 mb-4">
                <label for="title">Weight</label>
                <input type="number" class="form-control" name="weight" placeholder="Weight" value="{{ $item->weight }}">
            </div>
            <div class="form-group mt-2 mb-4">
                <label for="title">Price</label>
                <input type="number" class="form-control" name="price" placeholder="Price" value="{{ $item->price }}">
            </div>
            <button type="submit" class="btn btn-primary btn-block ">
                Ubah
            </button>
            </form>
        </div>
    </div>




@endsection
