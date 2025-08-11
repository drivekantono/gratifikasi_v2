@section('nav-title', 'Test')

<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from themeht.com/loptus/html/index.html by HTTrack Website Copier/3.x [XR&CO'2013], Thu, 10 Oct 2019 03:43:00 GMT -->


@include('template_fe.head')


<body>
    <!-- popup image script-->
    <div id="modal" class="modal fade " tabindex="1" role="dialog">
	   <div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
		 <a title="close" class="fancy-items fancybox-close"  data-dismiss="modal"></a>
		    <div class="modal-body">
	        	 <img class="img-center" src="{{asset('fe/images/ucapan.png')}}" alt="">
	      </div>
	    </div>
	  </div>
	</div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <!-- end popup -->



    <!-- page wrapper start -->

    <div class="page-wrapper">

    <!-- preloader start -->
      {{--  <div id="ht-preloader">
          <div class="loader clear-loader">
            <div class="loader-text">Loading</div>
            <div class="loader-dots"> <span></span>
              <span></span>
              <span></span>
              <span></span>
            </div>
          </div>
        </div> --}}
    <!-- preloader end -->

        <style type="text/css">
            .center {
              display: block;
              margin-left: auto;
              margin-right: auto;
              width: 50%;
              margin-top: 10px;
            }

            .sp-thumbnail-text{
                height: 300px;
            }

        </style>
       
        <!--header start-->
        @include('template_fe.header')
        <section class="fullscreen-banner p-0 banner o-hidden grediant-overlay" data-overlay="10">
          <div class="d-none d-md-block">
            <img class="img-fluid" src="{{asset('fe/images/bg/08.png')}}" alt="">
          </div>
          <div class="align-center">
            <div class="container">
              <div class="row align-items-center" style="margin-top: -130px;">
                <div class="col-lg-6 col-md-12 order-lg-12 sm-mt-5">
                  <div class="seo-img animated zoomIn delay-5 duration-4">
                    <img class="img-center" src="{{asset('fe/images/banner/02.png')}}" alt="">
                  </div>
                </div>
                <div class="col-lg-6 col-md-12 order-lg-1 md-mt-5">
                  <h1 class=" text-white animated bounceInLeft delay-2 duration-3">TOWARDS <span class="text-white">ACCOUNTABILITY AND</span> SERVICE EXECELLENCE</h1>
                </div>        
              </div>
            </div>
           </div>
        </section>
              
        <hr>
          <div id="example2" class="slider-pro">
            <div class="sp-slides">
              @foreach($slider as $item)
              <div class="sp-slide">
                <a href="{{asset('uploads/slider/'.$item->images)}}">
                  <img class="sp-image" src="{{asset('slider/src/css/images/blank.gif')}}" 
                    data-src="{{asset('uploads/slider/'.$item->images)}}" 
                    data-retina="{{asset('uploads/slider/'.$item->images)}}"/>
                </a>
                <div class="sp-layer sp-black sp-padding text-center"  data-width="100%" data-horizontal="center" data-vertical="80%" data-show-transition="down" data-hide-transition="up">{!! $item->deskripsi !!}
                </div>
              </div>
              @endforeach
            </div>
          </div>
        <!--header end-->
        <div class="page-content">
            
            <!--blog start-->
          <section>
            <div class="container">
                    <div class="row text-center">
                        <div class="col-lg-8 col-md-12 ml-auto mr-auto">
                            <div class="section-title">
                                <h2 class="title"></h2>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        @foreach( $berita as $item)
                        <div class="col-lg-4 col-md-12">
                            <div class="post" >
                                <div class="post-image">
                                  <div class="crop crop-square">
                                    <img class="img-fluid h-200 w-100 " style="max-height: 350px;height:200px; width:100px;" src="{{ asset('uploads/berita/'.$item->images) }}" alt="Responsive image">
                                  </div>
                                </div>
                                <div class="post-desc" style="height: 280px;">
                                    <div class="post-date"><span>{{ tglIndo($item->created_at) }}</span>
                                    </div>
                                    <div class="post-title">
                                        <h6>
                                            {{ csrf_field() }}
                                            <a href="{{route('frontend.berita.show',$item->id)}}">{{ $item->title }}..</a>
                                        </h6>
                                    </div>
                                   {{--  <p{{ mb_substr($item->deskripsi,0,150) }}..</p> --}}
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
          </section>
          <section class="o-hidden pt-0 custom-mt-10 pos-r z-index-1">
                    <div class="container-fluid p-0">
                        <div class="row">
                            <div class="col-lg-12 col-md-12">
                                <div class="owl-carousel owl-theme owl-center" data-items="4" data-md-items="2" data-sm-items="2" data-center="true" data-dots="false" data-nav="true" data-autoplay="true">
                                    @foreach($link_layanan as $item)
                                    <div class="item">
                                        <div class="cases-item">
                                            <div class="cases-images">
                                                <img class="img-fluid center" style=" max-width: 150px;" src="{{ asset('uploads/link_layanan/'.$item->images) }}" alt="">
                                            </div>
                                            <div class="cases-description">
                                                <h6><a href="case-studies-single.html">{{ $item->title }}</a></h6>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                    <div class="item">
                                        <div class="cases-item">
                                            <div class="cases-images">
                                                <img class="img-fluid center" style=" max-width: 150px;" src="{{ asset('fe/images/case-studies/2.png') }}" alt="">
                                            </div>
                                            <div class="cases-description">
                                                <h6><a href="{{route('frontend.download_materi.index')}}">Download Materi</a></h6>
                                                {{-- <span>Digital</span> --}}
                                            </div>
                                        </div>
                                    </div>                                  
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="ht-clients d-flex flex-wrap align-items-center text-center">
                          <div class="clients-logo">
                            <a href="http://kpk.go.id/" target="_blank">
                              <img class="img-center" style="height: 50px;" src="{{asset('fe/images/img/kpk.png')}}" alt="">
                            </a>
                          </div>
                          <div class="clients-logo">
                            <a href="http://bpk.go.id/" target="_blank">
                              <img class="img-center"style="height: 50px;" src="{{asset('fe/images/img/bpk.jpg')}}" alt="">  
                            </a>
                          </div>
                          <div class="clients-logo">
                            <a href="http://bpkp.go.id/" target="_blank">
                              <img class="img-center" style="height: 50px;" src="{{asset('fe/images/img/bpkp.png')}}" alt="">
                            </a>
                          </div>
                          <div class="clients-logo">
                            <a href="https://www.lapor.go.id/instansi/inspektorat-pemerintah-provinsi-jawa-timur" target="_blank">
                              <img class="img-center" style="height: 50px;" src="{{asset('fe/images/img/lapor.jpg')}}" alt="">
                            </a>
                          </div>
                        </div>
                      </div>
                </section>
{{-- 
                <section>
                  <div class="container">
                    <div class="row">
                      
                    </div>
                  </div>
                </section> --}}


        @include('template_fe.footer')
    </div>

    <div class="scroll-top"><a class="smoothscroll" href="#top"><i class="flaticon-upload"></i></a></div>
   
    @include('template_fe.javascript')

<!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-G0SV0LTBBC"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-G0SV0LTBBC');
</script>
</body>

</html>
