@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="d-sm-flex align-items-center justify-content-between my-3">
        <h1 class="h3 mb-0 text-gray-800">Edit Gallery Merchandise</h1>
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
            <form action="{{ route('merchandise-gallery.update', $item->id) }}" method="POST" enctype="multipart/form-data">
                @method('PUT')
             @csrf
             <div class="form-group my-2">
                <label for="merchandise_orders_id">Objek Wisata</label>
                <select name="merchandise_orders_id" required class="form-control">
                    <option value="{{ $item->merchandise_orders_id }}">Jangan Diubah</option>
                    @foreach ($merchandise_orders_id as $merchandise_order)
                        <option value="{{  $merchandise_order->id }}">{{ $merchandise_order->title }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                {{-- <label for="image">Image</label> --}}
                <input type="file" name="image" placeholder="Image" class="form-control">
            </div>
            <button type="submit" class="btn btn-primary btn-block my-3">
                Ubah
            </button>
            </form>
        </div>
    </div>




@endsection
