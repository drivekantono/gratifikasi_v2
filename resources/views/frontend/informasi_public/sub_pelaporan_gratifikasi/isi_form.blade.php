<style>
    input[type="date"]::-webkit-calendar-picker-indicator {
        background: transparent;
        bottom: 0;
        color: transparent;
        cursor: pointer;
        height: auto;
        left: 0;
        position: absolute;
        right: 0;
        top: 0;
        width: auto;
    }
    .btns .btnInfo, .btns .btnCek{
        background: rgba(10, 96, 255, 0.97);
        font-size: 10px;
        color: white;
        border-radius: 5px;
        border: 0px solid rgb(101, 3, 3);
        padding: 2px 6px 2px 6px;
    }
    .btns .btnCek{
        background: rgb(72, 182, 41);
        border: 0px solid rgb(101, 3, 3);
    }
    .btns .btnInfo:hover{
        transition: .5s;
        background: rgb(9, 22, 120);
    }
    .btns .btnCek:hover{
        transition: .5s;
        background: rgb(11, 103, 22);
    }
    .tooltiptap {
        position: relative;
        display: inline-block;
    }
    .tooltiptap .tooltiptaptext {
        visibility: hidden;
        width: 220px;
        font-size: 10px;
        color: #fff;
        background-color: black;
        text-align: center;
        border-radius: 6px;
        padding: 5px 0;
        position: absolute;
        z-index: 1;
        top: -5px;
        left: 110%;
    }
    .tooltiptap .tooltiptaptext::after {
        content: "";
        position: absolute;
        top: 50%;
        right: 100%;
        margin-top: -5px;
        border-width: 5px;
        border-style: solid;
        border-color: transparent black transparent transparent;
    }
    .tooltiptap:hover .tooltiptaptext {
        visibility: visible;
    }
    .form-wajib {
        color:rgb(255, 0, 0) !important;
    }
    i {
        color: #ffffff !important;
    }
</style>

<div class="page-content">
    <section id="form-pelaporan-gratifikasi" class="o-hidden" style="padding-top: 30px; padding-bottom: 30px">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-12 col-md-12" style="padding: 0px">
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
                                                                <div class="btns">
                                                                    <label>NIK</label><label class="form-wajib">*</label>
                                                                    <a class="btnCek" aria-label="Settings" onclick="check_nik(pgd_pelapor_nik.value)">
                                                                        <i class="fa fa-search" aria-hidden="true"></i>
                                                                    </a>
                                                                </div>
                                                                <input required type="number" class="form-control" maxlength="20" id="pgd_pelapor_nik" name="pgd_pelapor_nik" value="{{ old('pgd_pelapor_nik') ? old('pgd_pelapor_nik') : '' }}">
                                                                <div class="help-block with-errors" ></div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label>Nama Lengkap</label><label class="form-wajib">*</label>
                                                                <input required type="text" class="form-control" maxlength="100" id="pgd_pelapor_nama" name="pgd_pelapor_nama" value="{{ old('pgd_pelapor_nama') ? old('pgd_pelapor_nama') : '' }}">
                                                                <div class="help-block with-errors" ></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-3">
                                                            <div class="form-group">
                                                                <label>Tempat Lahir</label><label class="form-wajib">*</label>
                                                                <input required type="text" class="form-control" maxlength="100" id="pgd_pelapor_tempat_lahir" name="pgd_pelapor_tempat_lahir" value="{{ old('pgd_pelapor_tempat_lahir') ? old('pgd_pelapor_tempat_lahir') : '' }}">
                                                                <div class="help-block with-errors" ></div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <div class="form-group">
                                                                <label>Tanggal Lahir</label><label class="form-wajib">*</label>
                                                                <input required type="date" class="form-control" id="pgd_pelapor_tanggal_lahir" name="pgd_pelapor_tanggal_lahir" value="{{ old('pgd_pelapor_tanggal_lahir') ? old('pgd_pelapor_tanggal_lahir') : '' }}">
                                                                <div class="help-block with-errors" ></div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <div class="form-group">
                                                                <label>No. Telepon (WA)</label><label class="form-wajib">*</label>
                                                                <input required type="number" class="form-control" maxlength="30" placeholder="Awali dengan 62, contoh: 6289659320110"
                                                                       id="pgd_pelapor_telepon" name="pgd_pelapor_telepon" value="{{ old('pgd_pelapor_telepon') ? old('pgd_pelapor_telepon') : '' }}">
                                                                <div class="help-block with-errors" ></div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <div class="form-group">
                                                                <label>Email</label><label class="form-wajib">*</label>
                                                                <input required type="email" class="form-control" maxlength="100" id="pgd_pelapor_email" name="pgd_pelapor_email" value="{{ old('pgd_pelapor_email') ? old('pgd_pelapor_email') : '' }}">
                                                                <div class="help-block with-errors" ></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <label>Alamat Rumah</label><label class="form-wajib">*</label>
                                                                    <input required type="text" class="form-control" maxlength="200" id="pgd_pelapor_alamat_rumah" name="pgd_pelapor_alamat_rumah" value="{{ old('pgd_pelapor_alamat_rumah') ? old('pgd_pelapor_alamat_rumah') : '' }}">
                                                                <div class="help-block with-errors" ></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label>Jabatan/Pangkat/Golongan</label><label class="form-wajib">*</label>
                                                                <input required type="text" class="form-control" maxlength="100" id="pgd_pelapor_jabatan" name="pgd_pelapor_jabatan" value="{{ old('pgd_pelapor_jabatan') ? old('pgd_pelapor_jabatan') : '' }}">
                                                                <div class="help-block with-errors" ></div>
                                                            </div>
                                                        </div>
                                                        <!--<div class="col-md-3">
                                                            <div class="form-group">
                                                                <label>Unit Kerja</label><label class="form-wajib">*</label>
                                                                <input required type="text" class="form-control" maxlength="200" id="pgd_pelapor_unit_kerja" name="pgd_pelapor_unit_kerja" value="{{ old('pgd_pelapor_unit_kerja') ? old('pgd_pelapor_unit_kerja') : '' }}">
                                                                <div class="help-block with-errors" ></div>
                                                            </div>
                                                        </div>-->
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label>Instansi/Perangkat Daerah</label><label class="form-wajib">*</label>
                                                                <input required type="text" class="form-control" maxlength="200" id="pgd_pelapor_instansi" name="pgd_pelapor_instansi" value="{{ old('pgd_pelapor_instansi') ? old('pgd_pelapor_instansi') : '' }}">
                                                                <div class="help-block with-errors" ></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!--<div class="row">
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <label>Alamat Kantor</label><label class="form-wajib">*</label>
                                                                    <input type="text" class="form-control" maxlength="200" id="pgd_pelapor_alamat_kantor" name="pgd_pelapor_alamat_kantor" value="{{ old('pgd_pelapor_alamat_kantor') ? old('pgd_pelapor_alamat_kantor') : '' }}">
                                                                <div class="help-block with-errors" ></div>
                                                            </div>
                                                        </div>
                                                    </div>-->
                                                    <div class="row">
                                                        <div class="col-md-3">
                                                            <div class="form-group">
                                                                <div class="btns tooltiptap">
                                                                    <label>Rahasiakan Laporan</label><label class="form-wajib">*</label>
                                                                    <a class="btnInfo" aria-label="Info">
                                                                        <i class="fa fa-info" aria-hidden="true"></i>
                                                                    </a>
                                                                    <span class="tooltiptaptext">Pilih "Ya" jika ingin pelaporan dirahasiakan dari UPG Pembantu / Perangkat Daerah</span>
                                                                </div>
                                                                <table>
                                                                    <tbody>
                                                                        <tr>
                                                                            <td><input required type="radio" id="pgd_pelapor_rahasia_1" name="pgd_pelapor_rahasia" value="Y"></td>
                                                                            <td>Ya</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td><input required type="radio" id="pgd_pelapor_rahasia_2" name="pgd_pelapor_rahasia" value="T"></td>
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
                                                    <b>Data Pemberi Gratifikasi</b>
                                                </div>

                                                <div class="card-body">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <div class="btns tooltiptap">
                                                                    <label>Nama Lengkap</label><label class="form-wajib">*</label>
                                                                    <a class="btnInfo" aria-label="Info">
                                                                        <i class="fa fa-info" aria-hidden="true"></i>
                                                                    </a>
                                                                    <span class="tooltiptaptext">Diisi nama pemberi gratifikasi (perorangan/kelompok/badan usaha)</span>
                                                                </div>
                                                                <input required type="text" class="form-control" maxlength="100" id="pgd_pemberi_nama" name="pgd_pemberi_nama" value="{{ old('pgd_pemberi_nama') ? old('pgd_pemberi_nama') : '' }}">
                                                                <div class="help-block with-errors" ></div>
                                                            </div>
                                                        </div>
                                                        <!--<div class="col-md-3">
                                                            <div class="form-group">
                                                                <label>No. Telepon (WA)</label>
                                                                <input type="number" class="form-control" maxlength="30" id="pgd_pemberi_telepon" name="pgd_pemberi_telepon" value="{{ old('pgd_pemberi_telepon') ? old('pgd_pemberi_telepon') : '' }}">
                                                                <div class="help-block with-errors" ></div>
                                                            </div>
                                                        </div>-->
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label>Instansi Pemberi</label><label class="form-wajib">*</label>
                                                                <input required type="text" class="form-control" maxlength="200" id="pgd_pemberi_instansi" name="pgd_pemberi_instansi" value="{{ old('pgd_pemberi_instansi') ? old('pgd_pemberi_instansi') : '' }}">
                                                                <div class="help-block with-errors" ></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <label>Alamat Lengkap Pemberi</label><label class="form-wajib">*</label>
                                                                    <input required type="text" class="form-control" maxlength="200" id="pgd_pemberi_alamat" name="pgd_pemberi_alamat" value="{{ old('pgd_pemberi_alamat') ? old('pgd_pemberi_alamat') : '' }}">
                                                                <div class="help-block with-errors" ></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <label>Hubungan Gratifikasi</label><label class="form-wajib">*</label>
                                                                <table>
                                                                    <tbody>
                                                                    @foreach ($items_data_hubungan as $item_data_hubungan)
                                                                        <tr>
                                                                            <td valign=top><input required type="radio" onclick="javascript:pgd_pemberi_hubungan_check();" 
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
                                                                <input required type="text" class="form-control radio_lainnya" maxlength="200" id="pgd_pemberi_hubungan_lainnya_input" name="pgd_pemberi_hubungan_lainnya_input" 
                                                                        value="{{ old('pgd_pemberi_hubungan_lainnya_input') ? old('pgd_pemberi_hubungan_lainnya_input') : '' }}"
                                                                        placeholder="Wajib diisi jika memilih lainnya"
                                                                        style="display:none">
                                                                <div class="help-block with-errors" ></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <div class="btns tooltiptap">
                                                                    <label>Alasan Pemberian</label><label class="form-wajib">*</label>
                                                                    <a class="btnInfo" aria-label="Info">
                                                                        <i class="fa fa-info" aria-hidden="true"></i>
                                                                    </a>
                                                                    <span class="tooltiptaptext">Diisi alasan pemberian seperti ucapan terima kasih/ penghargaan/ kebiasaan/dugaan lainnya</span>
                                                                </div>
                                                                <input required type="text" class="form-control" maxlength="1000" id="pgd_alasan" name="pgd_alasan" value="{{ old('pgd_alasan') ? old('pgd_alasan') : '' }}">
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
                                                                <label>Jenis Laporan</label><label class="form-wajib">*</label>
                                                                <table>
                                                                    <tbody>
                                                                        <tr>
                                                                            <td><input required type="radio" id="pgd_jenis_laporan_1" name="pgd_jenis_laporan" value="Penerimaan"></td>
                                                                            <td>Penerimaan</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td><input required type="radio" id="pgd_jenis_laporan_2" name="pgd_jenis_laporan" value="Penolakan"></td>
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
                                                                <label>Peristiwa Terkait Gratifikasi</label><label class="form-wajib">*</label>
                                                                <table>
                                                                    <tbody>
                                                                    @foreach ($items_data_peristiwa as $item_data_peristiwa)
                                                                        <tr>
                                                                            <td valign=top><input required type="radio" onclick="javascript:pgd_peristiwa_check();" 
                                                                                id="pgd_peristiwa_{{ $item_data_hubungan->id }}" name="pgd_peristiwa" 
                                                                                value="{{ $item_data_peristiwa->pgl_nilai }}" {{ ($item_data_peristiwa->pgl_nilai === old('pgd_peristiwa')) ? 'checked' : '' }}></td>
                                                                            <td valign=top>{{ $item_data_peristiwa->pgl_nilai }}</td>
                                                                        </tr>
                                                                    @endforeach
                                                                    <tr>
                                                                        <td valign=top><input required type="radio" onclick="javascript:pgd_peristiwa_check();" id="pgd_peristiwa_lainnya" name="pgd_peristiwa" value="Lainnya"></td>
                                                                        <td valign=top>Lainnya</td>
                                                                    </tr>
                                                                    </tbody>
                                                                </table>
                                                                <input required type="text" class="form-control radio_lainnya" maxlength="200" id="pgd_peristiwa_lainnya_input" name="pgd_peristiwa_lainnya_input" 
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
                                                                <label>Lokasi Objek Gratifikasi</label><label class="form-wajib">*</label>
                                                                <table>
                                                                    <tbody>
                                                                    @foreach ($items_data_lokasi_objek as $item_data_lokasi_objek)
                                                                        <tr>
                                                                            <td required valign=top><input required type="radio" onclick="javascript:pgd_lokasi_objek_check();"
                                                                                id="pgd_lokasi_objek_{{ $item_data_lokasi_objek->id }}" name="pgd_lokasi_objek" 
                                                                                value="{{ $item_data_lokasi_objek->pgl_nilai }}" {{ ($item_data_lokasi_objek->pgl_nilai === old('item_data_lokasi_objek')) ? 'checked' : '' }}></td>
                                                                            <td valign=top>{{ $item_data_lokasi_objek->pgl_nilai }}</td>
                                                                        </tr>
                                                                    @endforeach
                                                                    <tr>
                                                                        <td valign=top><input required type="radio" onclick="javascript:pgd_lokasi_objek_check();" id="pgd_lokasi_objek_lainnya" name="pgd_lokasi_objek" value="Lainnya"></td>
                                                                        <td valign=top>Lainnya</td>
                                                                    </tr>
                                                                    </tbody>
                                                                </table>
                                                                <input required type="text" class="form-control radio_lainnya" maxlength="200" id="pgd_lokasi_objek_lainnya_input" name="pgd_lokasi_objek_lainnya_input" 
                                                                       value="{{ old('pgd_lokasi_objek_lainnya_input') ? old('pgd_lokasi_objek_lainnya_input') : '' }}"
                                                                       placeholder="Wajib diisi jika memilih lainnya"
                                                                       style="display:none">
                                                                <div class="help-block with-errors" ></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <label>Jenis Objek Gratifikasi</label><label class="form-wajib">*</label>
                                                                <table>
                                                                    <tbody>
                                                                    @foreach ($items_data_jenis_objek as $item_data_jenis_objek)
                                                                        <tr>
                                                                            <td valign=top><input required type="radio" onclick="javascript:pgd_jenis_objek_check();"
                                                                                id="pgd_jenis_objek_{{ $item_data_jenis_objek->id }}" name="pgd_jenis_objek" 
                                                                                value="{{ $item_data_jenis_objek->pgl_nilai }}" {{ ($item_data_jenis_objek->pgl_nilai === old('item_data_jenis_objek')) ? 'checked' : '' }}></td>
                                                                            <td valign=top>{{ $item_data_jenis_objek->pgl_nilai }}</td>
                                                                        </tr>
                                                                    @endforeach
                                                                    <tr>
                                                                        <td valign=top><input required type="radio" onclick="javascript:pgd_jenis_objek_check();" id="pgd_jenis_objek_lainnya" name="pgd_jenis_objek" value="Lainnya"></td>
                                                                        <td valign=top>Barang Lainnya</td>
                                                                    </tr>
                                                                    </tbody>
                                                                </table>
                                                                <input required type="text" class="form-control radio_lainnya" maxlength="200" id="pgd_jenis_objek_lainnya_input" name="pgd_jenis_objek_lainnya_input" 
                                                                       value="{{ old('pgd_jenis_objek_lainnya_input') ? old('pgd_jenis_objek_lainnya_input') : '' }}"
                                                                       placeholder="Wajib diisi jika memilih barang lainnya"
                                                                       style="display:none">
                                                                <div class="help-block with-errors" ></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <div class="btns tooltiptap">
                                                                    <label>Uraian Objek Gratifikasi</label><label class="form-wajib">*</label>
                                                                    <a class="btnInfo" aria-label="Info">
                                                                        <i class="fa fa-info" aria-hidden="true"></i>
                                                                    </a>
                                                                    <span class="tooltiptaptext">Deskripsi detail objek Gratifikasi seperti jenis, bentuk, merek, tahun pembuatan, warna, dll</span>
                                                                </div>
                                                                <input required required type="text" class="form-control" maxlength="1000" id="pgd_uraian" name="pgd_uraian" value="{{ old('pgd_uraian') ? old('pgd_uraian') : '' }}">
                                                                <div class="help-block with-errors" ></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <div class="btns tooltiptap">
                                                                    <label>Nominal/Taksiran Nilai</label><label class="form-wajib">*</label><em style="font-size: 8pt">&nbsp (isikan angka tanpa pemisah ribuan)</em>
                                                                    <a class="btnInfo" aria-label="Info">
                                                                        <i class="fa fa-info" aria-hidden="true"></i>
                                                                    </a>
                                                                    <span class="tooltiptaptext">Diisi nominal uang / taksiran nilai gratifikasi yang diterima (harga brosur/ internet/ perkiraan sendiri sesuai harga pasar)</span>
                                                                </div>
                                                                <input required type="number" class="form-control" maxlength="20" id="pgd_nominal" name="pgd_nominal" value="{{ old('pgd_nominal') ? old('pgd_nominal') : '' }}">
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
                                                    <b>Kronologi Penerimaan Gratifikasi</b>
                                                </div>

                                                <div class="card-body">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label>Tanggal Penerimaan Gratifikasi<label class="form-wajib">*</label></label>
                                                                    <input required type="date" class="form-control" id="pgd_tanggal" name="pgd_tanggal" value="{{ old('pgd_tanggal') ? old('pgd_tanggal') : '' }}">
                                                                <div class="help-block with-errors" ></div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <div class="btns tooltiptap">
                                                                    <label>Tanggal Lapor ke UPG Pembantu
                                                                    <a class="btnInfo" aria-label="Info">
                                                                        <i class="fa fa-info" aria-hidden="true"></i>
                                                                    </a></label>
                                                                    <span class="tooltiptaptext">Jika gratifikasi dilaporankan melalui UPG Pembantu, namun tidak ada tindak lanjut</span>
                                                                </div>
                                                                <input required type="date" class="form-control" id="pgd_tanggal_lapor_upgp" name="pgd_tanggal_lapor_upgp" value="{{ old('pgd_tanggal_lapor_upgp') ? old('pgd_tanggal_lapor_upgp') : '' }}">
                                                                <div class="help-block with-errors" ></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <label>Tempat Penerimaan Gratifikasi<label class="form-wajib">*</label></label>
                                                                    <input required type="text" class="form-control" maxlength="200" id="pgd_tempat" name="pgd_tempat" value="{{ old('pgd_tempat') ? old('pgd_tempat') : '' }}">
                                                                <div class="help-block with-errors" ></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <div class="btns tooltiptap">
                                                                    <label>Kronologi Pemberian</label><label class="form-wajib">*</label>
                                                                    <a class="btnInfo" aria-label="Info">
                                                                        <i class="fa fa-info" aria-hidden="true"></i>
                                                                    </a>
                                                                    <span class="tooltiptaptext">Diisi dengan uraian kronologis penerimaan (kapan, dimana, dengan siapa, bagaimana, dan dalam rangka apa)</span>
                                                                </div>
                                                                <input required type="text" class="form-control" maxlength="1000" id="pgd_kronologi" name="pgd_kronologi" value="{{ old('pgd_kronologi') ? old('pgd_kronologi') : '' }}">
                                                                <div class="help-block with-errors" ></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label>Dokumen Pendukung</label><label class="form-wajib">*</label><em style="font-size: 8pt">&nbsp (tipe file: jpg,png,jpeg,pdf, max: 10mb)</em></br>
                                                                <input required type="file" id="pgd_lampiran" name="pgd_lampiran" accept="image/* , application/pdf">
                                                                <div class="help-block with-errors"></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!--<div class="row">
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <div class="btns tooltiptap">
                                                                    <label>Catatan Tambahan</label>
                                                                    <a class="btnInfo" aria-label="Info">
                                                                        <i class="fa fa-info" aria-hidden="true"></i>
                                                                    </a>
                                                                    <span class="tooltiptaptext">Diisi dengan catatan khusus seperti permintaan permintaan perlindungan kerahasiaan dan identitas pelapor dan hal khusus lain yang perlu disampaikan</span>
                                                                </div>
                                                                <input type="text" class="form-control" maxlength="1000" id="pgd_catatan" name="pgd_catatan" value="{{ old('pgd_catatan') ? old('pgd_catatan') : '' }}">
                                                                <div class="help-block with-errors" ></div>
                                                            </div>
                                                        </div>
                                                    </div>-->
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="card grey-bg mb-4">
                                                <div class="card-header" style="background-color:#007bff2e">
                                                    <b>Permohonan Kompensasi Objek Gratifikasi</b>
                                                </div>

                                                <div class="card-body">
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <label>Permohonan Kompensasi</label><label class="form-wajib">*</label>
                                                                <p>Pelapor Gratifikasi bersedia untuk menyerahkan uang sebagai kompensasi atas barang yang diterimanya 
                                                                   sebesar nilai yang tercantum dalam Surat Keputusan Pimpinan KPK. Permintaan kompensasi yang telah 
                                                                   mendapatkan persetujuan KPK tidak dapat dibatalkan sepihak oleh pelapor.</p>
                                                                <table>
                                                                    <tbody>
                                                                        <tr>
                                                                            <td><input required type="radio" id="pgd_kompensasi_1" name="pgd_kompensasi" value="Y"></td>
                                                                            <td>Ya</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td><input required type="radio" id="pgd_kompensasi_2" name="pgd_kompensasi" value="T"></td>
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
                                        <!--<div class="col-md-12">
                                            <div class="card grey-bg mb-4">
                                                <div class="card-header" style="background-color:#007bff2e">
                                                    <b>Penyaluran Objek Gratifikasi</b>
                                                </div>

                                                <div class="card-body">
                                                    <div class="row">
                                                        <div class="col-md-3">
                                                            <div class="form-group">
                                                                <label>Tanggal Penyaluran</label>
                                                                    <input type="date" class="form-control" id="pgd_penyaluran_tanggal" name="pgd_penyaluran_tanggal" value="{{ old('pgd_penyaluran_tanggal') ? old('pgd_penyaluran_tanggal') : '' }}">
                                                                <div class="help-block with-errors" ></div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-9">
                                                            <div class="form-group">
                                                                <div class="btns tooltiptap">
                                                                    <label>Nama Penerima</label>
                                                                    <a class="btnInfo" aria-label="Info">
                                                                        <i class="fa fa-info" aria-hidden="true"></i>
                                                                    </a>
                                                                    <span class="tooltiptaptext">Diisi nama perorarangan atau yayasan penerima penyaluran makanan/minuman yang mudah rusak</span>
                                                                </div>
                                                                <input type="text" class="form-control" maxlength="200" id="pgd_penyaluran_nama" name="pgd_penyaluran_nama" value="{{ old('pgd_penyaluran_nama') ? old('pgd_penyaluran_nama') : '' }}">
                                                                <div class="help-block with-errors" ></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <div class="btns tooltiptap">
                                                                    <label>Alamat Penyaluran</label>
                                                                    <a class="btnInfo" aria-label="Info">
                                                                        <i class="fa fa-info" aria-hidden="true"></i>
                                                                    </a>
                                                                    <span class="tooltiptaptext">Diisi alamat perorarangan atau yayasan penerima penyaluran makanan/minuman yang mudah rusak, jika diberikan di tempat umum, maka disebutkan alamat tempat umum tersebut</span>
                                                                </div>
                                                                <input type="text" class="form-control" maxlength="200" id="pgd_penyaluran_alamat" name="pgd_penyaluran_alamat" value="{{ old('pgd_penyaluran_alamat') ? old('pgd_penyaluran_alamat') : '' }}">
                                                                <div class="help-block with-errors" ></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label>Dokumentasi</label><em style="font-size: 8pt">&nbsp (tipe file: jpg,png,jpeg,pdf, max: 10mb)</em></br>
                                                                <input type="file" id="pgd_penyaluran_lampiran" name="pgd_penyaluran_lampiran" accept="image/* , application/pdf">
                                                                <div class="help-block with-errors" ></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>-->
                                        <div class="col-md-12">
                                            <div class="card grey-bg mb-4 px-3">
                                                <div class="card-body">
                                                    <div class="row">
                                                        <p class="mb-0">Berikan centang pada pernyataan dibawah ini!</p><label class="form-wajib">*</label>
                                                        <table>
                                                            <tbody>
                                                                <tr>
                                                                    <td valign=top><input required type="checkbox" id="pgd_pernyataan" name="pgd_pernyataan" value="Setuju" onclick="checkPernyataanIsi()"></td>
                                                                    <td valign=top>Laporan Gratifikasi ini saya sampaikan dengan sebenar-benarnya. Saya bersedia menyerahkan objek Gratifikasi kepada KPK
                                                                                   untuk proses analisa lebih lanjut atau status kepemilikan Gratifikasi telah ditetapkan menjadi milik Negara. Apabila ada yang
                                                                                   sengaja tidak saya laporkan atau saya laporkan kepada UPG Pembantu/UPG/KPK secara tidak benar, maka saya bersedia
                                                                                   mempertanggungjawabkannya secara hukum sesuai dengan peraturan perundang-undangan yang berlaku dan bersedia
                                                                                   memberikan keterangan lebih lanjut.</td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12" style="padding-top:20px">
                                            <button disabled type="submit" class="btn btn-theme" id="btnSubmitIsi" title="Berikan centang pada pernyataan diatas!"><span>Kirim</span></button>
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

    <script src="{{ asset('bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js') }}"></script>
    <script>
        var items_pgd = {!! $items_pgd !!}
        var hasil_pencarian = false;
        
        function check_nik(temp_pgd_pelapor_nik) {
            items_pgd.forEach((item_pgd) => {
                if (item_pgd.pgd_pelapor_nik === temp_pgd_pelapor_nik) {
                    hasil_pencarian = true;

                    document.getElementById('pgd_pelapor_nama').value = item_pgd.pgd_pelapor_nama;
                    document.getElementById('pgd_pelapor_tempat_lahir').value = item_pgd.pgd_pelapor_tempat_lahir;
                    document.getElementById('pgd_pelapor_tanggal_lahir').value = item_pgd.pgd_pelapor_tanggal_lahir;
                    document.getElementById('pgd_pelapor_telepon').value = item_pgd.pgd_pelapor_telepon;
                    document.getElementById('pgd_pelapor_email').value = item_pgd.pgd_pelapor_email;
                    document.getElementById('pgd_pelapor_alamat_rumah').value = item_pgd.pgd_pelapor_alamat_rumah;
                    document.getElementById('pgd_pelapor_jabatan').value = item_pgd.pgd_pelapor_jabatan;
                    document.getElementById('pgd_pelapor_instansi').value = item_pgd.pgd_pelapor_instansi;

                    if (item_pgd.pgd_pelapor_rahasia === 'Y') {
                        document.getElementById('pgd_pelapor_rahasia_1').checked = true;
                        document.getElementById('pgd_pelapor_rahasia_2').checked = false;
                    } else {
                        document.getElementById('pgd_pelapor_rahasia_1').checked = false;
                        document.getElementById('pgd_pelapor_rahasia_2').checked = true;
                    }
                    return;
                }
            });

            if (hasil_pencarian === true) {
                hasil_pencarian = false;
                //alert('ADA');
            } else {
                //alert('NIK '.temp_pgd_pelapor_nik.' belum pernah melaporkan gratifikasi');
                document.getElementById('pgd_pelapor_nama').value = "";
                document.getElementById('pgd_pelapor_tempat_lahir').value = "";
                document.getElementById('pgd_pelapor_tanggal_lahir').value = "";
                document.getElementById('pgd_pelapor_telepon').value = "";
                document.getElementById('pgd_pelapor_email').value = "";
                document.getElementById('pgd_pelapor_alamat_rumah').value = "";
                document.getElementById('pgd_pelapor_jabatan').value = "";
                document.getElementById('pgd_pelapor_instansi').value = "";
            }
           //alert('ADA');
        }

        var options = {
                filebrowserImageBrowseUrl: '/laravel-filemanager?type=Images',
                filebrowserImageUploadUrl: '/laravel-filemanager/upload?type=Images&_token=',
                filebrowserBrowseUrl: '/laravel-filemanager?type=Files',
                filebrowserUploadUrl: '/laravel-filemanager/upload?type=Files&_token='
            };

        function pgd_pemberi_hubungan_check() {
            if (document.getElementById('pgd_pemberi_hubungan_lainnya').checked) {
                document.getElementById('pgd_pemberi_hubungan_lainnya_input').style.display = 'block';
            } else {
                document.getElementById('pgd_pemberi_hubungan_lainnya_input').style.display = 'none';
                if (document.getElementById('pgd_pemberi_hubungan_lainnya_input').value === "") {
                    document.getElementById('pgd_pemberi_hubungan_lainnya_input').value = "-";
                }
            }
        }

        function pgd_peristiwa_check() {
            if (document.getElementById('pgd_peristiwa_lainnya').checked) {
                document.getElementById('pgd_peristiwa_lainnya_input').style.display = 'block';
            } else {
                document.getElementById('pgd_peristiwa_lainnya_input').style.display = 'none';
                if (document.getElementById('pgd_peristiwa_lainnya_input').value === "") {
                    document.getElementById('pgd_peristiwa_lainnya_input').value = "-";
                }
            }
        }

        function pgd_lokasi_objek_check() {
            if (document.getElementById('pgd_lokasi_objek_lainnya').checked) {
                document.getElementById('pgd_lokasi_objek_lainnya_input').style.display = 'block';
            } else {
                document.getElementById('pgd_lokasi_objek_lainnya_input').style.display = 'none';
                if (document.getElementById('pgd_lokasi_objek_lainnya_input').value === "") {
                    document.getElementById('pgd_lokasi_objek_lainnya_input').value = "-";
                }
            }
        }

        function pgd_jenis_objek_check() {
            if (document.getElementById('pgd_jenis_objek_lainnya').checked) {
                document.getElementById('pgd_jenis_objek_lainnya_input').style.display = 'block';
            } else {
                document.getElementById('pgd_jenis_objek_lainnya_input').style.display = 'none';
                if (document.getElementById('pgd_jenis_objek_lainnya_input').value === "") {
                    document.getElementById('pgd_jenis_objek_lainnya_input').value = "-";
                }
            }
        }

        function checkPernyataanIsi(){
            if(document.getElementById('pgd_pernyataan').checked){
                document.getElementById('btnSubmitIsi').disabled = false;
                document.getElementById('btnSubmitIsi').title = "";
            }else{
                document.getElementById('btnSubmitIsi').disabled = true;
                document.getElementById('btnSubmitIsi').title = "Berikan centang pada pernyataan diatas!";

            }
        }
    </script>
</div>

