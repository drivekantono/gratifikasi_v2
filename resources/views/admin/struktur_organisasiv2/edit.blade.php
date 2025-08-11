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
                    <h3 class="box-title">Edit Data</h3>
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
                <form role="form" action="{{ route('admin.struktur_organisasi2.update', $items->id) }}" method="POST" enctype="multipart/form-data">
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
                            <label>Perent</label>
                            <select name="parent_id" class="form-control">
                                @if (!$items->count())
                                    <option disabled="" selected>There's nothing data.</option>
                                @else

                                    @if($items->parent_id == 0)
                                        <option value="{{ $items->parent_id }}" selected="" disabled="">HEADER</option>
                                    @else
                                        <option selected="" value="{{ $items->parent_id }}">{{ $selected->id }}:{{ $selected->title }}</option>
                                        @foreach($datas as $item)
                                            <option value="{{ $item->id }}">{{ $item->id }}:{{ $item->title }}</option>
                                        @endforeach
                                    @endif
                                @endif
                            </select>
                        </div>
                        <div class="form-group">
                            <tr>
                                <td><label for="tags">Tags Assistant</label></td>
                                <td>
                                    <select name="tags" class="form-control">
                                        <option value="{{$items->tags === "assistant" ? "assistant" : "bukan_assistant"}}" disabled="" selected>{{$items->tags === "assistant" ? "Benar" : "Bukan"}}</option>
                                        <option value="assistant">Benar</option>
                                        <option value="bukan_assistant">Bukan</option>
                                    </select>
                                </td>
                            </tr>
                        </div>
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" class="form-control" id="title" name="title" placeholder="Enter title" value=" {{ old('title') ? old('title') : $items->title }}">
                        </div>  
                        <div class="form-group">
                            <label for="title">Nama</label>
                            <input type="text" class="form-control" id="nama" name="nama" placeholder="Enter nama" value=" {{ old('nama') ? old('nama') : $items->nama }}">
                        </div>  
                        <div class="form-group">
                            <label for="image">Image</label>
                            <input type="file" id="image" name="image">
                            <p class="help-block">Masukan Gambar</p>
                        </div>
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary">Edit</button>
                        <a href="{{ route('admin.struktur_organisasi2.index') }}" class="btn btn-success">Cancel</a>

                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection
