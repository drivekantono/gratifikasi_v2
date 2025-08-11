<style type="text/css">
    @media (max-width: 360px)
      .logo img {
          height: 100px;
  }
</style>

<header id="site-header" class="header header-2">
	<div id="header-wrap">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<!-- Navbar -->
					<nav class="navbar navbar-expand-lg">
						<a class="navbar-brand logo " href="{{route('landing_page')}}">
							<img id="logo-white-img " class="img-center" style="height: 50px;" src="{{asset('fe/images/ppid-color-1.png')}}" alt="">
							<img id="logo-img" class="img-center sticky-logo" style="height: 50px;" src="{{asset('fe/images/ppid-white-1.png')}}" alt="">
						</a>
						<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation"> <span></span>
							<span></span>
							<span></span>
						</button>
						<div class="collapse navbar-collapse" id="navbarNavDropdown">
							<ul class="navbar-nav ml-auto mr-auto">
								<!-- Home -->
								<li class="nav-item dropdown" data-toggle="hover"> 
									<a class="nav-link " href="{{route('landing_page')}}" role="button" aria-haspopup="true" aria-expanded="false">Beranda</a>
								</li>
								<li class="nav-item dropdown" data-toggle="hover"> 
									<a class="nav-link " href="{{route('ppid.profil.index')}}" role="button" aria-haspopup="true" aria-expanded="false">Profil</a>
								</li>
								<li class="nav-item dropdown" data-toggle="hover"> 
									<a class="nav-link " href="{{route('ppid.alur.index')}}" role="button" aria-haspopup="true" aria-expanded="false">Alur</a>
								</li>
								<li class="nav-item dropdown" data-toggle="hover"> <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Layanan</a>
									<div class="dropdown-menu">
										<ul class="list-unstyled">
											<li><a href="{{route('ppid.layanan.daftar_informasi')}}">Daftar Informasi</a></li>
											@if (empty(Auth::user()->name))
												<li><a href="{{route('login')}}">Permohonan Informasi</a></li>
											@else
												<li><a href="{{route('ppid.layanan.permohonan_informasi')}}">Permohonan Informasi</a></li>
											@endif

											@if (empty(Auth::user()->name))
												<li><a href="{{route('login')}}">Keberatan Informasi</a></li>
											@else
												<li><a href="{{route('ppid.layanan.permohonan_keberatan')}}">Permohonan Keberatan</a></li>
											@endif

											@if (empty(Auth::user()->name))
												<li><a href="{{route('login')}}">Laporan Akses Informasi Publik</a></li>
											@else
												<li><a href="{{route('ppid.layanan.laporan_akses_informasi_publik')}}">Laporan Akses Informasi Publik</a></li>
											@endif
										</ul>
									</div>
								</li>
								<li class="nav-item dropdown" data-toggle="hover"> 
									<a class="nav-link " href="{{route('ppid.regulasi')}}" role="button" aria-haspopup="true" aria-expanded="false">Regulasi</a>
								</li>
								@if (empty(Auth::user()->name))
									<li class="nav-item dropdown" data-toggle="hover"> 
										<a class="nav-link " href="{{ route('login') }}" role="button" aria-haspopup="true" aria-expanded="false">Masuk</a>
									</li>
								@else
									<li class="nav-item dropdown" data-toggle="hover"> <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{ Auth::user()->name }}</a>
										<div class="dropdown-menu">
											<ul class="list-unstyled">
												<li><a href="{{route('user.dashboard')}}">Dashboard</a></li>
												<li><a href="{{route('user.informasi_akun')}}">Informasi Akun</a></li>
												<li><a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Keluar</a>
													<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">@csrf</form>
												</li>
											</ul>
										</div>
									</li>
								@endif
							</ul>
						</div>
						{{-- <div class="right-nav"><a href="#" class="ht-nav-toggle"><span></span></a>
						</div> --}}

						<a class="navbar-brand logo cetar" href="{{route('landing_page')}}">
							<img id="logo-white-img" class="img-center" style="height: 65px;" src="{{asset('fe/images/logo-white-5.png')}}" alt="">
							<img id="logo-img" class="img-center sticky-logo" style="height: 65px;" src="{{asset('fe/images/logo-color-5.png')}}" alt="">
						</a>
					</nav>
				</div>
			</div>
		</div>
	</div>
</header>
