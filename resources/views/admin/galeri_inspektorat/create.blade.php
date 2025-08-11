@extends('template.default')

@section('content')
<section class="content">
    <div class="row">
        <!-- left column -->
        <div class="col-md-12">
            <!-- general form elements -->
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Tambah Galeri Inspektorat</h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <form role="form" action="{{ route('admin.galeri_inspektorat.store') }}" method="POST" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="box-body">
                        <div class="form-group">
                            <label for="name">name</label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="Enter Name" value=" {{ old('name') }}">
                        </div>
                        <div class="form-group">
                            <label for="tahun">tahun</label>
                            <input type="text" class="form-control" id="tahun" name="tahun" placeholder="Enter tahun" value=" {{ old('tahun') }}">
                        </div>
                        <div class="form-group">
                            <label for="image">Image</label>
                            <input type="file" id="image" name="image">
                            <p class="help-block">Masukan Gambar</p>
                        </div>
                        
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
                        <a href="{{ route('admin.galeri_inspektorat.index') }}" class="btn btn-success">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection

