@php 
  use App\Berita;
  use App\Agenda;
  use App\Galeri;
  use App\Log;
@endphp
@extends('template.default')
@section('content')
    <section class="content">
    @if(Auth::User()->role !== 'dumas' && Auth::User()->role !== 'gratifikasi')
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3>{{count(Berita::all())}}</h3>

              <p>Berita</p>
            </div>
            <div class="icon">
              <i class="ion ion-bag"></i>
            </div>
            <a href="{{route('admin.berita.index')}}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h3>{{count(Agenda::all())}}</h3>

              <p>Agenda</p>
            </div>
            <div class="icon">
              <i class="ion ion-stats-bars"></i>
            </div>
            <a href="{{route('admin.agenda.index')}}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
              <h3>{{count(Galeri::all())}}</h3>

              <p>Galeri</p>
            </div>
            <div class="icon">
              <i class="ion ion-person-add"></i>
            </div>
            <a href="{{route('admin.galeri.index')}}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
         <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
              <h3>{{count(Log::all())}}</h3>
              <p>Pengunjung</p>
            </div>
            <div class="icon">
              <i class="ion ion-pie-graph"></i>
            </div>
            <a href="{{route('admin.log.index')}}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
      </div>
    @elseif (Auth::User()->role === 'dumas')
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title"><b>Rekapitulasi Pengaduan Masyarakat</b></h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <div class="row" style="margin-bottom: 50px;">
                <div class="col-md-12">
                  <p class="text-center">
                    <strong>Rekapitulasi Januari - Desember {{ date('Y') }}</strong>
                  </p>

                  <div class="chart">
                    <!-- Sales Chart Canvas -->
                    <canvas id="salesChart" height="180" style="height: 180px;"></canvas>
                  </div>
                  <!-- /.chart-responsive -->
                </div>
              </div>
              <div class="row">
                <!-- /.col -->
                <div class="col-md-6" style="margin-bottom: 50px;">
                  <p class="text-center">
                    <strong id="judulKategori"></strong>
                  </p>

                  @for ($idx = 0; $idx < count($items_label_kategori); $idx++)
                    <div class="progress-group">
                      {{ $items_label_kategori[$idx] }}
                      <span class="float-right"><b>&nbsp &nbsp {{ $items_nilai_kategori[$idx] }}</b>/{{ count($items_pmd) }}</span>
                      <div class="progress progress-sm">
                        <div class="progress-bar bg-primary" style="width: {{ $items_nilai_kategori[$idx] }}%"></div>
                      </div>
                    </div>
                  @endfor
                </div>

                <!-- /.col -->
                <div class="col-md-6" style="margin-bottom: 50px;">
                  <p class="text-center">
                    <strong id="judulStatus"></strong>
                  </p>

                  @for ($idx = 0; $idx < count($items_label_status); $idx++)
                    <div class="progress-group">
                      {{ $items_label_status[$idx] }}
                      <span class="float-right"><b>&nbsp &nbsp {{ $items_nilai_status[$idx] }}</b>/{{ count($items_pmd) }}</span>
                      <div class="progress progress-sm">
                        <div class="progress-bar bg-primary" style="width: {{ $items_nilai_status[$idx] }}%"></div>
                      </div>
                    </div>
                  @endfor
                </div>
                
              </div>
              <!-- /.row -->
            </div>
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    @elseif (Auth::User()->role === 'gratifikasi')
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title"><b>Rekapitulasi Pelaporan Gratifikasi</b></h3>
            </div>
            <div class="card-body">
              <div class="row" style="margin-bottom: 50px;">
                <div class="col-md-12 text-center">
                  <div class="col-md-3">
                    <div class="small-box" style="background: rgba(235, 220, 19, 0.8)">
                      <div class="inner">
                        <h3>{{ $count_pgd_all }}</h3>
                        <h4>Laporan Masuk</h4>
                      </div>
                      <div class="icon">
                        <i class="ion ion-stats-bars"></i>
                      </div>
                      <a href="{{route('admin.pelaporan_gratifikasi_data.index')}}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                    </div>

                    <div class="small-box" style="background: rgba(248, 66, 105, 0.8)">
                      <div class="inner">
                        <h3>{{ $count_pgd_gratifikasi }}</h3>
                        <h4>Dokumen Lengkap</h4>
                      </div>
                      <div class="icon">
                        <i class="ion ion-stats-bars"></i>
                      </div>
                      <a href="{{route('admin.pelaporan_gratifikasi_data.index')}}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                    </div>

                    <div class="small-box" style="background: rgba(75, 192, 192, 0.8)">
                      <div class="inner">
                        <h3>{{ $count_pgd_bukan_gratifikasi }}</h3>
                        <h4>Dokumen Belum Lengkap</h4>
                      </div>
                      <div class="icon">
                        <i class="ion ion-stats-bars"></i>
                      </div>
                      <a href="{{route('admin.pelaporan_gratifikasi_data.index')}}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                    </div>

                    <div class="small-box" style="background: rgba(54, 162, 235, 0.8)">
                      <div class="inner">
                        <h3>{{ $count_pgd_belum_verifikasi }}</h3>
                        <h4>Belum di Verifikasi</h4>
                      </div>
                      <div class="icon">
                        <i class="ion ion-stats-bars"></i>
                      </div>
                      <a href="{{route('admin.pelaporan_gratifikasi_data.index')}}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                    </div>

                  </div>
                  <div class="col-md-9" style="height: 700px; margin: auto;">
                    <b>Tahun 2025</b>
                    <canvas id="myChart"></canvas>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    @endif
    </section>

<!-- ChartJS -->
<script src="{{ asset('bower_components/chart.js/Chart.js') }}"></script>

<script>
  if ('{{ Auth::User()->role }}' === 'dumas') {
    var ctx = document.getElementById("salesChart").getContext('2d');
    var myChart = new Chart(ctx, {
      type: 'line',
      data: {
        labels: <?php echo json_encode($items_label); ?>,
        datasets: [{
          label: 'Pengaduan Masyarakat',
          backgroundColor: '#ADD8E6',
          borderColor: '#93C3D2',
          fill: 'true',
          borderColor: '#51C1C0',
          data: <?php echo json_encode($items_nilai); ?>
        }],
      options: {
        animation: {
          onProgress: function(animation) {
            progress.value = animation.animationObject.currentStep / animation.animationObject.numSteps;
          }
        }
      }
     },
    });
  }
  if ('{{ Auth::User()->role }}' === 'gratifikasi') {
    var ctx = document.getElementById('myChart').getContext('2d');

    const data = {
        labels: <?php echo json_encode($items_label); ?>,
        datasets: [
        {
          label               : 'Laporan Masuk',
          backgroundColor     : 'rgba(235, 220, 19, 0.5)',
          borderColor         : 'rgba(235, 220, 19, 1)',
          borderWidth         : 1,
          data                : <?php echo json_encode($items_nilai[0]); ?>
        },
        {
          label               : 'Dokumen Lengkap',
          backgroundColor     : 'rgba(248, 66, 105, 0.5)',
          borderColor         : 'rgba(248, 66, 105,1)',
          borderWidth         : 1,
          data                : <?php echo json_encode($items_nilai[1]); ?>
        },
        {
          label               : 'Dokumen Belum Lengkap',
          backgroundColor     : 'rgba(75, 192, 192, 0.5)',
          borderColor         : 'rgba(75, 192, 192, 1)',
          borderWidth         : 1,
          data                : <?php echo json_encode($items_nilai[2]); ?>
        },
        {
          label               : 'Belum di Verifikasi',
          backgroundColor     : 'rgba(54, 163, 235, 0.5)',
          borderColor         : 'rgba(54, 162, 235, 1)',
          borderWidth         : 1,
          data                : <?php echo json_encode($items_nilai[3]); ?>
        }
      ]
    };

    const config = {
        type: 'horizontalBar',
        data: data,
        maintainAspectRatio: false,
        options: {
          responsive: true,
          maintainAspectRatio: false
        }
    };

    new Chart(
      ctx, config
    );
  }
</script>
@endsection


