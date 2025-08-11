
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
                    <h3 class="box-title">Tambah Data</h3>
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
                <form role="form" action="{{ route('admin.struktur_organisasi2.store') }}" method="POST" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="box-body">
                        <div class="form-group">
                         <tr>
                            <td><label for="title">Parent</label></td>
                                <td>
                                    <select name="parent_id" class="form-control">
                                        
                                        @if (!$items->count())
                                            <option value="0" disabled="" selected>HEADER</option>
                                        @else
                                            <option value="0" disabled="" selected>HEADER</option>
                                            @foreach($items as $item)
                                                <option value="{{ $item->id }}">{{$item->title}}</option>
                                            @endforeach
                                        @endif   
                                    </select>
                                </td>
                            </tr>
                        </div>
                        <div class="form-group">
                            <tr>
                                <td><label for="tags">Tags Assistant</label></td>
                                <td>
                                    <select name="tags" class="form-control">
                                        <option disabled="" selected>Assistant</option>
                                        <option value="assistant">Benar</option>
                                        <option value="bukan_assistant">Bukan</option>
                                    </select>
                                </td>
                            </tr>
                        </div>
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" class="form-control" id="title" name="title" placeholder="Enter Title" value=" {{ old('title') }}">
                        </div>
                        <div class="form-group">
                            <label for="title">Nama</label>
                            <input type="text" class="form-control" id="nama" name="nama" placeholder="Enter nama" value=" {{ old('nama') }}">
                        </div>
                        <div class="form-group">
                            <label for="images">Image</label>
                            <input type="file" id="images" name="images">
                            <p class="help-block">Masukan Gambar</p>
                        </div>
                        
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
                        <a href="{{ route('admin.berita.index') }}" class="btn btn-success">Cancel</a>
                    </div>
                </div>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection

