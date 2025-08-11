<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from themeht.com/loptus/html/project-details.html by HTTrack Website Copier/3.x [XR&CO'2013], Thu, 10 Oct 2019 03:50:04 GMT -->

<link rel="stylesheet" href="{{asset('fe/css/style-w3-tabs.css')}}">

@include('template_fe.head')
<body>
    <!-- page wrapper start -->

    <style>
        /*support google chrome*/
        .radio_lainnya::-webkit-input-placeholder{
            color: red;
        }
        
        /*support mozilla*/
        .radio_lainnya:-moz-input-placeholder{
            color: red;
        }
        
        /*support internet explorer*/
        .radio_lainnya:-ms-input-placeholder{
            color: red;
        }

        th, td {
            padding: 5px;
        }
    </style>

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
                  <h1 class=" text-white animated bounceInLeft delay-2 duration-3">PELAPORAN GRATIFIKASI</h1>
                </div>        
              </div>
            </div>
           </div>
        </section>
        <!--page title start-->

        <!-- Modal -->
        <div class="modal fade" id="modalMessage" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Pesan</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body" style="text-align:center; background-color:#f7f7f7">
                        <img class="img-fluid" src="{{ asset('dist/img/01.gif') }}" alt="">
                        {!! $items_pesan['text'] !!}
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>     

        <!--page title end-->


        <!--body content start-->
        <div class="page-content">
            <section id="form-pelaporan-gratifikasi" class="o-hidden">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-lg-12 col-md-12 mt-5">
                            <div class="w3-bar w3-card-4 w3-blue">
                                <button class="w3-bar-item w3-button w3-mobile tablink w3-red" onclick="openTabs(event,'tata_cara')">Tata Cara</button>
                                <button class="w3-bar-item w3-button w3-mobile tablink" onclick="openTabs(event,'faq')">FAQ</button>
                                <button class="w3-bar-item w3-button w3-mobile tablink" onclick="openTabs(event,'unduh')">Unduh</button>
                                <div class="w3-dropdown-hover w3-mobile">
                                    <button class="w3-button">Lapor <i class="fa fa-caret-down"></i></button>
                                    <div class="w3-dropdown-content w3-bar-block w3-blue-grey">
                                        <button class="w3-bar-item w3-button w3-mobile tablink" onclick="openTabs(event,'isi_form')">Isi Form</button>
                                        <button class="w3-bar-item w3-button w3-mobile tablink" onclick="openTabs(event,'unggah_form')">Unggah Form</button>
                                    </div>
                                </div>
                            </div>
                            
                            <div id="tata_cara" class="w3-container w3-border nav_tabs">
                                @include('frontend.informasi_public.sub_pelaporan_gratifikasi.tata_cara')
                            </div>

                            <div id="faq" class="w3-container w3-border nav_tabs" style="display:none">
                                @include('frontend.informasi_public.sub_pelaporan_gratifikasi.faq')
                            </div>

                            <div id="unduh" class="w3-container w3-border nav_tabs" style="display:none">
                                @include('frontend.informasi_public.sub_pelaporan_gratifikasi.unduh')
                            </div>

                            <div id="isi_form" class="w3-container w3-border nav_tabs" style="display:none">
                                @include('frontend.informasi_public.sub_pelaporan_gratifikasi.isi_form')
                            </div>

                            <div id="unggah_form" class="w3-container w3-border nav_tabs" style="display:none">
                                @include('frontend.informasi_public.sub_pelaporan_gratifikasi.unggah_form')
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

    <script type="text/javascript">
        if ('{{ $items_pesan['text'] }}' !== '') {
            $("#modalMessage").modal("toggle");
        }
    </script>

    <script>
        function openTabs(evt, tabName) {
            var i, x, tablinks;
            x = document.getElementsByClassName("nav_tabs");
            for (i = 0; i < x.length; i++) {
                x[i].style.display = "none";
            }
            tablinks = document.getElementsByClassName("tablink");
            for (i = 0; i < x.length; i++) {
                tablinks[i].className = tablinks[i].className.replace(" w3-red", "");
            }
            document.getElementById(tabName).style.display = "block";
            evt.currentTarget.className += " w3-red";
        }
    </script>
   

</html>

