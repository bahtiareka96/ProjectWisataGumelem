@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="d-sm-flex align-items-center justify-content-between my-3">
        <h1 class="h3 mb-0 text-gray-800">Edit Gallery Wisata</h1>
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
            <form action="{{ route('wisata-gallery.update', $item->objek_wisata->id) }}" method="POST" enctype="multipart/form-data">
                @method('PUT')
             @csrf
             <div class="form-group my-2">
                <label for="objek_wisatas_id">Objek Wisata</label>
                <select name="objek_wisatas_id" required class="form-control">
                    <option value="{{ $item->objek_wisatas_id }}">Jangan Diubah</option>
                    @foreach ($objek_wisatas as $objek_wisata)
                        <option value="{{  $objek_wisata->id }}">{{ $objek_wisata->title }}</option>
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
