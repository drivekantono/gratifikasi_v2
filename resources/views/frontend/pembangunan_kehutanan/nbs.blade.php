
<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from themeht.com/loptus/html/blog-details.html by HTTrack Website Copier/3.x [XR&CO'2013], Thu, 10 Oct 2019 03:50:43 GMT -->
@include('template_fe.head')

<body>

<!-- page wrapper start -->

<div class="page-wrapper">

<!-- preloader start -->



<!-- preloader end -->


@include('template_fe.header')


<!--page title start-->

<section class="page-title o-hidden text-center grey-bg bg-contain animatedBackground" data-bg-img="{{asset('fe/images/pattern/05.png')}}">
  <div class="container">
    <div class="row align-items-center">
      <div class="col-md-12">
        <h1 class="title">NAWA BHAKTI SATYA</h1>
      </div>
    </div>
  </div>
  <div class="page-title-pattern"><img class="img-fluid" src="{{asset('fe/images/bg/06.png')}}" alt=""></div>
</section>

<!--page title end-->


<!--body content start-->

<div class="page-content">

<!--blog start-->

 <section class="grey-bg pos-r text-center o-hidden">
                <div class="pattern-3">
                    <img class="img-fluid rotateme" src="{{ asset('fe/images/pattern/03.png') }}" alt="">
                </div>
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12 col-md-6">
                            <div class="featured-item text-center">
                            <div class="featured-desc">
                                <p>{!! $items->deskripsi !!}</p>
                            </div>
                            </div>
                        </div>
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