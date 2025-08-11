@extends('template.default')
@section('css')
    <link rel="stylesheet" href="{{asset('bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css')}}">
    <style>
      /* ------------------------
          Featured Box
      ------------------------*/

      .featured-item {
          padding: 40px 20px;
          border-radius: 10px;
          position: relative;
          box-shadow: 0px 5px 10px rgba(0, 0, 0, 0.1);
          background-color: aliceblue;
      }

      .featured-item:hover {
          background: #ffffff;
      }
    </style>
@endsection
@section('content')
    <div class="box">
      <div class="box-header">
        <h3 class="box-title">Lookup Pengaduan Masyarakat</h3>
      </div>
      <div class="box-header"> 
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalTambahLookup" data-backdrop="static">
          <i class="fa fa-plus"></i>&nbsp Tambah Data
        </button> 
        @if ($message = Session::get('success'))
          <div class="alert alert-success alert-block" style="margin-bottom: 10px; margin-top: 10px;">
              <button type="button" class="close" data-dismiss="alert">×</button>
              <strong>{{ $message }}</strong>
          </div>
        @endif
        
        @if (count($errors) > 0)
          <div class="alert alert-danger" style="margin-bottom: 10px; margin-top: 10px;">
              <button type="button" class="close" data-dismiss="alert">×</button>
              <strong>Opps!</strong> There were something went wrong with your input.
              <ul>
                @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
                @endforeach
              </ul>
          </div>
        @endif
      </div>
      <!-- /.box-header -->
      <div class="box-body">
        @if(isMobileDevice())
            @foreach ($items as $item)
                <div class="featured-item" id="" style="padding: 20px;">
                  <div class="row">
                    <div class="col-md-12 my-2">
                      <i class="fa fa-tags mr-2"></i> {{ $item->pml_main_kategori }} - {{ $item->pml_sub_kategori }} </br>
                      <strong><i class="fa fa-tags"></i> {{ $item->pml_kategori }}</strong> </br>
                      <hr style="margin-top: 10px; margin-bottom: 10px;">
                      <table style="width: 100%;">
                        <tbody>
                          <tr>
                            <td style="width: 30%; vertical-align: top;">Nilai</td>
                            <td style="width:  5%; vertical-align: top;">:</td>
                            <td style="vertical-align: top;">{{ $item->pml_nilai }}</td>
                          </tr>
                          <tr>
                            <td style="width: 30%; vertical-align: top;">Status</td>
                            <td style="width:  5%; vertical-align: top;">:</td>
                            <td style="vertical-align: top;">{{ $item->pml_status }}</td>
                          </tr>
                          <tr>
                            <td style="width: 30%; vertical-align: top;">Catatan</td>
                            <td style="width:  5%; vertical-align: top;">:</td>
                            <td style="vertical-align: top;">{{ $item->pml_catatan }}</td>
                          </tr>
                        </tbody>
                      </table>
                      <hr style="margin-top: 10px; margin-bottom: 10px;">
                      <button title="show" id="show-item" class="btn btn-info js-submit-confirm" onclick="javascript:load_data('{{ $item->id }}')" data-toggle="modal" data-target="#modalLihatLookup" style="height: 35px; width: 35px; text-align: center; text-align: center; margin-bottom: 0px;">
                        <i class="fa fa-info"></i>
                      </button>
                      <button title="edit" id="show-item" class="btn btn-success js-submit-confirm" onclick="javascript:load_data('{{ $item->id }}')" data-toggle="modal" data-target="#modalUbahLookup" style="height: 35px; width: 35px; text-align: center; text-align: center; margin-bottom: 0px;">
                        <i class="fa fa-edit"></i>
                      </button>
                      <form action="{{ route('admin.pengaduan_masyarakat_lookup.destroy', $item->id) }}" method="GET" style="display:inline-block;">
                        <button title="Delete" class="btn btn-danger js-submit-confirm" type="submit"  style="height: 35px; width: 35px; text-align: center; text-align: center; margin-bottom: 0px;" onclick="return confirm('Apakah Anda Yakin Menghapus Data?');">
                          <i class="fa fa-trash-o"></i>
                        </button>
                      </form>
                    </div>
                  </div>
                </div>
                </br>
            @endforeach
        @else
            <table id="example1" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Main Kategori</th>
                  <th>Sub Kategori</th>
                  <th>Kategori</th>
                  <th>Nilai</th>
                  <th>Status</th>
                  <th>Catatan</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              @php
                  if (Request::get('page') && Request::get('page') > 1) {
                      $iterate = Request::get('page') - 1;
                      $no = ($perPage * $iterate) +1;
                  } else {
                      $no = 1;
                  }
              @endphp
              <tbody>
                @foreach ($items as $item)
                  <tr>
                    <td>{{ $no++ }}</td>
                    <td>{{ $item->pml_main_kategori }}</td>
                    <td>{{ $item->pml_sub_kategori }}</td>
                    <td>{{ $item->pml_kategori }}</td>
                    <td>{{ $item->pml_nilai }}</td>
                    <td>{{ $item->pml_status }}</td>
                    <td>{{ $item->pml_catatan }}</td>
                    <td>
                      <button title="show" id="show-item" class="btn btn-info js-submit-confirm" onclick="javascript:load_data('{{ $item->id }}')" data-toggle="modal" data-target="#modalLihatLookup" style="height: 35px; width: 35px; text-align: center; text-align: center; margin-bottom: 0px;">
                        <i class="fa fa-info"></i>
                      </button>
                      <button title="edit" id="show-item" class="btn btn-success js-submit-confirm" onclick="javascript:load_data('{{ $item->id }}')" data-toggle="modal" data-target="#modalUbahLookup" style="height: 35px; width: 35px; text-align: center; text-align: center; margin-bottom: 0px;">
                        <i class="fa fa-edit"></i>
                      </button>
                      <form action="{{ route('admin.pengaduan_masyarakat_lookup.destroy', $item->id) }}" method="GET" style="display:inline-block;">
                        <button title="Delete" class="btn btn-danger js-submit-confirm" type="submit"  style="height: 35px; width: 35px; text-align: center; text-align: center; margin-bottom: 0px;" onclick="return confirm('Apakah Anda Yakin Menghapus Data?');">
                          <i class="fa fa-trash-o"></i>
                        </button>
                      </form>
                    </td>
                  </tr>
                @endforeach 
              </tbody>    
            </table>
            <div class="pagination-wrapper"> {!! $items->appends(['search' => Request::get('search')])->render() !!} </div>
        @endif
      </div>
      <!-- /.box-body -->
    </div>
    <!-- /.box -->

    <!-- /.modal-dialog Tambah Lookup-->
    <div class="modal fade" id="modalTambahLookup" name="modalTambahLookup" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <!-- Modal Header -->
          <div class="modal-header">
            <h4 class="modal-title" id="myModalLabel">Tambah Lookup Pengaduan Masyarakat</h4>
            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
          </div>

          <!-- Modal body -->
          <div class="modal-body">
            <!-- form start -->
            <form name="formDumas" id="formTambah" role="form" action="{{ route('admin.pengaduan_masyarakat_lookup.store') }}" method="POST" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="box-body">
                    <!-- tambah lookup -->
                    <div class="row" style="padding-left: 0px; padding-right: 0px;">
                        <div class="col-md-4">
                            <strong>Main Kategori</strong>
                        </div>
                        <div class="form-group col-md-8">
                            <input type="text" class="form-control" id="pml_main_kategori" name="pml_main_kategori" value="{{ old('pml_main_kategori') ? old('pml_main_kategori') : '' }}">
                        </div>
                    </div>
                    <div class="row" style="padding-left: 0px; padding-right: 0px;">
                        <div class="col-md-4">
                            <strong>Sub Kategori</strong>
                        </div>
                        <div class="form-group col-md-8">
                            <input type="text" class="form-control" id="pml_sub_kategori" name="pml_sub_kategori" value="{{ old('pml_sub_kategori') ? old('pml_sub_kategori') : '' }}">
                        </div>
                    </div>
                    <div class="row" style="padding-left: 0px; padding-right: 0px;">
                        <div class="col-md-4">
                            <strong>Kategori</strong>
                        </div>
                        <div class="form-group col-md-8">
                            <input type="text" class="form-control" id="pml_kategori" name="pml_kategori" value="{{ old('pml_kategori') ? old('pml_kategori') : '' }}">
                        </div>
                    </div>
                    <div class="row" style="padding-left: 0px; padding-right: 0px;">
                        <div class="col-md-4">
                            <strong>Nilai</strong>
                        </div>
                        <div class="form-group col-md-8">
                            <input type="text" class="form-control" id="pml_nilai" name="pml_nilai" value="{{ old('pml_nilai') ? old('pml_nilai') : '' }}">
                        </div>
                    </div>
                    <div class="row" style="padding-left: 0px; padding-right: 0px;">
                        <div class="col-md-4">
                            <strong>Status</strong>
                        </div>
                        <div class="form-group col-md-8">
                            <select name="pml_status" class="form-control" onChange="disp_text()">
                                <option value="A" selected="selected">Aktif</option>
                                <option value="X">Tidak Aktif</option>
                            </select>
                        </div>
                    </div>
                    <div class="row" style="padding-left: 0px; padding-right: 0px;">
                        <div class="col-md-4">
                            <strong>Catatan</strong>
                        </div>
                        <div class="form-group col-md-8">
                            <input type="text" class="form-control" id="pml_catatan" name="pml_catatan" value="{{ old('pml_catatan') ? old('pml_catatan') : '' }}">
                        </div>
                    </div>
                </div>
                <!-- /.box-body -->

                <div class="box-footer" style="text-align: right;">
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                </div>
            </form>
          </div>
        </div>
      </div>
    </div>

    <!-- /.modal-dialog Update Lookup-->
    <div class="modal fade" id="modalUbahLookup" name="modalUbahLookup" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <!-- Modal Header -->
          <div class="modal-header">
            <h4 class="modal-title" id="myModalLabel">Ubah Lookup Pengaduan Masyarakat</h4>
            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
          </div>
          <!-- Modal body -->
          <div class="modal-body">
            <!-- form start -->
            <form name="formDumas" id="formUbah" role="form" action="/" method="POST" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="box-body">
                    <!-- ubah lookup -->
                    <div class="row" style="padding-left: 0px; padding-right: 0px;">
                        <div class="col-md-4">
                            <strong>Main Kategori</strong>
                        </div>
                        <div class="form-group col-md-8">
                            <input type="hidden" class="form-control" id="ubahId" name="ubahId">
                            <input type="text" class="form-control" id="ubahMainkategori" name="ubahMainkategori" disabled>
                        </div>
                    </div>

                    <div class="row" style="padding-left: 0px; padding-right: 0px;">
                        <div class="col-md-4">
                            <strong>Sub Kategori</strong>
                        </div>
                        <div class="form-group col-md-8">
                            <input type="text" class="form-control" id="ubahSubkategori" name="ubahSubkategori" disabled>
                        </div>
                    </div>
                    <div class="row" style="padding-left: 0px; padding-right: 0px;">
                        <div class="col-md-4">
                            <strong>Kategori</strong>
                        </div>
                        <div class="form-group col-md-8">
                            <input type="text" class="form-control" id="ubahKategori" name="ubahKategori" disabled>
                        </div>
                    </div>
                    <div class="row" style="padding-left: 0px; padding-right: 0px;">
                        <div class="col-md-4">
                            <strong>Nilai</strong>
                        </div>
                        <div class="form-group col-md-8">
                            <input type="text" class="form-control" id="ubahNilai" name="ubahNilai">
                        </div>
                    </div>
                    <div class="row" style="padding-left: 0px; padding-right: 0px;">
                        <div class="col-md-4">
                            <strong>Status</strong>
                        </div>
                        <div class="form-group col-md-8">
                            <select id="ubahStatus" name="ubahStatus" class="form-control" onChange="disp_text()">
                                <option value="A" selected="selected">Aktif</option>
                                <option value="X">Tidak Aktif</option>
                            </select>
                        </div>
                    </div>
                    <div class="row" style="padding-left: 0px; padding-right: 0px;">
                        <div class="col-md-4">
                            <strong>Catatan</strong>
                        </div>
                        <div class="form-group col-md-8">
                            <input type="text" class="form-control" id="ubahCatatan" name="ubahCatatan" value="">
                        </div>
                    </div>
                </div>
                <!-- /.box-body -->

                <div class="box-footer" style="text-align: right;">
                    <button type="submit" class="btn btn-primary">Update</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                </div>
            </form>
          </div>
        </div>
      </div>
    </div>

    <!-- /.modal-dialog Lihat Lookup-->
    <div class="modal fade" id="modalLihatLookup" name="modalLihatLookup" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <!-- Modal Header -->
          <div class="modal-header">
            <h4 class="modal-title" id="myModalLabel">Lookup Pengaduan Masyarakat</h4>
            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
          </div>
          <!-- Modal body -->
          <div class="modal-body">
            <!-- form start -->
            <form name="formDumas" id="formLihat" role="form" action="/" method="POST" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="box-body">
                    <!-- ubah lookup -->
                    <div class="row" style="padding-left: 0px; padding-right: 0px;">
                        <div class="col-md-4">
                            <strong>Main Kategori</strong>
                        </div>
                        <div class="form-group col-md-8">
                            <input type="text" class="form-control" id="lihatMainkategori" name="lihatMainkategori" disabled style="background-color: #e4f5ff;">
                        </div>
                    </div>

                    <div class="row" style="padding-left: 0px; padding-right: 0px;">
                        <div class="col-md-4">
                            <strong>Sub Kategori</strong>
                        </div>
                        <div class="form-group col-md-8">
                            <input type="text" class="form-control" id="lihatSubkategori" name="lihatSubkategori" disabled style="background-color: #e4f5ff;">
                        </div>
                    </div>
                    <div class="row" style="padding-left: 0px; padding-right: 0px;">
                        <div class="col-md-4">
                            <strong>Kategori</strong>
                        </div>
                        <div class="form-group col-md-8">
                            <input type="text" class="form-control" id="lihatKategori" name="lihatKategori" disabled style="background-color: #e4f5ff;">
                        </div>
                    </div>
                    <div class="row" style="padding-left: 0px; padding-right: 0px;">
                        <div class="col-md-4">
                            <strong>Nilai</strong>
                        </div>
                        <div class="form-group col-md-8">
                            <input type="text" class="form-control" id="lihatNilai" name="lihatNilai" disabled style="background-color: #e4f5ff;">
                        </div>
                    </div>
                    <div class="row" style="padding-left: 0px; padding-right: 0px;">
                        <div class="col-md-4">
                            <strong>Status</strong>
                        </div>
                        <div class="form-group col-md-8">
                          <input type="text" class="form-control" id="lihatStatus" name="lihatStatus" disabled style="background-color: #e4f5ff;">
                        </div>
                    </div>
                    <div class="row" style="padding-left: 0px; padding-right: 0px;">
                        <div class="col-md-4">
                            <strong>Catatan</strong>
                        </div>
                        <div class="form-group col-md-8">
                            <input type="text" class="form-control" id="lihatCatatan" name="lihatCatatan" disabled style="background-color: #e4f5ff;">
                        </div>
                    </div>
                </div>
                <!-- /.box-body -->

                <div class="box-footer" style="text-align: right;">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                </div>
            </form>
          </div>
        </div>
      </div>
    </div>

    <!-- Function PHP -->
    <?php
      function isMobileDevice(){
        /*Detect mobile device*/
        
        $ismobile = 0;
        $container = $_SERVER['HTTP_USER_AGENT'];
        
        /*List of mobile devices*/
        $useragents = array('Blazer', 'Palm', 'Handspring', 'Nokia', 'Kyocera', 'Samsung', 'Motorola', 'Smartphone',
                            'Windows CE', 'Blackberry', 'WAP', 'SonyEricsson', 'PlayStation Portable', 'LG', 'MMP',
                            'OPWV', 'Symbian', 'EPOC', 'iPhone', 'iPod', 'iPad', 'Android', 'iOS'
        );
        
        foreach($useragents as $useragents){
            if(strstr($container,$useragents)){
                $ismobile = 1;
            }
        }

        if($ismobile){
            return true;
        }else{
            return false;
        }
      }
    ?>
  </div>
@endsection

@section('js')
<script src="{{asset('bower_components/datatables.net/js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js')}}"></script>
<script>
  $(function () {
    $('#example1').DataTable({
      'paging'      : false,
      'lengthChange': true,
      'searching'   : true,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : true
    })
  })

  function load_data(id){
    document.getElementById("formUbah").action = '{{ route('admin.pengaduan_masyarakat_lookup.update', 'id') }}';

    var url_php = '{{ route('admin.pengaduan_masyarakat_lookup.show', 'spliter') }}';
    var res = url_php.split('spliter');
      
    $.ajax({
      url:res[0]+id+res[1],
      method:'GET',
      dataType: 'json', // added data type
        success: function(res) {
          document.getElementById("ubahId").value = res.id;
          document.getElementById("ubahMainkategori").value = res.pml_main_kategori;
          document.getElementById("ubahSubkategori").value = res.pml_sub_kategori;
          document.getElementById("ubahKategori").value = res.pml_kategori;
          document.getElementById("ubahNilai").value = res.pml_nilai;
          document.getElementById("ubahStatus").value = res.pml_status;
          document.getElementById("ubahCatatan").value = res.pml_catatan;

          document.getElementById("lihatMainkategori").value = res.pml_main_kategori;
          document.getElementById("lihatSubkategori").value = res.pml_sub_kategori;
          document.getElementById("lihatKategori").value = res.pml_kategori;
          document.getElementById("lihatNilai").value = res.pml_nilai;
          document.getElementById("lihatStatus").value = res.pml_status;
          document.getElementById("lihatCatatan").value = res.pml_catatan;
        }
    })

    
  }
</script>
@endsection
