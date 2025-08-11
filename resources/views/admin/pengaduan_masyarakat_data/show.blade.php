@extends('template.default')

@section('css')

<link rel="stylesheet" href="{{ asset('bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css') }}">
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
<section class="content">
    <div class="row">
        <!-- left column -->
        <div class="col-md-12">
            <!-- dari tabel pengaduan_masyarakat_datas -->
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title"><strong>Detail Data Pengaduan Masyarakat | {{ $items->id }} | {{ $items->pmd_no }}</strong></h3><br><br>
                    <a href="{!! route('admin.pengaduan_masyarakat_data.edit', $items->id) !!}" title="ubah data dumas">
                      <button class="btn btn-success" style="height: 30px; text-align: left; margin-bottom: 5px;"> 
                        <i class="fa fa-edit"></i>&nbsp Edit
                      </button>
                    </a>&nbsp
                    <a href="{!! route('admin.pengaduan_masyarakat_riwayat.create', $items->id) !!}" title="update progress dumas">
                        <button class="btn btn-primary" style="height: 30px; text-align: left; text-align: left; margin-bottom: 5px;">
                          <i class="fa fa-plus"></i>&nbsp Progress
                        </button>
                    </a>&nbsp
                    <form action="{{ route('admin.pengaduan_masyarakat_data.destroy', $items->id) }}" method="GET" style="display:inline-block;">
                      <button title="Delete" class="btn btn-danger js-submit-confirm" type="submit"  style="height: 30px; text-align: left; text-align: left; margin-bottom: 5px;" onclick="return confirm('Apakah Anda Yakin Menghapus Data?');" title="hapus data dumas">
                        <i class="fa fa-trash-o"></i>&nbsp Delete
                      </button>
                    </form>&nbsp
                    <a href="{!! route('admin.pengaduan_masyarakat_data.index') !!}" title="kembali">
                        <button class="btn btn-warning" style="height: 30px; text-align: left; text-align: left; margin-bottom: 5px;">
                          <i class="fa fa-arrow-left"></i>&nbsp Back
                        </button>
                    </a>

                    @if ($message !== '')
                        <div class="alert alert-success alert-block">
                            <button type="button" class="close" data-dismiss="alert">×</button> 
                            <strong>{{ $message }}</strong>
                        </div>
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
                <!-- form start -->
                <div class="box-body">
                    <!-- info general surat pengaduan -->
                    <fieldset>
                        <legend><h4>Informasi Surat Pengaduan</h4></legend>
                        <div class="row" style="padding-left: 15px; padding-right: 15px;">
                            <div class="col-md-1">
                                <strong>Sumber</strong>
                            </div>
                            <div class="form-group col-md-3">
                                <input type="text" class="form-control" id="pmd_sumber" name="pmd_sumber" disabled value="{{ $items->pmd_sumber }}" style="background-color: #e4f5ff;">
                            </div>
                            <div class="col-md-1">
                                <strong>Sifat</strong>
                            </div>
                            <div class="form-group col-md-3">
                                <input type="text" class="form-control" id="pmd_sifat" name="pmd_sifat" disabled value="{{ $items->pmd_sifat }}" style="background-color: #e4f5ff;">
                            </div>
                        </div>
                        <div class="row" style="padding-left: 15px; padding-right: 15px;">
                            <div class="col-md-1">
                                <strong>No Surat</strong>
                            </div>
                            <div class="form-group col-md-3">
                                <input type="text" class="form-control" id="pmd_no" name="pmd_no" disabled value="{{ $items->pmd_no }}" style="background-color: #e4f5ff;">
                            </div>
                            <div class="col-md-1">
                                <strong>Tanggal Surat</strong>
                            </div>
                            <div class="form-group col-md-3">
                                <input type="text" class="form-control" id="pmd_tanggal" name="pmd_tanggal" disabled value="{{ $items->pmd_tanggal }}" style="background-color: #e4f5ff;">
                            </div>
                            <div class="col-md-1">
                                <strong>Tanggal Terima</strong>
                            </div>
                            <div class="form-group col-md-3">
                                <input type="text" class="form-control" id="pmd_tanggal_terima" name="pmd_tanggal_terima" disabled value="{{ $items->pmd_tanggal_terima }}" style="background-color: #e4f5ff;">
                            </div>
                        </div>
                    </fieldset>

                    <!-- info pelapor -->
                    <fieldset>
                        <legend><h4>Identitas Pelapor</h4></legend>
                        <div class="row" style="padding-left: 15px; padding-right: 15px;">
                            <div class="col-md-1">
                                <strong>Nama</strong>
                            </div>
                            <div class="form-group col-md-3">
                                <input type="text" class="form-control" id="pmd_pelapor_nama" name="pmd_pelapor_nama" disabled value="{{ $items->pmd_pelapor_nama }}" style="background-color: #e4f5ff;">
                            </div>
                            <div class="col-md-1">
                                <strong>Kartu Identitas</strong>
                            </div>
                            <div class="form-group col-md-3">
                                <div class="input-group date">
                                    <div class="input-group-addon">
                                        @if ($items->pmd_lampiran_identitas === null || $items->pmd_lampiran_identitas === '')
                                            <i class="fa fa-file"></i>
                                        @else
                                            <a target="_blank" href="{{asset('uploads/pengaduan_masyarakat/'.$items->pmd_lampiran_identitas)}}" onclick="pmd_lampiran_identitas_click()"><i class="fa fa-file" title="lihat file"></i></a>
                                        @endif
                                    </div>
                                    <input type="text" class="form-control" id="pmd_lampiran_identitas" name="pmd_lampiran_identitas" value="{{ $items->pmd_lampiran_identitas }}" disabled style="background-color: #e4f5ff;">
                                </div>
                            </div>
                        </div>
                        <div class="row" style="padding-left: 15px; padding-right: 15px;">
                            <div class="col-md-1">
                                <strong>Pekerjaan</strong>
                            </div>
                            <div class="form-group col-md-3">
                                <input type="text" class="form-control" id="pmd_pelapor_pekerjaan" name="pmd_pelapor_pekerjaan" disabled value="{{ $items->pmd_pelapor_pekerjaan }}" style="background-color: #e4f5ff;">
                            </div>
                            <div class="col-md-1">
                                <strong>No Telepon</strong>
                            </div>
                            <div class="form-group col-md-3">
                                <input type="text" class="form-control" id="pmd_pelapor_telepon" name="pmd_pelapor_telepon" disabled value="{{ $items->pmd_pelapor_telepon }}" style="background-color: #e4f5ff;">
                            </div>
                            <div class="col-md-1">
                                <strong>Email</strong>
                            </div>
                            <div class="form-group col-md-3">
                                <input type="text" class="form-control" id="pmd_pelapor_email" name="pmd_pelapor_email" disabled value="{{ $items->pmd_pelapor_email }}" style="background-color: #e4f5ff;">
                            </div>
                        </div>
                        <div class="row" style="padding-left: 15px; padding-right: 15px;">
                            <div class="col-md-1">
                                <strong>Alamat</strong>
                            </div>
                            <div class="form-group col-md-11">
                                <textarea type="text" class="form-control" id="pmd_pelapor_alamat" name="pmd_pelapor_alamat" rows="3" disabled rows="3" style="background-color: #e4f5ff;">{{ $items->pmd_pelapor_alamat }}</textarea>
                            </div>
                        </div>
                    </fieldset>

                    <!-- info terlapor -->
                    <fieldset>
                        <legend><h4>Identitas Terlapor</h4></legend>
                        <div class="row" style="padding-left: 15px; padding-right: 15px;">
                            <div class="col-md-1">
                                <strong>Nama</strong>
                            </div>
                            <div class="form-group col-md-3">
                                <input type="text" class="form-control" id="pmd_terlapor_nama" name="pmd_terlapor_nama" disabled value="{{ $items->pmd_terlapor_nama }}" style="background-color: #e4f5ff;">
                            </div>
                        </div>
                        <div class="row" style="padding-left: 15px; padding-right: 15px;">
                            <div class="col-md-1">
                                <strong>Pekerjaan</strong>
                            </div>
                            <div class="form-group col-md-3">
                                <input type="text" class="form-control" id="pmd_terlapor_pekerjaan" name="pmd_terlapor_pekerjaan" disabled value="{{ $items->pmd_terlapor_pekerjaan }}" style="background-color: #e4f5ff;">
                            </div>
                            <div class="col-md-1">
                                <strong>Instansi</strong>
                            </div>
                            <div class="form-group col-md-3">
                                <input type="text" class="form-control" id="pmd_terlapor_instansi" name="pmd_terlapor_instansi" disabled value="{{ $items->pmd_terlapor_instansi }}" style="background-color: #e4f5ff;">
                            </div>
                        </div>
                        <div class="row" style="padding-left: 15px; padding-right: 15px;">
                            <div class="col-md-1">
                                <strong>Alamat</strong>
                            </div>
                            <div class="form-group col-md-11">
                                <textarea type="text" class="form-control" id="pmd_terlapor_alamat" name="pmd_terlapor_alamat" rows="3" disabled rows="3" style="background-color: #e4f5ff;">{{ $items->pmd_terlapor_alamat }}</textarea>
                            </div>
                        </div>
                    </fieldset>

                    <!-- info pengaduan -->
                    <fieldset>
                        <legend><h4>Informasi Pengaduan</h4></legend>
                        <div class="row" style="padding-left: 15px; padding-right: 15px;">
                            <div class="col-md-1">
                                <strong>Kategori</strong>
                            </div>
                            <div class="form-group col-md-3">
                                <input type="text" class="form-control" id="pmd_kategori" name="pmd_kategori" disabled value="{{ $items->pmd_kategori }}" style="background-color: #e4f5ff;">
                            </div>
                        </div>
                        <div class="row" style="padding-left: 15px; padding-right: 15px;">
                            <div class="col-md-1">
                                <strong>Judul</strong>
                            </div>
                            <div class="form-group col-md-11">
                                <input type="text" class="form-control" id="pmd_judul" name="pmd_judul" disabled value="{{ $items->pmd_judul }}" style="background-color: #e4f5ff;">
                            </div>
                        </div>
                        <div class="row" style="padding-left: 15px; padding-right: 15px;">
                            <div class="col-md-1">
                                <strong>Isi</strong>
                            </div>
                            <div class="form-group col-md-11">
                                <textarea type="text" class="form-control" id="pmd_isi" name="pmd_isi" rows="3" disabled rows="3" style="background-color: #e4f5ff;">{{ $items->pmd_isi }}</textarea>
                            </div>
                        </div>
                        <div class="row" style="padding-left: 15px; padding-right: 15px;">
                            <div class="col-md-1">
                                <strong>Harapan</strong>
                            </div>
                            <div class="form-group col-md-11">
                                <textarea type="text" class="form-control" id="pmd_harapan" name="pmd_harapan" rows="3" disabled rows="3" style="background-color: #e4f5ff;">{{ $items->pmd_harapan }}</textarea>
                            </div>
                        </div>
                        <div class="row" style="padding-left: 15px; padding-right: 15px;">
                            <div class="col-md-1">
                                <strong>Catatan</strong>
                            </div>
                            <div class="form-group col-md-11">
                                <textarea type="text" class="form-control" id="pmd_catatan" name="pmd_catatan" rows="3" disabled rows="3" style="background-color: #e4f5ff;">{{ $items->pmd_catatan }}</textarea>
                            </div>
                        </div>
                        <div class="row" style="padding-left: 15px; padding-right: 15px;">
                            <div class="col-md-1">
                                <strong>Lampiran 1</strong>
                            </div>
                            <div class="form-group col-md-3">
                                <div class="input-group date">
                                    <div class="input-group-addon">
                                        @if ($items->pmd_lampiran_01 === null || $items->pmd_lampiran_01 === '')
                                            <i class="fa fa-file"></i>
                                        @else
                                            <a target="_blank" href="{{asset('uploads/pengaduan_masyarakat/'.$items->pmd_lampiran_01)}}" onclick="pmd_lampiran_01_click()"><i class="fa fa-file" title="lihat file"></i></a>
                                        @endif
                                    </div>
                                    <input type="text" class="form-control" id="pmd_lampiran_01" name="pmd_lampiran_01" value="{{ $items->pmd_lampiran_01 }}" disabled style="background-color: #e4f5ff;">
                                </div>
                            </div>
                            <div class="col-md-1">
                                <strong>Lampiran 2</strong>
                            </div>
                            <div class="form-group col-md-3">
                                <div class="input-group date">
                                    <div class="input-group-addon">
                                        @if ($items->pmd_lampiran_02 === null || $items->pmd_lampiran_02 === '')
                                            <i class="fa fa-file"></i>
                                        @else
                                            <a target="_blank" href="{{asset('uploads/pengaduan_masyarakat/'.$items->pmd_lampiran_02)}}" onclick="pmd_lampiran_02_click()"><i class="fa fa-file" title="lihat file"></i></a>
                                        @endif
                                    </div>
                                    <input type="text" class="form-control" id="pmd_lampiran_02" name="pmd_lampiran_02" value="{{ $items->pmd_lampiran_02 }}" disabled style="background-color: #e4f5ff;">
                                </div>
                            </div>
                        </div>
                        <div class="row" style="padding-left: 15px; padding-right: 15px;">
                            <div class="col-md-1">
                                <strong>Status</strong>
                            </div>
                            <div class="form-group col-md-3">
                                <input type="text" class="form-control" id="pmd_status" name="pmd_status" disabled value="{{ $items->pmd_status }}" style="background-color: #e4f5ff;">
                            </div>
                        </div>
                    </fieldset>
                </div>
            </div>

            <!-- dari tabel pengaduan_masyarakat_riwayats -->
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title"><strong>Riwayat Progress Pengaduan Masyarakat</strong></h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <div class="box-body">
                    @if(isMobileDevice())
                        @if (count($items_pmr) > 0)
                            @foreach ($items_pmr as $item)
                                <div class="featured-item" id="" style="padding: 20px;">
                                  <div class="row">
                                    <div class="col-md-12 my-2">
                                      <strong><i class="fa fa-file-o mr-2"></i> {{ $item->pmr_no }} | {{ $item->pmd_no }}</strong> </br>
                                      <strong><i class="fa fa-calendar-o mr-2"></i> {{ $item->pmr_tanggal }}</strong> &nbsp &nbsp &nbsp
                                      <strong><i class="fa fa-tags"></i> {{ $item->pmr_kategori }}</strong> </br>
                                      <hr style="margin-top: 10px; margin-bottom: 10px;">
                                      <table style="width: 100%;">
                                        <tbody>
                                          <tr>
                                            <td style="width: 30%; vertical-align: top;">Oleh</td>
                                            <td style="width:  5%; vertical-align: top;">:</td>
                                            <td style="vertical-align: top;">{{ $item->pmr_oleh }}</td>
                                          </tr>
                                          <tr>
                                            <td style="width: 30%; vertical-align: top;">Judul</td>
                                            <td style="width:  5%; vertical-align: top;">:</td>
                                            <td style="vertical-align: top;">{{ $item->pmr_judul }}</td>
                                          </tr>
                                          <tr>
                                            <td style="width: 30%; vertical-align: top;">Isi</td>
                                            <td style="width:  5%; vertical-align: top;">:</td>
                                            <td style="vertical-align: top;">{{ $item->pmr_isi }}</td>
                                          </tr>
                                          <tr>
                                            <td style="width: 30%; vertical-align: top;">Selanjutnya</td>
                                            <td style="width:  5%; vertical-align: top;">:</td>
                                            <td style="vertical-align: top;">{{ $item->pmr_selanjutnya }}</td>
                                          </tr>
                                        </tbody>
                                      </table>
                                      <hr style="margin-top: 10px; margin-bottom: 10px;">
                                      @if($item->pmr_lampiran === null || $item->pmr_lampiran === '')
                                      @else
                                        <strong>
                                            <a target="_blank" href="{{asset('uploads/pengaduan_masyarakat/'.$item->pmr_lampiran)}}" onclick="pmr_lampiran_click()"><i class="fa fa-file"></i> {{ $item->pmr_lampiran }}</a>
                                        </strong>
                                      @endif
                                    </div>
                                  </div>
                                </div>
                                </br>
                            @endforeach
                        @else
                            <div class="featured-item" id="" style="padding: 20px; background-color: #FFF9CA;">
                              <div class="row">
                                <div class="col-md-12 my-2" style="text-align: center;">
                                  <em>Tidak ada data</em>
                                </div>
                              </div>
                            </div>
                        @endif
                    @else
                        <table id="example1" class="table table-bordered table-striped">
                          <thead>
                            <tr>
                              <th>No</th>
                              <th>Tgl Proses</th>
                              <th>Kategori</th>
                              <th>Oleh</th>
                              <th>Judul</th>
                              <th>Isi</th>
                              <th>Lampiran</th>
                              <th>Proses Selanjutnya</th>
                            </tr>
                          </thead>
                          @php
                              $no = 1;
                          @endphp
                          <tbody>
                            @if (count($items_pmr) > 0)
                                @foreach ($items_pmr as $item)
                                  <tr>
                                    <td>{{ $no++ }}</td>
                                    <td>{{ $item->pmr_tanggal }}</td>
                                    <td>{{ $item->pmr_kategori }}</td>
                                    <td>{{ $item->pmr_oleh }}</td>
                                    <td>{{ $item->pmr_judul }}</td>
                                    <td>{{ $item->pmr_isi }}</td>
                                    <td>
                                        <a target="_blank" href="{{asset('uploads/pengaduan_masyarakat/'.$item->pmr_lampiran)}}" onclick="pmr_lampiran_click()">{{ $item->pmr_lampiran }}</i></a>
                                    </td>
                                    <td>{{ $item->pmr_selanjutnya }}</td>
                                  </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="8" style="text-align: center; background-color: #FFF9CA;">Tidak ada data</td>
                                </tr>
                            @endif 
                          </tbody>    
                        </table>
                    @endif
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
</section>
@endsection

@section('js')
<script src="{{ asset('bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js') }}"></script>
<script src="{{ asset('bower_components/ckeditor/ckeditor.js') }}"></script>
<script src="//cdn.ckeditor.com/4.6.2/standard/ckeditor.js"></script>
<script>
    var options = {
            filebrowserImageBrowseUrl: '/laravel-filemanager?type=Images',
            filebrowserImageUploadUrl: '/laravel-filemanager/upload?type=Images&_token=',
            filebrowserBrowseUrl: '/laravel-filemanager?type=Files',
            filebrowserUploadUrl: '/laravel-filemanager/upload?type=Files&_token='
        };

    $(function () {
        $('#example1').DataTable({
          'paging'      : false,
          'lengthChange': true,
          'searching'   : true,
          'ordering'    : true,
          'info'        : true,
          'autoWidth'   : true,
          "responsive"  : true
        })
      })
</script>

@endsection