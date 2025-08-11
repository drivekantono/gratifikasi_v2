
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
	#tombol:hover {
		color: black;
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
                        <h2 class="text-white animated bounceInLeft delay-2 duration-3" style="color: white">DASHBOARD</h2>
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
								<p class="text-black" style="">{{ Auth::user()->email }}</p>
								
								<a href="{{ route('user.informasi_akun.ubah') }}" role="button" aria-haspopup="true" aria-expanded="false">
									<button class="btn mb-2" style="background:#049372; color:#fff; width:100%; text-align:left">
										<i class="fas fa-user-edit"></i>&nbsp;
										{{ __('Ubah Profil') }}
									</button>
								</a>
								<a href="{{ route('user.informasi_akun.ubah') }}" role="button" aria-haspopup="true" aria-expanded="false">
									<button class="btn" style="background:#049372; color:#fff; width:100%; text-align:left">
										<i class="fas fa-user-lock"></i>&nbsp;
										{{ __('Ubah Password') }}
									</button>
								</a>
							</div>
						</div>
						<div class="col-lg-8 col-md-12">
							<div class="featured-item text-center style-2 py-2 mb-4" id="">
								<div class="row">
									<div class="col-md-6 py-2">
										<a href="{{ route('ppid.layanan.permohonan_informasi') }}" role="button" aria-haspopup="true" aria-expanded="false">
											<button class="btn" style="background:#049372; color:#fff; width:100%; text-align:left">
												<i class="fas fa-plus-circle"></i>&nbsp;
												{{ __('Permohonan Informasi') }}
											</button>
										</a>
									</div>
									<div class="col-md-6 py-2">
										<a href="{{ route('ppid.layanan.permohonan_keberatan') }}" role="button" aria-haspopup="true" aria-expanded="false">
											<button class="btn" style="background:#049372; color:#fff; width:100%; text-align:left">
												<i class="fas fa-plus-circle"></i>&nbsp;
												{{ __('Permohonan Keberatan') }}
											</button>
										</a>
									</div>
								</div>
							</div>
							
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
											<em>belum ada permohonan informasi</em>
										</div>
									</div>
								</div>
							@else
								@foreach($items; as $item)
									<div class="featured-item style-2 py-3 mb-3" id="">
										<div class="row">
											<div class="col-6">
												<p>{{ tglIndo($item->pi_tanggal_buat) }}</p>
											</div>
										</div>
										
										<div class="row col-md-12">
											<h3><a href="{{route('ppid.layanan.permohonan_informasi.lihat', $item->pi_no)}}">{{$item->pi_no}}</a></h3>
										</div>
										
										<div class="row col-md-12">
											<a id="tombol" href="{{route('ppid.layanan.permohonan_informasi.cetak', $item->pi_no)}}">[<i class="fas fa-file-pdf"></i>&nbsp;unduh]</a>
											<a id="tombol" href="{{route('ppid.layanan.permohonan_informasi.detail', $item->id)}}">[<i class="fas fa-file-pdf"></i>&nbsp;unduh]</a>
											<a id="tombol" href="javascript:load_data('{{ $item->id }}')" data-toggle="modal" data-target="#modal-default">[<i class="fas fa-info-circle"></i>&nbsp;lihat]</a>
										</div>
										
										<!--
										<div class="row">
											<div class="col-md-8">
												<h3><a href="{{route('ppid.layanan.permohonan_informasi.lihat', $item->pi_no)}}">{{$item->pi_no}}</a></h3>
											</div>
											<div class="col-md-4" style="text-align:right">
												<a id="tombol" href="{{route('ppid.layanan.permohonan_informasi.cetak', $item->pi_no)}}">{{ __('[unduh]') }}</a>
												<a id="tombol" href="{{route('ppid.layanan.permohonan_informasi.lihat', $item->pi_no)}}">{{ __('[lihat]') }}</a>
											</div>
										</div>
										-->
										
										<div class="row">
											<div class="col-md-8">
												<p>{{ $item->pi_peruntukan }} / {{ $item->pi_peroleh_cara }} / {{ $item->pi_peroleh_bentuk }}</p>
											</div>
											<div class="col-md-4" style="text-align:right">
												<em>oleh : <span style="text-transform:capitalize;">{{ $item->user_nama }}</span></em>
											</div>
										</div>
										
										<div class="row">
											<div class="col-md-12">
												<p><b>{{ $item->pi_tujuan }}</b>. {{ mb_substr(strip_tags($item->pi_informasi), 0, 200) }}...</p>
											</div>
										</div>
										
										<div class="row">
											<div class="col-md-12" style="text-align:right">
												<em>status : 
													<span style="text-transform:capitalize;">
														@if ($item->pi_status === "S")
															Dikabulkan Sebagian
														@elseif ($item->pi_status === "D")
															Dikabulkan Seluruhnya
														@elseif ($item->pi_status === "X")
															Ditolak
														@else
															Buat Baru
														@endif
													</span>
												</em>
											</div>
										</div>
										
										<!--<p>{{ mb_substr(strip_tags($item->pi_informasi), 0, 200) }}</p>-->
									</div>
								@endforeach
							@endif
							
							<nav aria-label="Page navigation" class="mt-8">
							  <div class="pagination-wrapper"> {!! $items->appends(['search' => Request::get('search')])->render() !!} </div>
							</nav>
						</div>
					</div>
				</div>
			</section>
			<!--section end-->
			
			<!-- modal view detail -->    
			<div class="modal fade" id="modal-default" style="max-height:90%;">
				<div class="modal-dialog modal-dialog-scrollable modal-lg">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<i class="fa fa-times" style="color: red"></i>
							</button>
							<h4 class="modal-title">Permohonan Informasi</h4>
						</div>
						<div class="modal-body">
							<div class="box box-primary">
								<div class="box-body box-profile">
									<table class="table" style="margin-bottom:30px">
										<tbody>
											<tr style="height:fit-content">
												<td class="text-center" style="font-size:18pt; border:0px; line-height:1"><strong>PERMOHONAN INFORMASI</strong></td>
											</tr>
											<tr style="height:fit-content">
												<td id="td_pi" class="text-center" style="font-size:12pt; border:0px; line-height:1"><strong><p id="pi_no"></p></strong></td>
											</tr>
										</tbody>
									</table>
									
									<table class="table" style="margin-bottom:20px">
										<tbody>
											<tr style="height:fit-content">
												<td id="td_pi" colspan="3" style="font-size:12pt; border:0px; line-height:1"><strong>A. Biodata Pemohon Informasi</strong></td>
											</tr>
											<tr style="height:fit-content">
												<td id="td_pi" style="width:35%">Nama</td>
												<td id="td_pi" style="width:5%; text-align:right">:</td>
												<td id="td_pi" style="font-size:12pt; border:0px; line-height:1"><p id="user_nama"></p></td>
											</tr>
											<tr style="height:fit-content">
												<td id="td_pi" style="width:35%">NIK</td>
												<td id="td_pi" style="width:5%; text-align:right">:</td>
												<td id="td_pi" style=""><p id="user_nik"></td>
											</tr>
											<tr style="height:fit-content">
												<td id="td_pi" style="width:35%;">Email</td>
												<td id="td_pi" style="width:5%; text-align:right">:</td>
												<td id="td_pi" style=""><p id="user_email"></td>
											</tr>
											<tr style="height:fit-content">
												<td id="td_pi" style="width:35%;">No. Telpon</td>
												<td id="td_pi" style="width:5%; text-align:right">:</td>
												<td id="td_pi" style=""><p id="user_telp"></td>
											</tr>
											<tr style="height:fit-content">
												<td id="td_pi" style="width:35%;">Jenis Alamat</td>
												<td id="td_pi" style="width:5%; text-align:right">:</td>
												<td id="td_pi" style=""><p id="user_jenis_alamat"></td>
											</tr>
											<tr style="height:fit-content">
												<td id="td_pi" style="width:35%;">Alamat</td>
												<td id="td_pi" style="width:5%; text-align:right">:</td>
												<td id="td_pi" style=""><p id="user_alamat"></td>
											</tr>
										</tbody>
									</table>
									
									<table class="table" style="margin-bottom:30px">
										<tbody>
											<tr style="height:fit-content">
												<td id="td_pi" colspan="3" style="font-size:12pt; border:0px; line-height:1"><strong>B. Permohonan Informasi</strong></td>
											</tr>
											<tr style="height:fit-content">
												<td id="td_pi" style="width:35%;">Nomor Permohonan</td>
												<td id="td_pi" style="width:5%; text-align:right">:</td>
												<td id="td_pi" style=""><p id="pi_no2"></p></td>
											</tr>
											<tr style="height:fit-content">
												<td id="td_pi" style="width:35%;">Tanggal dan Waktu</td>
												<td id="td_pi" style="width:5%; text-align:right">:</td>
												<td id="td_pi" style=""><p id="pi_tanggal_buat"></p></td>
											</tr>
											<tr style="height:fit-content">
												<td id="td_pi" style="width:35%;">Jenis Permohonan</td>
												<td id="td_pi" style="width:5%; text-align:right">:</td>
												<td id="td_pi" style=""><p id="pi_jenis"></p></td>
											</tr>
											<tr style="height:fit-content">
												<td id="td_pi" style="width:35%;">Bertindak Atas Nama</td>
												<td id="td_pi" style="width:5%; text-align:right">:</td>
												<td id="td_pi" style=""><p id="pi_peruntukan"></p></td>
											</tr>
											<tr style="height:fit-content">
												<td id="td_pi" style="width:35%;">Informasi Yang Dibutuhkan</td>
												<td id="td_pi" style="width:5%; text-align:right">:</td>
												<td id="td_pi" style=""><p id="pi_informasi"></p></td>
											</tr>
											<tr style="height:fit-content">
												<td id="td_pi" style="width:35%;">Tujuan Permohonan</td>
												<td id="td_pi" style="width:5%; text-align:right">:</td>
												<td id="td_pi" style=""><p id="pi_tujuan"></p></td>
											</tr>
											<tr style="height:fit-content">
												<td id="td_pi" style="width:35%;">Bentuk Informasi Yang Diminta</td>
												<td id="td_pi" style="width:5%; text-align:right">:</td>
												<td id="td_pi" style=""><p id="pi_peroleh_bentuk"></p></td>
											</tr>
											<tr style="height:fit-content">
												<td id="td_pi" style="width:35%;">Cara Memperoleh Informasi</td>
												<td id="td_pi" style="width:5%; text-align:right">:</td>
												<td id="td_pi" style=""><p id="pi_peroleh_cara"></p></td>
											</tr>
											<tr style="height:fit-content">
												<td id="td_pi" style="width:35%; padding-top:0px;">Catatan Tambahan </br><em>(yang dibuat pemohon informasi)</em></td>
												<td id="td_pi" style="width:5%; text-align:right">:</td>
												<td id="td_pi" style="padding-top:0px;"><p id="pi_catatan_buat"></p></td>
											</tr>
											<tr style="height:fit-content">
												<td id="td_pi" style="width:35%;">File Penunjang</td>
												<td id="td_pi" style="width:5%; text-align:right">:</td>
												<td id="td_pi" style="">
													<a id="a_pi_file_penunjang" href="#">
														<p id="pi_file_penunjang"></p>
													</a>
												</td>
											</tr>
											<tr style="height:fit-content">
												<td id="td_pi" style="width:35%;">Status</td>
												<td id="td_pi" style="width:5%; text-align:right">:</td>
												<td id="td_pi" style="">
													<p id="pi_status"></p>
												</td>
											</tr>
										</tbody>
									</table>
									
									<table class="table" style="margin-bottom:30px">
										<tbody>
											<tr style="height:fit-content">
												<td id="td_pi" colspan="3" style="font-size:12pt; border:0px; line-height:1"><strong>C. Respon</strong></td>
											</tr>
											<tr style="height:fit-content">
												<td id="td_pi" style="width:35%;">Tanggal dan Waktu</td>
												<td id="td_pi" style="width:5%; text-align:right">:</td>
												<td id="td_pi" style=""><p id="pi_tanggal_selesai"></p></td>
											</tr>
											<tr style="height:fit-content">
												<td id="td_pi" style="width:35%; padding-top:0px;">Catatan</br><em>(yang dibuat pengelola informasi)</em></td>
												<td id="td_pi" style="width:5%; text-align:right">:</td>
												<td id="td_pi" style="padding-top:0px;"><p id="pi_catatan_respon"></p></td>
											</tr>
											<tr style="height:fit-content">
												<td id="td_pi" style="width:35%;">File Yang Diberikan</td>
												<td id="td_pi" style="width:5%; text-align:right">:</td>
												<td id="td_pi" style="">
													<a id="a_pi_file_respon" href="#">
														<p id="pi_file_respon"></p>
													</a>
												</td>
											</tr>
										</tbody>
									</table>
								</div>
							<!-- /.box-body -->
							</div>
						<!-- /.box -->
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
						</div>
					</div>
				<!-- /.modal-content -->
				</div>
			  <!-- /.modal-dialog -->
			</div>
        </div>

        <!--body content end-->

        @include('template_fe.footer')

    </div>

    <div class="scroll-top"><a class="smoothscroll" href="#top"><i class="flaticon-upload"></i></a></div>

    <!--back-to-top end-->

    @include('template_fe.javascript')
</body>

<script>
	@if ($message = Session::get('success'))
		$("#modalMessage").modal("toggle");
	@endif
	
	function load_data(id){
		var url_php = '{{ route('ppid.layanan.permohonan_informasi.detail', 'id') }}';
		var res = url_php.split('id');
		  
		$.ajax({
		  url:res[0]+id+res[1],
		  method:'GET',
		  dataType: 'json', // added data type
			success: function(res) {			
				document.getElementById("pi_no").innerHTML = "Nomor : " + res.pi_no;
				document.getElementById("user_nama").innerHTML = res.user_nama;
				document.getElementById("user_nik").innerHTML = res.user_nik;
				document.getElementById("user_email").innerHTML = res.user_email;
				document.getElementById("user_telp").innerHTML = res.user_telp;
				document.getElementById("user_jenis_alamat").innerHTML = res.user_jenis_alamat;
				document.getElementById("user_alamat").innerHTML = res.user_alamat;
				document.getElementById("pi_no2").innerHTML = res.pi_no;
				document.getElementById("pi_tanggal_buat").innerHTML = res.pi_tanggal_buat;
				document.getElementById("pi_jenis").innerHTML = res.pi_jenis;
				document.getElementById("pi_peruntukan").innerHTML = res.pi_peruntukan;
				document.getElementById("pi_informasi").innerHTML = res.pi_informasi;
				document.getElementById("pi_tujuan").innerHTML = res.pi_tujuan;
				document.getElementById("pi_peroleh_bentuk").innerHTML = res.pi_peroleh_bentuk;
				document.getElementById("pi_peroleh_cara").innerHTML = res.pi_peroleh_cara;
				document.getElementById("pi_catatan_buat").innerHTML = res.pi_catatan_buat;
				document.getElementById("pi_file_penunjang").innerHTML = res.pi_file_penunjang;
				document.getElementById("pi_tanggal_selesai").innerHTML = res.pi_tanggal_selesai;
				document.getElementById("pi_catatan_respon").innerHTML = res.pi_catatan_respon;
				document.getElementById("pi_file_respon").innerHTML = res.pi_file_respon;
				if(res.pi_status === "S"){
					document.getElementById("pi_status").innerHTML = "Dikabulkan Sebagian";
				}else if(res.pi_status === "D"){
					document.getElementById("pi_status").innerHTML = "Dikabulkan Seluruhnya";
				}else if(res.pi_status === "X"){
					document.getElementById("pi_status").innerHTML = "Ditolak";
				}else{
					document.getElementById("pi_status").innerHTML = "Buat Baru";
				}
				document.getElementById("a_pi_file_penunjang").href='{{asset('../ppid/public/uploads/ppid_permohonan_informasi/')}}' + '/' + res.pi_file_penunjang;
				document.getElementById("a_pi_file_respon").href='{{asset('../ppid/public/uploads/ppid_permohonan_informasi/')}}' + '/' + res.pi_file_respon;
				
				console.log(res.pi_no)
			}
		})
	  }
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

