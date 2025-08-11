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
                    <h3 class="box-title">Edit Data Kontak</h3>
                </div>
                @if ($message = Session::get('success'))
                <div class="alert alert-success alert-block">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                    <strong>{{ $message }}</strong>
                </div>
              <br>
              @endif
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
                <form role="form" action="{{ route('admin.contact_us.update', $items->id) }}" method="POST" enctype="multipart/form-data">
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
                            <input type="text" class="form-control" id="title" name="title" placeholder="Enter title" value=" {{ old('title') ? old('title') : $items->title }}">
                        </div>
                        <div class="form-group">
                            <label for="alamat">Alamat</label>
                            <input type="text" class="form-control" id="alamat" name="alamat" placeholder="Enter Alamat" value=" {{ old('alamat') ? old('alamat') : $items->alamat }}">
                        </div>
                        <div class="form-group">
                            <label for="tlp">Telephone</label>
                            <input type="text" class="form-control" id="tlp" name="tlp" placeholder="Enter Telephone" value=" {{ old('tlp') ? old('tlp') : $items->tlp }}">
                        </div>
                        <div class="form-group">
                            <label for="fax">Fax</label>
                            <input type="text" class="form-control" id="fax" name="fax" placeholder="Enter Telephone" value=" {{ old('fax') ? old('fax') : $items->fax }}">
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="text" class="form-control" id="email" name="email" placeholder="Enter Email" value=" {{ old('email') ? old('email') : $items->email }}">
                        </div>
                        <div class="form-group">
                            <label for="facebook">Facebook</label>
                            <input type="text" class="form-control" id="facebook" name="facebook" placeholder="Enter Link Facebook" value=" {{ old('facebook') ? old('facebook') : $items->facebook }}">
                        </div>
                        <div class="form-group">
                            <label for="twitter">Twitter</label>
                            <input type="text" class="form-control" id="twitter" name="twitter" placeholder="Enter Link Twitter" value=" {{ old('twitter') ? old('twitter') : $items->twitter }}">
                        </div>
                        <div class="form-group">
                            <label for="youtube">Youtube</label>
                            <input type="text" class="form-control" id="youtube" name="youtube" placeholder="Enter Link Youtube" value=" {{ old('youtube') ? old('youtube') : $items->youtube }}">
                        </div>
                        <div class="form-group">
                            <label for="instagram">Instagram</label>
                            <input type="text" class="form-control" id="instagram" name="instagram" placeholder="Enter Link instagram" value=" {{ old('instagram') ? old('instagram') : $items->instagram }}">
                        </div>
                        {{--  <div class="form-group">
                            <label for="image">Logo 1</label>
                            <input type="file" id="image" name="image">
                            <img src="{{ asset('uploads/galeri/'.$items->images) }}" style="max-width:50px;max-height:50px;float:left;">
                            <p class="help-block">Masukan Logo 1</p>
                        </div>
                        <div class="form-group">
                            <label for="image2">Logo 2</label>
                            <input type="file" id="image2" name="image2">
                            <img src="{{ asset('uploads/galeri/'.$items->images) }}" style="max-width:50px;max-height:50px;float:left;">
                            <p class="help-block">Masukan Logo 2</p>
                        </div>  --}}
                        <div class="form-group">
                            <label for="exampleInputEmail1">Deskripsi</label>
                            <textarea id="deskripsi" type="deskripsi" class="form-control" row="10" name="deskripsi">{{ old('deskripsi') ? old('deskripsi') : $items->deskripsi }}</textarea>
                        </div>
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary">Edit</button>
                        <a href="{{ route('admin.contact_us.index') }}" class="btn btn-success">Cancel</a>

                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection

@section('js')
<script src="{{ asset('bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js') }}"></script>

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