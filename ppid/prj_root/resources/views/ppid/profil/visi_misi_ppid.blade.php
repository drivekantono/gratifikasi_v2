<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from themeht.com/loptus/html/project-details.html by HTTrack Website Copier/3.x [XR&CO'2013], Thu, 10 Oct 2019 03:50:04 GMT -->

@include('template_fe.head')

<body>

    <!-- page wrapper start -->

    <div class="page-wrapper">

       @include('template_fe.header')


        <!--page title start-->

        <section class="page-title o-hidden text-center green-bg bg-contain animatedBackground" data-bg-img="{{ asset('fe/images/pattern/05.png') }}">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <h1 class="title" style="color: white">PROFIL PPID</br>INSPEKTORAT PROVINSI JAWA TIMUR</h1>
                    </div>
                </div>
            </div>
            <div class="page-title-pattern"><img class="img-fluid" src="{{ asset('fe/images/bg/06-2.png') }}" alt=""></div>
        </section>

        <!--page title end-->


        <!--body content start-->

        <div class="page-content">

            <!--service details start-->

            <section>
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="case-images">
                                <img class="img-fluid w-100" src="{{asset('uploads/profil/'.$items->images)}}" alt="">
                            </div>
                        </div>
                    </div>
                    <div class="row row-eq-height box-shadow no-gutters">
                        <div class="col-lg-7 col-md-12">
                            <div class="project-details px-3 pt-4 pb-2">
                                <h4>{{$items->title}}</h4>
                                <p class="mb-4">{!! $items->deskripsi!!}</p>
                            </div>
                        </div>
                        <div class="col-lg-5 col-md-12">
                            <div class="theme-bg h-100 align-item-middle">
                                <ul class="portfolio-meta list-unstyled px-5 md-px-3 py-3">
                                    <li class="mb-4"><i class="flaticon-user"></i> <span> Title</span> {{$items->title}}</li>
                                    <li class="mb-4"><i class="flaticon-development"></i> <span> Created at</span> {{$items->created_at}}</li>
                                    
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <!--service details end-->
        </div>

        <!--body content end-->

        @include('template_fe.footer')

    </div>

    <div class="scroll-top"><a class="smoothscroll" href="#top"><i class="flaticon-upload"></i></a></div>

    <!--back-to-top end-->

    @include('template_fe.javascript')

</html>