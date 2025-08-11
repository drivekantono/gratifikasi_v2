@extends('template.default')

@section('css')

<link rel="stylesheet" href="{{ asset('bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css') }}">
<style>
    .featured-item {
      padding: 40px 20px;
      border-radius: 10px;
      position: relative;
      box-shadow: 0px 5px 10px rgba(0, 0, 0, 0.1);
      background-color: aliceblue;
    }

    .featured-item:hover {
      background: #ffffff;
    }

    .form-control {
        background-color: rgb(255, 255, 255) !important;
        border-top: 0px;
        border-left: 0px;
        border-right: 0px;
        border-bottom: 1px dashed rgba(104, 104, 105, 0.52);
        font-size: 12pt;
    }

    .box-body {
        background-color: #ffffff;
    }

    .kotak {
        box-shadow: 2px 2px 2px rgba(11, 6, 88, 0.42);
        padding: 5px 15px 5px 15px;
        border: 1px solid grey;
        border-radius: 30px;
        text-align: center;
        font-size: 9pt;
    }

    .popup_box{
        position: absolute;
        top: 120%;
        left: 50%;
        transform: translate(-50%, -50%);
        border-radius: 5px;
        width: 450px;
        background: #f2f2f2;
        text-align: center;
        align-items: center;
        padding: 40px;
        border: 1px solid #b3b3b3;
        box-shadow: 0px 5px 10px rgba(0,0,0,.2);
        z-index: 9999;
        display: none;
    }
    .popup_box i{
        font-size: 60px;
        color: #eb9447;
        border: 5px solid #eb9447;
        padding: 20px 40px;
        border-radius: 50%;
        margin: -10px 0 20px 0;
    }
    .popup_box h1{
        font-size: 30px;
        color: #1b2631;
        margin-bottom: 5px;
    }
    .popup_box label{
        font-size: 23px;
        color: #404040;
    }
    .popup_box .btns{
        margin: 40px 0 0 0;
    }
    .btns .btnYes, .btns .btnNo, .btns .btnClose{
        background: rgba(223, 22, 22, 0.73);
        color: white;
        font-size: 14px;
        border-radius: 5px;
        border: 2px solid rgb(101, 3, 3);
        padding: 10px 13px;
    }
    .btns .btnNo{
        margin-left: 20px;
        background: rgba(15, 215, 48, 0.99);
        border: 2px solid rgba(1, 111, 20, 0.99);
    }
    .btns .btnClose{
        margin-left: 20px;
        background: rgba(250, 155, 54, 0.99);
        border: 2px solid rgba(111, 61, 1, 0.99);
    }
    .btns .btnYes:hover{
        transition: .5s;
        background: rgb(120, 9, 9);
    }
    .btns .btnNo:hover{
        transition: .5s;
        background: rgba(23, 117, 39, 1);
    }
    .btns .btnClose:hover{
        transition: .5s;
        background: rgba(111, 61, 1, 0.99);
    }
</style>
@endsection

@section('content')
<section class="content">
    <div class="row">
        <!-- left column -->
        <div class="col-md-12">
            <!-- dari tabel pengaduan_masyarakat_datas -->
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title"><strong>Data Laporan Gratifikasi | {{ $items->pgd_no }}</strong></h3><br><br>
                    <!--
                    <a href="{!! route('admin.pengaduan_masyarakat_data.edit', $items->id) !!}" title="ubah data dumas">
                      <button class="btn btn-success" style="height: 30px; text-align: left; margin-bottom: 5px;"> 
                        <i class="fa fa-edit"></i>&nbsp Edit
                      </button>
                    </a>&nbsp
                    <a href="{!! route('admin.pengaduan_masyarakat_riwayat.create', $items->id) !!}" title="update progress dumas">
                        <button class="btn btn-primary" style="height: 30px; text-align: left; text-align: left; margin-bottom: 5px;">
                          <i class="fa fa-plus"></i>&nbsp Progress
                        </button>
                    </a>&nbsp
                    <form action="{{ route('admin.pengaduan_masyarakat_data.destroy', $items->id) }}" method="GET" style="display:inline-block;">
                      <button title="Delete" class="btn btn-danger js-submit-confirm" type="submit"  style="height: 30px; text-align: left; text-align: left; margin-bottom: 5px;" onclick="return confirm('Apakah Anda Yakin Menghapus Data?');" title="hapus data dumas">
                        <i class="fa fa-trash-o"></i>&nbsp Delete
                      </button>
                    </form>&nbsp
                    <a href="{!! route('admin.pengaduan_masyarakat_data.index') !!}" title="kembali">
                        <button class="btn btn-warning" style="height: 30px; text-align: left; text-align: left; margin-bottom: 5px;">
                          <i class="fa fa-arrow-left"></i>&nbsp Back
                        </button>
                    </a>
                    -->
                    <a href="{!! route('admin.pelaporan_gratifikasi_data.edit', $items->id) !!}" title="Ubah data gratifikasi">
                      <button class="btn btn-warning" style="height: 30px; text-align: left; margin-bottom: 5px;"> 
                        <i class="fa fa-edit"></i>&nbsp Ubah
                      </button>
                    </a>&nbsp
                    <a href="{!! route('admin.pelaporan_gratifikasi_data.verifikasi', $items->id) !!}" title="verifikasi pelaporan">
                      <button class="btn btn-primary" style="height: 30px; text-align: left; margin-bottom: 5px;"> 
                        <i class="fa fa-edit"></i>&nbsp Verifikasi
                      </button>
                    </a>&nbsp
                    <!--
                    <a href="#" title="verifikasi pelaporan">
                        <button class="btn btn-primary click" style="height: 30px; text-align: left; text-align: left; margin-bottom: 5px;">
                          <i class="fa fa-check"></i>&nbsp Verifikasi
                        </button>
                    </a>&nbsp
                    <a href="{!! route('admin.pelaporan_gratifikasi_data.sendEmail', $items->id) !!}" title="Kirim hasil verifikasi ke email ybs">
                      <button class="btn btn-warning" style="height: 30px; text-align: left; margin-bottom: 5px;"> 
                        <i class="fa fa-send"></i>&nbsp Kirim
                      </button>
                    </a>&nbsp
                    @if ($items->pgd_verifikasi !== 'Y' && $items->pgd_verifikasi !== 'T')
                        <button disabled title="Laporan yang belum diverifikasi tidak bisa dikirim" class="btn btn-warning js-submit-confirm" 
                                type="submit" style="height: 30px; text-align: left; text-align: left; margin-bottom: 5px;">
                                <i class="fa fa-send"></i>&nbsp Kirim
                        </button>&nbsp
                    @else
                        <form action="{{ route('admin.pelaporan_gratifikasi_data.sendEmail', $items->id) }}" method="GET" style="display:inline-block;">
                            <button title="Kirim hasil verifikasi ke email ybs" class="btn btn-warning js-submit-confirm" 
                                    type="submit" style="height: 30px; text-align: left; text-align: left; margin-bottom: 5px;" 
                                    onclick="return confirm('Apakah Anda yakin mengirim hasil verifikasi ke email Ybs?');">
                                    <i class="fa fa-send"></i>&nbsp Kirim
                            </button>
                        </form>&nbsp
                    @endif
                    -->
                    <a href="{!! route('admin.pelaporan_gratifikasi_data.kirim', $items->id) !!}" title="kirim pesan ke pelapor">
                      <button class="btn btn-success" style="height: 30px; text-align: left; margin-bottom: 5px;"> 
                        <i class="fa fa-whatsapp"></i>&nbsp Kirim
                      </button>
                    </a>&nbsp
                    <form action="{{ route('admin.pelaporan_gratifikasi_data.destroy', $items->id) }}" method="GET" style="display:inline-block;">
                      <button title="Hapus data pelaporan gratifikasi" class="btn btn-danger js-submit-confirm" type="submit"  style="height: 30px; text-align: left; text-align: left; margin-bottom: 5px;" onclick="return confirm('Apakah Anda Yakin Menghapus Data?');" title="hapus data dumas">
                        <i class="fa fa-trash"></i>&nbsp Hapus
                      </button>
                    </form>&nbsp
                    <a href="{!! route('admin.pelaporan_gratifikasi_data.print', $items->id) !!}" target="_blank" title="Cetak data gratifikasi">
                      <button class="btn btn-info" style="height: 30px; text-align: left; margin-bottom: 5px;"> 
                        <i class="fa fa-print"></i>&nbsp Cetak
                      </button>
                    </a>&nbsp
                    <a href="{!! route('admin.pelaporan_gratifikasi_data.index') !!}" title="">
                      <button class="btn btn-secondary" style="height: 30px; text-align: left; margin-bottom: 5px;"> 
                        <i class="fa fa-arrow-left"></i>&nbsp Kembali
                      </button>
                    </a>&nbsp

                    <!--
                    <div class="popup_box">
                        <i class="fa fa-check"></i>
                        <h1>VERIFIKASI</h1>
                        <p>Tentukan apakah pelaporan termasuk gratifikasi atau tidak?</p>
                        <div class="btns">
                            <a href="{!! route('admin.pelaporan_gratifikasi_data.verif', [$items->id, 'Y']) !!}" class="btnYes">Gratifikasi</a>
                            <a href="{!! route('admin.pelaporan_gratifikasi_data.verif', [$items->id, 'T']) !!}" class="btnNo">Bukan Gratifikasi</a>
                            <a href="#" class="btnClose">Batal</a>
                        </div>
                    </div> -->

                    @if ($message !== '')
                        <div class="alert alert-success alert-block">
                            <button type="button" class="close" data-dismiss="alert">×</button> 
                            <strong>{{ $message }}</strong>
                        </div>
                    @endif

                    @if ($message = Session::get('success'))
                        <div class="alert alert-success alert-block">
                            <button type="button" class="close" data-dismiss="alert">×</button>
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
                <!-- form start -->
                <div class="box-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="row" style="padding-left: 15px; padding-right: 15px;">
                                <div class="col-md-4">
                                    <strong>Sumber</strong>
                                </div>
                                <div class="form-group col-md-8">
                                    <input type="text" class="form-control" id="pgd_sumber" name="pgd_sumber" disabled value="{{ $items->pgd_sumber }}" style="background-color: #e4f5ff;">
                                </div>
                            </div>
                            <div class="row" style="padding-left: 15px; padding-right: 15px;">
                                <div class="col-md-4">
                                    <strong>Tanggal Pelaporan</strong>
                                </div>
                                <div class="form-group col-md-8">
                                    <input type="text" class="form-control" id="pgd_tanggal_lapor" name="pgd_tanggal_lapor" disabled value="{{ $items->pgd_tanggal_lapor }}" style="background-color: #e4f5ff;">
                                </div>
                            </div>
                            <div class="row" style="padding-left: 15px; padding-right: 15px;">
                                <div class="col-md-4">
                                    <strong>Kerahasiaan Laporan</strong>
                                </div>
                                <div class="form-group col-md-8" style="margin-bottom: 30px;">
                                    @if($items->pgd_pelapor_rahasia === "Y")
                                        <span class="badge bg-red">Ya</span>
                                    @else
                                        <span class="badge bg-green">Tidak</span>
                                    @endif
                                </div>
                            </div>
                            <div class="row" style="padding-left: 15px; padding-right: 15px;">
                                <div class="col-md-4">
                                    <strong>Jenis Laporan</strong>
                                </div>
                                <div class="form-group col-md-8" style="margin-bottom: 30px;">
                                    @if($items->pgd_jenis_laporan === "Penerimaan")
                                        <span class="badge bg-red">{{ $items->pgd_jenis_laporan }}</span>
                                    @else
                                        <span class="badge bg-green">{{ $items->pgd_jenis_laporan }}</span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="row" style="padding-left: 15px; padding-right: 15px;">
                                <div class="col-md-4">
                                    <strong>Hasil Verifikasi</strong>
                                </div>
                                <div class="form-group col-md-8">
                                    @if($items->pgd_verifikasi === "Belum Lengkap")
                                        <span class="badge bg-orange">Belum Lengkap</span>
                                    @elseif($items->pgd_verifikasi === "Lengkap")
                                        <span class="badge bg-green">Lengkap</span>
                                    @else
                                        <span class="badge bg-blue">Belum di Verifikasi</span>
                                    @endif
                                </div>
                            </div>
                            <div class="row" style="padding-left: 15px; padding-right: 15px;">
                                <div class="col-md-4">
                                    <strong>Catatan UPG</strong>
                                </div>
                                <div class="form-group col-md-8">
                                    <textarea class="form-control" rows="4" id="pgd_catatan_upg" name="pgd_catatan_upg" style="background-color: #e4f5ff;">{{ $items->pgd_catatan_upg }}</textarea>
                                </div>
                            </div>
                        </div>
                    </div>

                    </br>

                    <div class="row">
                        <div class="col-md-6">
                            
                            <fieldset>
                                <legend><h4>Identitas Pelapor Gratifikasi</h4></legend>
                                <div class="row" style="padding-left: 15px; padding-right: 15px;">
                                    <div class="col-md-4">
                                        <strong>NIK</strong>
                                    </div>
                                    <div class="form-group col-md-8">
                                        <input type="text" class="form-control" id="pgd_pelapor_nik" name="pgd_pelapor_nik" disabled value="{{ $items->pgd_pelapor_nik }}" style="background-color: #e4f5ff;">
                                    </div>
                                </div>
                                <div class="row" style="padding-left: 15px; padding-right: 15px;">
                                    <div class="col-md-4">
                                        <strong>Nama Lengkap</strong>
                                    </div>
                                    <div class="form-group col-md-8">
                                        <input type="text" class="form-control" id="pgd_pelapor_nama" name="pgd_pelapor_nama" disabled value="{{ $items->pgd_pelapor_nama }}" style="background-color: #e4f5ff;">
                                    </div>
                                </div>
                                <div class="row" style="padding-left: 15px; padding-right: 15px;">
                                    <div class="col-md-4">
                                        <strong>Tempat dan Tanggal Lahir</strong>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <input type="text" class="form-control" id="pgd_pelapor_tempat_lahir" name="pgd_pelapor_tempat_lahir" disabled value="{{ $items->pgd_pelapor_tempat_lahir }}" style="background-color: #e4f5ff;">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <input type="text" class="form-control" id="pgd_pelapor_tanggal_lahir" name="pgd_pelapor_tanggal_lahir" disabled value="{{ $items->pgd_pelapor_tanggal_lahir }}" style="background-color: #e4f5ff;">
                                    </div>
                                </div>
                                <div class="row" style="padding-left: 15px; padding-right: 15px;">
                                    <div class="col-md-4">
                                        <strong>Kontak</strong>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <input type="text" class="form-control" id="pgd_pelapor_telepon" name="pgd_pelapor_telepon" disabled value="{{ $items->pgd_pelapor_telepon }}" style="background-color: #e4f5ff;">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <input type="text" class="form-control" id="pgd_pelapor_email" name="pgd_pelapor_email" disabled value="{{ $items->pgd_pelapor_email }}" style="background-color: #e4f5ff;">
                                    </div>
                                </div>
                                <div class="row" style="padding-left: 15px; padding-right: 15px;">
                                    <div class="col-md-4">
                                        <strong>Alamat Rumah</strong>
                                    </div>
                                    <div class="form-group col-md-8">
                                        <input type="text" class="form-control" id="pgd_pelapor_alamat_rumah" name="pgd_pelapor_alamat_rumah" disabled value="{{ $items->pgd_pelapor_alamat_rumah }}" style="background-color: #e4f5ff;">
                                    </div>
                                </div>
                                <div class="row" style="padding-left: 15px; padding-right: 15px;">
                                    <div class="col-md-4">
                                        <strong>Jabatan</strong>
                                    </div>
                                    <div class="form-group col-md-8">
                                        <input type="text" class="form-control" id="pgd_pelapor_jabatan" name="pgd_pelapor_jabatan" disabled value="{{ $items->pgd_pelapor_jabatan }}" style="background-color: #e4f5ff;">
                                    </div>
                                </div>
                                <div class="row" style="padding-left: 15px; padding-right: 15px;">
                                    <div class="col-md-4">
                                        <strong>Instansi</strong>
                                    </div>
                                    <!--<div class="form-group col-md-4">
                                        <input type="text" class="form-control" id="pgd_pelapor_unit_kerja" name="pgd_pelapor_unit_kerja" disabled value="{{ $items->pgd_pelapor_unit_kerja }}" style="background-color: #e4f5ff;">
                                    </div>-->
                                    <div class="form-group col-md-8">
                                        <input type="text" class="form-control" id="pgd_pelapor_instansi" name="pgd_pelapor_instansi" disabled value="{{ $items->pgd_pelapor_instansi }}" style="background-color: #e4f5ff;">
                                    </div>
                                </div>
                                <!--<div class="row" style="padding-left: 15px; padding-right: 15px;">
                                    <div class="col-md-4">
                                        <strong>Alamat Kantor</strong>
                                    </div>
                                    <div class="form-group col-md-8">
                                        <input type="text" class="form-control" id="pgd_pelapor_alamat_kantor" name="pgd_pelapor_alamat_kantor" disabled value="{{ $items->pgd_pelapor_alamat_kantor }}" style="background-color: #e4f5ff;">
                                    </div>
                                </div>-->
                            </fieldset>

                            <fieldset>
                                <legend><h4>Data Pemberi Gratifikasi</h4></legend>
                                <div class="row" style="padding-left: 15px; padding-right: 15px;">
                                    <div class="col-md-4">
                                        <strong>Nama Lengkap</strong>
                                    </div>
                                    <div class="form-group col-md-8">
                                        <input type="text" class="form-control" id="pgd_pemberi_nama" name="pgd_pemberi_nama" disabled value="{{ $items->pgd_pemberi_nama }}" style="background-color: #e4f5ff;">
                                    </div>
                                </div>
                                <!--<div class="row" style="padding-left: 15px; padding-right: 15px;">
                                    <div class="col-md-4">
                                        <strong>Kontak</strong>
                                    </div>
                                    <div class="form-group col-md-8">
                                        <input type="text" class="form-control" id="pgd_pemberi_telepon" name="pgd_pemberi_telepon" disabled value="{{ $items->pgd_pemberi_telepon }}" style="background-color: #e4f5ff;">
                                    </div>
                                </div>-->
                                <div class="row" style="padding-left: 15px; padding-right: 15px;">
                                    <div class="col-md-4">
                                        <strong>Instansi</strong>
                                    </div>
                                    <div class="form-group col-md-8">
                                        <input type="text" class="form-control" id="pgd_pemberi_instansi" name="pgd_pemberi_instansi" disabled value="{{ $items->pgd_pemberi_instansi }}" style="background-color: #e4f5ff;">
                                    </div>
                                </div>
                                <div class="row" style="padding-left: 15px; padding-right: 15px;">
                                    <div class="col-md-4">
                                        <strong>Alamat</strong>
                                    </div>
                                    <div class="form-group col-md-8">
                                        <input type="text" class="form-control" id="pgd_pemberi_alamat" name="pgd_pemberi_alamat" disabled value="{{ $items->pgd_pemberi_alamat }}" style="background-color: #e4f5ff;">
                                    </div>
                                </div>
                                <div class="row" style="padding-left: 15px; padding-right: 15px;">
                                    <div class="col-md-4">
                                        <strong>Hubungan Dengan Pelapor</strong>
                                    </div>
                                    <div class="form-group col-md-8">
                                        <input type="text" class="form-control" id="pgd_pemberi_hubungan" name="pgd_pemberi_hubungan" disabled value="{{ $items->pgd_pemberi_hubungan }}" style="background-color: #e4f5ff;">
                                    </div>
                                </div>
                                <div class="row" style="padding-left: 15px; padding-right: 15px;">
                                    <div class="col-md-4">
                                        <strong>Alasan Pemberian</strong>
                                    </div>
                                    <div class="form-group col-md-8">
                                        <input type="text" class="form-control" id="pgd_alasan" name="pgd_alasan" disabled value="{{ $items->pgd_alasan }}" style="background-color: #e4f5ff;">
                                    </div>
                                </div>
                            </fieldset>
                        </div>

                        <div class="col-md-6">
                            <fieldset>
                                <legend><h4>Data Penerimaan / Penolakan Gratifikasi</h4></legend>
                                <div class="row" style="padding-left: 15px; padding-right: 15px;">
                                    <div class="col-md-4">
                                        <strong>Peristiwa Terkait Gratifikasi</strong>
                                    </div>
                                    <div class="form-group col-md-8">
                                        <input type="text" class="form-control" id="pgd_peristiwa" name="pgd_peristiwa" disabled value="{{ $items->pgd_peristiwa }}" style="background-color: #e4f5ff;">
                                    </div>
                                </div>
                                <div class="row" style="padding-left: 15px; padding-right: 15px;">
                                    <div class="col-md-4">
                                        <strong>Lokasi Objek Gratifikasi</strong>
                                    </div>
                                    <div class="form-group col-md-8">
                                        <input type="text" class="form-control" id="pgd_lokasi_objek" name="pgd_lokasi_objek" disabled value="{{ $items->pgd_lokasi_objek }}" style="background-color: #e4f5ff;">
                                    </div>
                                </div>
                                <div class="row" style="padding-left: 15px; padding-right: 15px;">
                                    <div class="col-md-4">
                                        <strong>Jenis Objek Gratifikasi</strong>
                                    </div>
                                    <div class="form-group col-md-8">
                                        <input type="text" class="form-control" id="pgd_jenis_objek" name="pgd_jenis_objek" disabled value="{{ $items->pgd_jenis_objek }}" style="background-color: #e4f5ff;">
                                    </div>
                                </div>
                                <div class="row" style="padding-left: 15px; padding-right: 15px;">
                                    <div class="col-md-4">
                                        <strong>Uraian Jenis Objek Gratifikasi</strong>
                                    </div>
                                    <div class="form-group col-md-8">
                                        <input type="text" class="form-control" id="pgd_uraian" name="pgd_uraian" disabled value="{{ $items->pgd_uraian }}" style="background-color: #e4f5ff;">
                                    </div>
                                </div>
                                <div class="row" style="padding-left: 15px; padding-right: 15px;">
                                    <div class="col-md-4">
                                        <strong>Nominal Uang/Taksiran Nilai</strong>
                                    </div>
                                    <div class="form-group col-md-8">
                                        <input type="text" class="form-control" id="pgd_nominal" name="pgd_nominal" disabled value="{{ 'Rp. '.number_format($items->pgd_nominal, 2, ',', '.') }}" style="background-color: #e4f5ff;">
                                    </div>
                                </div>
                            </fieldset>

                            <fieldset>
                                <legend><h4>Alasan dan Kronologi</h4></legend>
                                <div class="row" style="padding-left: 15px; padding-right: 15px;">
                                    <div class="col-md-4">
                                        <strong>Tempat dan Tanggal Penerimaan</strong>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <input type="text" class="form-control" id="pgd_tempat" name="pgd_tempat" disabled value="{{ $items->pgd_tempat }}" style="background-color: #e4f5ff;">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <input type="text" class="form-control" id="pgd_tanggal" name="pgd_tanggal" disabled value="{{ $items->pgd_tanggal }}" style="background-color: #e4f5ff;">
                                    </div>
                                </div>
                                <div class="row" style="padding-left: 15px; padding-right: 15px;">
                                    <div class="col-md-4">
                                        <strong>Tanggal Pelaporan ke UPG Pembantu</strong>
                                    </div>
                                    <div class="form-group col-md-8">
                                        <input type="text" class="form-control" id="pgd_tanggal_lapor_upgp" name="pgd_tanggal_lapor_upgp" disabled value="{{ $items->pgd_tanggal_lapor_upgp }}" style="background-color: #e4f5ff;">
                                    </div>
                                </div>
                                <div class="row" style="padding-left: 15px; padding-right: 15px;">
                                    <div class="col-md-4">
                                        <strong>Kronologi Penerimaan</strong>
                                    </div>
                                    <div class="form-group col-md-8">
                                        <input type="text" class="form-control" id="pgd_kronologi" name="pgd_kronologi" disabled value="{{ $items->pgd_kronologi }}" style="background-color: #e4f5ff;">
                                    </div>
                                </div>
                                <!--<div class="row" style="padding-left: 15px; padding-right: 15px;">
                                    <div class="col-md-4">
                                        <strong>Catatan Tambahan</strong>
                                    </div>
                                    <div class="form-group col-md-8">
                                        <input type="text" class="form-control" id="pgd_catatan" name="pgd_catatan" disabled value="{{ $items->pgd_catatan }}" style="background-color: #e4f5ff;">
                                    </div>
                                </div>-->
                                <div class="row" style="padding-left: 15px; padding-right: 15px;">
                                    <div class="col-md-4">
                                        <strong>Dokumen Pendukung</strong>
                                    </div>
                                    <div class="form-group col-md-8">
                                        <div class="input-group date">
                                            <div class="input-group-addon">
                                                @if ($items->pgd_lampiran === null || $items->pgd_lampiran === '')
                                                    <i class="fa fa-file"></i>
                                                @else
                                                    <a target="_blank" href="{{asset('uploads/pelaporan_gratifikasi/'.$items->pgd_lampiran)}}" onclick="pgd_lampiran_click()"><i class="fa fa-file" title="lihat file"></i></a>
                                                @endif
                                            </div>
                                            <input type="text" class="form-control" id="pgd_lampiran" name="pgd_lampiran" value="{{ $items->pgd_lampiran }}" disabled style="background-color: #e4f5ff;">
                                        </div>
                                    </div>
                                </div>
                            </fieldset>
                            
                            <!--<fieldset>
                                <legend><h4>Penyaluran Objek Gratifikasi</h4></legend>
                                <div class="row" style="padding-left: 15px; padding-right: 15px;">
                                    <div class="col-md-4">
                                        <strong>Tanggal Penyaluran</strong>
                                    </div>
                                    <div class="form-group col-md-8">
                                        <input type="text" class="form-control" id="pgd_penyaluran_tanggal" name="pgd_penyaluran_tanggal" disabled value="{{ $items->pgd_penyaluran_tanggal }}" style="background-color: #e4f5ff;">
                                    </div>
                                </div>
                                <div class="row" style="padding-left: 15px; padding-right: 15px;">
                                    <div class="col-md-4">
                                        <strong>Nama Penerima</strong>
                                    </div>
                                    <div class="form-group col-md-8">
                                        <input type="text" class="form-control" id="pgd_penyaluran_nama" name="pgd_penyaluran_nama" disabled value="{{ $items->pgd_penyaluran_nama }}" style="background-color: #e4f5ff;">
                                    </div>
                                </div>
                                <div class="row" style="padding-left: 15px; padding-right: 15px;">
                                    <div class="col-md-4">
                                        <strong>Alamat Penyaluran</strong>
                                    </div>
                                    <div class="form-group col-md-8">
                                        <input type="text" class="form-control" id="pgd_penyaluran_alamat" name="pgd_penyaluran_alamat" disabled value="{{ $items->pgd_penyaluran_alamat }}" style="background-color: #e4f5ff;">
                                    </div>
                                </div>
                                <div class="row" style="padding-left: 15px; padding-right: 15px;">
                                    <div class="col-md-4">
                                        <strong>Dokumentasi</strong>
                                    </div>
                                    <div class="form-group col-md-8">
                                        <div class="input-group date">
                                            <div class="input-group-addon">
                                                @if ($items->pgd_penyaluran_lampiran === null || $items->pgd_penyaluran_lampiran === '')
                                                    <i class="fa fa-file"></i>
                                                @else
                                                    <a target="_blank" href="{{asset('uploads/pelaporan_gratifikasi/'.$items->pgd_penyaluran_lampiran)}}" onclick="pgd_penyaluran_lampiran_click()"><i class="fa fa-file" title="lihat file"></i></a>
                                                @endif
                                            </div>
                                            <input type="text" class="form-control" id="pgd_penyaluran_lampiran" name="pgd_penyaluran_lampiran" value="{{ $items->pgd_penyaluran_lampiran }}" disabled style="background-color: #e4f5ff;">
                                        </div>
                                    </div>
                                </div>
                            </fieldset>-->
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="box box-primary">
                <div class="box-header with-border">
                    <strong style="font-size: 18pt">Riwayat Laporan Gratifikasi</strong><br>
                </div>
                <div class="box-body">
                    @if(isMobileDevice())
                        @if (count($items_pgr) > 0)
                            @foreach ($items_pgr as $item)
                                <div class="featured-item" id="" style="padding: 20px;">
                                <div class="row">
                                    <div class="col-md-12 my-2">
                                    <strong><i class="fa fa-tags"></i> {{ $item->pgr_no }}</strong> &nbsp &nbsp &nbsp 
                                    <strong><i class="fa fa-calendar-o"></i> {{ $item->pgr_tanggal }}</strong> </br>
                                    <hr style="margin-top: 10px; margin-bottom: 10px;">
                                    <table style="width: 100%;">
                                        <tbody>
                                        <tr>
                                            <td style="width: 30%; vertical-align: top;">Oleh</td>
                                            <td style="width:  5%; vertical-align: top;">:</td>
                                            <td style="vertical-align: top;">{{ $item->pgr_oleh }}</td>
                                        </tr>
                                        <tr>
                                            <td style="width: 30%; vertical-align: top;">Aksi</td>
                                            <td style="width:  5%; vertical-align: top;">:</td>
                                            <td style="vertical-align: top;">{{ $item->pgr_aksi }}</td>
                                        </tr>
                                        <tr>
                                            <td style="width: 30%; vertical-align: top;">Catatan</td>
                                            <td style="width:  5%; vertical-align: top;">:</td>
                                            <td style="vertical-align: top;">{{ $item->pgr_catatan }}</td>
                                        </tr>
                                        </tbody>
                                    </table>
                                    <hr style="margin-top: 10px; margin-bottom: 10px;">
                                    </div>
                                </div>
                                </div>
                                </br>
                            @endforeach
                        @else
                            <div class="featured-item" id="" style="padding: 20px; background-color: #FFF9CA;">
                            <div class="row">
                                <div class="col-md-12 my-2" style="text-align: center;">
                                <em>Tidak ada data</em>
                                </div>
                            </div>
                            </div>
                        @endif
                    @else
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                <th>No</th>
                                <th>Tgl Proses</th>
                                <th>Oleh</th>
                                <th>Aksi</th>
                                <th>Catatan</th>
                                </tr>
                            </thead>
                            @php
                                $no = 1;
                            @endphp
                            <tbody>
                                @if (count($items_pgr) > 0)
                                    @foreach ($items_pgr as $item)
                                    <tr>
                                        <td>{{ $no++ }}</td>
                                        <td>{{ $item->pgr_tanggal }}</td>
                                        <td>{{ $item->pgr_oleh }}</td>
                                        <td>{{ $item->pgr_aksi }}</td>
                                        <td>{{ $item->pgr_catatan }}</td>
                                    </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <td colspan="8" style="text-align: center; background-color: #FFF9CA;">Tidak ada data</td>
                                    </tr>
                                @endif 
                            </tbody>    
                        </table>
                    @endif
                </div>
            </div>
        </div>

        <!-- Function PHP -->
        <?php
          function isMobileDevice(){
            /*Detect mobile device*/
            
            $ismobile = 0;
            $container = $_SERVER['HTTP_USER_AGENT'];
            
            /*List of mobile devices*/
            $useragents = array('Blazer', 'Palm', 'Handspring', 'Nokia', 'Kyocera', 'Samsung', 'Motorola', 'Smartphone',
                                'Windows CE', 'Blackberry', 'WAP', 'SonyEricsson', 'PlayStation Portable', 'LG', 'MMP',
                                'OPWV', 'Symbian', 'EPOC', 'iPhone', 'iPod', 'iPad', 'Android', 'iOS'
            );
            
            foreach($useragents as $useragents){
                if(strstr($container,$useragents)){
                    $ismobile = 1;
                }
            }

            if($ismobile){
                return true;
            }else{
                return false;
            }
          }
        ?>
    </div>
</section>
@endsection

@section('js')
<script>
    var options = {
            filebrowserImageBrowseUrl: '/laravel-filemanager?type=Images',
            filebrowserImageUploadUrl: '/laravel-filemanager/upload?type=Images&_token=',
            filebrowserBrowseUrl: '/laravel-filemanager?type=Files',
            filebrowserUploadUrl: '/laravel-filemanager/upload?type=Files&_token='
        };

    var items = {!! $items !!};
    /*
    if (items.pgd_pelapor_rahasia === "Y") {
        document.getElementById('pgd_pelapor_nik').value = secretValue(items.pgd_pelapor_nik);
        document.getElementById('pgd_pelapor_nama').value = secretValue(items.pgd_pelapor_nama);
        document.getElementById('pgd_pelapor_tempat_lahir').value = secretValue(items.pgd_pelapor_tempat_lahir);
        document.getElementById('pgd_pelapor_tanggal_lahir').value = secretValue(items.pgd_pelapor_tanggal_lahir);
        document.getElementById('pgd_pelapor_telepon').value = secretValue(items.pgd_pelapor_telepon);
        document.getElementById('pgd_pelapor_email').value = secretValue(items.pgd_pelapor_email);
        document.getElementById('pgd_pelapor_alamat_rumah').value = secretValue(items.pgd_pelapor_alamat_rumah);
        document.getElementById('pgd_pelapor_jabatan').value = secretValue(items.pgd_pelapor_jabatan);
        document.getElementById('pgd_pelapor_unit_kerja').value = secretValue(items.pgd_pelapor_unit_kerja);
        document.getElementById('pgd_pelapor_instansi').value = secretValue(items.pgd_pelapor_instansi);
        document.getElementById('pgd_pelapor_alamat_kantor').value = secretValue(items.pgd_pelapor_alamat_kantor);
        document.getElementById('pgd_pemberi_nama').value = secretValue(items.pgd_pemberi_nama);
        document.getElementById('pgd_pemberi_telepon').value = secretValue(items.pgd_pemberi_telepon);
        document.getElementById('pgd_pemberi_pekerjaan').value = secretValue(items.pgd_pemberi_pekerjaan);
        document.getElementById('pgd_pemberi_alamat').value = secretValue(items.pgd_pemberi_alamat);
        document.getElementById('pgd_pemberi_hubungan').value = secretValue(items.pgd_pemberi_hubungan);
    }*/

    $(document).ready(function(){
        $('.click').click(function(){
            $('.popup_box').css("display", "block");
        });
        $('.btnClose').click(function(){
            $('.popup_box').css("display", "none");
        });
        $('.btnYes').click(function(){
            $('.popup_box').css("display", "none");
            //alert("Laporan berhasil di verifikasi termasuk dalam gratifikasi");
        });
        $('.btnNo').click(function(){
            $('.popup_box').css("display", "none");
            //alert("Laporan berhasil di verifikasi tidak termasuk dalam gratifikasi");
        });
    });

    function secretValue(item) {
        var temp = "";
        for (let i = 0; i < item.length; i++) {
            if (i < 2) {
                temp = temp+item.charAt(i);
            } else if (i >= 2 && i < item.length - 2) {
                if (item.charAt(i) === " ") {
                    temp = temp+" ";
                } else {
                    temp = temp+"*";
                }
            } else if (i >= item.length - 2 && i < item.length) {
                temp = temp+item.charAt(i);
            }
        }
        return temp;
    }
</script>

@endsection