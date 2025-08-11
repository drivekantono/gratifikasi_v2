@extends('template.default')

@section('css')

<link rel="stylesheet" href="{{ asset('bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css') }}">
<style>
    /*support google chrome*/
    .radio_lainnya::-webkit-input-placeholder{
        color: red;
    }
    
    /*support mozilla*/
    .radio_lainnya:-moz-input-placeholder{
        color: red;
    }
    
    /*support internet explorer*/
    .radio_lainnya:-ms-input-placeholder{
        color: red;
    }
</style>
@endsection

@section('content')
<section class="content">
    <div class="row">
        <!-- left column -->
        <div class="col-md-12">
            <!-- general form elements -->
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title"><strong>Update Data Pelaporan Gratifikasi | {{ $items->pgd_no }}</strong></h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <form id="formGratifikasi" name="formGratifikasi" role="form" action="{{ route('admin.pelaporan_gratifikasi_data.update', $items->id) }}" method="POST" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="box-body">
                        @if (count($errors) > 0)
                            <div class="alert alert-danger">
                                <button type="button" class="close" data-dismiss="alert">×</button>
                                <strong>Opps!</strong> There were something went wrong with your input.
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <fieldset>
                            <div class="row col-md-6">
                                <div class="col-md-4">
                                    <strong>Tanggal Pelaporan</strong>
                                </div>
                                <div class="form-group col-md-8">
                                    <div class="input-group date">
                                        <div class="input-group-addon">
                                            <i class="fa fa-calendar"></i>
                                        </div>
                                        <input type="text" class="form-control pull-right" id="pgd_tanggal_lapor" name="pgd_tanggal_lapor" value="{{ old('pgd_tanggal_lapor') ? old('pgd_tanggal_lapor') : $items->pgd_tanggal_lapor }}" autocomplete="off" readonly style="background-color: white;"> 
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <strong>Jenis Laporan</strong>
                                </div>
                                <div class="form-group col-md-8">
                                    <select id="pgd_jenis_laporan" name="pgd_jenis_laporan" class="form-control">
                                        <option value="Penerimaan" {{ (old('pgd_jenis_laporan') === 'Penerimaan') ? 'selected' : '' }}>Penerimaan</option>
                                        <option value="Penolakan" {{ (old('pgd_jenis_laporan') === 'Penolakan') ? 'selected' : '' }}>Penolakan</option>
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <strong>Kerahasiaan Laporan</strong>
                                </div>
                                <div class="form-group col-md-8">
                                    <select id="pgd_pelapor_rahasia" name="pgd_pelapor_rahasia" class="form-control">
                                        <option value="Y" {{ (old('pgd_pelapor_rahasia') === 'Y') ? 'selected' : '' }}>Ya</option>
                                        <option value="T" {{ (old('pgd_pelapor_rahasia') === 'T') ? 'selected' : '' }}>Tidak</option>
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <strong>Permohonan Kompensasi</strong>
                                </div>
                                <div class="form-group col-md-8">
                                    <select id="pgd_kompensasi" name="pgd_kompensasi" class="form-control">
                                        <option value="Y" {{ (old('pgd_kompensasi') === 'Y') ? 'selected' : '' }}>Ya</option>
                                        <option value="T" {{ (old('pgd_kompensasi') === 'T') ? 'selected' : '' }}>Tidak</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row col-md-6">
                                <div class="col-md-4">
                                    <strong>Verifikasi</strong>
                                </div>
                                <div class="form-group col-md-8">
                                    <select id="pgd_verifikasi" name="pgd_verifikasi" class="form-control">
                                        <option value=""></option> 
                                        <option value="Lengkap" {{ (old('pgd_verifikasi') === 'Lengkap' || $items->pgd_verifikasi === 'Lengkap') ? 'selected' : '' }}>Lengkap</option>
                                        <option value="Belum Lengkap" {{ (old('pgd_verifikasi') === 'Belum Lengkap' || $items->pgd_verifikasi === 'Belum Lengkap') ? 'selected' : '' }}>Belum Lengkap</option>
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <strong>Catatan UPG</strong>
                                </div>
                                <div class="form-group col-md-8">
                                    <textarea class="form-control" rows="6" name="pgd_catatan_upg" id="pgd_catatan_upg">{{ old('pgd_catatan_upg') ? old('pgd_catatan_upg') : $items->pgd_catatan_upg }}</textarea>
                                </div>
                            </div>
                        </fieldset>

                        <fieldset>
                            <legend><h4>Identitas Pelapor Gratifikasi</h4></legend>
                            <div class="row col-md-6">
                                <div class="col-md-4">
                                    <strong>NIK</strong>
                                </div>
                                <div class="form-group col-md-8 autocomplete">
                                    <input type="text" class="form-control" name="pgd_pelapor_nik" id="pgd_pelapor_nik" value="{{ old('pgd_pelapor_nik') ? old('pgd_pelapor_nik') : $items->pgd_pelapor_nik }}">
                                </div>
                                <div class="col-md-4">
                                    <strong>Nama Lengkap</strong>
                                </div>
                                <div class="form-group col-md-8 autocomplete">
                                    <input type="text" class="form-control" name="pgd_pelapor_nama" id="pgd_pelapor_nama" value="{{ old('pgd_pelapor_nama') ? old('pgd_pelapor_nama') : $items->pgd_pelapor_nama }}">
                                </div>
                                <div class="col-md-4">
                                    <strong>Tempat dan Tanggal Lahir</strong>
                                </div>
                                <div class="form-group col-md-4 autocomplete">
                                    <input type="text" class="form-control" name="pgd_pelapor_tempat_lahir" id="pgd_pelapor_tempat_lahir" value="{{ old('pgd_pelapor_tempat_lahir') ? old('pgd_pelapor_tempat_lahir') : $items->pgd_pelapor_tempat_lahir }}">
                                </div>
                                <div class="form-group col-md-4">
                                    <div class="input-group date">
                                        <div class="input-group-addon">
                                            <i class="fa fa-calendar"></i>
                                        </div>
                                        <input type="text" class="form-control pull-right" id="pgd_pelapor_tanggal_lahir" name="pgd_pelapor_tanggal_lahir" value="{{ old('pgd_pelapor_tanggal_lahir') ? old('pgd_pelapor_tanggal_lahir') : $items->pgd_pelapor_tanggal_lahir }}" autocomplete="off" readonly style="background-color: white;"> 
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <strong>Alamat Rumah</strong>
                                </div>
                                <div class="form-group col-md-8 autocomplete">
                                    <input type="text" class="form-control" name="pgd_pelapor_alamat_rumah" id="pgd_pelapor_alamat_rumah" value="{{ old('pgd_pelapor_alamat_rumah') ? old('pgd_pelapor_alamat_rumah') : $items->pgd_pelapor_alamat_rumah }}">
                                </div>
                            </div>
                            <div class="row col-md-6">
                                <div class="col-md-4">
                                    <strong>No Telepon</strong>
                                </div>
                                <div class="form-group col-md-8 autocomplete">
                                    <input type="text" class="form-control" name="pgd_pelapor_telepon" id="pgd_pelapor_telepon" value="{{ old('pgd_pelapor_telepon') ? old('pgd_pelapor_telepon') : $items->pgd_pelapor_telepon }}">
                                </div>
                                <div class="col-md-4">
                                    <strong>Email</strong>
                                </div>
                                <div class="form-group col-md-8 autocomplete">
                                    <input type="text" class="form-control" name="pgd_pelapor_email" id="pgd_pelapor_email" value="{{ old('pgd_pelapor_email') ? old('pgd_pelapor_email') : $items->pgd_pelapor_email }}">
                                </div>
                                <div class="col-md-4">
                                    <strong>Jabatan</strong>
                                </div>
                                <div class="form-group col-md-8 autocomplete">
                                    <input type="text" class="form-control" name="pgd_pelapor_jabatan" id="pgd_pelapor_jabatan" value="{{ old('pgd_pelapor_jabatan') ? old('pgd_pelapor_jabatan') : $items->pgd_pelapor_jabatan }}">
                                </div>
                                <div class="col-md-4">
                                    <strong>Instansi</strong>
                                </div>
                                <div class="form-group col-md-8 autocomplete">
                                    <input type="text" class="form-control" name="pgd_pelapor_instansi" id="pgd_pelapor_instansi" value="{{ old('pgd_pelapor_instansi') ? old('pgd_pelapor_instansi') : $items->pgd_pelapor_instansi }}">
                                </div>
                            </div>
                        </fieldset>

                        <fieldset>
                            <legend><h4>Data Pemberi Gratifikasi</h4></legend>
                            <div class="row col-md-6">
                                <div class="col-md-4">
                                    <strong>Nama Lengkap</strong>
                                </div>
                                <div class="form-group col-md-8 autocomplete">
                                    <input type="text" class="form-control" name="pgd_pemberi_nama" id="pgd_pemberi_nama" value="{{ old('pgd_pemberi_nama') ? old('pgd_pemberi_nama') : $items->pgd_pemberi_nama }}">
                                </div>
                                <div class="col-md-4">
                                    <strong>Instansi</strong>
                                </div>
                                <div class="form-group col-md-8 autocomplete">
                                    <input type="text" class="form-control" name="pgd_pemberi_instansi" id="pgd_pemberi_instansi" value="{{ old('pgd_pemberi_instansi') ? old('pgd_pemberi_instansi') : $items->pgd_pemberi_instansi }}">
                                </div>
                                <div class="col-md-4">
                                    <strong>Alamat</strong>
                                </div>
                                <div class="form-group col-md-8 autocomplete">
                                    <input type="text" class="form-control" name="pgd_pemberi_alamat" id="pgd_pemberi_alamat" value="{{ old('pgd_pemberi_alamat') ? old('pgd_pemberi_alamat') : $items->pgd_pemberi_alamat }}">
                                </div>
                                <div class="col-md-4">
                                    <strong>Alasan</strong>
                                </div>
                                <div class="form-group col-md-8 autocomplete">
                                    <input type="text" class="form-control" name="pgd_alasan" id="pgd_alasan" value="{{ old('pgd_alasan') ? old('pgd_alasan') : $items->pgd_alasan }}">
                                </div>
                            </div>
                            <div class="row col-md-6">
                                <div class="col-md-4">
                                    <strong>Hubungan Dengan Pelapor</strong></br>
                                    <label><em style="font-size: 8pt">(bisa tuliskan langsung pada box atau pilih dari pilihan yang tersedia)</em></label>
                                </div>
                                <div class="form-group col-md-8 autocomplete">
                                    <input type="text" class="form-control radio_lainnya" name="pgd_pemberi_hubungan_lainnya_input" id="pgd_pemberi_hubungan_lainnya_input" 
                                           value="{{ old('pgd_pemberi_hubungan_lainnya_input') ? old('pgd_pemberi_hubungan_lainnya_input') : $items->pgd_pemberi_hubungan }}"
                                           placeholder="Tidak boleh kosong dan wajib diisi jika memilih lainnya">
                                </div>
                                <div class="form-group col-md-8">
                                    <table>
                                        <tbody>
                                        @foreach ($items_data_hubungan as $item_data_hubungan)
                                            <tr>
                                                <td valign=top style="padding-right: 15px;"><input type="radio" onclick="javascript:pgd_pemberi_hubungan_check();" 
                                                    id="pgd_pemberi_hubungan_{{ $item_data_hubungan->id }}" name="pgd_pemberi_hubungan" 
                                                    value="{{ $item_data_hubungan->pgl_nilai }}"></td>
                                                <td>{{ $item_data_hubungan->pgl_nilai }}</td>
                                            </tr>
                                        @endforeach
                                        <tr>
                                            <td valign=top style="padding-right: 15px;"><input type="radio" onclick="javascript:pgd_pemberi_hubungan_check();" 
                                                id="pgd_pemberi_hubungan_lainnya" name="pgd_pemberi_hubungan" value="Lainnya"></td>
                                            <td>Lainnya</td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </fieldset>

                        <fieldset>
                            <legend><h4>Data Penerimaan / Penolakan Gratifikasi</h4></legend>
                            <div class="row col-md-6">
                                <div class="col-md-4">
                                    <strong>Peristiwa Terkait Gratifikasi</strong></br>
                                    <label><em style="font-size: 8pt">(bisa tuliskan langsung pada box atau pilih dari pilihan yang tersedia)</em></label>
                                </div>
                                <div class="form-group col-md-8 autocomplete">
                                    <input type="text" class="form-control radio_lainnya" name="pgd_peristiwa_lainnya_input" id="pgd_peristiwa_lainnya_input" 
                                           value="{{ old('pgd_peristiwa_lainnya_input') ? old('pgd_peristiwa_lainnya_input') : $items->pgd_peristiwa }}"
                                           placeholder="Tidak boleh kosong dan wajib diisi jika memilih lainnya">
                                </div>
                                <div class="form-group col-md-8">
                                    <table>
                                        <tbody>
                                        @foreach ($items_data_peristiwa as $item_data_peristiwa)
                                            <tr>
                                                <td valign=top style="padding-right: 15px;"><input type="radio" onclick="javascript:pgd_peristiwa_check();" 
                                                    id="pgd_peristiwa_{{ $item_data_peristiwa->id }}" name="pgd_peristiwa" 
                                                    value="{{ $item_data_peristiwa->pgl_nilai }}" {{ ($item_data_peristiwa->pgl_nilai === $items->pgd_peristiwa) ? 'checked' : '' }}></td>
                                                <td>{{ $item_data_peristiwa->pgl_nilai }}</td>
                                            </tr>
                                        @endforeach
                                        <tr>
                                            <td valign=top style="padding-right: 15px;"><input type="radio" onclick="javascript:pgd_peristiwa_check();" 
                                                id="pgd_peristiwa_lainnya" name="pgd_peristiwa" value="Lainnya"></td>
                                            <td>Lainnya</td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="row col-md-6">
                                <div class="col-md-4">
                                    <strong>Lokasi Objek Gratifikasi</strong></br>
                                    <label><em style="font-size: 8pt">(bisa tuliskan langsung pada box atau pilih dari pilihan yang tersedia)</em></label>
                                </div>
                                <div class="form-group col-md-8 autocomplete">
                                    <input type="text" class="form-control radio_lainnya" name="pgd_lokasi_objek_lainnya_input" id="pgd_lokasi_objek_lainnya_input" 
                                           value="{{ old('pgd_lokasi_objek_lainnya_input') ? old('pgd_lokasi_objek_lainnya_input') : $items->pgd_lokasi_objek }}"
                                           placeholder="Tidak boleh kosong dan wajib diisi jika memilih lainnya">
                                </div>
                                <div class="form-group col-md-8">
                                    <table>
                                        <tbody>
                                        @foreach ($items_data_lokasi_objek as $item_data_lokasi_objek)
                                            <tr>
                                                <td valign=top style="padding-right: 15px;"><input type="radio" onclick="javascript:pgd_lokasi_objek_check();" 
                                                    id="pgd_lokasi_objek_{{ $item_data_lokasi_objek->id }}" name="pgd_lokasi_objek" 
                                                    value="{{ $item_data_lokasi_objek->pgl_nilai }}" {{ ($item_data_lokasi_objek->pgl_nilai === $items->pgd_lokasi_objek) ? 'checked' : '' }}></td>
                                                <td>{{ $item_data_lokasi_objek->pgl_nilai }}</td>
                                            </tr>
                                        @endforeach
                                        <tr>
                                            <td valign=top style="padding-right: 15px;"><input type="radio" onclick="javascript:pgd_lokasi_objek_check();" id="pgd_lokasi_objek_lainnya" name="pgd_lokasi_objek" value="Lainnya" {{ ($items->pgd_lokasi_objek === 'Lainnya') ? 'checked' : '' }}></td>
                                            <td>Lainnya</td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="row col-md-6">
                                <div class="col-md-4">
                                    <strong>Jenis Objek Gratifikasi</strong></br>
                                    <label><em style="font-size: 8pt">(bisa tuliskan langsung pada box atau pilih dari pilihan yang tersedia)</em></label>
                                </div>
                                <div class="form-group col-md-8 autocomplete">
                                    <input type="text" class="form-control radio_lainnya" name="pgd_jenis_objek_lainnya_input" id="pgd_jenis_objek_lainnya_input" 
                                           value="{{ old('pgd_jenis_objek_lainnya_input') ? old('pgd_jenis_objek_lainnya_input') : $items->pgd_jenis_objek }}"
                                           placeholder="Tidak boleh kosong dan wajib diisi jika memilih lainnya">
                                </div>
                                <div class="form-group col-md-8">
                                    <table>
                                        <tbody>
                                        @foreach ($items_data_jenis_objek as $item_data_jenis_objek)
                                            <tr>
                                                <td valign=top style="padding-right: 15px;"><input type="radio" onclick="javascript:pgd_jenis_objek_check();" 
                                                    id="pgd_jenis_objek_{{ $item_data_jenis_objek->id }}" name="pgd_jenis_objek" 
                                                    value="{{ $item_data_jenis_objek->pgl_nilai }}" {{ ($item_data_jenis_objek->pgl_nilai === $items->pgd_jenis_objek) ? 'checked' : '' }}></td>
                                                <td>{{ $item_data_jenis_objek->pgl_nilai }}</td>
                                            </tr>
                                        @endforeach
                                        <tr>
                                            <td valign=top style="padding-right: 15px;"><input type="radio" onclick="javascript:pgd_jenis_objek_check();" id="pgd_jenis_objek_lainnya" name="pgd_jenis_objek" value="Lainnya" {{ ($items->pgd_jenis_objek === 'Lainnya') ? 'checked' : '' }}></td>
                                            <td>Lainnya</td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="row col-md-6">
                                <div class="col-md-4">
                                    <strong>Uraian Jenis Objek Gratifikasi</strong>
                                </div>
                                <div class="form-group col-md-8 autocomplete">
                                    <input type="text" class="form-control" name="pgd_uraian" id="pgd_uraian" value="{{ old('pgd_uraian') ? old('pgd_uraian') : $items->pgd_uraian }}">
                                </div>
                                <div class="col-md-4">
                                    <strong>Nominal Uang/Taksiran Nilai</strong>
                                </div>
                                <div class="form-group col-md-8 autocomplete">
                                    <input type="text" class="form-control" name="pgd_nominal" id="pgd_nominal" value="{{ old('pgd_nominal') ? old('pgd_nominal') : $items->pgd_nominal }}">
                                </div>
                            </div>
                        </fieldset>

                        <fieldset>
                            <legend><h4>Kronologi Penerimaan Gratifikasi</h4></legend>
                            <div class="row col-md-6">
                                <div class="col-md-4">
                                    <strong>Tempat dan Tanggal Penerimaan</strong>
                                </div>
                                <div class="form-group col-md-4 autocomplete">
                                    <input type="text" class="form-control" name="pgd_tempat" id="pgd_tempat" value="{{ old('pgd_tempat') ? old('pgd_tempat') : $items->pgd_tempat }}">
                                </div>
                                <div class="form-group col-md-4">
                                    <div class="input-group date">
                                        <div class="input-group-addon">
                                            <i class="fa fa-calendar"></i>
                                        </div>
                                        <input type="text" class="form-control pull-right" id="pgd_tanggal" name="pgd_tanggal" value="{{ old('pgd_tanggal') ? old('pgd_tanggal') : $items->pgd_tanggal }}" autocomplete="off" readonly style="background-color: white;"> 
                                    </div>
                                </div>
                            </div>
                            <div class="row col-md-6">
                                <div class="col-md-4">
                                    <strong>Tanggal Pelaporan ke UPG Pembantu</strong></br>
                                    <label><em style="font-size: 8pt">(jika gratifikasi dilaporkan ke UPG Pembantu, namun tidak ada tindak lanjut)</em></label>
                                </div>
                                <div class="form-group col-md-4">
                                    <div class="input-group date">
                                        <div class="input-group-addon">
                                            <i class="fa fa-calendar"></i>
                                        </div>
                                        <input type="text" class="form-control pull-right" id="pgd_tanggal_lapor_upgp" name="pgd_tanggal_lapor_upgp" value="{{ old('pgd_tanggal_lapor_upgp') ? old('pgd_tanggal_lapor_upgp') : $items->pgd_tanggal_lapor_upgp }}" autocomplete="off" readonly style="background-color: white;"> 
                                    </div>
                                </div>
                            </div>
                            <div class="row col-md-6">
                                <div class="col-md-4">
                                    <strong>Kronologi</strong>
                                </div>
                                <div class="form-group col-md-8">
                                    <textarea class="form-control" rows="4" name="pgd_kronologi" id="pgd_kronologi">{{ old('pgd_kronologi') ? old('pgd_kronologi') : $items->pgd_kronologi }}</textarea>
                                </div>
                            </div>
                            <div class="row col-md-6">
                                <div class="col-md-4">
                                    <strong>Catatan Tambahan</strong>
                                </div>
                                 <div class="form-group col-md-8">
                                    <textarea class="form-control" rows="4" name="pgd_catatan" id="pgd_catatan">{{ old('pgd_catatan') ? old('pgd_catatan') : $items->pgd_catatan }}</textarea>
                                </div>
                            </div>
                            <div class="row col-md-6">
                                <div class="col-md-4">
                                    <strong>Dokumen Pendukung</strong>
                                </div>
                                <div class="form-group col-md-4">
                                    <div class="input-group date">
                                        <div class="input-group-addon">
                                            @if ($items->pgd_lampiran === null || $items->pgd_lampiran === '')
                                                <i class="fa fa-file"></i>
                                            @else
                                                <a target="_blank" href="{{asset('uploads/pelaporan_gratifikasi/'.$items->pgd_lampiran)}}"><i class="fa fa-file" title="lihat file"></i></a>
                                            @endif
                                        </div>
                                        <input type="text" class="form-control" id="pgd_lampiran_old" name="pgd_lampiran_old" value="{{ $items->pgd_lampiran }}" disabled style="background-color: #e4f5ff;">
                                    </div>
                                </div>
                                <div class="form-group col-md-4 autocomplete">
                                    <input type="file" id="pgd_lampiran" name="pgd_lampiran" accept="image/* , application/pdf">
                                </div>
                            </div>
                        </fieldset>
                    </div>
                    <!-- /.box-body -->


                    <div class="box-footer">
                        <button type="submit" class="btn btn-success" title="submit perubahan data">Ubah</button>
                        <a href="{{ route('admin.pelaporan_gratifikasi_data.show', $items->id) }}" class="btn btn-warning" title="kembali">Batal</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection

@section('js')
<script src="{{ asset('bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js') }}"></script>
<script src="{{ asset('bower_components/ckeditor/ckeditor.js') }}"></script>
<script src="//cdn.ckeditor.com/4.6.2/standard/ckeditor.js"></script>
<script>
    var options = {
            filebrowserImageBrowseUrl: '/laravel-filemanager?type=Images',
            filebrowserImageUploadUrl: '/laravel-filemanager/upload?type=Images&_token=',
            filebrowserBrowseUrl: '/laravel-filemanager?type=Files',
            filebrowserUploadUrl: '/laravel-filemanager/upload?type=Files&_token='
        };

    $(function() {
        $('#pgd_tanggal_lapor').datepicker({
            autoclose: true,
            format: 'yyyy-mm-dd',
        })
        $('#pgd_tanggal_lapor_upgp').datepicker({
            autoclose: true,
            format: 'yyyy-mm-dd',
        })
        $('#pgd_pelapor_tanggal_lahir').datepicker({
            autoclose: true,
            format: 'yyyy-mm-dd',
        })
        $('#pgd_tanggal').datepicker({
            autoclose: true,
            format: 'yyyy-mm-dd',
        })
        $('#pgd_penyaluran_tanggal').datepicker({
            autoclose: true,
            format: 'yyyy-mm-dd',
        })
    })

    function pgd_pemberi_hubungan_check() {
        if (document.getElementById('pgd_pemberi_hubungan_lainnya').checked) {
            document.getElementById('pgd_pemberi_hubungan_lainnya_input').value = "";
        } else {
            document.getElementById('pgd_pemberi_hubungan_lainnya_input').value = document.forms.formGratifikasi.pgd_pemberi_hubungan.value;
        }
    }

    function pgd_peristiwa_check() {
        if (document.getElementById('pgd_peristiwa_lainnya').checked) {
            document.getElementById('pgd_peristiwa_lainnya_input').value = "";
        } else {
            document.getElementById('pgd_peristiwa_lainnya_input').value = document.forms.formGratifikasi.pgd_peristiwa.value;
        }
    }

    function pgd_lokasi_objek_check() {
        if (document.getElementById('pgd_lokasi_objek_lainnya').checked) {
            document.getElementById('pgd_lokasi_objek_lainnya_input').value = "";
        } else {
            document.getElementById('pgd_lokasi_objek_lainnya_input').value = document.forms.formGratifikasi.pgd_lokasi_objek.value;
        }
    }

    function pgd_jenis_objek_check() {
        if (document.getElementById('pgd_jenis_objek_lainnya').checked) {
            document.getElementById('pgd_jenis_objek_lainnya_input').value = "";
        } else {
            document.getElementById('pgd_jenis_objek_lainnya_input').value = document.forms.formGratifikasi.pgd_jenis_objek.value;
        }
    }
</script>

@endsection