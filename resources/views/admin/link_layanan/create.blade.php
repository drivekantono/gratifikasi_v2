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
                    <h3 class="box-title">Tambah Link Layanan</h3>
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
                <form role="form" action="{{ route('admin.link_layanan.store') }}" method="POST" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="box-body">
                        <div class="form-group">
                            <label for="title">Nama Aplikasi</label>
                            <input type="text" class="form-control" id="title" name="title" placeholder="Enter Title" value=" {{ old('title') }}">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Deskripsi</label>
                            <textarea id="deskripsi" type="deskripsi" class="form-control" row="10" name="deskripsi"></textarea>
                        </div>
                        
                        <div class="form-group">
                            <label for="exampleInputEmail1">Link</label>
                            <input type="text" class="form-control" id="link" name="link" placeholder="Enter link" value=" {{ old('link') }}">
                        </div>
                        <div class="form-group">
                            <label for="image">Logo Aplikasi</label>
                            <input type="file" id="image" name="image">
                            <p class="help-block">Masukan Gambar</p>
                        </div>
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
                        <a href="{{ route('admin.link_layanan.index') }}" class="btn btn-success">Cancel</a>
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
</script>

@endsection