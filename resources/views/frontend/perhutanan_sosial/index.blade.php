<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from themeht.com/loptus/html/project-details.html by HTTrack Website Copier/3.x [XR&CO'2013], Thu, 10 Oct 2019 03:50:04 GMT -->

@include('template_fe.head')

<body>

    <!-- page wrapper start -->

    <div class="page-wrapper">

       @include('template_fe.header')


        <!--page title start-->

        <section class="page-title o-hidden text-center grey-bg bg-contain animatedBackground" data-bg-img="{{ asset('fe/images/pattern/05.png') }}">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <h1 class="title">PERHUTANAN SOSIAL</h1>
                        <nav aria-label="breadcrumb" class="page-breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a href="#tentang_perhutanan_sosial">Tentang Perhutanan Sosial</a>
                                </li>
                                <li class="breadcrumb-item">
                                    <a href="#progres_perhutanan_sosial">Progres Perhutanan Sosial</a>
                                </li>
                                <li class="breadcrumb-item">
                                    <a href="#produk_kehutanan">Produk Kehutanan</a>
                                </li>
                                
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
            <div class="page-title-pattern"><img class="img-fluid" src="{{ asset('fe/images/bg/06.png') }}" alt=""></div>
        </section>

        <!--page title end-->


        <!--body content start-->

        <section class="o-hidden" id="tentang_perhutanan_sosial">
                <div class="container">
                    <div class="row align-items-center">
                    <div class="col-lg-12 col-md-12 md-mt-5">
                        <div class="section-title mb-4" style="text-align: justify;">
                            <h2 class="title">{{$items->title}}</h2> 
                            <p class="mb-0 text-black">{!! $items->deskripsi!!}</p>
                        </div>
                    </div>
                    </div>
                </div>
        </section>

        <section class="grey-bg pos-r text-center o-hidden" id="progres_perhutanan_sosial">
                <div class="pattern-3">
                    <img class="img-fluid rotateme" src="{{ asset('fe/images/pattern/03.png') }}" alt="">
                </div>
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 ml-auto mr-auto">
                            <div class="section-title">
                            
                            <h2 class="title">PROGRES PERHUTANAN SOSIAL</h2> 
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12 col-md-6">
                            <div class="featured-item text-center">
                            <div class="featured-desc" style="text-align: justify;">
                                <p>{!! $items2->deskripsi !!}</p>
                            </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>



            <section id="produk_kehutanan">
              <div class="container">
                <div class="row">
                        <div class="col-lg-12 col-md-12 ml-auto mr-auto">
                            <div class="section-title">
                            
                            <h2 class="title">PRODUK KEHUTANAN</h2> 
                            </div>
                        </div>
                    </div>
                <div class="row">
                  @php
                      if (Request::get('page') && Request::get('page') > 1) {
                          $iterate = Request::get('page') - 1;
                          $no = ($perPage * $iterate) +1;
                      } else {
                          $no = 1;
                      }
                  @endphp
                  @foreach($items3 as $item)
                  <div class="col-lg-6 col-md-6" >
                    <div class="post" >
                      <div class="grid-item cat1 cat3 popup-gallery" >
                        <div class="portfolio-item" >
                            <img class="img-center w-100"  style="max-height: 300px;" src="{{ asset('uploads/produk/'.$item->file) }}" alt="">
                            <a class="popup-img" href="{{ asset('uploads/produk/'.$item->file) }}"> <i class="flaticon-plus"></i>
                            </a> 
                        </div>
                      </div>
                      <div class="post-desc" style="text-align: justify;">
                        <div class="post-date"><span>{{tglIndo($item->created_at)}}</span>
                        </div>
                        <div class="post-title">
                          {!!$item->title!!}
                        </div>
                        <p class="lead">{!! $item->deskripsi !!}</p>
                      </div>
                    </div>
                  </div>
                  @endforeach
                </div>
                <div class="pagination-wrapper"> {!! $items3->appends(['search' => Request::get('search')])->render() !!} </div>
              </div>
            </section>
        <!--body content end-->

        @include('template_fe.footer')

    </div>

    <div class="scroll-top"><a class="smoothscroll" href="#top"><i class="flaticon-upload"></i></a></div>

    <!--back-to-top end-->

    @include('template_fe.javascript')
    

    

</html>

