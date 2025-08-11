<!DOCTYPE html>
<html>
    @include('template.partial.head')

    <body class="hold-transition skin-blue">
      @include('template.partial.javascript')
    

<div class="section">
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
</div>
<div class="section">
    <div class="box">
      <div class="box-header">
        <h3 class="box-title">Data Pengaduan Masyarakat</h3>
      </div>
      <div class="box-header"> 
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
                  <strong>{{ $item->pmd_judul }}</strong>
                </div>
              </div>
            </div>
            </br>
          @endforeach
          <div class="pagination-wrapper"> {!! $items->appends(['search' => Request::get('search')])->render() !!} </div>
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
</div>

<div class="section">
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

        function post_value(id, no){
            opener.document.getElementById('pm_ref_id').value = id;
            opener.document.getElementById('pm_ref_no').value = no;
            self.close();
        }
    </script>
</div>

</body>
</html>