
@extends('template.default')

@section('css')
<link rel="stylesheet" href="{{ asset('bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css') }}">
<style>
	legend {
		font-size:12pt; 
		margin-bottom:10px;
	}
	.flexContainer {
		display: flex;
	}

	.inputField {
		flex: 1;
	}
</style>
@endsection

<?php date_default_timezone_set("Asia/Jakarta") ?>

@section('content')
    <section class="content">
    <div class="row">
        <!-- left column -->
        <div class="col-md-12">
            <!-- general form elements -->
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Respon Permohonan Informasi {{ $items->pi_no }}</h3>
                </div>
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
                <!-- /.box-header -->
                <!-- form start -->
                <form role="form" action="{{ route('admin.ppid.permohonan_informasi_update', $items->id) }}" method="POST" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="box-body">
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
						<fieldset>
							<legend>Biodata Permohon Informasi</legend>
							<div class="form-group col-md-6">
								<label for="user_nama">Nama</label>
								<input type="text" class="form-control" readonly id="user_nama" name="user_nama" value=" {{ old('user_nama') ? old('user_nama') : $items->user_nama }}">
							</div>
							<div class="form-group col-md-6">
								<label for="user_nik">NIK</label>
								<input type="text" class="form-control" readonly id="user_nik" name="user_nik" value=" {{ old('user_nik') ? old('user_nik') : $items->user_nik }}">
							</div>
							<div class="form-group col-md-6">
								<label for="user_email">Email</label>
								<input type="text" class="form-control" readonly id="user_email" name="user_email" value=" {{ old('user_email') ? old('user_email') : $items->user_email }}">
							</div>
							<div class="form-group col-md-6">
								<label for="user_telp">No. Telp</label>
								<input type="text" class="form-control" readonly id="user_telp" name="user_telp" value=" {{ old('user_telp') ? old('user_telp') : $items->user_telp }}">
							</div>
							<div class="form-group col-md-12">
								<label for="user_alamat">Alamat</label>
								<textarea type="text" class="form-control" readonly id="user_alamat" name="user_alamat" rows="3">Alamat {{ $items->user_jenis_alamat }} - {{ $items->user_alamat }}</textarea>
							</div>
						</fieldset>
						
						<fieldset>
							<legend>Permohonan Informasi</legend>
							<div class="form-group col-md-6">
								<label for="pi_no">Nomor Permohonan</label>
								<input type="text" class="form-control" readonly id="pi_no" name="pi_no" value=" {{ old('pi_no') ? old('pi_no') : $items->pi_no }}">
							</div>
							<div class="form-group col-md-6">
								<label for="pi_tanggal_buat">Tanggal dan Waktu</label>
								<input type="text" class="form-control" readonly id="pi_tanggal_buat" name="pi_tanggal_buat" value=" {{ old('pi_tanggal_buat') ? old('pi_tanggal_buat') : $items->pi_tanggal_buat }}">
							</div>
							<div class="form-group col-md-6">
								<label for="pi_jenis">Jenis Permohonan</label>
								<input type="text" class="form-control" readonly id="pi_jenis" name="pi_jenis" value=" {{ old('pi_jenis') ? old('pi_jenis') : $items->pi_jenis }}">
							</div>
							<div class="form-group col-md-6">
								<label for="pi_peruntukan">Bertindak Atas Nama</label>
								<input type="text" class="form-control" readonly id="pi_peruntukan" name="pi_peruntukan" value=" {{ old('pi_peruntukan') ? old('pi_peruntukan') : $items->pi_peruntukan }}">
							</div>
							<div class="form-group col-md-6">
								<label for="pi_tujuan">Tujuan Permohonan</label>
								<input type="text" class="form-control" readonly id="pi_tujuan" name="pi_tujuan" value=" {{ old('pi_tujuan') ? old('pi_tujuan') : $items->pi_tujuan }}">
							</div>
							<div class="form-group col-md-6">
								<label for="pi_peroleh_cara">Cara dan Bentuk Memperoleh Informasi</label>
								<input type="text" class="form-control" readonly id="pi_peroleh_cara" name="pi_peroleh_cara" value=" {{ $items->pi_peroleh_cara }} - {{ $items->pi_peroleh_bentuk }} ">
							</div>
							<div class="form-group col-md-12">
								<label for="pi_informasi">Informasi Yang Dibutuhkan</label>
								<textarea type="text" class="form-control" readonly id="pi_informasi" name="pi_informasi" rows="5">{{ old('pi_informasi') ? old('pi_informasi') : $items->pi_informasi }}</textarea>
							</div>
							<div class="form-group col-md-12">
								<label for="pi_catatan_buat">Catatan Tambahan</label>
								<textarea type="text" class="form-control" readonly id="pi_catatan_buat" name="pi_catatan_buat" rows="5">{{ old('pi_catatan_buat') ? old('pi_catatan_buat') : $items->pi_catatan_buat }}</textarea>
							</div>
							<div class="form-group col-md-6">
								<label for="pi_status">Status</label>
								<input type="text" class="form-control" readonly id="pi_status" name="pi_status" value=" {{ old('pi_status') ? old('pi_status') : $items->pi_status }}">
							</div>
							<div class="form-group col-md-6">
								<label for="pi_file_penunjang">File Penunjang</label>&nbsp<a href="{{asset('../ppid/public/uploads/ppid_permohonan_informasi/'.$items->pi_file_penunjang)}}">[Unduh]</a>
								<input type="text" class="form-control" readonly id="pi_file_penunjang" name="pi_file_penunjang" value=" {{ old('pi_file_penunjang') ? old('pi_file_penunjang') : $items->pi_file_penunjang }}">
							</div>
						</fieldset>	

						<fieldset>
							<legend>Respon</legend>
							<div class="form-group col-md-6">
								<label for="pi_tanggal_selesai">Tanggal Respon</label>
								<input type="text" class="form-control" readonly id="pi_tanggal_selesai" name="pi_tanggal_selesai" value="{{ date('Y-m-d H:i:s') }}">
							</div>
							<div class="form-group col-md-12">
								<label for="pi_catatan_respon">Catatan Tambahan</label>
								<textarea type="text" class="form-control" id="pi_catatan_respon" name="pi_catatan_respon" rows="5">{{ old('pi_catatan_respon') ? old('pi_catatan_respon') : $items->pi_catatan_respon }}</textarea>
							</div>
							<div class="form-group col-md-12">
								<label for="pi_file_respon">File Yang Diberikan</label>&nbsp<a href="{{asset('../ppid/public/uploads/ppid_permohonan_informasi/'.$items->pi_file_respon)}}">[Unduh]</a>
								<input type="text" class="form-control" readonly id="pi_file_respon_old" name="pi_file_respon_old" value=" {{ old('pi_file_respon') ? old('pi_file_respon') : $items->pi_file_respon }}">
							</div>
							<div class="form-group col-md-12">
								<label for="pi_file_respon" style="color:red">Ganti File Yang Diberikan</label>
								<input type="file" id="pi_file_respon" name="pi_file_respon">
							</div>
							<div class="form-group col-md-12">
								<tr>
									<td><label for="pi_status">Status</label></td>
									<td>:</td>
									<td>
										<select name="pi_status" class="form-control">
											@if ($items->pi_status === "S")
												<option value=""></option>
												<option value="S" selected="selected">S = Dikabulkan Sebagian</option>
												<option value="D">D = Dikabulkan Seluruhnya</option>
												<option value="X">X = Ditolak</option>
											@elseif ($items->pi_status === "D")
												<option value=""></option>
												<option value="S">S = Dikabulkan Sebagian</option>
												<option value="D" selected="selected">D = Dikabulkan Seluruhnya</option>
												<option value="X">X = Ditolak</option>
											@elseif ($items->pi_status === "X")
												<option value=""></option>
												<option value="S">S = Dikabulkan Sebagian</option>
												<option value="D">D = Dikabulkan Seluruhnya</option>
												<option value="X" selected="selected">X = Ditolak</option>
											@else
												<option value="" selected="selected"></option>
												<option value="S">S = Dikabulkan Sebagian</option>
												<option value="D">D = Dikabulkan Seluruhnya</option>
												<option value="X">X = Ditolak</option>
											@endif
										</select>
									</td>
								</tr>
							</div>
						</fieldset>
                    </div>
                    <!-- /.box-body -->


                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary">Update</button>
                        <a href="{{ route('admin.ppid.permohonan_informasi') }}" class="btn btn-success">Cancel</a>

                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection

@section('js')
<script src="{{ asset('bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js') }}"></script>
//<script src="{{ asset('bower_components/ckeditor/ckeditor.js') }}"></script>
<script src="//cdn.ckeditor.com/4.6.2/standard/ckeditor.js"></script>
<script>
    var options = {
            filebrowserImageBrowseUrl: '/laravel-filemanager?type=Images',
            filebrowserImageUploadUrl: '/laravel-filemanager/upload?type=Images&_token=',
            filebrowserBrowseUrl: '/laravel-filemanager?type=Files',
            filebrowserUploadUrl: '/laravel-filemanager/upload?type=Files&_token='
        };

    $(function() {
        
        CKEDITOR.replace('deskripsi', options)
        $('#tanggal').datepicker({
            autoclose: true
        })
        $('#tanggal_selesai').datepicker({
            autoclose: true
        })
    })
	
	document.getElementById("pi_status").innerHTML = "xxx";
</script>

@endsection