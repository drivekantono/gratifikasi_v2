@extends('template.default')
@section('css')
      <link rel="stylesheet" href="{{asset('bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css')}}">
        <style>
          .example-modal .modal {
            position: relative;
            top: auto;
            bottom: auto;
            right: auto;
            left: auto;
            display: block;
            z-index: 1;
          }

          .example-modal .modal {
            background: transparent !important;
          }
        </style>
@endsection
@section('content')
    <div class="box">
            <div class="box-header">
              <h3 class="box-title">Data Materi</h3>
            </div>
            <div class="box-header">
              <a href="{{ route('admin.download_materi.create') }}" class="btn btn-primary" style="margin-bottom: 15px;"><i class="fa fa-plus"></i>Tambah Data</a>  
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>No</th>
                  <th>Title</th>
                  <th>File</th>
                  <th></th>
                  <th>Aksi</th>
                  <th></th>
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
                    <td>{{ $item->title }}</td>
                    <td>
                      <a href="{{ asset('/uploads/download_materi/'.$item->file) }}">{{ $item->file }}</a>
                    </td>
                    <td>
                      <a href="{!! route('admin.download_materi.edit', $item->id) !!}"><button class="btn btn-success"><i class="fa fa-edit"></i></button></a>
                    </td>
                    <td>
                      <form action="{{ route('admin.download_materi.destroy', $item->id) }}" method="GET" style="display:inline-block;">
                        <button title="Delete" class="btn btn-danger js-submit-confirm" type="submit"><i class="fa fa-trash-o"></i></button>
                      </form>
                    </td>
                    <td>
                      {{-- <form action="{{ route('admin.download_materi.show', $item->id) }}" method="GET" style="display:inline-block;"> --}}
                        <button title="show" id="show-item" class="btn btn-info js-submit-confirm" onclick="javascript:load_data({{ $item->id }})"data-toggle="modal" data-target="#modal-default"><i class="fa fa-eye"></i></button>
                      {{-- </form> --}}
                    </td>
                  </tr>
                @endforeach 
                </tbody>       
                <tfoot>
                  <tr>
                    <th>No</th>
                    <th>Title</th>
                    <th>Gambar</th>
                    <th></th>
                    <th>Aksi</th>
                    <th></th>
                  </tr>
                </tfoot>
              </table>
            <div class="pagination-wrapper"> {!! $items->appends(['search' => Request::get('search')])->render() !!} </div>
            </div>
            <!-- /.box-body -->
          </div>
        <div class="modal fade" id="modal-default">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">master</h4>
              </div>
              <div class="modal-body">
                <div class="box box-primary">
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
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
    var url_php = '{{ route('admin.download_materi.show', 'id') }}';
    var res = url_php.split('id');
      
    $.ajax({
      url:res[0]+id+res[1],
      method:'GET',
      dataType: 'json', // added data type
        success: function(res) {
            document.getElementById("title").innerHTML = res.title;
        }
    })

    
  }
</script>
@endsection