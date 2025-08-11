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
        </style>
@endsection
@section('content')
    <div class="box">
      <div class="box-header">
        <h3 class="box-title">Data Pengaduan Masyarakat</h3>
      </div>
      <div class="box-header">
        <a href="{{ route('admin.pengaduan_masyarakat_data.create') }}" class="btn btn-primary" style="margin-bottom: 15px;" title="tambah data dumas"><i class="fa fa-plus"></i>&nbsp Tambah Data</a>  
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
                  <strong><i class="fa fa-file-o mr-2"></i> {{ $item->pmd_no }}</strong> </br>
                  <strong><i class="fa fa-calendar-minus-o mr-2"></i> {{ $item->pmd_tanggal }}</strong> &nbsp &nbsp &nbsp
                  <strong><i class="fa fa-calendar-check-o"></i> {{ $item->pmd_tanggal_terima }}</strong> </br>
                  <hr style="margin-top: 10px; margin-bottom: 10px;">
                  {{ $item->pmd_sumber }} - {{ $item->pmd_sifat }} - {{ $item->pmd_kategori }}</br>
                  <table style="width: 100%;">
                    <tbody>
                      <tr>
                        <td style="width: 30%;">Pelapor</td>
                        <td style="width:  5%;">:</td>
                        <td>{{ $item->pmd_pelapor_nama }}</td>
                      </tr>
                      <tr>
                        <td style="width: 30%;">Pelapor</td>
                        <td style="width:  5%;">:</td>
                        <td>{{ $item->pmd_terlapor_nama }}</td>
                      </tr>
                      <tr>
                        <td style="width: 30%;"></td>
                        <td style="width:  5%;"></td>
                        <td>{{ $item->pmd_terlapor_pekerjaan }}</td>
                      </tr>
                      <tr>
                        <td style="width: 30%;"></td>
                        <td style="width:  5%;"></td>
                        <td>{{ $item->pmd_terlapor_instansi }}</td>
                      </tr>
                      <tr>
                        <td style="width: 30%;">Status</td>
                        <td style="width:  5%;">:</td>
                        <td>{{ $item->pmd_status }}</td>
                      </tr>
                    </tbody>
                  </table>
                  <hr style="margin-top: 10px; margin-bottom: 10px;">
                  <strong>{{ $item->pmd_judul }}</strong> </br></br>
                  <a href="{!! route('admin.pengaduan_masyarakat_data.show', $item->id) !!}" title="lihat detail dumas">
                    <button class="btn btn-success" style="height: 30px; width: 70px; text-align: left; text-align: left; margin-bottom: 5px;">
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
                <th>Sumber</th>
                <th>No Surat</th>
                <th>Tgl Surat</th>
                <th>Tgl Terima</th>
                <th>Pelapor</th>
                <th>Terlapor</th>
                <th>Kategori</th>
                <th>Judul</th>
                <th>Status</th>
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
                  <td>
                    {{ $item->pmd_sumber }} - 
                    {{ $item->pmd_sifat }}
                  </td>
                  <td>{{ $item->pmd_no }}</td>
                  <td>{{ $item->pmd_tanggal }}</td>
                  <td>{{ $item->pmd_tanggal_terima }}</td>
                  <td>
                    {{ $item->pmd_pelapor_nama }}</br>
                    {{ $item->pmd_pelapor_pekerjaan }}</br>
                    {{ $item->pmd_pelapor_telepon }}</br>
                    {{ $item->pmd_pelapor_email }}</br>
                  </td>
                  <td>
                    {{ $item->pmd_terlapor_nama }}</br>
                    {{ $item->pmd_terlapor_pekerjaan }}</br>
                    {{ $item->pmd_terlapor_instansi }}</br>
                  </td>
                  <td>{{ $item->pmd_kategori }}</td>
                  <td>{{ $item->pmd_judul }}</td>
                  <td>{{ $item->pmd_status }}</td>
                  <td>
                    <a href="{!! route('admin.pengaduan_masyarakat_data.show', $item->id) !!}" title="lihat detail dumas">
                      <button class="btn btn-success" style="height: 30px; width: 70px; text-align: left; text-align: left; margin-bottom: 5px;">
                        <i class="fa fa-info"></i>&nbsp Detail
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
      'autoWidth'   : true,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
  });
</script>
@endsection
