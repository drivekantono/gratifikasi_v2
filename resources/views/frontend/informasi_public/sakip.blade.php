
<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from themeht.com/loptus/html/blog-classic.html by HTTrack Website Copier/3.x [XR&CO'2013], Thu, 10 Oct 2019 03:50:04 GMT -->
@include('template_fe.head')

<body>

<!-- page wrapper start -->

<div class="page-wrapper">


@include('template_fe.header')

<!--page title start-->

<section class="page-title o-hidden text-center grey-bg bg-contain animatedBackground" data-bg-img="{{asset('fe/images/pattern/05.png')}}">
  <div class="container">
    <div class="row align-items-center">
      <div class="col-md-12">
        <h1 class="title">RENCANA KERJA</h1>
      </div>
    </div>
  </div>
  <div class="page-title-pattern"><img class="img-fluid" src="{{asset('fe/images/bg/06.png')}}" alt=""></div>
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
        <div style="width: 500px;" class="align-items-center white-bg box-shadow px-3 py-3 radius d-md-flex justify-content-between">
        <h4 class="mb-0">Tahun</h4>
        <div class="subscribe-form sm-mt-2">
          <form id="mc-form" class="group" action="{{ route('frontend.sakip.sakipbytahun') }}" method="POST">
            {{ csrf_field() }}
            <select name="tahun" class="form-control" >
                  @foreach($data as $key => $item)
                 
                    <option value="{{ $data[$key]['tahun'] }}">{{ $data[$key]['tahun'] }}</option>
                    
                  @endforeach
            </select>
            <input class="btn btn-theme" type="submit" name="subscribe" value="Cari">
          </form>
        </div>
      </div>
        </div>
    </div>
    </div>
    @foreach($items as $item)
    <div class="row">
      <div class="col-lg-12 col-md-12">
        <div class="left-side">
          <div class="post">
            <div class="post-desc">
              <div class="post-date mb-2">SAKIP {{ $item->tahun}} {{$item->title}}</span>
              </div>
              <p class="lead">{!! $item->deskripsi !!}</p>
              <div><span><a href="{{asset('uploads/sakip/rencana_kerja'.$item->file)}}">Download</a></span></div>
            </div>
          </div>
        </div>
      </div>      
    </div>
    @endforeach
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