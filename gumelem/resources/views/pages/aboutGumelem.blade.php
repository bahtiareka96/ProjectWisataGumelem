@extends('layouts.app')

@section('title')
    Tentang Gumelem
@endsection

@section('content')
   <!-- Main -->
   <section class="section-details-header"></section>
   <section class="section-details-content">
     <div class="container">
       <div class="row">
         <div class="col p-0 pl-3 pl-lg-0">
           <nav aria-label="breadcrumb">
             <ol class="breadcrumb">
               <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
               <li class="breadcrumb-item active" aria-current="page">Desa Gumelem</li>
             </ol>
           </nav>
         </div>
       </div>
       <div class="row">
         <div class="col-md-10 mx-auto">
           <div class="card card-details">
             <h1>{{ $dataAbout->title }}</h1>
             @if ($dataAbout->about_galleries->count())
                <div class="gallery-about">
                    <div class="xzoom-container-sm" style="text-align: center">
                      <img
                        height="400px"
                        width="400px"
                        class="xzoom mb-2"
                        id="xzoom-default"
                        src="{{ Storage::url($dataAbout->about_galleries->first()->image) }}"
                        xoriginal="{{ Storage::url($dataAbout->about_galleries->first()->image) }}"
                      />
                      <div class="xzoom-thumbs">
                        @foreach ($dataAbout->about_galleries as $gallery)
                            <a href="{{ Storage::url($gallery->image) }}"
                                ><img
                                class="xzoom-gallery"
                                width="100px"
                                height="100px"
                                src="{{ Storage::url($gallery->image) }}"
                                xpreview="{{ Storage::url($gallery->image) }}"/>
                            </a>
                        @endforeach
                      </div>
                    </div>
                    {{-- <h2>Tentang Wisata</h2> --}}
                    <p style="text-align: justify;">
                        {!! $dataAbout->about !!}
                    </p>
                  </div>
                @endif
           </div>
         </div>
       </div>
     </div>
   </section>
 </main>
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
