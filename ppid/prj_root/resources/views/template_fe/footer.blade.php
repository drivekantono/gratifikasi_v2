<!--footer start-->
@php 
	use App\Log;
	$items = Log::all();
	$items->count();
@endphp
<footer class="footer white-bg pos-r o-hidden bg-contain" data-bg-img="images/pattern/03.png">
  <div class="round-p-animation"></div>
	<div class="primary-footer">
		<!--
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<p class="mb-3" style="text-align: justify;"></p>
					<div class="form-info">
						<h4 class="title">Informasi Kontak</h4>
						<ul class="contact-info list-unstyled mt-4">
							<li class="mb-3"><i class="flaticon-location"></i><p>Alamat : <b>{{$kontak->alamat}}</b></p>
							</li>
							<li class="mb-3"><i class="flaticon-call"></i><p>Telp : <b>{{$kontak->tlp}}</b></p>
							</li>
							<li><i class="flaticon-email"></i><p>Email : <b>{{$kontak->email}}</b></p>
							</li>
						</ul>
					</div>
					<div class="social-icons social-colored mt-5">
						<ul class="list-inline">
							<li class="social-facebook"><a target="_blank" href="{{$kontak->facebook}}"><i class="fab fa-facebook-f"></i></a>
							</li>
							<li class="social-youtube"><a target="_blank" href="{{$kontak->youtube}}"><i class="fab fa-youtube"></i></a>
							</li>
							<li class="social-instagram"><a target="_blank" href="{{$kontak->instagram}}"><i class="fab fa-instagram"></i></a>
							</li>
						</ul>
					</div>
					<p class="mb-3" style="text-align: justify;"></p> 	
				</div>
			</div>
		</div>
		-->
	</div>
	<div class="secondary-footer">
		<div class="container">
			<div class="copyright">
				<div class="row align-items-center">
					<div class="col-md-6"> <span>Copyright 2019{{ date('Y') > 2019 ? ' - ' . date('Y') : '' }}  <span><a href="#">PPID INSPEKTORAT PROVINSI JAWA TIMUR</a></span></span>
					</div>
					<div class="col-md-6 text-md-right sm-mt-2">Total Pengunjung {{ $items->count() }}
					</div>
				</div>
			</div>
		</div>
	</div>
</footer>

<!--footer end-->