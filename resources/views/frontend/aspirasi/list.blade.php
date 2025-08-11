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
          <h1 class=" text-white animated bounceInLeft delay-2 duration-3">ASPIRASI MASYARAKAT</h1>
        </div>        
      </div>
    </div>
   </div>
</section>

<!--page title end-->


<!--body content start-->

<div class="page-content">

<!--blog start-->


{{-- <section>
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
      <div class="col-sm-12">
        <div id="accordion" class="accordion style-1">
          @foreach($items as $key=>$item)
          <div class="card">
            <div class="card-header">
              <h6 class="mb-0">
              <a data-toggle="collapse" data-parent="#accordion" href="#key">Aspirasi Dari: {{$item->name}}|{{$item->email}}</a>
              </h6>
            </div>
            <div id="key" class="collapse" data-parent="#accordion">
              <div class="card-body">{!!$item->deskripsi!!} </div>
            </div>
          </div>
          @endforeach
          <div class="pagination-wrapper"> {!! $items->appends(['search' => Request::get('search')])->render() !!} </div>
        </div>
      </div>
    </div>
  </div>
</section> --}}

<section class="pos-r text-center o-hidden">
  <div class="pattern-3">
    <img class="img-fluid rotateme" src="{{asset('fe/images/pattern/03.png')}}" alt="">
  </div>
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
        @foreach($items as $key=>$item)
      <div class="col-lg-4 col-md-6 wow fadeInLeft" data-wow-duration="0.6">
        <div class="featured-item text-center">
          <div class="featured-icon">
            <img class="img-center" src="{{asset('fe/images/feature/04.png')}}" alt="">
          </div>
          <div class="featured-title">
            <h5>{{$item->name}}</h5>
          </div>
          <div class="featured-desc" style="text-align: justify;">
            <p>{!!$item->deskripsi!!} </p>
          </div>
        </div>
      </div>
      @endforeach
      <div class="pagination-wrapper"> {!! $items->appends(['search' => Request::get('search')])->render() !!} </div>
    </div>
  </div>
</section>

<!--feature style-1 end-->


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