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
                        <h2 class="title">UNGGAH FORMULIR GRATIFIKASI</h2> 
                    </div>

                    <form role="form" action="{{ route('frontend.pelaporan_gratifikasi_form.store') }}" method="POST" enctype="multipart/form-data">
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

                        <input type="hidden" class="form-control pull-right" id="pgf_sumber" name="pgf_sumber" value="Website">
                        <input type="hidden" class="form-control pull-right" id="pgf_tanggal_lapor" name="pgf_tanggal_lapor" value="{{ date('Y-m-d') }}">

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
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <label>Nama Lengkap</label><label class="form-wajib">*</label>
                                                                <input required type="text" class="form-control" maxlength="100" id="pgf_pelapor_nama" name="pgf_pelapor_nama" value="{{ old('pgf_pelapor_nama') ? old('pgf_pelapor_nama') : '' }}">
                                                                <div class="help-block with-errors" ></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <!--
                                                        <div class="col-md-3">
                                                            <div class="form-group">
                                                                <label>Jabatan</label><label class="form-wajib">*</label>
                                                                <input required type="text" class="form-control" maxlength="100" id="pgf_pelapor_jabatan" name="pgf_pelapor_jabatan" value="{{ old('pgf_pelapor_jabatan') ? old('pgf_pelapor_jabatan') : '' }}">
                                                                <div class="help-block with-errors" ></div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <div class="form-group">
                                                                <label>Unit Kerja</label><label class="form-wajib">*</label>
                                                                <input required type="text" class="form-control" maxlength="200" id="pgf_pelapor_unit_kerja" name="pgf_pelapor_unit_kerja" value="{{ old('pgf_pelapor_unit_kerja') ? old('pgf_pelapor_unit_kerja') : '' }}">
                                                                <div class="help-block with-errors" ></div>
                                                            </div>
                                                        </div>
                                                        -->
                                                        <div class="col-md-3">
                                                            <div class="form-group">
                                                                <label>No. Telepon (WA)</label><label class="form-wajib">*</label>
                                                                <input required type="number" class="form-control" maxlength="30" id="pgf_pelapor_telepon" name="pgf_pelapor_telepon" value="{{ old('pgf_pelapor_telepon') ? old('pgf_pelapor_telepon') : '' }}">
                                                                <div class="help-block with-errors" ></div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <div class="form-group">
                                                                <label>Email</label><label class="form-wajib">*</label>
                                                                <input required type="email" class="form-control" maxlength="100" id="pgf_pelapor_email" name="pgf_pelapor_email" value="{{ old('pgf_pelapor_email') ? old('pgf_pelapor_email') : '' }}">
                                                                <div class="help-block with-errors" ></div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label>Instansi</label><label class="form-wajib">*</label>
                                                                <input required type="text" class="form-control" maxlength="200" id="pgf_pelapor_instansi" name="pgf_pelapor_instansi" value="{{ old('pgf_pelapor_instansi') ? old('pgf_pelapor_instansi') : '' }}">
                                                                <div class="help-block with-errors" ></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!--<div class="row">
                                                        <div class="col-md-3">
                                                            <div class="form-group">
                                                                <label>Rahasiakan Laporan</label><label class="form-wajib">*</label>
                                                                <table>
                                                                    <tbody>
                                                                        <tr>
                                                                            <td><input type="radio" id="pgf_pelapor_rahasia_1" name="pgf_pelapor_rahasia" value="Y"></td>
                                                                            <td>Ya</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td><input type="radio" id="pgf_pelapor_rahasia_2" name="pgf_pelapor_rahasia" value="T"></td>
                                                                            <td>Tidak</td>
                                                                        </tr>
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                        </div>
                                                    </div>-->
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="card grey-bg mb-4">
                                                <div class="card-header" style="background-color:#007bff2e">
                                                    <b>Data Penerimaan / Penolakan Gratifikasi</b>
                                                </div>

                                                <div class="card-body">
                                                    <!--<div class="row">
                                                        <div class="col-md-3">
                                                            <div class="form-group">
                                                                <label>Kategori Laporan</label><label class="form-wajib">*</label>
                                                                <table>
                                                                    <tbody>
                                                                        <tr>
                                                                            <td><input type="radio" id="pgf_kategori_1" name="pgf_kategori" value="Penerimaan"></td>
                                                                            <td>Penerimaan</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td><input type="radio" id="pgf_kategori_2" name="pgf_kategori" value="Penolakan"></td>
                                                                            <td>Penolakan</td>
                                                                        </tr>
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                        </div>
                                                    </div>-->
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <div class="btns tooltiptap">
                                                                    <label>Uraian Objek Gratifikasi</label><label class="form-wajib">*</label>
                                                                    <a class="btnInfo" aria-label="Info">
                                                                        <i class="fa fa-info" aria-hidden="true"></i>
                                                                    </a>
                                                                    <span class="tooltiptaptext">Diisi dengan jenis penerimaan seperti jenis makanan/minuman, merk, berat, jumlah, dll.</span>
                                                                </div>
                                                                <input required type="text" class="form-control" maxlength="1000" id="pgf_uraian" name="pgf_uraian" value="{{ old('pgf_uraian') ? old('pgf_uraian') : '' }}">
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
                                                                <input required type="number" class="form-control" maxlength="20" id="pgf_nominal" name="pgf_nominal" value="{{ old('pgf_nominal') ? old('pgf_nominal') : '' }}">
                                                                <div class="help-block with-errors" ></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <div class="btns tooltiptap">
                                                                    <label>Catatan Tambahan</label>
                                                                    <a class="btnInfo" aria-label="Info">
                                                                        <i class="fa fa-info" aria-hidden="true"></i>
                                                                    </a>
                                                                    <span class="tooltiptaptext">Diisi dengan catatan khusus seperti permintaan permintaan perlindungan kerahasiaan dan identitas pelapor dan hal khusus lain yang perlu disampaikan</span>
                                                                </div>
                                                                <input type="text" class="form-control" maxlength="1000" id="pgf_catatan" name="pgf_catatan" value="{{ old('pgf_catatan') ? old('pgf_catatan') : '' }}">
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
                                                    <b>Unggah Formulir Gratifikasi</b>
                                                </div>

                                                <div class="card-body">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label>Formulir Gratifikasi</label><em style="font-size: 8pt">&nbsp (tipe file: pdf, max: 20mb)</em></br>
                                                                <input type="file" id="pgf_lampiran" name="pgf_lampiran" accept="image/* , application/pdf">
                                                                <div class="help-block with-errors"></div>
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
                                                        <p class="mb-0">Berikan centang pada pernyataan dibawah ini!</p><label class="form-wajib">*</label>
                                                        <table>
                                                            <tbody>
                                                                <tr>
                                                                    <td valign=top><input type="checkbox" id="pgf_pernyataan" name="pgf_pernyataan" value="Setuju" onclick="checkPernyataanUnggah()"></td>
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
                                            <button disabled type="submit" class="btn btn-theme" id="btnSubmitUnggah" title="Berikan centang pada pernyataan diatas!"><span>Kirim</span></button>
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
        var options = {
                filebrowserImageBrowseUrl: '/laravel-filemanager?type=Images',
                filebrowserImageUploadUrl: '/laravel-filemanager/upload?type=Images&_token=',
                filebrowserBrowseUrl: '/laravel-filemanager?type=Files',
                filebrowserUploadUrl: '/laravel-filemanager/upload?type=Files&_token='
            };

        function checkPernyataanUnggah(){
            if(document.getElementById('pgf_pernyataan').checked){
                document.getElementById('btnSubmitUnggah').disabled = false;
                document.getElementById('btnSubmitUnggah').title = "";
            }else{
                document.getElementById('btnSubmitUnggah').disabled = true;
                document.getElementById('btnSubmitUnggah').title = "Berikan centang pada pernyataan diatas!";

            }
        }
    </script>
</div>

