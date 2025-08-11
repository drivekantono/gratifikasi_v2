@section('nav-title', 'Test')

<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from themeht.com/loptus/html/index.html by HTTrack Website Copier/3.x [XR&CO'2013], Thu, 10 Oct 2019 03:43:00 GMT -->


@include('template_fe.head')


<body>

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
							<!--
							<div class="seo-img animated zoomIn delay-5 duration-4">
								<img class="img-center" src="{{asset('fe/images/ppid-color-1.png')}}" alt="">
							</div>
							-->
							<div class="mouse-parallax">
								<div class="bnr-img1 animated fadeInRight delay-4 duration-4">
									<img class="img-fluid rotateme" src="{{ asset('fe/images/pattern/03.png') }}" alt>
								</div>
								<img class="img-fluid bnr-img2 animated zoomIn delay-5 duration-4" src="{{ asset('fe/images/ppid-color-1.png') }}" alt>
							</div>
						</div>
						
						<div class="col-lg-6 col-md-12 order-lg-1 md-mt-5">
							<!--
							<h2 class=" text-white animated bounceInLeft delay-2 duration-3">Layanan Informasi dan Dokumentasi Publik</br>PPID Inspektorat</br>Provinsi Jawa Timur</h2>
							<p class=" text-white animated bounceInLeft delay-2 duration-3">Sebagaimana amanat undang-undang 14 tahun 2008 tentang Keterbukaan Informasi Publik</p>
							-->
							<!--
							<h2 class="text-white animated bounceInLeft delay-2 duration-3">PPID Inspektorat</br>Provinsi Jawa Timur</h2>
							<p class="text-white animated bounceInLeft delay-2 duration-3">Layanan Informasi dan Dokumentasi Publik</p>
							-->
							<h2 class="text-white animated bounceInLeft delay-2 duration-3">Selamat Datang</h1>
							<h3 class="text-white animated bounceInLeft delay-2 duration-3">di Layanan e-PPID Inspektorat Provinsi Jawa Timur</h2>
							<p></p>
							<p class="text-white animated bounceInLeft delay-2 duration-3">Layanan ini merupakan sarana layanan online publik untuk mengajukan permohonan informasi sebagai salah satu wujud pelaksanaan keterbukaan informasi publik di Inspektorat Provinsi Jawa Timur</p>
							
							@if (empty(Auth::user()->name))
								<a href="{{ route('login') }}" role="button" aria-haspopup="true" aria-expanded="false">
									<button class="btn btn-white animated tada delay-2"><span>Masuk</span>
								</a>								
							@else
								<a href="{{ route('ppid.layanan.daftar_informasi') }}" role="button" aria-haspopup="true" aria-expanded="false">
									<button class="btn btn-white animated tada delay-2"><span>Daftar Informasi</span>
								</a>
							@endif
							
						</div>        
					</div>
				</div>
			</div>
        </section>
            
        @include('template_fe.footer')
    </div>

    <div class="scroll-top"><a class="smoothscroll" href="#top"><i class="flaticon-upload"></i></a></div>
   
    @include('template_fe.javascript')


</body>

</html>
