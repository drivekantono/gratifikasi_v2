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
          <h1 class=" text-white animated bounceInLeft delay-2 duration-3">GALERI</h1>
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
        </div>
      </div>
    </div>
    <div style="width: 500px;" class="align-items-center white-bg box-shadow px-3 py-3 radius d-md-flex justify-content-between">
        <h5 class="mb-0">Kategori</h5>
        <div class="subscribe-form sm-mt-2">
          <form id="mc-form" class="group" action="{{ route('frontend.galeri.filter') }}" method="POST">
            {{ csrf_field() }}
            <select name="kategori" class="form-control" >
              <option value="0">All</option>
              @if($listcat != null)
                @foreach($listcat as $lc)
                  <option value="{{$lc->id}}">{{$lc->nama_kategori}}</option>
                @endforeach
              @else
                <option disabled="">Kategori Kosong</option>
              @endif
            </select>
            <input class="btn btn-theme" type="submit" name="subscribe" value="Cari">
          </form>
        </div>
    </div>
    <br>
    <div class="row">
      @php
          if (Request::get('page') && Request::get('page') > 1) {
              $iterate = Request::get('page') - 1;
              $no = ($perPage * $iterate) +1;
          } else {
              $no = 1;
          }
      @endphp
      @if($items != null)
        @foreach($items as $item)
        <div class="col-lg-4 col-md-6">
          <div class="post">
            <div class="grid-item cat1 cat3 popup-gallery" >
              <div class="portfolio-item">
                  <img class="img-center w-100" style="height: 300px;" src="{{ asset('uploads/galeri/'.$item->images) }}" alt="">
                  <a class="popup-img" href="{{ asset('uploads/galeri/'.$item->images) }}"> <i class="flaticon-plus"></i>
                  </a> 
              </div>
            </div>
            <div class="post-desc">
              <div class="post-date"><span>{{tglIndo($item->created_at)}}</span>
              </div>
              <div class="post-title">
               <!-- {{strip_tags(mb_substr($item->deskripsi,0, 30))}} -->
               {{strip_tags(mb_substr($item->deskripsi,0, 100))}}
              </div>
            </div>
          </div>
        </div>
        @endforeach
      @endif
    </div>
    <div class="pagination-wrapper"> {!! $items->appends(['search' => Request::get('search')])->render() !!} </div>
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