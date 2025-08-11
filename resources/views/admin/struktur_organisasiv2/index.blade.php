@extends('template.default')
@section('css')
      <link rel="stylesheet" href="{{asset('bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css')}}
      ">
      <link href="{{ asset('jquery-nestable/jquery.nestable.css') }}" rel="stylesheet" type="text/css" />
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

          
        }

       
        </style>
@endsection
@section('content')
    <div class="box">
            <div class="box-header">
              <h3 class="box-title">Data</h3>
            </div>
            <div class="box-header">
              <a href="{{route('admin.struktur_organisasi2.create')}}" class="btn btn-primary" style="margin-bottom: 15px;"><i class="fa fa-plus"></i>Tambah Data</a>
              <a href="{{route('admin.struktur_organisasi2.show')}}" class="btn btn-primary" style="margin-bottom: 15px;"><i class="fa fa-plus"></i>Lihat Data</a>    
            </div>
            <div id="tree1"></div>
    </div>
@endsection

@section('js')
<script src="{{asset('js/orgchart.js')}}"></script>
<script src="{{asset('bower_components/datatables.net/js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js')}}"></script>
<script src="{{ asset('jquery-nestable/jquery.nestable.js') }}" type="text/javascript"></script>
<script type="text/javascript">

var tmps = {!! json_encode($items->toArray())!!}

var datas = [];

tmps.forEach((item) => {
  datas.push({
    id: item.id,
    title : item['title'],
    name : item['nama'],
    pid : item['parent_id'],
    tags: [item[ 'tags' ]],
    img : "{{asset('uploads/struktur_organisasi')}}/"+item['images'],

  })
})

console.log(datas);
for (var i = 0 ; i < datas.length ; i++) {
  var chart = new OrgChart(document.getElementById("tree1"), {
    scaleInitial: OrgChart.match.boundary,
        nodeBinding: {
            field_0: "title",
            field_1: "name",
            img_0: "img"
        },
        
        nodes: datas

    });   
}


</script>
@endsection
