
<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from themeht.com/loptus/html/project-details.html by HTTrack Website Copier/3.x [XR&CO'2013], Thu, 10 Oct 2019 03:50:04 GMT -->

@include('template_fe.head')
<style>
                #chart-container {
                    font-family: Arial;
                    height: 420px;
                    border: 2px dashed #aaa;
                    border-radius: 5px;
                    overflow: auto;
                    text-align: center;
                    }
                #github-link {
                    position: fixed;
                    top: 0px;
                    right: 10px;
                    font-size: 3em;
                }

                #edit-panel {
                    text-align: center;
                    position: relative;
                    left: 10px;
                    width: calc(100% - 40px);
                    border-radius: 4px;
                    float: left;
                    margin-top: 10px;
                    padding: 10px;
                    color: #fff;
                    background-color: #449d44;
                }
                #edit-panel * {
                    font-size: 20px;
                } 
                #tree1 {
                    width: 100%;
                    height: 100%;
                    position: relative;
                }  
                #putih {
                    color: #FFFFFF;
                }
            </style>
<body>

    <!-- page wrapper start -->

    <div class="page-wrapper">

       @include('template_fe.header')

        <!--page title start-->

        <section class="page-title o-hidden text-center green-bg bg-contain animatedBackground" data-bg-img="{{ asset('fe/images/pattern/01.png') }}">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <h2 class="text-white animated bounceInLeft delay-2 duration-3" style="color: white">REGULASI</h2>
                    </div>
                </div>
            </div>
            <div class="page-title-pattern"><img class="img-fluid" src="{{ asset('fe/images/bg/06-2.png') }}" alt=""></div>
        </section>

        <!--page title end-->


        <!--body content start-->

        <div class="page-content">
			<!--section start--> 
			<section id="daftar_informasi">
				<div class="container">
					<div class="row">
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
							} 
							else {
								$no = 1;
							}
						@endphp
						@if (count($items) === 0 )
							<div class="featured-item text-center style-2 py-2 mb-4" id="">
								<div class="row">
									<div class="col-md-12 my-2">
										<em>tidak ada data</em>
									</div>
								</div>
							</div>
						@else
							@foreach($items; as $item)
								<div class="col-md-12">
									<div class="featured-item style-2 py-3 mb-3" id="">
										<div class="post-title">
											<h3>{{$item->title}}</h3>
										</div>
										
										<div class="row">
											<div class="col-md-12">
												<p>{{ mb_substr(strip_tags($item->deskripsi), 0, 200) }}...</p>
											</div>
										</div>
										
										@if ($item->files !== "")
										<div class="row">
											<div class="col-md-12" style="text-align:right">
												<a href="{{asset('/uploads/ppid_regulasi/'.$item->files)}}" target="_blank">
													[lihat]
												</a>
											</div>
										</div>
										@endif
									</div>
								</div>
							@endforeach
						@endif
						
					</div>
					<nav aria-label="Page navigation" class="mt-8">
					  <div class="pagination-wrapper"> {!! $items->appends(['search' => Request::get('search')])->render() !!} </div>
					</nav>
				</div>
			</section>
			<!--section end-->
        </div>

        <!--body content end-->

        @include('template_fe.footer')

    </div>

    <div class="scroll-top"><a class="smoothscroll" href="#top"><i class="flaticon-upload"></i></a></div>

    <!--back-to-top end-->

    @include('template_fe.javascript')
    <script src="{{asset('js/orgchart.js')}}"></script>
</html>

