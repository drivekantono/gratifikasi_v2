
<!DOCTYPE html>
<html lang="en">

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
                        <h2 class="text-white animated bounceInLeft delay-2 duration-3" style="color: white">DAFTAR INFORMASI</h2>
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
						<div class="content_dipilih col-lg-8 col-md-12 order-lg-1">
							<!-- Tampilkan detail semua informasi -->
							@foreach($items; as $item)
								<div class="featured-item text-center style-2" id={{ $item->subclass }}>
									<h2 class="title">{{ $item->subgroup }}</h2> 
									<p class="mb-0 text-black">{!! $item->deskripsi !!}</p>
								</div>
								
								<div class="row" id="jarak{{ $item->id }}" style="height: 30px"></div>
							@endforeach
						</div>
						<div class="col-lg-4 col-md-12 sidebar mt-5 mt-lg-0">
							<!-- Tampilkan list semua informasi -->
							@for($varCount = 0; $varCount < count($items); $varCount++)
								@if($varCount === 0)
									<div class="widget white-bg px-4 py-4" style="cursor:pointer">
										<h5 class="pilih_menu widget-title" id="menu_{{ $items[$varCount]->mainclass }}">{{ $items[$varCount]->maingroup }}</h5>
										<ul class="widget-categories list-unstyled">
											@for($varCount2 = 0; $varCount2 < count($items); $varCount2++)
												@if($items[$varCount2]->maingroup === $items[$varCount]->maingroup)
													<li><a class="pilih_menu" id="menu_{{ $items[$varCount2]->subclass }}">{{ $items[$varCount2]->subgroup }}</a></li>
												@endif
											@endfor
										</ul>
									</div>
								@else
									@if($items[$varCount]->maingroup !== $items[$varCount-1]->maingroup)
										<div class="widget white-bg px-4 py-4" style="cursor:pointer">
											<h5 class="pilih_menu widget-title" id="menu_{{ $items[$varCount]->mainclass }}">{{ $items[$varCount]->maingroup }}</h5>
											<ul class="widget-categories list-unstyled">
												@for($varCount2 = 0; $varCount2 < count($items); $varCount2++)
													@if($items[$varCount2]->maingroup === $items[$varCount]->maingroup)
														<li><a class="pilih_menu" id="menu_{{ $items[$varCount2]->subclass }}">{{ $items[$varCount2]->subgroup }}</a></li>
													@endif
												@endfor
											</ul>
										</div>
									@endif
								@endif
							@endfor
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
</body>

<script type="text/javascript">
	$(document).ready(function(){
		$('.pilih_menu').click(function(){
			var menu = $(this).attr('id');
			
			if(menu == "menu_daftar_informasi_publik"){
				$('#informasi_terbuka').show();
				$('#informasi_serta_merta').show();
				$('#informasi_setiap_saat').show();
				$('#informasi_dikecualikan').hide();
				$('#jarak1').show();
				$('#jarak2').show();
				$('#jarak3').show();
			}else if(menu == "menu_daftar_informasi_dikecualikan"){
				$('#informasi_terbuka').hide();
				$('#informasi_serta_merta').hide();
				$('#informasi_setiap_saat').hide();
				$('#informasi_dikecualikan').show();
				$('#jarak1').hide();
				$('#jarak2').hide();
				$('#jarak3').hide();
			}else if(menu == "menu_informasi_terbuka"){
				$('#informasi_terbuka').show();
				$('#informasi_serta_merta').hide();
				$('#informasi_setiap_saat').hide();
				$('#informasi_dikecualikan').hide();
				$('#jarak1').hide();
				$('#jarak2').hide();
				$('#jarak3').hide();
			}else if(menu == "menu_informasi_serta_merta"){
				$('#informasi_terbuka').hide();
				$('#informasi_serta_merta').show();
				$('#informasi_setiap_saat').hide();
				$('#informasi_dikecualikan').hide();
				$('#jarak1').hide();
				$('#jarak2').hide();
				$('#jarak3').hide();
			}else if(menu == "menu_informasi_setiap_saat"){		
				$('#informasi_terbuka').hide();
				$('#informasi_serta_merta').hide();
				$('#informasi_setiap_saat').show();
				$('#informasi_dikecualikan').hide();
				$('#jarak1').hide();
				$('#jarak2').hide();
				$('#jarak3').hide();
			}else if(menu == "menu_informasi_dikecualikan"){		
				$('#informasi_terbuka').hide();
				$('#informasi_serta_merta').hide();
				$('#informasi_setiap_saat').hide();
				$('#informasi_dikecualikan').show();
				$('#jarak1').hide();
				$('#jarak2').hide();
				$('#jarak3').hide();
			}
		}); 
 
		// halaman yang di load default pertama kali
		//$('.content_dipilih').load('prj_root/resources/views/ppid/daftar_informasi/informasi_terbuka.blade.php');						
		$('#informasi_terbuka').show();
		$('#informasi_serta_merta').show();
		$('#informasi_setiap_saat').show();
		$('#informasi_dikecualikan').show();
		$('#jarak1').show();
		$('#jarak2').show();
		$('#jarak3').show();
	});
</script>

</html>

