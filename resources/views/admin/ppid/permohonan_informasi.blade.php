@extends('template.default')
@section('css')
      <link rel="stylesheet" href="{{asset('bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css')}}">
        <style>
			p {
				margin-bottom: 0px;
			}
			#td_pi {
				font-size:12pt; 
				border:0px; 
				line-height:1;
				padding-top: 0px;
			}
        </style>
@endsection
@section('content')
    <div class="box">
		<div class="box-header">
		    <h3 class="box-title">Data Permohonan Informasi</h3>
			</br>
		    <p class="box-title" style="font-size:12pt"><em>Penambahan Data Permohonan Informasi melalui website PPID</em></p>
		</div>
		
		<div class="box-header">
			<!--<a href="#" class="btn btn-primary" style="margin-bottom: 15px;"><i class="fa fa-plus"></i>Tambah Data</a>  -->
			@if ($message = Session::get('success'))
				<div class="alert alert-success alert-block">
					<button type="button" class="close" data-dismiss="alert"><i class="fa fa-times"></i></button>
					<strong>{{ $message }}</strong>
				</div>
				<br>
			@endif

			@if (count($errors) > 0)
			<div class="alert alert-danger">
				<strong>Opps!</strong> There were something went wrong with your input.
				<ul>
				    @foreach ($errors->all() as $error)
						<li>{{ $error }}</li>
				    @endforeach
				</ul>
			</div>
			<br>
			@endif
		</div>
		<!-- /.box-header -->
		<div class="box-body">
			<table id="example1" class="table table-bordered table-striped">
				<thead>
					<tr>
						<th>No</th>
						<th>PI</th>
						<th>Informasi Diminta</th>
						<th>Tanggal Buat</th>
						<th>Tanggal Selesai</th>
						<th>Status</th>
						<th>File Penunjang</th>
						<th>File Respon</th>
						<th>Aksi</th>
						<th></th>
						<th></th>
					</tr>
				</thead>
				@php
					if (Request::get('page') && Request::get('page') > 1) {
						$iterate = Request::get('page') - 1;
						$no = ($perPage * $iterate) +1;
					} else {
						$no = 1;
					}
				@endphp
				<tbody>
					@foreach ($items as $item)
						<tr>
							<td>{{ $no++ }}</td>
							<td>{{ $item->pi_no }}</td>
							<td>{{ mb_substr(strip_tags($item->pi_informasi) ,0, 100) }}...</td>
							<td>{{ $item->pi_tanggal_buat }}</td>
							<td>{{ $item->pi_tanggal_selesai }}</td>
							<td>
								@if ($item->pi_status === "S")
									Dikabulkan Sebagian
								@elseif ($item->pi_status === "D")
									Dikabulkan Seluruhnya
								@elseif ($item->pi_status === "X")
									Ditolak
								@else
									Buat Baru
								@endif
							</td>
							<td>
							    <a href="{{asset('../ppid/public/uploads/ppid_permohonan_informasi/'.$item->pi_file_penunjang)}}">
									@if ($item->pi_file_penunjang !== null && $item->pi_file_penunjang !== "")
										Unduh
									@endif
								</a>
							</td>
							<td>
							    <a href="{{asset('../ppid/public/uploads/ppid_permohonan_informasi/'.$item->pi_file_respon)}}">
									@if ($item->pi_file_respon !== null && $item->pi_file_respon !== "")
										Unduh
									@endif
								</a>
							</td>
							<td>
							    <a href="{!! route('admin.ppid.permohonan_informasi_edit', $item->id) !!}"><button class="btn btn-success"><i class="fa fa-edit"></i></button></a>
							</td>
							<td>
							    <form action="{{ route('admin.ppid.permohonan_informasi_destroy', $item->id) }}" method="GET" style="display:inline-block;">
									<button title="Delete" class="btn btn-danger js-submit-confirm" type="submit"><i class="fa fa-trash-o"></i></button>
								</form>
							</td>
							<td>
								<button title="show" id="show-item" class="btn btn-info js-submit-confirm" onclick="javascript:load_data('{{ $item->pi_no }}')"data-toggle="modal" data-target="#modal-default"><i class="fa fa-eye"></i></button>
							</td>
						</tr>
					@endforeach 
				</tbody> 
			</table>
		  <div class="pagination-wrapper"> {!! $items->appends(['search' => Request::get('search')])->render() !!} </div>
		</div>
		<!-- /.box-body -->
	</div>
	<!-- /.box -->

    <!-- modal view detail -->    
	<div class="modal fade" id="modal-default">
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
@endsection

@section('js')
<script src="{{asset('bower_components/datatables.net/js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js')}}"></script>
<script>
  $(function () {
    $('#example1').DataTable({
      'paging'      : false,
      'lengthChange': true,
      'searching'   : true,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : true
    })
  })

  function load_data(pi_no){
    var url_php = '{{ route('admin.ppid.permohonan_informasi_show', 'pi_no') }}';
    var res = url_php.split('pi_no');
      
    $.ajax({
      url:res[0]+pi_no+res[1],
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
        }
    })
  }
</script>
@endsection
