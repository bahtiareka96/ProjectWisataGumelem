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
               <li class="breadcrumb-item"><a href="index.html">Home</a></li>
               <li class="breadcrumb-item active" aria-current="page">Desa Gumelem</li>
             </ol>
           </nav>
         </div>
       </div>
       <div class="row">
         <div class="col-lg-12 pl-lg-0">
           <div class="card card-details">
             <h1>Desa Gumelem</h1>
             <div class="gallery">
               <div class="xzoom-container">
                 <img
                   class="xzoom"
                   id="xzoom-default"
                   src="frontend/images/Details-1.jpg"
                   xoriginal="frontend/images/Details-1.jpg"
                 />
                 <div class="xzoom-thumbs">
                   <a href="frontend/images/Details-1.jpg"
                     ><img
                       class="xzoom-gallery"
                       width="128"
                       src="frontend/images/Details-1.jpg"
                       xpreview="frontend/images/Details-1.jpg"
                   /></a>
                   <a href="frontend/images/Details-1.jpg"
                     ><img
                       class="xzoom-gallery"
                       width="128"
                       src="frontend/images/Details-1.jpg"
                       xpreview="frontend/images/Details-1.jpg"
                   /></a>
                   <a href="frontend/images/Details-1.jpg"
                     ><img
                       class="xzoom-gallery"
                       width="128"
                       src="frontend/images/Details-1.jpg"
                       xpreview="frontend/images/Details-1.jpg"
                   /></a>
                   <a href="frontend/images/Details-1.jpg"
                     ><img
                       class="xzoom-gallery"
                       width="128"
                       src="frontend/images/Details-1.jpg"
                       xpreview="frontend/images/Details-1.jpg"
                   /></a>
                   <a href="frontend/images/Details-1.jpg"
                     ><img
                       class="xzoom-gallery"
                       width="128"
                       src="frontend/images/Details-1.jpg"
                       xpreview="frontend/images/Details-1.jpg"
                   /></a>
                 </div>
               </div>
               <h2>Tentang Wisata</h2>
               <p>
                 Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
               </p>
               <p>
                 Bali and a district of Klungkung Regency that includes the
                 neighbouring small island of Nusa Lembongan. The Badung
                 Strait separates the island and Bali.
               </p>
               <!-- <div class="features row pt-3">
                 <div class="col-md-4">
                   <img
                     src="frontend/images/ic_event.png"
                     alt=""
                     class="features-image"
                   />
                   <div class="description">
                     <h3>Featured Ticket</h3>
                     <p>Food Voucher</p>
                   </div>
                 </div>
                 <div class="col-md-4 border-left">
                   <img
                     src="frontend/images/ic_bahasa.png"
                     alt=""
                     class="features-image"
                   />
                   <div class="description">
                     <h3>Language</h3>
                     <p>Bahasa Indonesia</p>
                   </div>
                 </div>
                 <div class="col-md-4 border-left">
                   <img
                     src="frontend/images/ic_foods.png"
                     alt=""
                     class="features-image"
                   />
                   <div class="description">
                     <h3>Foods</h3>
                     <p>Local Foods</p>
                   </div>
                 </div>
               </div> -->
             </div>
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
