
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
                    <h3 class="box-title">Edit Berita</h3>
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
                <form role="form" action="{{ route('admin.berita.update', $items->id) }}" method="POST" enctype="multipart/form-data">
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
                            <label for="title">Title</label>
                            <input type="text" class="form-control" id="tag" name="tag" placeholder="Enter tag" value=" {{ old('tag') ? old('tag') : $items->tag }}">
                        </div>
                            <tr>
                                <td>Kategori</td>
                                <td>:</td>
                                <td>
                                    <select name="id_kategori" class="form-control">
                                        @if (!$items->count())
                                            <option disabled="" selected>There's nothing data.</option>
                                        @else
                                            <option value="{{ $items->id }}" selected="" disabled="">{{ $items->kategoriBerita->id }} - {{ $items->kategoriBerita->kategori_berita }}</option>
                                            @foreach($kategoriberita as $item)
                                                <option value="{{ $item->id }}">{{ $item->kategori_berita }}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                </td>
                            </tr>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Deskripsi</label>
                            <textarea id="deskripsi" type="deskripsi" class="form-control" row="10" name="deskripsi">{{ old('deskripsi') ? old('deskripsi') : $items->deskripsi }}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="image">Image</label>
                            <input type="file" id="image" name="image">
                            {{--  <img src="{{ asset('uploads/berita/'.$items->images) }}" style="max-width:50px;max-height:50px;float:left;">  --}}
                            <p class="help-block">Masukan Gambar</p>
                        </div>
                        <td>
                            {{-- <input type="checkbox" name="hapus" value="1">Hapus Gambar Sebelumnya<br> --}}
                            <img src="{{ asset('/uploads/berita/'.$items->images) }}" height="30%" width="30%" />
                        </td>
                    </div>
                    <!-- /.box-body -->


                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary">Edit</button>
                        <a href="{{ route('admin.berita.index') }}" class="btn btn-success">Cancel</a>

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