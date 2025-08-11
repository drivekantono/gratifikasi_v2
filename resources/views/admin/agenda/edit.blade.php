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
                    <h3 class="box-title">Edit Agenda</h3>
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
                <form role="form" action="{{ route('admin.agenda.update', $items->id) }}" method="POST" enctype="multipart/form-data">
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
                            <label for="title">Title</label>
                            <input type="text" class="form-control" id="title" name="title" placeholder="Enter Title" value=" {{ old('title') ? old('title') : $items->title }}">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Deskripsi</label>
                            <textarea id="deskripsi" type="deskripsi" class="form-control" row="10" name="deskripsi">{{ old('deskripsi') ? old('deskripsi') : $items->deskripsi }}</textarea>
                        </div>
                        <!-- Date -->
                        <div class="form-group">
                            <label>Tanggal Mulai:</label>
                            <div class="input-group date">
                                <div class="input-group-addon">
                                    <i class="fa fa-calendar"></i>
                                </div>
                                <input type="text" class="form-control pull-right" id="tanggal" name="tanggal" value="{{ old('tanggal') ? old('tanggal') : $items->tanggal }}">
                            </div>
                            <!-- /.input group -->
                        </div>
                        <div class="form-group">
                            <label>Tanggal Selesai:</label>
                            <div class="input-group date">
                                <div class="input-group-addon">
                                    <i class="fa fa-calendar"></i>
                                </div>
                                <input type="text" class="form-control pull-right" id="tanggal_selesai" name="tanggal_selesai" value="{{ old('tanggal_selesai') ? old('tanggal_selesai') : $items->tanggal_selesai }}">
                            </div>
                            <!-- /.input group -->
                        </div>
                        <!-- /.form group -->
                        <div class="form-group">
                            <label for="exampleInputEmail1">Lokasi</label>
                            <input type="text" class="form-control" id="lokasi" name="lokasi" placeholder="Enter Lokasi" value="{{ old('lokasi') ? old('lokasi') : $items->lokasi }}">
                        </div>
                        <div class="form-group">
                            <label for="image">Image</label>
                            <input type="file" id="image" name="image">
                            {{--  <img src="{{ asset('uploads/agenda/'.$items->images) }}" style="max-width:50px;max-height:50px;float:left;">  --}}
                            <p class="help-block">Masukan Gambar</p>
                        </div>
                        <td>
                            {{-- <input type="checkbox" name="hapus" value="1">Hapus Gambar Sebelumnya<br> --}}
                            <img src="{{ asset('/uploads/agenda/'.$items->images) }}" height="30%" width="30%" />
                        </td>
                    </div>
                    <!-- /.box-body -->


                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary">Edit</button>
                        <a href="{{ route('admin.agenda.index') }}" class="btn btn-success">Cancel</a>

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