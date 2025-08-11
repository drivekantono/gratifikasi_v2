
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
	.modal { 
		position: fixed; 
		top:10%;
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
                        <h2 class="text-white animated bounceInLeft delay-2 duration-3" style="color: white">INFORMASI AKUN</h2>
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
						<div class="col-lg-4 col-md-12 sidebar my-3 mt-lg-0">
							<div class="featured-item text-center style-2" id="" style="background-image: url( {{ asset('fe/images/pattern/07.jpg') }} ); background-size:cover">
								<img class="mb-3" src="{{ asset('fe/images/icon/02.png') }}" alt width="50%" style="display:block; margin:auto;">
								<h3 class="mb-0">{{ Auth::user()->name }}</h3> 
								<p class="text-black">{{ Auth::user()->email }}</p>
								<a href="{{ route('user.informasi_akun.ubah') }}" role="button" aria-haspopup="true" aria-expanded="false">
									<button class="btn mb-2" style="background:#049372; color:#fff; width:100%; text-align:left">
										<i class="fas fa-user-edit"></i>&nbsp;
										{{ __('Ubah Profil') }}
									</button>
								</a>	
							</div>
						</div>
						<div class="col-lg-8 col-md-12">
							<div class="featured-item style-2" id="">
								<h3 class="title mb-3">Informasi Akun</h3> 
								<table border="0" cellpadding="5" cellspacing="1" style="width:100%"
									<tbody>
										<tr>
											<td colspan="1" rowspan="1" style="text-align:left; vertical-align:top; width:20%">NIK</td>
											<td colspan="1" rowspan="1" style="text-align:right; vertical-align:top; width:5%">:</td>
											<td colspan="1" rowspan="1" style="text-align:left; vertical-align:top; width:75%; text-transform:capitalize;"><b>{{ Auth::user()->nik }}</b></td>
										</tr>
										<tr>
											<td colspan="1" rowspan="1" style="text-align:left; vertical-align:top; width:20%">Nama</td>
											<td colspan="1" rowspan="1" style="text-align:right; vertical-align:top; width:5%">:</td>
											<td colspan="1" rowspan="1" style="text-align:left; vertical-align:top; width:75%; text-transform:capitalize;"><b>{{ Auth::user()->name }}</b></td>
										</tr>
										<tr>
											<td colspan="1" rowspan="1" style="text-align:left; vertical-align:top; width:20%">Jenis Kelamin</td>
											<td colspan="1" rowspan="1" style="text-align:right; vertical-align:top; width:5%">:</td>
											<td colspan="1" rowspan="1" style="text-align:left; vertical-align:top; width:75%; text-transform:capitalize;">
												@if ( Auth::user()->jenis_kelamin === "L" )
													<b>Laki-laki</b>
												@elseif ( Auth::user()->jenis_kelamin === "P" )
													<b>Perempuan</b>
												@endif
											</td>
										</tr>
										<tr>
											<td colspan="1" rowspan="1" style="text-align:left; vertical-align:top; width:20%">Email</td>
											<td colspan="1" rowspan="1" style="text-align:right; vertical-align:top; width:5%">:</td>
											<td colspan="1" rowspan="1" style="text-align:left; vertical-align:top; width:75%;"><b>{{ Auth::user()->email }}</b></td>
										</tr>
										<tr>
											<td colspan="1" rowspan="1" style="text-align:left; vertical-align:top; width:20%">No. Telpon</td>
											<td colspan="1" rowspan="1" style="text-align:right; vertical-align:top; width:5%">:</td>
											<td colspan="1" rowspan="1" style="text-align:left; vertical-align:top; width:75%; text-transform:capitalize;"><b>{{ Auth::user()->telp }}</b></td>
										</tr>
										<tr>
											<td colspan="1" rowspan="1" style="text-align:left; vertical-align:top; width:20%">Jenis Alamat</td>
											<td colspan="1" rowspan="1" style="text-align:right; vertical-align:top; width:5%">:</td>
											<td colspan="1" rowspan="1" style="text-align:left; vertical-align:top; width:75%; text-transform:capitalize;"><b>{{ Auth::user()->jenis_alamat }}</b></td>
										</tr>
										<tr>
											<td colspan="1" rowspan="1" style="text-align:left; vertical-align:top; width:20%">Alamat</td>
											<td colspan="1" rowspan="1" style="text-align:right; vertical-align:top; width:5%">:</td>
											<td colspan="1" rowspan="1" style="text-align:left; vertical-align:top; width:75%; text-transform:capitalize;"><b>{{ Auth::user()->alamat }}</b></td>
										</tr>
									</tbody>
								</table>
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
</body>

<script type="text/javascript">
	@if ($message = Session::get('success'))
		$("#modalMessage").modal("toggle");
	@endif
</script>

<style>
	.btn:hover {
		color: #049372 !important;
		background-color: #fff !important;
		border: 1px solid green !important;
		-webkit-animation-name: pulse;
		animation-name: pulse;
		-webkit-animation-duration: 1s;
		animation-duration: 1s;
		-webkit-animation-fill-mode: both;
		animation-fill-mode: both;
	}
</style>

</html>

