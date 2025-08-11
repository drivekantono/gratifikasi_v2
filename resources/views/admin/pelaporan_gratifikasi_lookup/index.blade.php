@extends('template.default')
@section('css')
    <link rel="stylesheet" href="{{asset('bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css')}}">
    <style>
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
      .modal-dialog {
          max-width: 1400px !important;
      }
      .aksi:hover {
          background-color:rgb(226, 225, 225)  !important;
      }
      input, select {
          background-color: #ffffff !important;
      }
      input:disabled, select:disabled {
          background-color: #e4f5ff !important;
      }
      input[readonly] {
          background-color: #e4f5ff !important;
      }
      .ck {
          border:0px !important;
      }
    </style>
@endsection
@section('content')
    <div class="box">
      <div class="box-header">
        <h3 class="box-title">Lookup Pelaporan Gratifikasi</h3>
      </div>
      <div class="box-header"> 
        <div class="btn-group">
            <a class="btn btn-primary dropdown-toggle" data-toggle="dropdown" href="#"><i class="fa fa-plus fa-fw"></i> Tambah Data</a>
            <a class="btn btn-primary dropdown-toggle" data-toggle="dropdown" href="#">
              <span class="fa fa-caret-down" title="Toggle dropdown menu"></span>
            </a>
            <ul class="dropdown-menu">
                <li><a href="#" data-toggle="modal" data-target="#modalLookup" data-backdrop="static" 
                       onclick="javascript:load_data('','Tambah', 'Hubungan')"><i class="fa fa-circle-o fa-fw"></i> Hubungan</a></li>
                <li><a href="#" data-toggle="modal" data-target="#modalLookup" data-backdrop="static" 
                       onclick="javascript:load_data('','Tambah', 'Peristiwa')"><i class="fa fa-circle-o fa-fw"></i> Peristiwa</a></li>
                <li><a href="#" data-toggle="modal" data-target="#modalLookup" data-backdrop="static" 
                       onclick="javascript:load_data('','Tambah', 'Lokasi')"><i class="fa fa-circle-o fa-fw"></i> Lokasi</a></li>
                <li><a href="#" data-toggle="modal" data-target="#modalLookup" data-backdrop="static" 
                       onclick="javascript:load_data('','Tambah', 'Jenis')"><i class="fa fa-circle-o fa-fw"></i> Jenis</a></li>
                <li class="divider"></li>
                <li><a href="#" data-toggle="modal" data-target="#modalLookup" data-backdrop="static" 
                       onclick="javascript:load_data('','Tambah', 'FAQ')"><i class="fa fa-circle-o fa-fw"></i> FAQ</a></li>
            </ul>
        </div>
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
                      <i class="fa fa-tags mr-2"></i> {{ $item->pgl_main }} - {{ $item->pgl_sub }} </br>
                      <strong><i class="fa fa-tags"></i> {{ $item->pgl_kategori }}</strong> </br>
                      <hr style="margin-top: 10px; margin-bottom: 10px;">
                      <table style="width: 100%;">
                        <tbody>
                          <tr>
                            <td style="width: 30%; vertical-align: top;">Nilai</td>
                            <td style="width:  5%; vertical-align: top;">:</td>
                            <td style="vertical-align: top;">{{ $item->pgl_nilai }}</td>
                          </tr>
                          <tr>
                            <td style="width: 30%; vertical-align: top;">Status</td>
                            <td style="width:  5%; vertical-align: top;">:</td>
                            <td style="vertical-align: top;">{{ $item->pgl_status }}</td>
                          </tr>
                          <tr>
                            <td style="width: 30%; vertical-align: top;">Catatan</td>
                            <td style="width:  5%; vertical-align: top;">:</td>
                            <td style="vertical-align: top;">{{ $item->pgl_catatan }}</td>
                          </tr>
                        </tbody>
                      </table>
                      <hr style="margin-top: 10px; margin-bottom: 10px;">
                      <button title="show" id="show-item" class="btn btn-info js-submit-confirm" onclick="javascript:load_data('{{ $item->id }}', 'Lihat')" data-toggle="modal" data-target="#modalLookup" style="height: 35px; width: 35px; text-align: center; text-align: center; margin-bottom: 0px;">
                        <i class="fa fa-info"></i>
                      </button>
                      <button title="edit" id="show-item" class="btn btn-success js-submit-confirm" onclick="javascript:load_data('{{ $item->id }}', 'Ubah')" data-toggle="modal" data-target="#modalLookup" style="height: 35px; width: 35px; text-align: center; text-align: center; margin-bottom: 0px;">
                        <i class="fa fa-edit"></i>
                      </button>
                      <form action="{{ route('admin.pelaporan_gratifikasi_lookup.destroy', $item->id) }}" method="GET" style="display:inline-block;">
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
                  <th>Main</th>
                  <th>Sub</th>
                  <th>Kategori</th>
                  <th>Nilai</th>
                  <th>Status</th>
                  <th>Catatan</th>
                  <th style="width: 100px">Aksi</th>
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
                    <td>{{ $item->pgl_main }}</td>
                    <td>{{ $item->pgl_sub }}</td>
                    <td>{{ $item->pgl_kategori }}</td>
                    <td>{{ $item->pgl_nilai }}</td>
                    <td>{{ $item->pgl_status }}</td>
                    <td>{{ $item->pgl_catatan }}</td>
                    <td>
                      <button title="lihat data" id="lihat-item" class="btn btn-info js-submit-confirm" onclick="javascript:load_data('{{ $item->id }}', 'Lihat')" 
                              data-toggle="modal" data-target="#modalLookup" style="height: 35px; width: 35px; text-align: center; text-align: center; margin-bottom: 0px;">
                        <i class="fa fa-info"></i>
                      </button>
                      <button title="ubah" id="ubah-item" class="btn btn-success js-submit-confirm" onclick="javascript:load_data('{{ $item->id }}', 'Ubah')" 
                              data-toggle="modal" data-target="#modalLookup" style="height: 35px; width: 35px; text-align: center; text-align: center; margin-bottom: 0px;">
                        <i class="fa fa-edit"></i>
                      </button>
                      <a title="hapus" id="hapus-item" href="{{ route('admin.pelaporan_gratifikasi_lookup.destroy', $item->id) }}" class="btn btn-danger js-submit-confirm" method="GET"
                         onclick="return confirm('Apakah Anda Yakin Menghapus Data?');" style="height: 35px; width: 35px; text-align: center; text-align: center; margin-bottom: 0px;">
                        <i class="fa fa-trash-o"></i>
                      </a>

                      <!--
                      <div class="btn-group">
                        <a class="btn btn-primary dropdown-toggle" data-toggle="dropdown" href="#"><i class="fa fa-plus fa-fw"></i> Aksi</a>
                        <a class="btn btn-primary dropdown-toggle" data-toggle="dropdown" href="#">
                          <span class="fa fa-caret-down" title="Toggle dropdown menu"></span>
                        </a>
                        <ul class="dropdown-menu">
                            <li class="aksi">
                              <a href="#" id="show-item" class="js-submit-confirm" onclick="javascript:load_data('{{ $item->id }}', 'Lihat')" 
                                data-toggle="modal" data-target="#modalLookup">
                                <i class="fa fa-info fa-fw"></i> Lihat
                              </a>
                            </li>
                            <li class="aksi">
                              <a href="#" id="update-item" class="js-submit-confirm" onclick="javascript:load_data('{{ $item->id }}' , 'Ubah')" 
                                data-toggle="modal" data-target="#modalLookup">
                                <i class="fa fa-edit fa-fw"></i> Ubah
                              </a>
                            </li>
                            <li class="aksi">
                              <a href="{{ route('admin.pelaporan_gratifikasi_lookup.destroy', $item->id) }}" id="delete-item" class="js-submit-confirm" onclick="return confirm('Apakah Anda Yakin Menghapus Data?');">
                                <i class="fa fa-trash-o fa-fw"></i> Hapus
                              </a>
                            </li>
                        </ul>
                      </div>
                      -->
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

    <!-- /.modal-dialog Lookup-->
    <div class="modal fade" id="modalLookup" name="modalLookup" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <!-- Modal Header -->
          <div class="modal-header">
            <h4 class="modal-title" id="modalLookupLabel">XXXX</h4>
            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
          </div>

          <!-- Modal body -->
          <div class="modal-body">
            <!-- form start -->
            <form name="formGratifikasi" id="formGratifikasi" role="form" action="{{ route('admin.pelaporan_gratifikasi_lookup.store') }}" method="POST" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="box-body">
                    <!-- isi lookup -->
                    <input type="hidden" class="form-control" id="idLookup" name="idLookup">
                    <div class="row" style="padding-left: 0px; padding-right: 0px;">
                        <div class="col-md-2">
                            <strong>Main</strong>
                        </div>
                        <div class="form-group col-md-10">
                            <input type="text" class="form-control" id="pgl_main" name="pgl_main" value="{{ old('pgl_main') ? old('pgl_main') : '' }}">
                        </div>
                    </div>
                    <div class="row" style="padding-left: 0px; padding-right: 0px;">
                        <div class="col-md-2">
                            <strong>Sub</strong>
                        </div>
                        <div class="form-group col-md-10">
                            <input type="text" class="form-control" id="pgl_sub" name="pgl_sub" value="{{ old('pgl_sub') ? old('pgl_sub') : '' }}">
                        </div>
                    </div>
                    <div class="row" style="padding-left: 0px; padding-right: 0px;">
                        <div class="col-md-2">
                            <strong>Kategori</strong>
                        </div>
                        <div class="form-group col-md-10">
                            <input type="text" class="form-control" id="pgl_kategori" name="pgl_kategori" value="{{ old('pgl_kategori') ? old('pgl_kategori') : '' }}">
                        </div>
                    </div>
                    <div class="row" style="padding-left: 0px; padding-right: 0px;">
                        <div class="col-md-2">
                            <strong>Nilai</strong>
                        </div>
                        <div class="form-group col-md-10">
                            <input type="text" class="form-control" id="pgl_nilai" name="pgl_nilai" value="{{ old('pgl_nilai') ? old('pgl_nilai') : '' }}">
                            <textarea type="text" class="form-control" id="pgl_nilai_area" name="pgl_nilai_area" row="10"></textarea>
                        </div>
                    </div>
                    <div class="row" style="padding-left: 0px; padding-right: 0px;">
                        <div class="col-md-2">
                            <strong>Status</strong>
                        </div>
                        <div class="form-group col-md-10">
                            <select id="pgl_status" name="pgl_status" class="form-control">
                                <option id="pgl_status_1" name="pgl_status_1" value="A">Aktif</option>
                                <option id="pgl_status_2" name="pgl_status_2" value="X">Tidak Aktif</option>
                            </select>
                        </div>
                    </div>
                    <div class="row" style="padding-left: 0px; padding-right: 0px;">
                        <div class="col-md-2">
                            <strong>Catatan</strong>
                        </div>
                        <div class="form-group col-md-10">
                            <input type="text" class="form-control" id="pgl_catatan" name="pgl_catatan" value="{{ old('pgl_catatan') ? old('pgl_catatan') : '' }}">
                        </div>
                    </div>
                </div>
                <!-- /.box-body -->

                <div class="box-footer" style="text-align: right;">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal" id="btnTutup" name="btnTutup">Batal</button>
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
<script src="{{asset('bower_components/ckeditor/ckeditor.js')}}"></script>
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

  CKEDITOR.replace('pgl_nilai_area', {
    // Define the toolbar groups as it is a more accessible solution.
    toolbarGroups: [
      {
        "name": "basicstyles",
        "groups": ["undo", "redo"]
      },
      {
        "name": "paragraph",
        "groups": ["list", "blocks", "align"]
      },
      {
        "name": "document",
        "groups": ["mode"]
      }
    ],
    // Remove the redundant buttons from toolbar groups defined above.
    removeButtons: 'Strike,Subscript,Superscript,Anchor,Styles,Specialchar,PasteFromWord'
  });

  var editor = CKEDITOR.instances['pgl_nilai_area'];

  function load_data(id, aksi, tambah=''){
    console.log(aksi);
    if (aksi === 'Tambah') {
      //alert(tambah);
      document.getElementById("formGratifikasi").action = '{{ route('admin.pelaporan_gratifikasi_lookup.store') }}';

      readOnlyKey();
      document.getElementById("idLookup").value = "";
      document.getElementById("pgl_main").value = "pelaporan_gratifikasi";

      if (tambah === 'FAQ') {
        document.getElementById("modalLookupLabel").innerHTML = "Tambah List FAQ";
        document.getElementById("pgl_sub").value = "FAQ";
        document.getElementById("pgl_kategori").readOnly = false;
        document.getElementById("pgl_kategori").value = "";
        document.getElementById("pgl_nilai").type = "hidden";
        document.getElementById("pgl_nilai").value = "";
        document.getElementsByClassName("cke_inner")[0].style.display = "block";
      } else {
        document.getElementById("pgl_sub").value = "data";
        document.getElementById("pgl_nilai").type = "text";
        document.getElementsByClassName("cke_inner")[0].style.display = "none";

        if (tambah === 'Hubungan') {
          document.getElementById("pgl_kategori").value = "hubungan";
          document.getElementById("modalLookupLabel").innerHTML = "Tambah List Hubungan Pemberi dan Pelapor Gratifikasi";
        }
        if (tambah === 'Peristiwa') {
          document.getElementById("pgl_kategori").value = "peristiwa";
          document.getElementById("modalLookupLabel").innerHTML = "Tambah List Peristiwa Pemberian Gratifikasi";
        }
        if (tambah === 'Lokasi') {
          document.getElementById("pgl_kategori").value = "lokasi";
          document.getElementById("modalLookupLabel").innerHTML = "Tambah List Lokasi Objek Gratifikasi";
        }
        if (tambah === 'Jenis') {
          document.getElementById("pgl_kategori").value = "jenis";
          document.getElementById("modalLookupLabel").innerHTML = "Tambah List Jenis Objek Gratifikasi";
        }
        if (tambah === '') {document.getElementById("pgl_kategori").value = null;}
      }

      document.getElementById("pgl_nilai").value = "";
      document.getElementById("pgl_catatan").value = "";
      document.getElementById("pgl_status_1").selected = true;
      document.getElementById("pgl_status_2").selected = false;

    } else if (aksi === 'Ubah') {
      //alert('Ubah');
      //alert(id);
      document.getElementById("formGratifikasi").action = '{{ route('admin.pelaporan_gratifikasi_lookup.update') }}';

      var url_php = '{{ route('admin.pelaporan_gratifikasi_lookup.show', 'spliter') }}';
      var res = url_php.split('spliter');

      document.getElementById("modalLookupLabel").innerHTML = "Ubah Data Lookup Gratifikasi";
      
      readOnlyKey();
      $.ajax({
        url:res[0]+id+res[1],
        method:'GET',
        dataType: 'json', // added data type
          success: function(res) {
            document.getElementById("idLookup").value = res.id;
            document.getElementById("pgl_main").value = res.pgl_main;
            document.getElementById("pgl_sub").value = res.pgl_sub;
            document.getElementById("pgl_kategori").value = res.pgl_kategori;

            if (res.pgl_sub === 'FAQ') {
              document.getElementById("pgl_kategori").readOnly = false;
              document.getElementById("pgl_kategori").value = res.pgl_kategori;
              editor.setData(res.pgl_nilai);
              document.getElementById("pgl_nilai").type = "hidden";
              document.getElementById("pgl_nilai").value = "";
              document.getElementsByClassName("cke_inner")[0].style.display = "block";
            } else {
              document.getElementById("pgl_nilai").type = "text";
              document.getElementById("pgl_nilai").value = res.pgl_nilai;
              document.getElementsByClassName("cke_inner")[0].style.display = "none";
            }
            
            document.getElementById("pgl_catatan").value = res.pgl_catatan;
            if (res.pgl_status === 'A') {
              document.getElementById("pgl_status_1").selected = true;
              document.getElementById("pgl_status_2").selected = false;
            } else {
              document.getElementById("pgl_status_1").selected = false;
              document.getElementById("pgl_status_2").selected = true;
            }
          }
      })
    } else if (aksi === 'Lihat') {
      //alert('Lihat');
      var url_php = '{{ route('admin.pelaporan_gratifikasi_lookup.show', 'spliter') }}';
      var res = url_php.split('spliter');

      document.getElementById("modalLookupLabel").innerHTML = "Data Lookup Gratifikasi";
        
      readOnlyAll();
      document.getElementsByClassName("cke_inner")[0].style.display = "none";
      $.ajax({
        url:res[0]+id+res[1],
        method:'GET',
        dataType: 'json', // added data type
          success: function(res) {
            document.getElementById("idLookup").value = res.id;
            document.getElementById("pgl_main").value = res.pgl_main;
            document.getElementById("pgl_sub").value = res.pgl_sub;
            document.getElementById("pgl_kategori").value = res.pgl_kategori;
            document.getElementById("pgl_nilai").value = res.pgl_nilai;
            document.getElementById("pgl_catatan").value = res.pgl_catatan;
            if (res.pgl_status === 'A') {
              document.getElementById("pgl_status_1").selected = true;
              document.getElementById("pgl_status_2").selected = false;
            } else {
              document.getElementById("pgl_status_1").selected = false;
              document.getElementById("pgl_status_2").selected = true;
            }
          }
      })
    }
  }

  function readOnlyAll(){
    document.getElementById("pgl_main").readOnly = true;
    document.getElementById("pgl_sub").readOnly = true;
    document.getElementById("pgl_kategori").readOnly = true;
    document.getElementById("pgl_nilai").readOnly = true;
    document.getElementById("pgl_catatan").readOnly = true;
    document.getElementById("pgl_status").disabled = true;
  }

  function readOnlyKey(){
    document.getElementById("pgl_main").readOnly = true;
    document.getElementById("pgl_sub").readOnly = true;
    document.getElementById("pgl_kategori").readOnly = true;
    document.getElementById("pgl_nilai").readOnly = false;
    document.getElementById("pgl_catatan").readOnly = false;
    document.getElementById("pgl_status").disabled = false;
  }
</script>
@endsection
