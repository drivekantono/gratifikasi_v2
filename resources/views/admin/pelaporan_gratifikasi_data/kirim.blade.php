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
                    <h3 class="box-title"><strong>Kirim Pesan ke Pelapor</strong></h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <form id="formKirimPesan" name="formKirimPesan" role="form" action="#" method="GET" enctype="multipart/form-data">
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

                        <input type="hidden" id="pgd_id" name="pgd_id" value="{{ $items->id }}">

                        <fieldset>
                            <div class="row col-md-12">
                                <div class="col-md-2">
                                    <strong>Nomor WA Pelapor</strong>
                                </div>
                                <div class="form-group col-md-4 autocomplete">
                                        <input type="text" class="form-control" name="pgd_pelapor_telepon" id="pgd_pelapor_telepon" value="{{ old('pgd_pelapor_telepon') ? old('pgd_pelapor_telepon') : $items->pgd_pelapor_telepon }}">
                                    </div>
                            </div>
                            <div class="row col-md-12">
                                <div class="col-md-2">
                                    <strong>Isi Pesan</strong>
                                </div>
                                <div class="form-group col-md-10 autocomplete">
                                    <textarea class="form-control" rows="4" name="pgd_catatan_upg" id="pgd_catatan_upg">{{ old('pgd_catatan_upg') ? old('pgd_catatan_upg') : $items->pgd_catatan_upg }}</textarea>
                                </div>
                            </div>
                        </fieldset>

                        
                    </div>
                    <!-- /.box-body -->


                    <div class="box-footer">
                        <button class="btn btn-success" title="kirim pesan melalui WA" onclick="SimpanData()">Kirim</button>
                        <a href="{{ route('admin.pelaporan_gratifikasi_data.show', $items->id) }}" class="btn btn-warning" title="kembali">Batal</a>
                    </div>
                </form>
            </div>
        </div>

        <div class="col-md-12">
            <!-- dari tabel pengaduan_masyarakat_datas -->
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title"><strong>Data Laporan Gratifikasi | {{ $items->pgd_no }}</strong></h3>
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
                                <div class="form-group col-md-8">
                                    @if($items->pgd_pelapor_rahasia === "Y")
                                        <span class="badge bg-red">Ya</span>
                                    @else
                                        <span class="badge bg-green">Tidak</span>
                                    @endif
                                </div>
                            </div>
                            <div class="row" style="padding-left: 15px; padding-right: 15px;">
                                <div class="col-md-4">
                                    <strong>Kategori</strong>
                                </div>
                                <div class="form-group col-md-8" style="margin-bottom: 0px;">
                                    @if($items->pgd_kategori === "Penerimaan")
                                        <span class="badge bg-red">{{ $items->pgd_kategori }}</span>
                                    @else
                                        <span class="badge bg-green">{{ $items->pgd_kategori }}</span>
                                    @endif
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
                                <legend><h4>Identitas Pemberi Gratifikasi</h4></legend>
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
                                </div>
                                <div class="row" style="padding-left: 15px; padding-right: 15px;">
                                    <div class="col-md-4">
                                        <strong>Pekerjaan</strong>
                                    </div>
                                    <div class="form-group col-md-8">
                                        <input type="text" class="form-control" id="pgd_pemberi_pekerjaan" name="pgd_pemberi_pekerjaan" disabled value="{{ $items->pgd_pemberi_pekerjaan }}" style="background-color: #e4f5ff;">
                                    </div>
                                </div>-->
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
                                        <strong>Alasan Pemberian</strong>
                                    </div>
                                    <div class="form-group col-md-8">
                                        <input type="text" class="form-control" id="pgd_alasan" name="pgd_alasan" disabled value="{{ $items->pgd_alasan }}" style="background-color: #e4f5ff;">
                                    </div>
                                </div>
                                <div class="row" style="padding-left: 15px; padding-right: 15px;">
                                    <div class="col-md-4">
                                        <strong>Kronologi Pemberian</strong>
                                    </div>
                                    <div class="form-group col-md-8">
                                        <input type="text" class="form-control" id="pgd_kronologi" name="pgd_kronologi" disabled value="{{ $items->pgd_kronologi }}" style="background-color: #e4f5ff;">
                                    </div>
                                </div>
                                <div class="row" style="padding-left: 15px; padding-right: 15px;">
                                    <div class="col-md-4">
                                        <strong>Tempat dan Tanggal Pemberian</strong>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <input type="text" class="form-control" id="pgd_tempat" name="pgd_tempat" disabled value="{{ $items->pgd_tempat }}" style="background-color: #e4f5ff;">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <input type="text" class="form-control" id="pgd_tanggal" name="pgd_tanggal" disabled value="{{ $items->pgd_tanggal }}" style="background-color: #e4f5ff;">
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
        </div>
    </div>
</section>
@endsection

@section('js')
<script src="{{ asset('bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js') }}"></script>
<script src="{{ asset('bower_components/ckeditor/ckeditor.js') }}"></script>
<script src="//cdn.ckeditor.com/4.6.2/standard/ckeditor.js"></script>
<script>
    $(document).ready(function(){
        document.getElementById("pgd_pelapor_telepon").value = setNumberTo62(document.getElementById("pgd_pelapor_telepon").value);
    });

    function SimpanData(){
        $.ajax({
            url: "{{ route('admin.pelaporan_gratifikasi_data.sendWA') }}",
            type: "GET",
            data: {
                pgd_id: document.getElementById("pgd_id").value
            },
            success: function(data) {
                console.error(data);
                //alert("Berhasil mengambil data");

                var name 	    = document.getElementById("pgd_pelapor_nama").value;
                var message 	= document.getElementById("pgd_catatan_upg").value;
                let contact 	= setNumberTo62(document.getElementById("pgd_pelapor_telepon").value); // isi dengan nomor WA (+6283811223344)

                var encodedMessage = encodeURIComponent(
                    "Yth. Bapak/Ibu/Sdr/i *" + name + "* \n\n" +
                    "Pemberitahuan: Hasil Verifikasi Pelaporan Gratifikasi" + "\n\n" +
                    message + "\n\n" +
                    "_Terima kasih telah melaporkan adanya indikasi gratifikasi kepada kami._ \n\n" + 
                    "Hormat kami,\n" +
                    "*UPG Provinsi Jawa Timur*"
                );

                var link;

                // Check if user is on a mobile device
                if (/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent)) {
                    link = `whatsapp://send?phone=${contact}&text=${encodedMessage}`;
                } else { // Desktop device
                    link = `https://api.whatsapp.com/send?phone=${contact}&text=${encodedMessage}`;
                }

                window.open(link, '_blank');
            },
            error: function(xhr, status, error) {
                console.error("AJAX Error:", status, error);
                //alert("Gagal mengambil data. Silakan coba lagi.");
            },
            complete: function() {
                //
            }
        });
    };

    function setNumberTo62(contact) {
        var temp = "";
        for (let i = 0; i < 1; i++) {
            if (contact.charAt(i) === "0") {
                temp = "62" + contact.substring(1, contact.length)
            } else {
                temp = contact;
            } 
        }
        return temp;
    }
</script>

@endsection