
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
          <h1 class=" text-white animated bounceInLeft delay-2 duration-3">BERITA</h1>
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
      <div class="col-lg-8 col-md-12">
        @if ($message = Session::get('success'))
                <div class="alert alert-success alert-block">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                    <strong>{{ $message }}</strong>
                </div>
              <br>
        @endif
         @php
            if (Request::get('page') && Request::get('page') > 1) {
                $iterate = Request::get('page') - 1;
                $no = ($perPage * $iterate) +1;
            } else {
                $no = 1;
            }
          @endphp
          @foreach($items; as $item)
            <div class="post">
              <div class="post-image">
                <img class="img-fluid h-100 w-100" src="{{asset('uploads/berita/'.$item->images)}}" alt="">
              </div>
              <div class="post-desc">
                <div class="post-date"><h6>{{ tglIndo($item->created_at) }}</h6></span>
                </div>
                <div class="post-title">
              <h3><a href="{{route('frontend.berita.show',$item->id)}}">{{$item->title}}</a></h3>
                </div>
                <p>{{ mb_substr(strip_tags($item->deskripsi), 0, 200) }}</p>
              </div>
            </div>
          @endforeach
        
        <nav aria-label="Page navigation" class="mt-8">
          <div class="pagination-wrapper"> {!! $items->appends(['search' => Request::get('search')])->render() !!} </div>
        </nav>
      </div>


      <div class="col-lg-4 col-md-12 sidebar md-mt-5">
        <div class="widget grey-bg px-4 py-4">
          <h5 class="widget-title">Kategori</h5>
          <ul class="widget-categories list-unstyled">
            @foreach($kategoriberita as $items)
              <li> 
                <a href="{{ route('frontend.berita.bycategory',$items->id) }}">{{$items->kategori_berita}}</a>
              </li>
            @endforeach
          </ul>
        </div>
        <div class="widget">
          <h5 class="widget-title">Artikel Terakhir</h5>
          <div class="recent-post">
            <ul class="list-unstyled">
              @foreach( $artikel as $items)
              <li>
                <div class="recent-post-desc"> <a href="{{route('frontend.berita.show', $items->id)}}">{{$items->title}}</a> 
                  <div class="post-date">
                    {{tglIndo($items->created_at)}}
                  </div>
                </div>
              </li>
              <hr>
              @endforeach
            </ul>
          </div>
        </div>
        <div class="widget">
          <h5 class="widget-title">Berita Terakhir</h5>
          <div class="recent-post">
            <ul class="list-unstyled">
              @foreach( $beritaTerakhir as $items)
              <li>
                <div class="recent-post-desc"> <a href="{{route('frontend.berita.show', $items->id)}}">{{$items->title}}</a> 
                  <div class="post-date">
                    {{tglIndo($items->created_at)}}
                  </div>
                </div>
              </li>
              <hr>
              @endforeach
            </ul>
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