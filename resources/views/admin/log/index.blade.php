@extends('template.default')
@section('content')
    <section class="content">
      <!-- Small boxes (Stat box) -->
      @foreach($items as $item)
        <div class="col-lg-3 col-xs-6" >
          <div class="small-box bg-green" >
            <div class="inner" >
              <h3>{{$item->total}}<sup style="font-size: 20px">pengunjung</sup></h3>
              <p>{{$item->halaman}}</p>
            </div>
            <div class="icon">
              <i class="ion ion-stats-bars"></i>
            </div>
            <a href="{{route('admin.log.filter', $item->halaman)}}" class="small-box-footer">Lihat Detil</a>
          </div>
        </div>
      @endforeach
  
    </section>
@endsection