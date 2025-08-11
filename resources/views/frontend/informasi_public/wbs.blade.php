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
                  <h1 class=" text-white animated bounceInLeft delay-2 duration-3">WHISTLEBLOWING SYSTEM (WBS) JAWA TIMUR</h1>
                </div>        
              </div>
            </div>
           </div>
        </section>
        <!--page title start-->

        <div class="page-content">
            <section id="tujuan" class="grey-bg animatedBackground" data-bg-img="{{ asset('fe/images/pattern/05.png') }}">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12 col-md-6">
                            <div class="featured-item text-center p-0">
                                <div class="featured-desc">
                                    <p>
                                        <a href="https://wbs.jatimprov.go.id/" target="_blank">
                                            <img class="img-fluid" src="{{ asset('fe/images/wbs/alur_wbs.jpg') }}" alt="">
                                        </a>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <section id="tugas-dan-fungsi" class="o-hidden">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-lg-12 col-md-12">
                            <a class="btn btn-white" href="https://wbs.jatimprov.go.id/" target="_blank">
                                <div class="section-title text-center mb-4">
                                    <h2 class="title">LINK LAYANAN WHISTLEBLOWING SYSTEM (WBS) JAWA TIMUR</h2> 
                                </div>
                            </a>
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

    <script type="text/javascript">
        if ('{{ $items_pesan['text'] }}' !== '') {
            $("#modalMessage").modal("toggle");
        }
    </script>
   

</html>

