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
              <img id="logo-white-img " class="img-center" style="height: 100px;" src="{{asset('fe/images/logo-white-5.png')}}" alt="">
              <img id="logo-img" class="img-center sticky-logo" style="height: 100px;" src="{{asset('fe/images/logo-color-5.png')}}" alt="">
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation"> <span></span>
              <span></span>
              <span></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
              <ul class="navbar-nav ml-auto mr-auto">
                <!-- Home -->
                <li class="nav-item dropdown" data-toggle="hover"> 
                  <a class="nav-link " href="{{route('landing_page')}}" role="button" aria-haspopup="true" aria-expanded="false">BERANDA</a>
                </li>
                <li class="nav-item dropdown" data-toggle="hover"> 
                  <a class="nav-link " href="{{route('frontend.profil.index')}}" role="button" aria-haspopup="true" aria-expanded="false">PROFIL</a>
                </li>
                <li class="nav-item dropdown" data-toggle="hover"> 
                  <a class="nav-link " href="{{route('frontend.berita.index')}}" role="button" aria-haspopup="true" aria-expanded="false">BERITA</a>
                </li>
                <li class="nav-item dropdown" data-toggle="hover"> <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">SAKIP</a>
                  <div class="dropdown-menu">
                    <ul class="list-unstyled">
                      <li><a href="{{route('frontend.pembangunan_kehutanan.renstra_strategis')}}">RENSTRA</a>
                      </li>
                      <li><a href="{{route('frontend.pembangunan_kehutanan.rencana_kerja')}}">RENCANA KERJA</a>
                      </li>
                      <li><a href="{{route('frontend.profil.lkjip')}}">LKJIP</a>
                      </li>
                    </ul>
                  </div>
                </li>
                <li class="nav-item dropdown" data-toggle="hover"> <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">INFO PUBLIK</a>
                  <div class="dropdown-menu">
                    <ul class="list-unstyled">
                      <li><a href="{{route('frontend.agenda.index')}}">AGENDA</a>
                      </li>
                      <li><a href="{{route('frontend.pengaduan_masyarakat.index')}}">PENGADUAN MASYARAKAT</a> 
                      </li>
                      <li><a href="{{route('frontend.pelaporan_gratifikasi.index')}}">PELAPORAN GRATIFIKASI</a> 
                      </li>
                      <li><a href="{{route('frontend.wbs.index')}}">WBS</a> 
                      </li>
                      <!--<li><a href="https://forms.gle/YvVE8ziSpsDyuorBA">PENGADUAN MASYARAKAT</a>
                      </li>-->
                      <li><a href="{{route('frontend.link_layanan.index')}}">LINK LAYANAN</a>
                      </li>
                       <!--<li><a href="{{route('frontend.download_materi.index')}}">MATERI</a> -->
                      </li>
                      <li><a href="{{route('frontend.galeri.index')}}">GALERI</a>
                      </li>
                      <li><a href="{{route('frontend.peraturan_perundangan.index')}}">INFORMASI</a></li>
                      <!--<li><a href="{{route('frontend.anggaran_tahunan.index')}}">ANGGARAN TAHUNAN</a></li>-->
                      <li><a href="{{route('frontend.rekapitulasi.index')}}">REKAPITULASI TINDAK LANJUT</a></li>
                      <li><a href="{{route('frontend.evakuasi')}}">PROSEDUR PERINGATAN DINI DAN <BR> EVAKUASI KEADAAN DARURAT</a> 
                      </li>
                    </ul>
                  </div>
                </li>
                <li class="nav-item dropdown" data-toggle="hover"> 
                  <a class="nav-link ht-nav-toggle" href="#" role="button" aria-haspopup="true" aria-expanded="false">KONTAK</a>
                </li>
              </ul>
             
            </div>
            {{-- <div class="right-nav"><a href="#" class="ht-nav-toggle"><span></span></a>
            </div> --}}

            
             <a class="navbar-brand logo cetar" href="{{route('landing_page')}}">
              <img id="logo-white-img" class="img-center" style="height: 65px;" src="{{asset('fe/images/logo2.png')}}" alt="">
              <img id="logo-img" class="img-center sticky-logo" style="height: 65px;" src="{{asset('fe/images/logo2.png')}}" alt="">
            </a>
          </nav>
        </div>
      </div>
    </div>
  </div>
</header>

<nav id="ht-main-nav"> <a href="#" class="ht-nav-toggle active"><span></span></a>
  <div class="container">
    <div class="row">
      <div class="col-md-12">
         <img id="logo-img" class="img-center sticky-logo" src="{{asset('fe/images/logo-color-5.png')}}" alt="">
        <p class="mb-5" style="text-align: justify;"></p>
        <div class="form-info">
          <h4 class="title">Informasi Kontak</h4>
          
      <iframe src="https://www.google.com/maps/embed?pb=!1m23!1m12!1m3!1d253200.92321791695!2d112.72841686936292!3d-7.435965655446553!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!4m8!3e6!4m0!4m5!1s0x2dd7e49116037c7f%3A0xed01b10ddc30f4!2sJl.%20Raya%20Bandara%20Juanda%20No.8%2C%20Dusun%20Pager%2C%20Sawotratap%2C%20Kec.%20Gedangan%2C%20Kabupaten%20Sidoarjo%2C%20Jawa%20Timur%2061254!3m2!1d-7.374858799999999!2d112.73116139999999!5e0!3m2!1sid!2sid!4v1684739374109!5m2!1sid!2sid" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>

          <ul class="contact-info list-unstyled mt-4">
            <li class="mb-4"><i class="flaticon-location"></i><span>Alamat:</span>
              <p>{{$kontak->alamat}}</p>
            </li>
            <li class="mb-4"><i class="flaticon-call"></i><span>Telp:</span><a href="#">{{$kontak->tlp}}</a>
            </li>
            <li class="mb-4"><i class="flaticon-call"></i><span>Fax:</span><a href="#">{{$kontak->fax}}</a>
            </li>
            <li><i class="flaticon-email"></i><span>Email</span><a href="mailto:{{$kontak->email}}"> {{$kontak->email}}</a>
            </li>
          </ul>
        </div>
        <div class="social-icons social-colored mt-5">
          <ul class="list-inline">
            <li class="mb-2 social-facebook"><a target="_blank" href="{{$kontak->facebook}}"><i class="fab fa-facebook-f"></i></a>
            </li>
         <!--   <li class="mb-2 social-twitter"><a target="_blank" href="{{$kontak->twitter}}"><i class="fab fa-twitter"></i></a>
            </li>-->
            <li class="mb-2 social-youtube"><a target="_blank" href="{{$kontak->youtube}}"><i class="fab fa-youtube"></i></a>
            </li>
            <li class="mb-2 social-instagram"><a target="_blank" href="{{$kontak->instagram}}"><i class="fab fa-instagram"></i></a>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</nav>

