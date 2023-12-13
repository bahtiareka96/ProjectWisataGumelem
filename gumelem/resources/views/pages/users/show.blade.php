@extends('layouts.app')

@section('title')
    Tentang Gumelem
@endsection

@section('content')
   <!-- Main -->
<section class="vh-100">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col col-lg-6 mb-4 mb-lg-0">
        <div class="card mb-3" style="border-radius: .5rem;">
          <div class="row g-0">
            <div class="col-md-4 gradient-custom text-center text-black"
              style="border-top-left-radius: .5rem; border-bottom-left-radius: .5rem;">
              <img src="{{ Storage::url($items->image) }}"
                alt="Avatar" class="img-fluid my-5" style="width: 80px;" />
              <h5>{{ $items->name }}</h5>
              <p>{{ $items->username }}</p>
                <a href="{{ route('users.edit',$items->id) }}" class="d-sm-inline-block btn btn-sm shadow-sm mb-5 bg-dark">
                    <i class="bi bi-pencil-square mx-2 my-2" style="color:white;"></i>
                </a>
            </div>
            <div class="col-md-8">
              <div class="card-body p-4">
                <h6>Information</h6>
                <hr class="mt-0 mb-4">
                <div class="row pt-1">
                  <div class="col-6 mb-3">
                    <h6>Email</h6>
                    <p class="text-muted">{{ $items->email }}</p>
                  </div>
                  <div class="col-6 mb-3">
                    <h6>Nomor HP</h6>
                    <p class="text-muted">{{ $items->phone_number }}</p>
                  </div>
                </div>
                <div class="row pt-1">
                    <div class="col-6 mb-3">
                      <h6>Address</h6>
                      <p class="text-muted">{{ $items->address }}</p>
                    </div>
                </div>
                <div class="row pt-1">
                    <div class="col-6 mb-3">
                      <h6>Province</h6>
                      <p class="text-muted">{{ $items->province_id }}</p>
                    </div>
                    <div class="col-6 mb-3">
                      <h6>City</h6>
                      <p class="text-muted">{{ $items->city_id }}</p>
                    </div>
                    <div class="col-6 mb-3">
                        <h6>Postal Code</h6>
                        <p class="text-muted">{{ $items->post_code }}</p>
                      </div>
                  </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection

@push('prepend-style')
    <link rel="stylesheet" href="{{ url('frontend/libraries/xzoom/xzoom.css') }}">
@endpush

@push('addon-script')
<script>
  $(window).scroll(function() {
    var offset = $(window).scrollTop();
    console.log(offset);
    $('.navbar').toggleClass('trans', offset < 50);
  });
</script>
@endpush
