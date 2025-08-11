
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
			<section id="daftar_informasi">
				<div class="container">
					<!--
					@if ($message = Session::get('success'))
						<div class="alert alert-success alert-block">
							<button type="button" class="close" data-dismiss="alert">×</button>
							<strong>{{ $message }}</strong>
						</div>
						<br>
					@endif					
					
					<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalMessage">
						View Modal
					</button>
					-->

					<!-- Modal -->
					<div class="modal fade" id="modalMessage" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
						<div class="modal-dialog" role="document">
							<div class="modal-content">
								<div class="modal-header">
									<h5 class="modal-title" id="exampleModalLabel">Pesan</h5>
									<button type="button" class="close" data-dismiss="modal" aria-label="Close">
										<span aria-hidden="true">&times;</span>
									</button>
								</div>
								<div class="modal-body" style="text-align:center; background-color:#f7f7f7">
									<img class="img-fluid" src="{{ asset('fe/images/icon/01.gif') }}" alt="">
									<label>{{ $message }}</label>
								</div>
								<div class="modal-footer">
									<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
									<a href="{{ route('user.dashboard') }}" role="button" aria-haspopup="true" aria-expanded="false">
										<button type="button" class="btn btn-primary">Dashboard</button>
									</a>
								</div>
							</div>
						</div>
					</div>										

					
					<div class="post-comments pos-r xs-px-2 xs-py-2" id="form_pi" style="border:1">
						<div class="section-title mb-3">
							<h2 class="title">Buat Permohonan Informasi</h2>
						</div>
						<form role="form" action="{{ route('ppid.layanan.permohonan_informasi.buat') }}" method="POST" enctype="multipart/form-data">
							{{ csrf_field() }}
							<div class="messages"></div>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<!--<input type="text" name="pi_no" value="">-->
										<input type="hidden" name="user_id" value={{ Auth::user()->id }}>
										<input type="hidden" name="user_nama" value={{ Auth::user()->name }}>
										<input type="hidden" name="user_email" value={{ Auth::user()->email }}>
										<input type="hidden" name="user_nik" value={{ Auth::user()->nik }}>
										<input type="hidden" name="user_telp" value={{ Auth::user()->telp }}>
										<input type="hidden" name="user_alamat" value={{ Auth::user()->alamat }}>
										<input type="hidden" name="created_by" value=[{{ Auth::user()->id }}]{{ Auth::user()->name }}>
										<input type="hidden" name="updated_by" value=[{{ Auth::user()->id }}]{{ Auth::user()->name }}>
									</div>
								</div>
							</div>
							
							<div class="card grey-bg">
								<div class="card-header">
									<b>Biodata Pemohon Informasi</b>
								</div>

								<div class="card-body">
									<div class="row">
										<div class="col-md-6">
											<div class="form-group">
												<label>Nama</label>
												<input id="form_name" type="text" name="user_nama" class="form-control" disabled="disabled" value={{ Auth::user()->name }} style="background-color:#bbb4ce;">
												<div class="help-block with-errors" ></div>
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group">
												<label>NIK</label>
												<input id="form_name" type="text" name="user_nik" class="form-control" disabled="disabled" value={{ Auth::user()->nik }} style="background-color:#bbb4ce;">
												<div class="help-block with-errors" ></div>
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group">
												<label>Email</label>
												<input id="form_name" type="text" name="user_email" class="form-control" disabled="disabled" value={{ Auth::user()->email }} style="background-color:#bbb4ce;">
												<div class="help-block with-errors" ></div>
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group">
												<label>No. Telepon</label>
												<input id="form_name" type="text" name="user_telp" class="form-control" value={{ Auth::user()->telp }}>
												<div class="help-block with-errors" ></div>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-md-4">
											<div class="form-group">
												<tr>
													<td><label>Jenis Alamat</label></td>
													<td>
														<select name="user_jenis_alamat" class="form-control">
															<option value="Rumah">Rumah</option> 
															<option value="Kantor">Kantor</option> 
														</select>
													</td>
												</tr>
											</div>
										</div>
										<div class="col-md-8">
											<div class="form-group">
												<label>Alamat</label>	
												<input id="form_name" name="user_alamat" class="form-control" placeholder="Alamat Pemohon Informasi" required="required" value={{ Auth::user()->alamat }}>
												<div class="help-block with-errors"></div>
											</div>
										</div>
									</div>
								</div>
							</div>
							
							<div class="card grey-bg mt-3">
								<div class="card-header">
									<b>Permohonan Informasi</b>
								</div>

								<div class="card-body">
									<div class="row">
										<div class="col-md-4">
											<div class="form-group">
												<tr>
													<td><label>Jenis</label></td>
													<td>
														<select name="pi_jenis" class="form-control">
															<option value="Perorangan">Perorangan</option> 
															<option value="Kelompok">Kelompok</option> 
															<option value="Lembaga">Lembaga</option> 
														</select>
													</td>
												</tr>
											</div>
										</div>
										<div class="col-md-8">
											<div class="form-group">
												<label>Bertindak Atas Nama</label>	
												<input id="form_name" name="pi_peruntukan" class="form-control" placeholder="" required="required">
												<div class="help-block with-errors"></div>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-md-12">
											<div class="form-group">
												<label>Informasi Yang Dibutuhkan</label>
												<textarea id="form_name" name="pi_informasi" class="form-control" placeholder="" rows="3" required="required"></textarea>
												<div class="help-block with-errors"></div>
											</div>
										</div>							
									</div>
									<div class="row">
										<div class="col-md-12">
											<div class="form-group">
												<label>Tujuan</label>
												<input id="form_name" name="pi_tujuan" class="form-control" placeholder="" required="required"></input>
												<div class="help-block with-errors"></div>
											</div>
										</div>							
									</div>
									<div class="row">
										<div class="col-md-6">
											<div class="form-group">
												<tr>
													<td><label>Bentuk Informasi</label></td>
													<td>
														<select name="pi_peroleh_bentuk" class="form-control">
															<option value="Tercetak">Tercetak</option> 
															<option value="Terekam">Terekam</option>  
														</select>
													</td>
												</tr>
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group">
												<tr>
													<td><label>Cara Memperoleh Informasi</label></td>
													<td>
														<select name="pi_peroleh_cara" class="form-control">
															<option value="Langsung">Langsung</option> 
															<option value="Email">Email</option> 
														</select>
													</td>
												</tr>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-md-12">
											<div class="form-group">
												<label>Catatan Tambahan</label>
												<textarea id="form_name" name="pi_catatan_buat" class="form-control" placeholder="" rows="3"></textarea>
												<div class="help-block with-errors"></div>
											</div>
										</div>							
									</div>
									<div class="row">
										<div class="col-md-12">
											<div class="form-group">
												<label>Unggah Kelengkapan (PDF)</label></br>
												<input type="file" name="pi_file_penunjang">
											</div>
										</div>								
									</div>
									<div class="row mt-5">
										<div class="col-md-2">
											<button type="submit" class="btn btn-theme"><span>Kirim</span></button>
										</div>
									</div>
								</div>
							</div>
						</form>
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

