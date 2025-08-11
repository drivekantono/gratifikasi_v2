
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
                        <h2 class="text-white animated bounceInLeft delay-2 duration-3" style="color: white">ALUR</h2>
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
						<!--
						<div class="tab-v1">
							<ul class="nav nav-tabs" id="nav-tab">
								@foreach($items as $item)
									<li><a href="#{{$item->class}}" data-toggle="tab">{{$item->title}}</a></li>
								@endforeach
							</ul>

							<div class="tab-content">
								@foreach($items as $item)
									<div class="tab-pane fade in active" id="{{$item->class}}">{!! $item->deskripsi !!}</div>
								@endforeach
							</div>
						</div>
						-->
						
						<div class="content_dipilih col-lg-8 col-md-12 order-lg-1">
							<!-- Tampilkan detail semua profil -->
							@foreach($items; as $item)
								<div class="featured-item style-2" id={{ $item->class }}>
									<h2 class="title">{{ $item->title }}</h2> 
									<p class="mb-0 text-black">{!! $item->deskripsi !!}</p>
									<center>
										<img class="img-fluid" src="{{asset('uploads/ppid_profil/'.$item->images)}}" alt="" id="img_{{ $item->class }}">
									</center>
								</div>
							@endforeach
						</div>
						<div class="col-lg-4 col-md-12 sidebar mt-5 mt-lg-0">
							<!-- Tampilkan list semua profil -->
							<div class="widget white-bg px-4 py-4" style="cursor:pointer">
								<ul class="widget-categories list-unstyled">
									@for($varCount = 0; $varCount < count($items); $varCount++)
										<li><a class="pilih_menu" id="menu_{{ $items[$varCount]->class }}">{{ $items[$varCount]->title }}</a></li>
									@endfor
								</ul>
							</div>
						</div>
					</div>
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
	<script type="text/javascript">
		$(document).ready(function () {
			$('#nav-tab a[href="#permohonan_informasi"]').tab('show')
			
			$('.pilih_menu').click(function(){
				var menu = $(this).attr('id');
				
				if(menu == "menu_permohonan_informasi"){
					$('#permohonan_informasi').show();
					$('#permohonan_keberatan').hide();
				}else if(menu == "menu_permohonan_keberatan"){
					$('#permohonan_informasi').hide();
					$('#permohonan_keberatan').show();
				}else {		
					$('#permohonan_informasi').show();
					$('#permohonan_keberatan').hide();
				}
			}); 
	 
			// halaman yang di load default pertama kali					
			$('#permohonan_informasi').show();
			$('#permohonan_keberatan').hide();
		});
	</script>
</html>

