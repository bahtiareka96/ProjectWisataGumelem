@extends('layouts.app')

@section('title')
    Tentang Gumelem
@endsection

@section('content')
   <!-- Main -->

<div style="margin-top: 50px" class="container">

    @if ($errors->any())
        <div style="margin-bottom: -50px" class="alert alert-anger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>

    @endif

    <section class="vh-100">
        <div class="container py-5 h-100">
          <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col col-lg-6 mb-4 mb-lg-0">
              <div class="card mb-3" style="border-radius: .5rem;">
                <div class="row g-0">
                  <div class="col-md-12 gradient-custom text-center text-black"
                    style="border-top-left-radius: .5rem; border-bottom-left-radius: .5rem;">
                      <form action="{{ route('users.update', $item->id) }}" method="POST" enctype="multipart/form-data">
                        @method('PUT')
                     @csrf
                     <div class="form-group">
                        {{-- <label for="image">Image</label> --}}
                        <input type="file" name="image" placeholder="Image" class="form-control" value="{{ $item->image }}">
                    </div>
                    <div class="form-group my-2 mx-4">
                        <label for="title">Name</label>
                        <input type="text" class="form-control" name="name" placeholder="Name" value="{{ $item->name }}">
                    </div>
                    <div class="form-group my-2 mx-4">
                        <label for="title">Email</label>
                        <input type="email" class="form-control" name="email" placeholder="Email" value="{{ $item->email }}">
                    </div>
                    <div class="form-group my-2 mx-4">
                        <label for="title">Alamat</label>
                        <textarea type="address" class="form-control" name="address" placeholder="Address" value="{{ $item->address }}"></textarea>
                    </div>
                    <div class="form-group my-2 mx-4">
                        <label for="title">Phone Number</label>
                        <input type="number" class="form-control" name="phone_number" placeholder="Phone Number" value="{{ $item->phone_number }}">
                    </div>
                    <button type="submit" class="btn btn-primary btn-block my-2 ">
                        Ubah
                    </button>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
</div>

@endsection

@push('prepend-style')
    <link rel="stylesheet" href="{{ url('frontend/libraries/xzoom/xzoom.css') }}">
@endpush

@push('addon-script')
<script src="{{ url('frontend/libraries/xzoom/xzoom.min.js') }}"></script>
<script>
  $(document).ready(function() {
    $('.xzoom, .xzoom-gallery').xzoom({
      zoomWidth: 400,
      title: false,
      tint: '#333',
      Xoffset: 15
    });
  });
</script>
<script>
  $(window).scroll(function() {
    var offset = $(window).scrollTop();
    console.log(offset);
    $('.navbar').toggleClass('trans', offset < 50);
  });
</script>
@endpush
