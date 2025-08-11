<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from themeht.com/loptus/html/project-details.html by HTTrack Website Copier/3.x [XR&CO'2013], Thu, 10 Oct 2019 03:50:04 GMT -->

@include('template_fe.head')
<body>
    <!-- page wrapper start -->

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

        th, td {
            padding: 5px;
        }
    </style>

    <div class="page-wrapper">

       @include('template_fe.header')

        <section class="fullscreen-banner p-0 banner o-hidden grediant-overlay" data-overlay="10">
          <div class="d-none d-md-block">
            <img class="img-fluid" src="{{asset('fe/images/bg/08.png')}}" alt="">
          </div>
          <div class="align-center">
            <div class="container">
              <div class="row align-items-center" style="margin-top: -130px;">
                <div class="col-lg-6 col-md-12 order-lg-12 sm-mt-5">
                  <div class="seo-img animated zoomIn delay-5 duration-4">
                    <img class="img-center" src="{{asset('fe/images/banner/03.png')}}" alt="">
                  </div>
                </div>
                <div class="col-lg-6 col-md-12 order-lg-1 md-mt-5">
                  <h1 class=" text-white animated bounceInLeft delay-2 duration-3">PELAPORAN GRATIFIKASI</h1>
                </div>        
              </div>
            </div>
           </div>
        </section>
        <!--page title start-->

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
                        <img class="img-fluid" src="{{ asset('dist/img/01.gif') }}" alt="">
                        {{ $items_pesan['text'] }}
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>     

        <!--page title end-->


        <!--body content start-->



        <div class="page-content">
            <section id="form-pelaporan-gratifikasi" class="o-hidden">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-lg-12 col-md-12 md-mt-5">
                            <div class="section-title text-center mb-4">
                                <h2 class="title">FORMULIR PELAPORAN GRATIFIKASI</h2> 
                            </div>

                            <form role="form" action="{{ route('frontend.pelaporan_gratifikasi_data.store') }}" method="POST" enctype="multipart/form-data">
                                {{ csrf_field() }}
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

                                <input type="hidden" class="form-control pull-right" id="pgd_sumber" name="pgd_sumber" value="Website">
                                <input type="hidden" class="form-control pull-right" id="pgd_tanggal_lapor" name="pgd_tanggal_lapor" value="{{ date('Y-m-d') }}">

                                <div class="col-lg-12 px-0">
                                    <div class="card grey-bg">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="card grey-bg mb-4">
                                                        <div class="card-header" style="background-color:#007bff2e">
                                                            <b>Identitas Pelapor Gratifikasi</b>
                                                        </div>

                                                        <div class="card-body">
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label>NIK</label>
                                                                        <input type="text" class="form-control" id="pgd_pelapor_nik" name="pgd_pelapor_nik" value="{{ old('pgd_pelapor_nik') ? old('pgd_pelapor_nik') : '' }}">
                                                                        <div class="help-block with-errors" ></div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label>Nama Lengkap</label>
                                                                        <input type="text" class="form-control" id="pgd_pelapor_nama" name="pgd_pelapor_nama" value="{{ old('pgd_pelapor_nama') ? old('pgd_pelapor_nama') : '' }}">
                                                                        <div class="help-block with-errors" ></div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-3">
                                                                    <div class="form-group">
                                                                        <label>Tempat Lahir</label>
                                                                        <input type="text" class="form-control" id="pgd_pelapor_tempat_lahir" name="pgd_pelapor_tempat_lahir" value="{{ old('pgd_pelapor_tempat_lahir') ? old('pgd_pelapor_tempat_lahir') : '' }}">
                                                                        <div class="help-block with-errors" ></div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-3">
                                                                    <div class="form-group">
                                                                        <label>Tanggal Lahir</label>
                                                                        <input type="text" class="form-control" id="pgd_pelapor_tanggal_lahir" name="pgd_pelapor_tanggal_lahir" value="{{ old('pgd_pelapor_tanggal_lahir') ? old('pgd_pelapor_tanggal_lahir') : '' }}">
                                                                        <div class="help-block with-errors" ></div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-3">
                                                                    <div class="form-group">
                                                                        <label>No. Telepon (WA)</label>
                                                                        <input type="text" class="form-control" id="pgd_pelapor_telepon" name="pgd_pelapor_telepon" value="{{ old('pgd_pelapor_telepon') ? old('pgd_pelapor_telepon') : '' }}">
                                                                        <div class="help-block with-errors" ></div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-3">
                                                                    <div class="form-group">
                                                                        <label>Email</label>
                                                                        <input type="text" class="form-control" id="pgd_pelapor_email" name="pgd_pelapor_email" value="{{ old('pgd_pelapor_email') ? old('pgd_pelapor_email') : '' }}">
                                                                        <div class="help-block with-errors" ></div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="form-group">
                                                                        <label>Alamat Rumah</label>
                                                                         <input type="text" class="form-control" id="pgd_pelapor_alamat_rumah" name="pgd_pelapor_alamat_rumah" value="{{ old('pgd_pelapor_alamat_rumah') ? old('pgd_pelapor_alamat_rumah') : '' }}">
                                                                        <div class="help-block with-errors" ></div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-3">
                                                                    <div class="form-group">
                                                                        <label>Jabatan</label>
                                                                        <input type="text" class="form-control" id="pgd_pelapor_jabatan" name="pgd_pelapor_jabatan" value="{{ old('pgd_pelapor_jabatan') ? old('pgd_pelapor_jabatan') : '' }}">
                                                                        <div class="help-block with-errors" ></div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-3">
                                                                    <div class="form-group">
                                                                        <label>Unit Kerja</label>
                                                                        <input type="text" class="form-control" id="pgd_pelapor_unit_kerja" name="pgd_pelapor_unit_kerja" value="{{ old('pgd_pelapor_unit_kerja') ? old('pgd_pelapor_unit_kerja') : '' }}">
                                                                        <div class="help-block with-errors" ></div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label>Instansi</label>
                                                                        <input type="text" class="form-control" id="pgd_pelapor_instansi" name="pgd_pelapor_instansi" value="{{ old('pgd_pelapor_instansi') ? old('pgd_pelapor_instansi') : '' }}">
                                                                        <div class="help-block with-errors" ></div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="form-group">
                                                                        <label>Alamat Kantor</label>
                                                                         <input type="text" class="form-control" id="pgd_pelapor_alamat_kantor" name="pgd_pelapor_alamat_kantor" value="{{ old('pgd_pelapor_alamat_kantor') ? old('pgd_pelapor_alamat_kantor') : '' }}">
                                                                        <div class="help-block with-errors" ></div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-3">
                                                                    <div class="form-group">
                                                                        <label>Rahasiakan Laporan</label>
                                                                        <table>
                                                                            <tbody>
                                                                                <tr>
                                                                                    <td><input type="radio" id="pgd_pelapor_rahasia_1" name="pgd_pelapor_rahasia" value="Y"></td>
                                                                                    <td>Ya</td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td><input type="radio" id="pgd_pelapor_rahasia_2" name="pgd_pelapor_rahasia" value="T"></td>
                                                                                    <td>Tidak</td>
                                                                                </tr>
                                                                            </tbody>
                                                                        </table>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="card grey-bg mb-4">
                                                        <div class="card-header" style="background-color:#007bff2e">
                                                            <b>Identitas Pemberi Gratifikasi</b>
                                                        </div>

                                                        <div class="card-body">
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label>Nama Lengkap</label>
                                                                        <input type="text" class="form-control" id="pgd_pemberi_nama" name="pgd_pemberi_nama" value="{{ old('pgd_pemberi_nama') ? old('pgd_pemberi_nama') : '' }}">
                                                                        <div class="help-block with-errors" ></div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-3">
                                                                    <div class="form-group">
                                                                        <label>No. Telepon (WA)</label>
                                                                        <input type="text" class="form-control" id="pgd_pemberi_telepon" name="pgd_pemberi_telepon" value="{{ old('pgd_pemberi_telepon') ? old('pgd_pemberi_telepon') : '' }}">
                                                                        <div class="help-block with-errors" ></div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-3">
                                                                    <div class="form-group">
                                                                        <label>Pekerjaan</label>
                                                                        <input type="text" class="form-control" id="pgd_pemberi_pekerjaan" name="pgd_pemberi_pekerjaan" value="{{ old('pgd_pemberi_pekerjaan') ? old('pgd_pemberi_pekerjaan') : '' }}">
                                                                        <div class="help-block with-errors" ></div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="form-group">
                                                                        <label>Alamat</label>
                                                                         <input type="text" class="form-control" id="pgd_pemberi_alamat" name="pgd_pemberi_alamat" value="{{ old('pgd_pemberi_alamat') ? old('pgd_pemberi_alamat') : '' }}">
                                                                        <div class="help-block with-errors" ></div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="form-group">
                                                                        <label>Hubungan dengan pelapor</label>
                                                                        <table>
                                                                            <tbody>
                                                                            @foreach ($items_data_hubungan as $item_data_hubungan)
                                                                                <tr>
                                                                                    <td valign=top><input type="radio" onclick="javascript:pgd_pemberi_hubungan_check();" 
                                                                                               id="pgd_pemberi_hubungan_{{ $item_data_hubungan->id }}" name="pgd_pemberi_hubungan" 
                                                                                               value="{{ $item_data_hubungan->pgl_nilai }}" {{ ($item_data_hubungan->pgl_nilai === old('pgd_pemberi_hubungan')) ? 'checked' : '' }}></td>
                                                                                    <td valign=top>{{ $item_data_hubungan->pgl_nilai }}</td>
                                                                                </tr>
                                                                            @endforeach
                                                                            <tr>
                                                                                <td valign=top><input type="radio" onclick="javascript:pgd_pemberi_hubungan_check();" id="pgd_pemberi_hubungan_lainnya" name="pgd_pemberi_hubungan" value="Lainnya"></td>
                                                                                <td valign=top>Lainnya</td>
                                                                            </tr>
                                                                            </tbody>
                                                                        </table>
                                                                        <input type="text" class="form-control radio_lainnya" id="pgd_pemberi_hubungan_lainnya_input" name="pgd_pemberi_hubungan_lainnya_input" 
                                                                               value="{{ old('pgd_pemberi_hubungan_lainnya_input') ? old('pgd_pemberi_hubungan_lainnya_input') : '' }}"
                                                                               placeholder="Wajib diisi jika memilih lainnya"
                                                                               style="display:none">
                                                                        <div class="help-block with-errors" ></div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="card grey-bg mb-4">
                                                        <div class="card-header" style="background-color:#007bff2e">
                                                            <b>Data Penerimaan / Penolakan Gratifikasi</b>
                                                        </div>

                                                        <div class="card-body">
                                                            <div class="row">
                                                                <div class="col-md-3">
                                                                    <div class="form-group">
                                                                        <label>Kategori Laporan</label>
                                                                        <table>
                                                                            <tbody>
                                                                                <tr>
                                                                                    <td><input type="radio" id="pgd_kategori_1" name="pgd_kategori" value="Penerimaan"></td>
                                                                                    <td>Penerimaan</td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td><input type="radio" id="pgd_kategori_2" name="pgd_kategori" value="Penolakan"></td>
                                                                                    <td>Penolakan</td>
                                                                                </tr>
                                                                            </tbody>
                                                                        </table>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="form-group">
                                                                        <label>Peristiwa Terkait Gratifikasi</label>
                                                                        <table>
                                                                            <tbody>
                                                                            @foreach ($items_data_peristiwa as $item_data_peristiwa)
                                                                                <tr>
                                                                                    <td valign=top><input type="radio" onclick="javascript:pgd_peristiwa_check();" 
                                                                                               id="pgd_peristiwa_{{ $item_data_hubungan->id }}" name="pgd_peristiwa" 
                                                                                               value="{{ $item_data_peristiwa->pgl_nilai }}" {{ ($item_data_peristiwa->pgl_nilai === old('pgd_peristiwa')) ? 'checked' : '' }}></td>
                                                                                    <td valign=top>{{ $item_data_peristiwa->pgl_nilai }}</td>
                                                                                </tr>
                                                                            @endforeach
                                                                            <tr>
                                                                                <td valign=top><input type="radio" onclick="javascript:pgd_peristiwa_check();" id="pgd_peristiwa_lainnya" name="pgd_peristiwa" value="Lainnya"></td>
                                                                                <td valign=top>Lainnya</td>
                                                                            </tr>
                                                                            </tbody>
                                                                        </table>
                                                                        <input type="text" class="form-control radio_lainnya" id="pgd_peristiwa_lainnya_input" name="pgd_peristiwa_lainnya_input" 
                                                                               value="{{ old('pgd_peristiwa_lainnya_input') ? old('pgd_peristiwa_lainnya_input') : '' }}"
                                                                               placeholder="Wajib diisi jika memilih lainnya"
                                                                               style="display:none">
                                                                        <div class="help-block with-errors" ></div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="form-group">
                                                                        <label>Jenis Objek Gratifikasi</label>
                                                                        <table>
                                                                            <tbody>
                                                                            @foreach ($items_data_jenis as $item_data_jenis)
                                                                                <tr>
                                                                                    <td valign=top><input type="radio" 
                                                                                               id="pgd_jenis_{{ $item_data_hubungan->id }}" name="pgd_jenis" 
                                                                                               value="{{ $item_data_jenis->pgl_nilai }}" {{ ($item_data_jenis->pgl_nilai === old('item_data_jenis')) ? 'checked' : '' }}></td>
                                                                                    <td valign=top>{{ $item_data_jenis->pgl_nilai }}</td>
                                                                                </tr>
                                                                            @endforeach
                                                                            <tr>
                                                                                <td valign=top><input type="radio" id="pgd_jenis_lainnya" name="pgd_jenis" value="Lainnya"></td>
                                                                                <td valign=top>Lainnya</td>
                                                                            </tr>
                                                                            </tbody>
                                                                        </table>
                                                                        <div class="help-block with-errors" ></div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-9">
                                                                    <div class="form-group">
                                                                        <label>Uraian Jenis Objek Gratifikasi</label>
                                                                         <input type="text" class="form-control" id="pgd_uraian" name="pgd_uraian" value="{{ old('pgd_uraian') ? old('pgd_uraian') : '' }}">
                                                                        <div class="help-block with-errors" ></div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-3">
                                                                    <div class="form-group">
                                                                        <label>Nominal Uang/Taksiran Nilai</label>
                                                                         <input type="text" class="form-control" id="pgd_nominal" name="pgd_nominal" value="{{ old('pgd_nominal') ? old('pgd_nominal') : '' }}">
                                                                        <div class="help-block with-errors" ></div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="card grey-bg mb-4">
                                                        <div class="card-header" style="background-color:#007bff2e">
                                                            <b>Alasan dan Kronologi</b>
                                                        </div>

                                                        <div class="card-body">
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="form-group">
                                                                        <label>Alasan Pemberian</label>
                                                                         <input type="text" class="form-control" id="pgd_alasan" name="pgd_alasan" value="{{ old('pgd_alasan') ? old('pgd_alasan') : '' }}">
                                                                        <div class="help-block with-errors" ></div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="form-group">
                                                                        <label>Kronologi Pemberian</label>
                                                                         <input type="text" class="form-control" id="pgd_kronologi" name="pgd_kronologi" value="{{ old('pgd_kronologi') ? old('pgd_kronologi') : '' }}">
                                                                        <div class="help-block with-errors" ></div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-3">
                                                                    <div class="form-group">
                                                                        <label>Tempat Pemberian</label>
                                                                         <input type="text" class="form-control" id="pgd_tempat" name="pgd_tempat" value="{{ old('pgd_tempat') ? old('pgd_tempat') : '' }}">
                                                                        <div class="help-block with-errors" ></div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-3">
                                                                    <div class="form-group">
                                                                        <label>Tanggal Pemberian</label>
                                                                         <input type="text" class="form-control" id="pgd_tanggal" name="pgd_tanggal" value="{{ old('pgd_tanggal') ? old('pgd_tanggal') : '' }}">
                                                                        <div class="help-block with-errors" ></div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label>Dokumen Pendukung (Bila Perlu)</label></br>
                                                                        <input type="file" id="pgd_lampiran" name="pgd_lampiran">
                                                                        <div class="help-block with-errors" ></div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="form-group">
                                                                        <label>Catatan Tambahan (Bila Perlu)</label>
                                                                         <input type="text" class="form-control" id="pgd_catatan" name="pgd_catatan" value="{{ old('pgd_catatan') ? old('pgd_catatan') : '' }}">
                                                                        <div class="help-block with-errors" ></div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="card grey-bg mb-4">
                                                        <div class="card-header" style="background-color:#007bff2e">
                                                            <b>Penyaluran Objek Gratifikasi</b>
                                                        </div>

                                                        <div class="card-body">
                                                            <div class="row">
                                                                <div class="col-md-3">
                                                                    <div class="form-group">
                                                                        <label>Tanggal Penyaluran</label>
                                                                         <input type="text" class="form-control" id="pgd_penyaluran_tanggal" name="pgd_penyaluran_tanggal" value="{{ old('pgd_penyaluran_tanggal') ? old('pgd_penyaluran_tanggal') : '' }}">
                                                                        <div class="help-block with-errors" ></div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-9">
                                                                    <div class="form-group">
                                                                        <label>Nama Penerima</label>
                                                                         <input type="text" class="form-control" id="pgd_penyaluran_nama" name="pgd_penyaluran_nama" value="{{ old('pgd_penyaluran_nama') ? old('pgd_penyaluran_nama') : '' }}">
                                                                        <div class="help-block with-errors" ></div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="form-group">
                                                                        <label>Alamat Penyaluran</label>
                                                                         <input type="text" class="form-control" id="pgd_penyaluran_alamat" name="pgd_penyaluran_alamat" value="{{ old('pgd_penyaluran_alamat') ? old('pgd_penyaluran_alamat') : '' }}">
                                                                        <div class="help-block with-errors" ></div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label>Dokumentasi</label></br>
                                                                        <input type="file" id="pgd_penyaluran_lampiran" name="pgd_penyaluran_lampiran">
                                                                        <div class="help-block with-errors" ></div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="card grey-bg mb-4 px-3">
                                                        <div class="card-body">
                                                            <div class="row">
                                                                <p class="mb-0">Berikan centang pada pernyataan dibawah ini!</p>
                                                                <table>
                                                                    <tbody>
                                                                        <tr>
                                                                            <td valign=top><input type="checkbox" id="pgd_pernyataan" name="pgd_pernyataan" value="Setuju" onclick="checkPernyataan()"></td>
                                                                            <td valign=top>Laporan gratifikasi ini saya sampaikan dengan sebenar-benarnya. Apabila ada yang sengaja tidak saya laporkan atau saya laporkan secara tidak benar,
                                                                            maka saya bersedia mempertanggungjawabkan secara hukum sesuai dengan peraturan perundang-undangan yang berlaku dan saya bersedia memberikan keterangan lebih lanjut.</td>
                                                                        </tr>
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-12" style="padding-top:20px">
                                                    <button disabled type="submit" class="btn btn-theme" id="btnSubmit" title="Berikan centang pada pernyataan diatas!"><span>Kirim</span></button>
                                                </div>
                                            </div>
                                        </div>  
                                    </div>
                                </div> 
                            </form>
                        </div>
                    </div>
                </div>
            </section>
             
        </div>

        <!--body content end-->

        @include('template_fe.footer')

    </div>

    <div class="scroll-top"><a class="smoothscroll" href="#top"><i class="flaticon-upload"></i></a></div>

    <!--back-to-top end-->

    @include('template_fe.javascript')

    <script type="text/javascript">
        if ('{{ $items_pesan['text'] }}' !== '') {
            $("#modalMessage").modal("toggle");
        }
    </script>

    <script>
        var options = {
                filebrowserImageBrowseUrl: '/laravel-filemanager?type=Images',
                filebrowserImageUploadUrl: '/laravel-filemanager/upload?type=Images&_token=',
                filebrowserBrowseUrl: '/laravel-filemanager?type=Files',
                filebrowserUploadUrl: '/laravel-filemanager/upload?type=Files&_token='
            };

        $(function() {
            $('#pmd_tanggal').datepicker({
                autoclose: true,
                format: 'yyyy-mm-dd',
            })
            $('#pmd_tanggal_terima').datepicker({
                autoclose: true,
                format: 'yyyy-mm-dd',
            })
        })

        function pgd_pemberi_hubungan_check() {
            if (document.getElementById('pgd_pemberi_hubungan_lainnya').checked) {
                document.getElementById('pgd_pemberi_hubungan_lainnya_input').style.display = 'block';
            } else {
                document.getElementById('pgd_pemberi_hubungan_lainnya_input').style.display = 'none';
            }
        }
        function pgd_peristiwa_check() {
            if (document.getElementById('pgd_peristiwa_lainnya').checked) {
                document.getElementById('pgd_peristiwa_lainnya_input').style.display = 'block';
            } else {
                document.getElementById('pgd_peristiwa_lainnya_input').style.display = 'none';
            }
        }

        function checkPernyataan(){
            if(document.getElementById('pgd_pernyataan').checked){
                document.getElementById('btnSubmit').disabled = false;
                document.getElementById('btnSubmit').title = "";
            }else{
                document.getElementById('btnSubmit').disabled = true;
                document.getElementById('btnSubmit').title = "Berikan centang pada pernyataan diatas!";

            }
        }
    </script>
   

</html>

