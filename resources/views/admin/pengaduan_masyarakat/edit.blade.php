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
                    <h3 class="box-title">Edit Data Rencana Kerja</h3>
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
                <form role="form" action="{{ route('admin.pengaduan_masyarakat.update', $item->id) }}" method="POST" enctype="multipart/form-data">
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
                       
                        <div class="form-group">
                            <label for="tata_cara">Tata Cara & Mekanisme</label>
                            <input type="file" id="tata_cara" name="tata_cara">
                            <p class="help-block">Masukan File</p>
                            <a href="{{ asset('/uploads/pengaduan_masyarakat/'.$item->tata_cara) }}">{{ $item->tata_cara }}</a>
                        </div> 
                        <div class="form-group">
                            <label for="formulir">Formulir</label>
                            <input type="file" id="formulir" name="formulir">
                            <p class="help-block">Masukan File</p>
                            <a href="{{ asset('/uploads/pengaduan_masyarakat/'.$item->formulir) }}">{{ $item->formulir }}</a>
                        </div> 
                        <div class="form-group">
                            <label for="rekapitulasi">Rekapitulasi</label>
                            <input type="file" id="rekapitulasi" name="rekapitulasi">
                            <p class="help-block">Masukan File</p>
                            <a href="{{ asset('/uploads/pengaduan_masyarakat/'.$item->rekapitulasi) }}">{{ $item->rekapitulasi }}</a>
                        </div> 
                                               
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary">Edit</button>
                        <a href="{{ route('admin.pengaduan_masyarakat.index') }}" class="btn btn-success">Cancel</a>

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
    })
</script>

@endsection