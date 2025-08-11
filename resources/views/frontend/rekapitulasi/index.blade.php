<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from themeht.com/loptus/html/blog-classic.html by HTTrack Website Copier/3.x [XR&CO'2013], Thu, 10 Oct 2019 03:50:04 GMT -->
@include('template_fe.head')

<body>

<!-- page wrapper start -->

<div class="page-wrapper">


@include('template_fe.header')

<!--page title start-->
 <section class="fullscreen-banner p-0 banner o-hidden grediant-overlay" data-overlay="10">
  <div class="d-none d-md-block">
    <img class="img-fluid" src="{{asset('fe/images/bg/08.png')}}" alt="">
  </div>
  <div class="align-center">
    <div class="container">
      <div class="row align-items-center" style="margin-top: -130px;">
        <div class="col-lg-6 col-md-12 order-lg-12 sm-mt-5">
          <div class="seo-img animated zoomIn delay-5 duration-4">
            <img class="img-center" src="{{asset('fe/images/banner/03.png')}}" alt="">
          </div>
        </div>
        <div class="col-lg-6 col-md-12 order-lg-1 md-mt-5">
          <h1 class=" text-white animated bounceInLeft delay-2 duration-3">REKAPITULASI TINDAK LANJUT</h1>
        </div>        
      </div>
    </div>
   </div>
</section>

<!--page title end-->


<!--body content start-->

<div class="page-content">

<!--blog start-->

<section>
  <div class="container">
    <div class="row">
      @php
          if (Request::get('page') && Request::get('page') > 1) {
              $iterate = Request::get('page') - 1;
              $no = ($perPage * $iterate) +1;
          } else {
              $no = 1;
          }
      @endphp
      @foreach($items as $item)
      <div class="col-lg-4 col-md-12 md-mt-5 wow fadeInUp" data-wow-duration="0.8">
        <div class="featured-item text-center style-2">
          <div class="featured-icon">
            <img class="img-center" src="{{asset('fe/images/feature/02.png')}}" alt="">
          </div>
          <div class="featured-title">
            <h5>{{$item->title}}</h5>
          </div>
          <div class="featured-desc" >
            <p style="text-align: justify;">{{strip_tags(mb_substr($item->deskripsi, 0, 100))}}..</p> <a class="btn btn-theme mt-5" href="{{asset('uploads/rekapitulasi'.$item->file)}}">Download</a>
          </div>
        </div>
      </div>
      @endforeach
    <div class="pagination-wrapper"> {!! $items->appends(['search' => Request::get('search')])->render() !!} 
    </div>
  </div>
</section>


<!--blog end-->

</div>

<!--body content end--> 


@include('template_fe.footer')


</div>

<!-- page wrapper end -->


<!--back-to-top start-->

<div class="scroll-top"><a class="smoothscroll" href="#top"><i class="flaticon-upload"></i></a></div>

<!--back-to-top end-->

@include('template_fe.javascript')
</html>