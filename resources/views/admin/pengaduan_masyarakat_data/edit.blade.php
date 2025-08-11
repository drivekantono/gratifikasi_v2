@extends('template.default')

@section('css')

<link rel="stylesheet" href="{{ asset('bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css') }}">
<style>
    #res_pmd_no ul {
      list-style-type: none;
      padding: 0;
      margin: 0;
      border: 1px solid #ccc;
    }
    #res_pmd_no ul li {
      padding: 5px 0;
      padding-left: 10px;
    }
    #res_pmd_no ul li:hover {
      background: #eee;
    }

    #res_pmd_terlapor_nama ul {
      list-style-type: none;
      padding: 0;
      margin: 0;
      border: 1px solid #ccc;
    }
    #res_pmd_terlapor_nama ul li {
      padding: 5px 0;
      padding-left: 10px;
    }
    #res_pmd_terlapor_nama ul li:hover {
      background: #eee;
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
                    <h3 class="box-title"><strong>Update Data Pengaduan Masyarakat | {{ $items->id }} | {{ $items->pmd_no }}</strong></h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <form name="formDumas" role="form" action="{{ route('admin.pengaduan_masyarakat_data.update', $items->id) }}" method="POST" enctype="multipart/form-data">
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

                        <!-- info general surat pengaduan -->
                        <fieldset>
                            <legend><h4>Informasi Surat Pengaduan</h4></legend>
                            <div class="row" style="padding-left: 15px; padding-right: 15px;">
                                <div class="col-md-1">
                                    <strong>Sumber</strong>
                                </div>
                                <div class="form-group col-md-3">
                                    <select id="pmd_sumber" name="pmd_sumber" class="form-control" onChange="pmd_sumber_change()">
                                        <option value=""></option>
                                        @foreach ($items_aduan_sumber as $item_aduan_sumber)
                                            <option value="{{ $item_aduan_sumber->pml_nilai }}" {{ ($item_aduan_sumber->pml_nilai === $items->pmd_sumber) ? 'selected' : '' }} >{{ $item_aduan_sumber->pml_nilai }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-1">
                                    <strong>Sifat</strong>
                                </div>
                                <div class="form-group col-md-3">
                                    <select id="pmd_sifat" name="pmd_sifat" class="form-control" onChange="pmd_sifat_change()">
                                        <option value=""></option>
                                        @foreach ($items_aduan_sifat as $item_aduan_sifat)
                                            <option value="{{ $item_aduan_sifat->pml_nilai }}" {{ ($item_aduan_sifat->pml_nilai === $items->pmd_sifat) ? 'selected' : '' }} >{{ $item_aduan_sifat->pml_nilai }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="row" style="padding-left: 15px; padding-right: 15px;">
                                <div class="col-md-1">
                                    <strong>No Surat</strong>
                                </div>
                                <div class="form-group col-md-3 autocomplete">
                                    <input type="text" class="form-control" name="pmd_no" id="pmd_no" onKeyUp="showResults(this.value, 'No Surat')" value="{{ old('pmd_no') ? old('pmd_no') : $items->pmd_no }}" autocomplete="off">
                                    <div id="res_pmd_no"></div>
                                </div>
                                <div class="col-md-1">
                                    <strong>Tanggal Surat</strong>
                                </div>
                                <div class="form-group col-md-3">
                                    <div class="input-group date">
                                        <div class="input-group-addon">
                                            <i class="fa fa-calendar"></i>
                                        </div>
                                        <input type="text" class="form-control pull-right" id="pmd_tanggal" name="pmd_tanggal" value="{{ old('pmd_tanggal') ? old('pmd_tanggal') : $items->pmd_tanggal }}" autocomplete="off" readonly style="background-color: white;"> 
                                    </div>
                                </div>
                                <div class="col-md-1">
                                    <strong>Tanggal Terima</strong>
                                </div>
                                <div class="form-group col-md-3">
                                    <div class="input-group date">
                                        <div class="input-group-addon">
                                            <i class="fa fa-calendar"></i>
                                        </div>
                                        <input type="text" class="form-control pull-right" id="pmd_tanggal_terima" name="pmd_tanggal_terima" value="{{ old('pmd_tanggal_terima') ? old('pmd_tanggal_terima') : $items->pmd_tanggal_terima }}" autocomplete="off" readonly style="background-color: white;">
                                    </div>
                                </div>
                            </div>
                        </fieldset>

                        <!-- info pelapor -->
                        <fieldset>
                            <legend><h4>Identitas Pelapor</h4></legend>
                            <div class="row" style="padding-left: 15px; padding-right: 15px;">
                                <div class="col-md-1">
                                    <strong>Nama</strong>
                                </div>
                                <div class="form-group col-md-3">
                                    <input type="text" class="form-control" id="pmd_pelapor_nama" name="pmd_pelapor_nama" value="{{ old('pmd_pelapor_nama') ? old('pmd_pelapor_nama') : $items->pmd_pelapor_nama }}">
                                </div>
                                <div class="col-md-1">
                                    <strong>Kartu Identitas</strong>
                                </div>
                                <div class="form-group col-md-3">
                                    <div class="input-group date">
                                        <div class="input-group-addon">
                                            @if ($items->pmd_lampiran_identitas === null || $items->pmd_lampiran_identitas === '')
                                                <i class="fa fa-file"></i>
                                            @else
                                                <a target="_blank" href="{{asset('uploads/pengaduan_masyarakat/'.$items->pmd_lampiran_identitas)}}" onclick="pmd_lampiran_identitas_click()"><i class="fa fa-file" title="lihat file"></i></a>
                                            @endif
                                        </div>
                                        <input type="text" class="form-control" id="pmd_lampiran_identitas_old" name="pmd_lampiran_identitas_old" value="{{ $items->pmd_lampiran_identitas }}" disabled style="background-color: #e4f5ff;">
                                    </div>
                                </div>
                                <div class="form-group col-md-3">
                                    <input type="file" id="pmd_lampiran_identitas" name="pmd_lampiran_identitas">
                                </div>
                            </div>
                            <div class="row" style="padding-left: 15px; padding-right: 15px;">
                                <div class="col-md-1">
                                    <strong>Pekerjaan</strong>
                                </div>
                                <div class="form-group col-md-3">
                                    <input type="text" class="form-control" id="pmd_pelapor_pekerjaan" name="pmd_pelapor_pekerjaan" value="{{ old('pmd_pelapor_pekerjaan') ? old('pmd_pelapor_pekerjaan') : $items->pmd_pelapor_pekerjaan }}">
                                </div>
                                <div class="col-md-1">
                                    <strong>No Telepon</strong>
                                </div>
                                <div class="form-group col-md-3">
                                    <input type="text" class="form-control" id="pmd_pelapor_telepon" name="pmd_pelapor_telepon" value="{{ old('pmd_pelapor_telepon') ? old('pmd_pelapor_telepon') : $items->pmd_pelapor_telepon }}">
                                </div>
                                <div class="col-md-1">
                                    <strong>Email</strong>
                                </div>
                                <div class="form-group col-md-3">
                                    <input type="text" class="form-control" id="pmd_pelapor_email" name="pmd_pelapor_email" value="{{ old('pmd_pelapor_email') ? old('pmd_pelapor_email') : $items->pmd_pelapor_email }}">
                                </div>
                            </div>
                            <div class="row" style="padding-left: 15px; padding-right: 15px;">
                                <div class="col-md-1">
                                    <strong>Alamat</strong>
                                </div>
                                <div class="form-group col-md-11">
                                    <textarea type="text" class="form-control" id="pmd_pelapor_alamat" name="pmd_pelapor_alamat" rows="3">{{ old('pmd_pelapor_alamat') ? old('pmd_pelapor_alamat') : $items->pmd_pelapor_alamat }}</textarea>
                                </div>
                            </div>
                        </fieldset>

                        <!-- info terlapor -->
                        <fieldset>
                            <legend><h4>Identitas Terlapor</h4></legend>
                            <div class="row" style="padding-left: 15px; padding-right: 15px;">
                                <div class="col-md-1">
                                    <strong>Nama</strong>
                                </div>
                                <div class="form-group col-md-3 autocomplete">
                                    <!-- <input type="text" class="form-control" id="pmd_terlapor_nama" name="pmd_terlapor_nama" onKeyUp="checkTerlaporNama(this.value)" value="{{ old('pmd_terlapor_nama') ? old('pmd_terlapor_nama') : $items->pmd_terlapor_nama }}"> -->
                                    <div class="input-group">
                                        <input type="text" class="form-control" id="pmd_terlapor_nama" name="pmd_terlapor_nama" onKeyUp="showResults(this.value, 'Nama Terlapor')" value="{{ old('pmd_terlapor_nama') ? old('pmd_terlapor_nama') : $items->pmd_terlapor_nama }}" autocomplete="off">
                                        <div class="input-group-addon">
                                            <a href="#" onclick="check_pmd_terlapor_nama_click(pmd_terlapor_nama.value)"><i class="fa fa-info" title="cek nama terlapor"></i>&nbsp Check</a>
                                        </div>
                                    </div>
                                    <div id="res_pmd_terlapor_nama"></div>
                                </div>
                            </div>
                            <div class="row" style="padding-left: 15px; padding-right: 15px;">
                                <div class="col-md-1">
                                    <strong>Pekerjaan</strong>
                                </div>
                                <div class="form-group col-md-3">
                                    <input type="text" class="form-control" id="pmd_terlapor_pekerjaan" name="pmd_terlapor_pekerjaan" value="{{ old('pmd_terlapor_pekerjaan') ? old('pmd_terlapor_pekerjaan') : $items->pmd_terlapor_pekerjaan }}">
                                </div>
                                <div class="col-md-1">
                                    <strong>Instansi</strong>
                                </div>
                                <div class="form-group col-md-3">
                                    <input type="text" class="form-control" id="pmd_terlapor_instansi" name="pmd_terlapor_instansi" value="{{ old('pmd_terlapor_instansi') ? old('pmd_terlapor_instansi') : $items->pmd_terlapor_instansi }}">
                                </div>
                            </div>
                            <div class="row" style="padding-left: 15px; padding-right: 15px;">
                                <div class="col-md-1">
                                    <strong>Alamat</strong>
                                </div>
                                <div class="form-group col-md-11">
                                    <textarea type="text" class="form-control" id="pmd_terlapor_alamat" name="pmd_terlapor_alamat" rows="3">{{ old('pmd_terlapor_alamat') ? old('pmd_terlapor_alamat') : $items->pmd_terlapor_alamat }}</textarea>
                                </div>
                            </div>
                        </fieldset>

                        <!-- info pengaduan -->
                        <fieldset>
                            <legend><h4>Informasi Pengaduan</h4></legend>
                            <div class="row" style="padding-left: 15px; padding-right: 15px;">
                                <div class="col-md-1">
                                    <strong>Kategori</strong>
                                </div>
                                <div class="form-group col-md-3">
                                    <select id="pmd_kategori" name="pmd_kategori" class="form-control">
                                        <option value=""></option>
                                        @foreach ($items_aduan_kategori as $item_aduan_kategori)
                                            <option value="{{ $item_aduan_kategori->pml_nilai }}" {{ ($item_aduan_kategori->pml_nilai === $items->pmd_kategori) ? 'selected' : '' }} >{{ $item_aduan_kategori->pml_nilai }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="row" style="padding-left: 15px; padding-right: 15px;">
                                <div class="col-md-1">
                                    <strong>Judul</strong>
                                </div>
                                <div class="form-group col-md-11">
                                    <input type="text" class="form-control" id="pmd_judul" name="pmd_judul" value="{{ old('pmd_judul') ? old('pmd_judul') : $items->pmd_judul }}">
                                </div>
                            </div>
                            <div class="row" style="padding-left: 15px; padding-right: 15px;">
                                <div class="col-md-1">
                                    <strong>Isi</strong>
                                </div>
                                <div class="form-group col-md-11">
                                    <textarea type="text" class="form-control" id="pmd_isi" name="pmd_isi" rows="3">{{ old('pmd_isi') ? old('pmd_isi') : $items->pmd_isi }}</textarea>
                                </div>
                            </div>
                            <div class="row" style="padding-left: 15px; padding-right: 15px;">
                                <div class="col-md-1">
                                    <strong>Harapan</strong>
                                </div>
                                <div class="form-group col-md-11">
                                    <textarea type="text" class="form-control" id="pmd_harapan" name="pmd_harapan" rows="3">{{ old('pmd_harapan') ? old('pmd_harapan') : $items->pmd_harapan }}</textarea>
                                </div>
                            </div>
                            <div class="row" style="padding-left: 15px; padding-right: 15px;">
                                <div class="col-md-1">
                                    <strong>Catatan</strong>
                                </div>
                                <div class="form-group col-md-11">
                                    <textarea type="text" class="form-control" id="pmd_catatan" name="pmd_catatan" rows="3">{{ old('pmd_catatan') ? old('pmd_catatan') : $items->pmd_catatan }}</textarea>
                                </div>
                            </div>
                            <div class="row" style="padding-left: 15px; padding-right: 15px;">
                                <div class="col-md-1">
                                    <strong>Lampiran 1</strong>
                                </div>
                                <div class="form-group col-md-3">
                                    <div class="input-group date">
                                        <div class="input-group-addon">
                                            @if ($items->pmd_lampiran_01 === null || $items->pmd_lampiran_01 === '')
                                                <i class="fa fa-file"></i>
                                            @else
                                                <a target="_blank" href="{{asset('uploads/pengaduan_masyarakat/'.$items->pmd_lampiran_01)}}" onclick="pmd_lampiran_01_click()"><i class="fa fa-file" title="lihat file"></i></a>
                                            @endif
                                        </div>
                                        <input type="text" class="form-control" id="pmd_lampiran_01" name="pmd_lampiran_01" value="{{ $items->pmd_lampiran_01 }}" disabled style="background-color: #e4f5ff;">
                                    </div>
                                </div>
                                <div class="form-group col-md-3">
                                    <input type="file" id="pmd_lampiran_01" name="pmd_lampiran_01">
                                </div>
                            </div>
                            <div class="row" style="padding-left: 15px; padding-right: 15px;">
                                <div class="col-md-1">
                                    <strong>Lampiran 2</strong>
                                </div>
                                <div class="form-group col-md-3">
                                    <div class="input-group date">
                                        <div class="input-group-addon">
                                            @if ($items->pmd_lampiran_02 === null || $items->pmd_lampiran_02 === '')
                                                <i class="fa fa-file"></i>
                                            @else
                                                <a target="_blank" href="{{asset('uploads/pengaduan_masyarakat/'.$items->pmd_lampiran_02)}}" onclick="pmd_lampiran_02_click()"><i class="fa fa-file" title="lihat file"></i></a>
                                            @endif
                                        </div>
                                        <input type="text" class="form-control" id="pmd_lampiran_02" name="pmd_lampiran_02" value="{{ $items->pmd_lampiran_02 }}" disabled style="background-color: #e4f5ff;">
                                    </div>
                                </div>
                                <div class="form-group col-md-3">
                                    <input type="file" id="pmd_lampiran_02" name="pmd_lampiran_02">
                                </div>
                            </div>
                            <div class="row" style="padding-left: 15px; padding-right: 15px;">
                                <div class="col-md-1">
                                    <strong>Status</strong>
                                </div>
                                <div class="form-group col-md-3">
                                    <input type="text" class="form-control" id="pmd_status" name="pmd_status" disabled value="{{ $items->pmd_status }}" style="background-color: #e4f5ff;">
                                </div>
                            </div>
                        </fieldset>
                    </div>
                    <!-- /.box-body -->


                    <div class="box-footer">
                        <button type="submit" class="btn btn-success" title="submit perubahan data">Update</button>
                        <a href="{{ route('admin.pengaduan_masyarakat_data.show', $items->id) }}" class="btn btn-warning" title="kembali">Cancel</a>
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
        $('#pmd_tanggal').datepicker({
            autoclose: true,
            format: 'yyyy-mm-dd',
        })
        $('#pmd_tanggal_terima').datepicker({
            autoclose: true,
            format: 'yyyy-mm-dd',
        })
    })

    function pmd_sumber_change() {
        var idxSumber = document.formDumas.pmd_sumber.selectedIndex;
        var textSumber = document.formDumas.pmd_sumber.options[idxSumber].text;

        if (textSumber === "WBS"){
            document.getElementById("pmd_sifat").value = 'Rahasia';
        }else{
            document.getElementById("pmd_sifat").value = 'Umum';
        }
    }

    function check_pmd_terlapor_nama_click(temp_pmd_terlapor_nama) {
        var url_php = '{{ route('admin.pengaduan_masyarakat_data.popup', 'id') }}';
        var res = url_php.split('id');
        var url = res[0] + temp_pmd_terlapor_nama + res[1];

        var params = 'scrollbars=no,resizable=no,status=no,location=no,toolbar=no,menubar=no,width=0,height=0,left=-1000,top=-1000';

        open(url, 'pmd', params);
    }

    var items_pmd_filter = {!! $items_pmd_filter !!}
    var search_pmd_no = []
    var search_pmd_terlapor_nama = []

    items_pmd_filter.forEach((item_pmd_filter) => {
        if (item_pmd_filter.pmd_no !== null) {
            search_pmd_no.push(item_pmd_filter.pmd_no);
        }

        if (item_pmd_filter.pmd_terlapor_nama !== null) {
            search_pmd_terlapor_nama.push(item_pmd_filter.pmd_terlapor_nama);
        }
    });

    function autocompleteMatch(input, type) {
        if (input == '') {
            return [];
        }
        var reg = new RegExp(input)

        if (type === 'No Surat') {
            return search_pmd_no.filter(function(term) {
                if (term.toUpperCase().match(reg)) {
                    return term;
                }
            });
        } else if (type === 'Nama Terlapor'){
            return search_pmd_terlapor_nama.filter(function(term) {
                if (term.toUpperCase().match(reg)) {
                    return term;
                }
            });
        }
    }

    function showResults(val, type) {
        if (type === 'No Surat') {
            res = document.getElementById("res_pmd_no");
        } else if (type === 'Nama Terlapor'){
            res = document.getElementById("res_pmd_terlapor_nama");
        }

        res.innerHTML = '';
        let list = '';
        let terms = autocompleteMatch(val.toUpperCase(), type);
        for (i=0; i<terms.length; i++) {
            list += '<li>' + terms[i] + '</li>';
        }
        res.innerHTML = '<ul>' + list + '</ul>';
    }

    function checkTerlaporNama(val) {
        var hasilFilter = items_pmd_filter.filter(function(objData) {
            if (objData.pmd_terlapor_nama !== null) {
                return objData.pmd_terlapor_nama.toUpperCase().indexOf(val.toUpperCase()) >= 0
            }
        })

        if (hasilFilter.length <= 0 || val === '') {
            document.getElementById("temp_pmd_terlapor_nama").innerHTML = "Aman";
        } else {
            document.getElementById("temp_pmd_terlapor_nama").innerHTML = val;
        }
        console.log(hasilFilter);
    }
</script>

@endsection