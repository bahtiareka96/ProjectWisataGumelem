@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="d-sm-flex align-items-center justify-content-between my-3">
        <h1 class="h3 mb-0 text-gray-800">Tambah Gallery About</h1>
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

    <div class="card shadow">
        <div class="card-body">
            <form action="{{ route('about-gallery.store') }}" method="POST" enctype="multipart/form-data">
             @csrf
            <div class="form-group my-2">
                <label for="about_gumelems_id">About</label>
                <select name="about_gumelems_id" required class="form-control">
                    <option value="">Pilih About</option>
                    @foreach ($about_gumelems as $about_gumelem)
                        <option value="{{  $about_gumelem->id }}">{{ $about_gumelem->title }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                {{-- <label for="image">Image</label> --}}
                <input type="file" name="image" placeholder="Image" class="form-control">
            </div>
            <button type="submit" class="btn btn-primary btn-block my-3">
                Simpan
            </button>
            </form>
        </div>
    </div>




@endsection
