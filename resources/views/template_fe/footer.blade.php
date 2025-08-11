<!--footer start-->
@php 
	use App\Log;
	$items = Log::all();
	$items->count();
@endphp
<footer class="footer white-bg pos-r o-hidden bg-contain" data-bg-img="images/pattern/01.png">
  <div class="round-p-animation"></div>
	<div class="primary-footer">
	<div class="secondary-footer">
		<div class="container">
			<div class="copyright">
				<div class="row align-items-center">
					<div class="col-md-6"> <span>Copyright 2019{{ date('Y') > 2019 ? ' - ' . date('Y') : '' }}  <span>INSPEKTORAT <a href="#">PROVINSI JAWA TIMUR</a></span></span>
					</div>
					<div class="col-md-6 text-md-right sm-mt-2">Total Pengunjung {{ $items->count() }}
					</div>
				</div>
			</div>
		</div>
	</div>
</footer>

<!--footer end-->