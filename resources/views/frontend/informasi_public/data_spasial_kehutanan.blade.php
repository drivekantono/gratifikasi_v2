<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from themeht.com/loptus/html/blog-classic.html by HTTrack Website Copier/3.x [XR&CO'2013], Thu, 10 Oct 2019 03:50:04 GMT -->
@include('template_fe.head')

<body>

<!-- page wrapper start -->

<div class="page-wrapper">


@include('template_fe.header')

<!--page title start-->

<section class="page-title o-hidden text-center grey-bg bg-contain animatedBackground" data-bg-img="{{asset('fe/images/pattern/05.png')}}">
  <div class="container">
    <div class="row align-items-center" style="margin-top: -130px;">
      <div class="col-md-12">
        <h1 class="title">DATA SPASIAL KEHUTANAN</h1>
      </div>
    </div>
  </div>
  <div class="page-title-pattern"><img class="img-fluid" src="{{asset('fe/images/bg/06.png')}}" alt=""></div>
</section>

<!--page title end-->

<section>
  <div class="container">
    <div class="row">
      <div class="col-lg-12 col-md-12">
        <div class="left-side">
          <div class="post">
            {{-- <div class="post-image">
              <img class="img-fluid" src="{{asset('fe/images/blog/large/01.jpg')}}" alt="">
            </div> --}}
            <div class="post-desc" style="text-align: justify;">
              <div class="post-title">
                <h2>{{$items->title}}</h2>
              </div>
              <p class="lead">{!!$items->deskripsi!!}</p>
            </div>
          </div>
      </div>
    </div>
  </div>
</section>
<!--body content start-->

<div class="page-content">

<!--blog start-->


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