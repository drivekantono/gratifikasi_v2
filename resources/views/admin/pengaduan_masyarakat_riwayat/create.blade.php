@extends('template.default')

@section('css')

<link rel="stylesheet" href="{{ asset('bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css') }}">
@endsection

@section('content')
<section class="content">
    <div class="row">
        <!-- left column -->
        <div class="col-md-12">
            <!-- general form elements -->
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title"><strong>Tambah Progress Pengaduan Masyarakat | {{ $items_pmd->id }} | {{ $items_pmd->pmd_no }} </strong></h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <form name="formDumas" role="form" action="{{ route('admin.pengaduan_masyarakat_riwayat.store') }}" method="POST" enctype="multipart/form-data">
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

                        <!-- info pengaduan masyarakat -->
                        <fieldset>
                            <legend><h4>Informasi Pengaduan Masyarakat</h4></legend>
                            <div class="row" style="padding-left: 15px; padding-right: 15px;">
                                <div class="col-md-1">
                                    <strong>Sumber</strong>
                                </div>
                                <div class="form-group col-md-3">
                                    <input type="text" class="form-control" id="pmd_sumber" name="pmd_sumber" disabled value="{{ $items_pmd->pmd_sumber }}" style="background-color: #e4f5ff;">
                                </div>
                                <div class="col-md-1">
                                    <strong>Sifat</strong>
                                </div>
                                <div class="form-group col-md-3">
                                    <input type="text" class="form-control" id="pmd_sifat" name="pmd_sifat" disabled value="{{ $items_pmd->pmd_sifat }}" style="background-color: #e4f5ff;">
                                </div>
                            </div>
                            <div class="row" style="padding-left: 15px; padding-right: 15px;">
                                <div class="col-md-1">
                                    <strong>No Surat</strong>
                                </div>
                                <div class="form-group col-md-3">
                                    <input type="text" class="form-control" id="pmd_no" name="pmd_no" disabled value="{{ $items_pmd->pmd_no }}" style="background-color: #e4f5ff;">
                                </div>
                                <div class="col-md-1">
                                    <strong>Tanggal Surat</strong>
                                </div>
                                <div class="form-group col-md-3">
                                    <input type="text" class="form-control" id="pmd_tanggal" name="pmd_tanggal" disabled value="{{ $items_pmd->pmd_tanggal }}" style="background-color: #e4f5ff;">
                                </div>
                                <div class="col-md-1">
                                    <strong>Tanggal Terima</strong>
                                </div>
                                <div class="form-group col-md-3">
                                    <input type="text" class="form-control" id="pmd_tanggal_terima" name="pmd_tanggal_terima" disabled value="{{ $items_pmd->pmd_tanggal_terima }}" style="background-color: #e4f5ff;">
                                </div>
                            </div>
                            <div class="row" style="padding-left: 15px; padding-right: 15px;">
                                <div class="col-md-1">
                                    <strong>Judul</strong>
                                </div>
                                <div class="form-group col-md-11">
                                    <input type="text" class="form-control" id="pmd_judul" name="pmd_judul" disabled value="{{ $items_pmd->pmd_judul }}" style="background-color: #e4f5ff;">
                                </div>
                            </div>
                            <div class="row" style="padding-left: 15px; padding-right: 15px;">
                                <div class="col-md-1">
                                    <strong>Isi</strong>
                                </div>
                                <div class="form-group col-md-11">
                                    <textarea type="text" class="form-control" id="pmd_isi" name="pmd_isi" rows="3" disabled rows="3" style="background-color: #e4f5ff;">{{ $items_pmd->pmd_isi }}</textarea>
                                </div>
                            </div>
                        </fieldset>

                        <!-- tambah progress -->
                        <fieldset>
                            <legend><h4>Tambah Progress Pengaduan Masyarakat</h4></legend>
                            <input type="hidden" class="form-control" id="pmd_id" name="pmd_id" value="{{ $items_pmd->id }}" style="background-color: #e4f5ff;">
                            <input type="hidden" class="form-control" id="pmd_no" name="pmd_no" value="{{ $items_pmd->pmd_no }}" style="background-color: #e4f5ff;">
                            
                            <div class="row" style="padding-left: 15px; padding-right: 15px;">
                                <div class="col-md-1">
                                    <strong>Nomor</strong>
                                </div>
                                <div class="form-group col-md-3">
                                    <input type="text" class="form-control" id="pmr_no" name="pmr_no" value="{{ $gets_pmr_no }}" readonly style="background-color: #e4f5ff;">
                                </div>
                                <div class="col-md-1">
                                    <strong>Tanggal</strong>
                                </div>
                                <div class="form-group col-md-3">
                                    <div class="input-group date">
                                        <div class="input-group-addon">
                                            <i class="fa fa-calendar"></i>
                                        </div>
                                        <input type="text" class="form-control pull-right" id="pmr_tanggal" name="pmr_tanggal" value="{{ old('pmr_tanggal') ? old('pmr_tanggal') : $gets_pmr_tanggal }}" autocomplete="off"> 
                                    </div>
                                </div>
                            </div>
                            <div class="row" style="padding-left: 15px; padding-right: 15px;">
                                <div class="col-md-1">
                                    <strong>Kategori</strong>
                                </div>
                                <div class="form-group col-md-3">
                                    <select id="pmr_kategori" name="pmr_kategori" class="form-control" onChange="pmr_kategori_change()">
                                        <option value=""></option>
                                        @foreach ($items_proses_kategori as $items_proses_kategori)
                                            <option value="{{ $items_proses_kategori->pml_nilai }}" {{ ($items_proses_kategori->pml_nilai === old('pmr_kategori')) ? 'selected' : '' }} >{{ $items_proses_kategori->pml_nilai }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-1">
                                    <strong>Diproses Oleh</strong>
                                </div>
                                <div class="form-group col-md-3">
                                    <select id="pmr_oleh" name="pmr_oleh" class="form-control" onChange="pmr_oleh_change()">
                                        <option value=""></option>
                                        @foreach ($items_proses_oleh as $item_proses_oleh)
                                            <option value="{{ $item_proses_oleh->pml_nilai }}" {{ ($item_proses_oleh->pml_nilai === old('pmr_oleh')) ? 'selected' : '' }} >{{ $item_proses_oleh->pml_nilai }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="row" style="padding-left: 15px; padding-right: 15px;">
                                <div class="col-md-1">
                                    <strong>Judul Proses</strong>
                                </div>
                                <div class="form-group col-md-3">
                                    <input type="text" class="form-control" id="pmr_judul" name="pmr_judul" value="{{ old('pmr_judul') ? old('pmr_judul') : '' }}">
                                </div>
                                <div class="col-md-1">
                                    <strong>Isi Proses</strong>
                                </div>
                                <div class="form-group col-md-7">
                                    <input type="text" class="form-control" id="pmr_isi" name="pmr_isi" value="{{ old('pmr_isi') ? old('pmr_isi') : '' }}">
                                </div>
                            </div>
                            <div class="row" style="padding-left: 15px; padding-right: 15px;">
                                <div class="col-md-1">
                                    <strong>Lampiran</strong>
                                </div>
                                <div class="form-group col-md-3">
                                    <input type="file" id="pmr_lampiran" name="pmr_lampiran">
                                </div>
                            </div>
                            <div class="row" style="padding-left: 15px; padding-right: 15px;">
                                <div class="col-md-1">
                                    <strong>Proses Selanjutnya</strong>
                                </div>
                                <div class="form-group col-md-3">
                                    <select id="pmr_selanjutnya" name="pmr_selanjutnya" class="form-control" onChange="pmr_selanjutnya_change()">
                                        <option value=""></option>
                                        @foreach ($items_proses_selanjutnya as $item_proses_selanjutnya)
                                            <option value="{{ $item_proses_selanjutnya->pml_nilai }}" {{ ($item_proses_selanjutnya->pml_nilai === old('pmr_selanjutnya')) ? 'selected' : '' }} >{{ $item_proses_selanjutnya->pml_nilai }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </fieldset>
                    </div>
                    <!-- /.box-body -->


                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary" title="submit penambahan progress">Submit</button>
                        <a href="{{ route('admin.pengaduan_masyarakat_data.show', $items_pmd->id) }}" class="btn btn-warning" title="kembali">Cancel</a>

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
        $('#pmr_tanggal').datepicker({
            autoclose: true,
            format: 'yyyy-mm-dd',
        })
    })

</script>

@endsection