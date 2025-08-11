@extends('template.default')
@section('css')
      <link rel="stylesheet" href="{{asset('bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css')}}">
      <link rel="stylesheet" href="{{asset('bower_components/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
      <link rel="stylesheet" href="{{asset('bower_components/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
      <link rel="stylesheet" href="{{asset('bower_components/datatables-buttons/css/buttons.bootstrap4.min.css')}}">
        <style>
          /* bootstrap scrool mass */
          .modal { 
            overflow-y: auto !important; 
          }
          .modal-body{
            height: 200px;
            overflow-y: scroll;
          }

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

          /* ------------------------
              BTN
          ------------------------*/
          .buttons-copy {
              margin-right: 5px;
              border-radius: 10px;
          }
          .buttons-csv {
              margin-right: 5px;
              border-radius: 10px;
          }
          .buttons-excel {
              margin-right: 5px;
              border-radius: 10px;
          }
          .buttons-pdf {
              margin-right: 5px;
              border-radius: 10px;
          }
          .buttons-print {
              margin-right: 5px;
              border-radius: 10px;
          }
          .buttons-colvis {
              margin-right: 5px;
              border-radius: 10px;
          }
          .buttons-copy:hover {
              background-color: lightgray;
          }
          .buttons-csv:hover {
              background-color: lightgray;
          }
          .buttons-excel:hover {
              background-color: lightgray;
          }
          .buttons-pdf:hover {
              background-color: lightgray;
          }
          .buttons-print:hover {
              background-color: lightgray;
          }
          .buttons-colvis:hover {
              background-color: lightgray;
          }

          .kotak {
              box-shadow: 2px 2px 2px rgba(11, 6, 88, 0.42);
              padding: 5px 15px 5px 15px;
              border: 1px solid grey;
              border-radius: 30px;
              text-align: center;
              font-size: 9pt;
          }
        </style>
@endsection
@section('content')
    <div class="box">
      <div class="box-header">
        <h3 class="box-title">Data Unggah Formulir Gratifikasi</h3>
      </div>
      <div class="box-header">
        <a href="{{ route('admin.pelaporan_gratifikasi_data.create') }}" class="btn btn-primary" style="margin-bottom: 15px;" title="tambah data pelaporan gratifikasi"><i class="fa fa-plus"></i>&nbsp Tambah Data</a>  
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
      </div>
      <!-- /.box-header -->
      <div class="box-body">
        @if(isMobileDevice())
          @foreach ($items_mobile as $item)
            <div class="featured-item" id="" style="padding: 20px;">
              <div class="row">
                <div class="col-md-12 my-2">
                  <strong><i class="fa fa-file-o mr-2"></i> {{ $item->pgu_no }}</strong> &nbsp &nbsp &nbsp
                  <strong><i class="fa fa-calendar-check-o mr-2"></i> {{ $item->pgu_tanggal_lapor }}</strong> </br>
                  <strong><i class="fa fa-tags"></i> {{ $item->pgu_sumber }}</strong> &nbsp &nbsp &nbsp
                  @if($item->pgu_verifikasi === "Y")
                    <span class="badge bg-red">Gratifikasi</span>
                  @elseif($item->pgu_verifikasi === "T")
                    <span class="badge bg-green">Bukan Gratifikasi</span>
                  @else
                    <span class="badge bg-blue">Belum di Verifikasi</span>
                  @endif
                  @if($item->pgu_verifikasi_kirim !== null)
                    <span class="badge bg-green">Sudah di Kirim</span>
                  @else
                    <span class="badge bg-yellow">Belum di Kirim</span>
                  @endif</br>
                  <hr style="margin-top: 10px; margin-bottom: 10px; border-top: 1px solid #555;">
                  <table style="width: 100%;">
                    <tbody>
                      <tr>
                        <td colspan="3">Identitas Pelapor</td>
                      </tr>
                      <tr>
                        <td style="width: 30%;">Nama</td>
                        <td style="width:  5%;">:</td>
                        <td>{{ $item->pgu_pelapor_nik }}</td>
                      </tr>
                      <tr>
                        <td style="width: 30%;">Instansi</td>
                        <td style="width:  5%;">:</td>
                        <td>{{ $item->pgu_pelapor_instansi }}</td>
                      </tr>
                      <tr>
                        <td colspan="3"></br>Pemberian Gratifikasi</td>
                      </tr>
                      <tr>
                        <td style="width: 30%;">Tanggal</td>
                        <td style="width:  5%;">:</td>
                        <td>{{ $item->pgu_tanggal }}</td>
                      </tr>
                      <tr>
                        <td style="width: 30%;">Tempat</td>
                        <td style="width:  5%;">:</td>
                        <td>{{ $item->pgu_tempat }}</td>
                      </tr>
                      <tr>
                        <td style="width: 30%;">Uraian</td>
                        <td style="width:  5%;">:</td>
                        <td>{{ $item->pgu_uraian }}</td>
                      </tr>
                      <tr>
                        <td style="width: 30%;">Nominal</td>
                        <td style="width:  5%;">:</td>
                        <td>{{ number_format($item->pgu_nominal, 2, ',', '.') }}</td>
                      </tr>
                    </tbody>
                  </table>
                  <hr style="margin-top: 10px; margin-bottom: 10px; border-top: 1px solid #555;">
                  </br>
                  <a href="{!! route('admin.pelaporan_gratifikasi_data.show', $item->id) !!}" title="lihat detail laporan">
                    <button class="btn btn-success" style="height: 30px; width: 70px; text-align: left; text-align: left; margin-bottom: 5px; padding-top: 3px">
                      <i class="fa fa-info"></i>&nbsp Detail
                    </button>
                  </a>
                </div>
              </div>
            </div>
            </br>
          @endforeach
          <div class="pagination-wrapper"> {!! $items_mobile->appends(['search' => Request::get('search')])->render() !!} </div>
        @else
          <table id="example1" class="table table-bordered table-striped">
            <thead>
              <tr>
                <th>No</th>
                <th>Nomor Laporan</th>
                <th>Tanggal Laporan</th>
                <th>UPG Pembantu</th>
                <th>Periode Pelaporan</th>
                <th>Catatan</th>
                <th>File</th>
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

            @php
              function secretValue($str) {
                $temp = "";
                for ($i = 0; $i < strlen($str); $i++) {
                  if ($i < 2) {
                    $temp = $temp.$str[$i];
                  } else if ($i >= 2 && $i < strlen($str) - 2) {
                    if ($str[$i] === " ") {
                      $temp = $temp." ";
                    } else {
                      $temp = $temp."*";
                    }
                  } else if ($i >= strlen($str) - 2 && $i < strlen($str)) {
                      $temp = $temp.$str[$i];
                  }
                }
                return $temp;
              }
            @endphp
            <tbody>
              @foreach ($items as $item)
                <tr>
                  <td>{{ $no++ }}</td>
                  <td>
                    {{ $item->pgu_no }}
                  </td>
                  <td>
                    {{ $item->pgu_laporan_tanggal }}
                  </td>
                  <td>
                    [{{ $item->pgu_upgp_id }}] {{ $item->pgu_upgp_nama }}
                  </td>
                  <td>
                    {{ $item->pgu_laporan_kategori }} {{ $item->pgu_laporan_periode }}
                  </td>
                  <td>
                    {{ $item->pgu_catatan }}
                  </td>
                  <td>
                    <a target="_blank" href="{{asset('uploads/pelaporan_gratifikasi/'.$item->pgu_lampiran)}}">
                      <button class="btn btn-primary" style="height: 30px; width: 95px; text-align: left; text-align: left; margin-bottom: 5px; padding-top: 3px">
                        <i class="fa fa-file" title="lihat file"></i>&nbsp Lihat File
                      </button>
                    </a>
                  </td>
                  <td>
                    <a href="{!! route('admin.pelaporan_gratifikasi_form.create.pgd', $item->id) !!}" title="tambahkan ke data pelaporan">
                      <button class="btn btn-danger" style="height: 30px; width: 80px; text-align: left; text-align: left; margin-bottom: 5px; padding-top: 3px">
                        <i class="fa fa-trash"></i>&nbsp Hapus
                      </button>
                    </a>
                  </td>
                </tr>
              @endforeach 
            </tbody>    
          </table>
        @endif
      </div>
      <!-- /.box-body -->
    </div>
    <!-- /.box -->
    <!-- /.modal-dialog -->

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
<!-- DataTables  & Plugins -->
<script src="{{asset('bower_components/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('bower_components/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{asset('bower_components/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{asset('bower_components/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
<script src="{{asset('bower_components/datatables-buttons/js/dataTables.buttons.min.js')}}"></script>
<script src="{{asset('bower_components/datatables-buttons/js/buttons.bootstrap4.min.js')}}"></script>
<script src="{{asset('bower_components/jszip/jszip.min.js')}}"></script>
<script src="{{asset('bower_components/pdfmake/pdfmake.min.js')}}"></script>
<script src="{{asset('bower_components/pdfmake/vfs_fonts.js')}}"></script>
<script src="{{asset('bower_components/datatables-buttons/js/buttons.html5.min.js')}}"></script>
<script src="{{asset('bower_components/datatables-buttons/js/buttons.print.min.js')}}"></script>
<script src="{{asset('bower_components/datatables-buttons/js/buttons.colVis.min.js')}}"></script>
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive"  : true, 
      'paging'      : true,
      'lengthChange': true,
      'searching'   : true,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : true
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
  });

</script>
@endsection
