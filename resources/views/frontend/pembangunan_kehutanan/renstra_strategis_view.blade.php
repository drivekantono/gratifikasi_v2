
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
          <h1 class=" text-white animated bounceInLeft delay-2 duration-3">RENSTRA</h1>
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
    <div class="row align-items-center">
      <div class="col-lg-12 col-md-12 md-mt-5">
        <div class="section-title mb-4">
            <div style="width: 500px;" class="align-items-center white-bg box-shadow px-3 py-3 radius d-md-flex justify-content-between">
            <h4 class="mb-0">Tahun</h4>
            <div class="subscribe-form sm-mt-2">
              <form id="mc-form" class="group" action="{{ route('frontend.pembangunan_kehutanan.bytahun') }}" method="POST">
                {{ csrf_field() }}
                <select name="periode" class="form-control" >
                      @foreach($data as $key => $item)
                          @if($data[$key]['tahun1'] === $data[$key]['tahun1']  and $data[$key]['tahun2'] ===  $data[$key]['tahun2'] )
                              <option value="{{ $data[$key]['tahun1'] }}-{{ $data[$key]['tahun2'] }}">{{ $data[$key]['tahun1'] }}-{{ $data[$key]['tahun2'] }}</option>
                          @endif
                      @endforeach
                </select>
                <input class="btn btn-theme" type="submit" name="subscribe" value="Cari">
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-lg-12 col-md-12">
        <div clas\s="left-side">
          <div class="post">
            <div class="post-desc">
              <div class="post-date mb-2">Renstra Strategis Tahun {{ $items->tahun1}} - {{ $items->tahun2 }}</span>
                
              </div>
                
              <div class="post-title">
                <h2>{{$items->title}}</h2>
              </div>
              <p class="lead">{!! $items->deskripsi !!}
            </div>
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