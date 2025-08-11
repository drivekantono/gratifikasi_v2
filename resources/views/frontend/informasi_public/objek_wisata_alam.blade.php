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
    <div class="row align-items-center">
      <div class="col-md-12">
        <h1 class="title">OBJEK WISATA ALAM</h1>
      </div>
    </div>
  </div>
  <div class="page-title-pattern"><img class="img-fluid" src="{{asset('fe/images/bg/06.png')}}" alt=""></div>
</section>

<!--page title end-->


<!--body content start-->

<div class="page-content">

<!--blog start-->
<section class="pos-r text-center">
  <div class="pattern-3">
    <img class="img-fluid rotateme" src="{{asset('fe/images/pattern/03.png')}}" alt="">
  </div>
  <div class="container-fluid">
    <div class="row align-items-center">
      {{-- <div class="col-lg-4 col-md-12 order-lg-12">
        <img class="img-fluid topBottom" src="{{asset('fe/images/about/02.png')}}" alt="">

      </div> --}}

      <div class="col-lg-12 col-md-12 order-lg-1 md-mt-5">

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
          <div class="col-lg-6 col-md-6 mt-5">
            <div class="featured-item text-center style-2 radius-3">
              <div class="featured-icon">
                <img class="img-center" src="{{asset('uploads/objek_wisata_alam/'.$item->images)}}" alt="">
              </div>
              <div class="featured-title">
                <h5>{{$item->title}}</h5>
              </div>
              <div class="featured-desc">
                {!! mb_substr($item->deskripsi, 0, 50)!!}
                <a href="{{route('frontend.objek_wisata_alam.show', $item->id)}}">Baca Selengkapnya.</a>
              </div>
            </div>
          </div>
          @endforeach
            <div class="pagination-wrapper"> {!! $items->appends(['search' => Request::get('search')])->render() !!} </div>          
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