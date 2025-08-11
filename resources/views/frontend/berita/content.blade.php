
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
          <h2 class=" text-white animated bounceInLeft delay-2 duration-3">{{$item->title}}</h1>
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
        <div clas\s="left-side">
          <div class="post">
            <div class="post-image">
              <img class="img-fluid" src="{{asset('uploads/berita/'.$item->images)}}" alt="">
            </div>
            <div class="post-desc" style="text-align: justify;">
              <div class="post-date mb-2">{{tglIndo($item->created_at)}}</span>
              </div>
             
              <p class="lead">{!! $item->deskripsi !!}
              </p>
            </div>
          </div>
        </div>
        <h3 class="title mb-3">Aspirasi <span>Masyarakat</span></h3>
        <div class="post-queto text-white mt-5 box-shadow">
            <div class="owl-carousel owl-theme no-pb" data-items="1" data-dots="true" data-autoplay="true">
              @if($asps->count() >= 1)
                @foreach($asps as $aspirasi)
                <div class="item" style="height: 270px;"> 
                  <span><i class="fas fa-quote-left"></i></span>
           
                    <p class="mb-0" style="text-align: justify;">
                      {{strip_tags($aspirasi->deskripsi)}}
                    </p>
                    
                    <hr>
                    <p>{{$aspirasi->name == null ? "Anonymous" : $aspirasi->name}}</p>
                    <p>{{$aspirasi->email == null ? "Secret Email" : $aspirasi->email}}</p>
                </div>
                @endforeach
              @else
                <div class="item" > 
                  <span><i class="fas fa-quote-left"></i></span>
                    <p class="mb-0" style="text-align: justify;">
                      Isikan Aspirasi Anda!
                    </p>
                </div>
              @endif
            </div>
          </div>
          <div class="post-comments mt-5 pos-r grey-bg px-5 py-5 xs-px-2 xs-py-2">
            <div class="section-title mb-3">
              <h3 class="title">Berikan Suara <span>Anda</span></h3>
            </div>
            <form role="form" action="{{ route('frontend.aspirasi.store') }}" method="POST" enctype="multipart/form-data">
              @csrf
              <div class="messages"></div>
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <input id="form_name" type="text" name="name" class="form-control" placeholder="Nama" required="required">
                    <div class="help-block with-errors" ></div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <input id="form_email" type="email" name="email" class="form-control" placeholder="Email"  >
                    <div class="help-block with-errors"></div>
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="form-group mb-0">
                    <textarea id="form_message" name="deskripsi" class="form-control h-100" placeholder="Berikan Suara anda!" rows="4" required="required"></textarea>
                    <div class="help-block with-errors"></div>
                  </div>
                </div>
              </div>
              <div class="row mt-5">
                <div class="col-md-2">
                  <button class="btn btn-theme"><span>Kirim</span>
                  </button>
                </div>
                <div class="col-md-6">
                  <a href="{{ route('frontend.aspirasi.index') }}" class=" btn btn-theme">List Aspirasi Masyarakat</a>
                </div>
              </div>
            </form>
          </div>
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