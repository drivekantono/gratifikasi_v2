
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
                        <h2 class="text-white animated bounceInLeft delay-2 duration-3" style="color: white">PERMOHONAN INFORMASI</h2>
                    </div>
                </div>
            </div>
            <div class="page-title-pattern"><img class="img-fluid" src="{{ asset('fe/images/bg/06-2.png') }}" alt=""></div>
        </section>

        <!--page title end-->


        <!--body content start-->

        <div class="page-content">
			<!--section start-->
			<section id="permohonan_informasi_lihat">
				<div class="container">
					<table class="table" style="margin-bottom:30px">
						<tbody>
							<tr style="height:fit-content">
								<td class="py-0 text-center" style="font-size:18pt; border:0px; line-height:1.5"><strong>PERMOHONAN INFORMASI</strong></td>
							</tr>
							<tr style="height:fit-content">
								<td class="py-0 text-center" style="font-size:12pt; border:0px; line-height:1.5"><strong>Nomor : {{$items->pi_no}}</strong></td>
							</tr>
						</tbody>
					</table>
					
					<table class="table" style="margin-bottom:20px">
						<tbody>
							<tr style="height:fit-content">
								<td class="py-0" colspan="3" style="font-size:12pt; border:0px; line-height:1.5"><strong>A. Biodata Pemohon Informasi</strong></td>
							</tr>
							<tr style="height:fit-content">
								<td class="py-0" style="font-size:12pt; border:0px; line-height:1.5; width:35%;">Nama</td>
								<td class="p-0" style="font-size:12pt; border:0px; line-height:1.5; width:5%; text-align:right">:</td>
								<td class="py-0" style="font-size:12pt; border:0px; line-height:1.5">{{$items->user_nama}}</td>
							</tr>
							<tr style="height:fit-content">
								<td class="py-0" style="font-size:12pt; border:0px; line-height:1.5; width:35%;">NIK</td>
								<td class="p-0" style="font-size:12pt; border:0px; line-height:1.5; width:5%; text-align:right">:</td>
								<td class="py-0" style="font-size:12pt; border:0px; line-height:1.5">{{$items->user_nik}}</td>
							</tr>
							<tr style="height:fit-content">
								<td class="py-0" style="font-size:12pt; border:0px; line-height:1.5; width:35%;">Email</td>
								<td class="p-0" style="font-size:12pt; border:0px; line-height:1.5; width:5%; text-align:right">:</td>
								<td class="py-0" style="font-size:12pt; border:0px; line-height:1.5">{{$items->user_email}}</td>
							</tr>
							<tr style="height:fit-content">
								<td class="py-0" style="font-size:12pt; border:0px; line-height:1.5; width:35%;">No. Telpon</td>
								<td class="p-0" style="font-size:12pt; border:0px; line-height:1.5; width:5%; text-align:right">:</td>
								<td class="py-0" style="font-size:12pt; border:0px; line-height:1.5">{{$items->user_telp}}</td>
							</tr>
							<tr style="height:fit-content">
								<td class="py-0" style="font-size:12pt; border:0px; line-height:1.5; width:35%;">Jenis Alamat</td>
								<td class="p-0" style="font-size:12pt; border:0px; line-height:1.5; width:5%; text-align:right">:</td>
								<td class="py-0" style="font-size:12pt; border:0px; line-height:1.5">{{$items->user_jenis_alamat}}</td>
							</tr>
							<tr style="height:fit-content">
								<td class="py-0" style="font-size:12pt; border:0px; line-height:1.5; width:35%;">Alamat</td>
								<td class="p-0" style="font-size:12pt; border:0px; line-height:1.5; width:5%; text-align:right">:</td>
								<td class="py-0" style="font-size:12pt; border:0px; line-height:1.5">{{$items->user_alamat}}</td>
							</tr>
						</tbody>
					</table>
					
					<table class="table" style="margin-bottom:30px">
						<tbody>
							<tr style="height:fit-content">
								<td class="py-0" colspan="3" style="font-size:12pt; border:0px; line-height:1.5"><strong>B. Permohonan Informasi</strong></td>
							</tr>
							<tr style="height:fit-content">
								<td class="py-0" style="font-size:12pt; border:0px; line-height:1.5; width:35%;">Nomor Permohonan</td>
								<td class="p-0" style="font-size:12pt; border:0px; line-height:1.5; width:5%; text-align:right">:</td>
								<td class="py-0" style="font-size:12pt; border:0px; line-height:1.5">{{$items->pi_no}}</td>
							</tr>
							<tr style="height:fit-content">
								<td class="py-0" style="font-size:12pt; border:0px; line-height:1.5; width:35%;">Tanggal dan Waktu</td>
								<td class="p-0" style="font-size:12pt; border:0px; line-height:1.5; width:5%; text-align:right">:</td>
								<td class="py-0" style="font-size:12pt; border:0px; line-height:1.5">{{ tglIndo($items->pi_tanggal_buat) }} {{ date('H:i', strtotime($items->pi_tanggal_buat)) }}</td>
							</tr>
							<tr style="height:fit-content">
								<td class="py-0" style="font-size:12pt; border:0px; line-height:1.5; width:35%;">Jenis Permohonan</td>
								<td class="p-0" style="font-size:12pt; border:0px; line-height:1.5; width:5%; text-align:right">:</td>
								<td class="py-0" style="font-size:12pt; border:0px; line-height:1.5">{{$items->pi_jenis}}</td>
							</tr>
							<tr style="height:fit-content">
								<td class="py-0" style="font-size:12pt; border:0px; line-height:1.5; width:35%;">Bertindak Atas Nama</td>
								<td class="p-0" style="font-size:12pt; border:0px; line-height:1.5; width:5%; text-align:right">:</td>
								<td class="py-0" style="font-size:12pt; border:0px; line-height:1.5">{{$items->pi_peruntukan}}</td>
							</tr>
							<tr style="height:fit-content">
								<td class="py-0" style="font-size:12pt; border:0px; line-height:1.5; width:35%;">Informasi Yang Dibutuhkan</td>
								<td class="p-0" style="font-size:12pt; border:0px; line-height:1.5; width:5%; text-align:right">:</td>
								<td class="py-0" style="font-size:12pt; border:0px; line-height:1.5">{{$items->pi_informasi}}</td>
							</tr>
							<tr style="height:fit-content">
								<td class="py-0" style="font-size:12pt; border:0px; line-height:1.5; width:35%;">Tujuan Permohonan</td>
								<td class="p-0" style="font-size:12pt; border:0px; line-height:1.5; width:5%; text-align:right">:</td>
								<td class="py-0" style="font-size:12pt; border:0px; line-height:1.5">{{$items->pi_tujuan}}</td>
							</tr>
							<tr style="height:fit-content">
								<td class="py-0" style="font-size:12pt; border:0px; line-height:1.5; width:35%;">Bentuk Informasi Yang Diminta</td>
								<td class="p-0" style="font-size:12pt; border:0px; line-height:1.5; width:5%; text-align:right">:</td>
								<td class="py-0" style="font-size:12pt; border:0px; line-height:1.5">{{$items->pi_peroleh_bentuk}}</td>
							</tr>
							<tr style="height:fit-content">
								<td class="py-0" style="font-size:12pt; border:0px; line-height:1.5; width:35%;">Cara Memperoleh Informasi</td>
								<td class="p-0" style="font-size:12pt; border:0px; line-height:1.5; width:5%; text-align:right">:</td>
								<td class="py-0" style="font-size:12pt; border:0px; line-height:1.5">{{$items->pi_peroleh_cara}}</td>
							</tr>
							<tr style="height:fit-content">
								<td class="py-0" style="font-size:12pt; border:0px; line-height:1.5; width:35%;">Catatan Tambahan </br><em>(yang dibuat pemohon informasi)</em></td>
								<td class="p-0" style="font-size:12pt; border:0px; line-height:1.5; width:5%; text-align:right">:</td>
								<td class="py-0" style="font-size:12pt; border:0px; line-height:1.5">{{$items->pi_catatan_buat}}</td>
							</tr>
							<tr style="height:fit-content">
								<td class="py-0" style="font-size:12pt; border:0px; line-height:1.5; width:35%;">File Penunjang</td>
								<td class="p-0" style="font-size:12pt; border:0px; line-height:1.5; width:5%; text-align:right">:</td>
								<td class="py-0" style="font-size:12pt; border:0px; line-height:1.5">
									<a href="{{asset('/uploads/ppid_permohonan_informasi/'.$items->pi_file_penunjang)}}">
										{{$items->pi_file_penunjang}}
									</a>
								</td>
							</tr>
							<tr style="height:fit-content">
								<td class="py-0" style="font-size:12pt; border:0px; line-height:1.5; width:35%;">Status</td>
								<td class="p-0" style="font-size:12pt; border:0px; line-height:1.5; width:5%; text-align:right">:</td>
								<td class="py-0" style="font-size:12pt; border:0px; line-height:1.5">
									@if ($items->pi_status === "S")
										Dikabulkan Sebagian
									@elseif ($items->pi_status === "D")
										Dikabulkan Seluruhnya
									@elseif ($items->pi_status === "X")
										Ditolak
									@else
										Buat Baru
									@endif
								</td>
							</tr>
						</tbody>
					</table>
					
					<table class="table" style="margin-bottom:30px">
						<tbody>
							<tr style="height:fit-content">
								<td class="py-0" colspan="3" style="font-size:12pt; border:0px; line-height:1.5"><strong>C. Respon</strong></td>
							</tr>
							@if ($items->pi_status === "N")
								<tr style="height:fit-content">
									<td class="py-0" colspan="3" style="font-size:12pt; border:0px; line-height:1.5"><em>Belum ada respon dari Pengelola Informasi</em></td>
								</tr>
							@else
								<tr style="height:fit-content">
									<td class="py-0" style="font-size:12pt; border:0px; line-height:1.5; width:35%;">Tanggal dan Waktu</td>
									<td class="p-0" style="font-size:12pt; border:0px; line-height:1.5; width:5%; text-align:right">:</td>
									<td class="py-0" style="font-size:12pt; border:0px; line-height:1.5">{{ tglIndo($items->pi_tanggal_selesai) }} {{ date('H:i', strtotime($items->pi_tanggal_selesai)) }}</td>
								</tr>
								<tr style="height:fit-content">
									<td class="py-0" style="font-size:12pt; border:0px; line-height:1.5; width:35%;">Catatan</br><em>(yang dibuat pengelola informasi)</em></td>
									<td class="p-0" style="font-size:12pt; border:0px; line-height:1.5; width:5%; text-align:right">:</td>
									<td class="py-0" style="font-size:12pt; border:0px; line-height:1.5">{{$items->pi_catatan_respon}}</td>
								</tr>
								<tr style="height:fit-content">
									<td class="py-0" style="font-size:12pt; border:0px; line-height:1.5; width:35%;">File Yang Diberikan</td>
									<td class="p-0" style="font-size:12pt; border:0px; line-height:1.5; width:5%; text-align:right">:</td>
									<td class="py-0" style="font-size:12pt; border:0px; line-height:1.5">
										<a href="{{asset('/uploads/ppid_permohonan_informasi/'.$items->pi_file_respon)}}">
											{{$items->pi_file_respon}}
										</a>
									</td>
								</tr>
							@endif
						</tbody>
					</table>
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
		background-color: #049372 !important;
		-webkit-animation-name: pulse;
		animation-name: pulse;
		-webkit-animation-duration: 1s;
		animation-duration: 1s;
		-webkit-animation-fill-mode: both;
		animation-fill-mode: both;
	}
</style>

</html>

