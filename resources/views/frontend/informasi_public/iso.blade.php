<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from themeht.com/loptus/html/project-details.html by HTTrack Website Copier/3.x [XR&CO'2013], Thu, 10 Oct 2019 03:50:04 GMT -->

@include('template_fe.head')
<body>
    <!-- page wrapper start -->

    <div class="page-wrapper">

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
                    <img class="img-center" src="{{asset('fe/images/banner/03.png')}}" alt="">
                  </div>
                </div>
                <div class="col-lg-6 col-md-12 order-lg-1 md-mt-5">
                  <h1 class=" text-white animated bounceInLeft delay-2 duration-3">PENGADUAN MASYARAKAT</h1>
                </div>        
              </div>
            </div>
           </div>
        </section>
        <!--page title start-->

        

        <!--page title end-->


        <!--body content start-->

        <div class="page-content">

            <section id="visi-misi" class="animatedBackground" data-bg-img="{{ asset('fe/images/pattern/05.png') }}">
                <div class="container">
                    <div class="row align-items-center">
                    <div class="col-lg-12 col-md-12 md-mt-5">
                        <div class="owl-carousel owl-theme" data-items="1">
                        <div class="item">
                            <div class="testimonial">
                                <div class="testimonial-content" style="text-align:left; color:#ffffff ">
                                    <h2 class="title" style="color:#ffffff">
                                        TATA CARA DAN MEKANISME
                                    </h2>   
                                </div>
                                <div class="testimonial-quote"><i class="flaticon-quotation"></i>
                                </div>
                            </div>
                        </div>
                        </div>
                    </div>
                    <br>
                    @if($items->tata_cara != null)
                        <iframe src="{{$items->tata_cara != null ? asset('/uploads/pengaduan_masyarakat/'.$items->tata_cara) : "Tidak Ada Data"}}"  height="900px">
                        </iframe>
                    </div>
                    @endif
                </div>
            </section>
            <section class="grey-bg pos-r text-center o-hidden" id="tujuan">
                <div class="pattern-3">
                    <img class="img-fluid rotateme" src="{{ asset('fe/images/pattern/03.png') }}" alt="">
                </div>
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 ml-auto mr-auto">
                            <div class="section-title">
                            
                            <h2 class="title">FORMULIR</h2> 
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12 col-md-6">
                            <div class="featured-item text-center">
                            <div class="featured-desc">
                                <p>
                                    @if($items->formulir != null)
                                    <iframe src="{{$items->formulir != null ? asset('/uploads/pengaduan_masyarakat/'.$items->formulir) : "Tidak Ada Data"}}"  height="900px">
                                    </iframe>
                                    @endif
                                </p>
                            </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <section class="o-hidden" id="tugas-dan-fungsi">
                <div class="container">
                    <div class="row align-items-center">
                    <div class="col-lg-12 col-md-12 md-mt-5">
                        <div class="section-title mb-4">
                        <h2 class="title">REKAPITULASI</h2> 
                        <p class="mb-0 text-black">
                            @if($items->rekapitulasi != null)
                        <iframe src="{{$items->rekapitulasi != null ? asset('/uploads/pengaduan_masyarakat/'.$items->rekapitulasi) : "Tidak Ada Data"}}"  height="900px">
                            </iframe>
                            @endif
                        </p>
                        </div>
                    </div>
                    </div>
                </div>
            </section>
             
        </div>

        <!--body content end-->

        @include('template_fe.footer')

    </div>

    <div class="scroll-top"><a class="smoothscroll" href="#top"><i class="flaticon-upload"></i></a></div>

    <!--back-to-top end-->

    @include('template_fe.javascript')
   

</html>

