<!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      
      <ul class="sidebar-menu" data-widget="tree">
        @if(Auth::User()->role === 'admin' || Auth::User()->role === 'super')
          <li>
            <a href="{{ route('admin.agenda.index') }}">
              <i class="fa fa-table"></i> <span>Agenda</span>
            </a>
          </li>
          
          <li>
            <a href="{{ route('admin.slider.index') }}">
              <i class="fa fa-sliders"></i> <span>Slider</span>
            </a>
          </li>
          <li class="treeview">
            <a href="#">
              <i class="fa fa-newspaper-o"></i> <span>Berita</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu" >
              <li><a href="{{ route('admin.kategori_berita.index') }}"><i class="fa fa-circle-o"></i>Kategori Berita</a></li>
              <li><a href="{{ route('admin.berita.index') }}"><i class="fa fa-circle-o"></i>List Berita</a></li>
            </ul>
          </li>
          <li class="treeview">
            <a href="#">
              <i class="fa fa-newspaper-o"></i> <span>Galeri</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu" >
              <li><a href="{{ route('admin.galeri.index') }}"><i class="fa fa-circle-o"></i>Umum</a></li>
              <li><a href="{{route('admin.galeri_inspektorat.index')}}"><i class="fa fa-circle-o"></i>Mantan Inspektur</a></li>
            </ul>
          </li>
           <li class="treeview">
            <a href="#">
              <i class="fa fa-user"></i> <span>Profil</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li><a href="{{ route('admin.visi_misi.edit') }}"><i class="fa fa-circle-o"></i>Visi & Misi</a></li>
              <li><a href="{{ route('admin.tujuan.edit') }}"><i class="fa fa-circle-o"></i>Tujuan</a></li>
              <li><a href="{{ route('admin.KewenanganFungsi.edit') }}"><i class="fa fa-circle-o"></i>Tugas & Fungsi</a></li>
              <li><a href="{{route('admin.struktur_organisasi2.index')}}"><i class="fa fa-circle-o"></i>Struktur Organisasi</a></li>
              <li><a href="{{ route('admin.master.index') }}"><i class="fa fa-circle-o"></i>Master Data</a></li>
            </ul>
          </li>
           <li class="treeview">
            <a href="#">
              <i class="fa fa-newspaper-o"></i> <span>SAKIP</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu" >
              <li><a href="{{ route('admin.renstra_strategis.index') }}"><i class="fa fa-circle-o"></i>Renstra</a></li>
              <li><a href="{{ route('admin.rencana_kerja.index') }}"><i class="fa fa-circle-o"></i>Rencana Kerja</a></li>
              <li><a href="{{ route('admin.lkjip.index') }}"><i class="fa fa-circle-o"></i>LKPJ</a></li>
            </ul>
          </li>
          <li class="treeview">
            <a href="#">
              <i class="fa fa-info"></i> <span>Informasi Publik</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu" >
              <li><a href="{{ route('admin.link_layanan.index') }}"><i class="fa fa-circle-o"></i>Link Layanan</a></li>
              <li><a href="{{ route('admin.link_informasi.index') }}"><i class="fa fa-circle-o"></i>Link Informasi</a></li>
              <li><a href="{{ route('admin.download_materi.index') }}"><i class="fa fa-circle-o"></i>Download Materi</a></li>
              <li><a href="{{ route('admin.peraturan_perundangan.index') }}"><i class="fa fa-circle-o"></i>Peraturan Perundangan</a></li>
              <li><a href="{{ route('admin.anggaran_tahunan.index') }}"><i class="fa fa-circle-o"></i>Anggaran Tahunan</a></li>
              <li><a href="{{ route('admin.rekapitulasi.index') }}"><i class="fa fa-circle-o"></i>Rekapitulasi Tindak Lanjut</a></li>
              <li><a href="{{ route('admin.pengaduan_masyarakat.index') }}"><i class="fa fa-circle-o"></i>Pengaduan Masyarakat</a></li>
            </ul>
          </li>
		  <li class="treeview">
		    <a href="#">
			  <i class="fa fa-file"></i> <span>PPID</span>
			  <span class="pull-right-container">
			    <i class="fa fa-angle-left pull-right"></i>
			  </span>
			</a>
			<ul class="treeview-menu" >
			  <li><a href="{{ route('admin.ppid.permohonan_informasi') }}"><i class="fa fa-circle-o"></i>Permohonan Informasi</a></li>
			</ul>
		  </li>
          <li>
            <a href="{{ route('admin.contact_us.edit') }}">
              <i class="fa fa-phone-square"></i> <span>Hubungi Kami</span>
            </a>
          </li>
          <li>
            <a href="{{route('admin.log.index')}}">
              <i class="fa fa-users"></i> <span>Log Pengunjung</span>
            </a>
          </li>
          <li>
            <a href="{{route('admin.aspirasi.index')}}">
              <i class="fa fa-users"></i> <span>Aspirasi Masyarakat</span>
            </a>
          </li>
        @endif

        @if(Auth::User()->role === 'super')
          <li>
            <a href="{{route('admin.manajemen_user.index')}}">
              <i class="fa fa-users"></i> <span>Manajemen User</span>
            </a>
          </li>
        @endif

        @if(Auth::User()->role === 'dumas')
          <li class="treeview menu-open" style="height: auto;">
            <a href="#">
              <i class="fa fa-users"></i> <span>Pengaduan Masyarakat</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu" style="display: block;">
              <li><a href="{{ route('admin.pengaduan_masyarakat_lookup.index') }}"><i class="fa fa-circle-o"></i>Lookup</a></li>
              <li><a href="{{ route('admin.pengaduan_masyarakat_data.index') }}"><i class="fa fa-circle-o"></i>Data Dumas</a></li>
              <li><a href="{{ route('admin.pengaduan_masyarakat_data.index') }}"><i class="fa fa-circle-o"></i>Monitor</a></li>
            </ul>
          </li>
        @endif

        @if(Auth::User()->role === 'gratifikasi')
          <li class="treeview menu-open" style="height: auto;">
            <a href="#">
              <i class="fa fa-users"></i> <span>Pelaporan Gratifikasi</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu" style="display: block;">
              <li><a href="{{ route('admin.pelaporan_gratifikasi_lookup.index') }}"><i class="fa fa-circle-o"></i>Lookup</a></li>
              <li><a href="{{ route('admin.pelaporan_gratifikasi_form.index') }}"><i class="fa fa-circle-o"></i>Data Unggah Form</a></li>
              <li><a href="{{ route('admin.pelaporan_gratifikasi_data.index') }}"><i class="fa fa-circle-o"></i>Data Pelaporan</a></li>
              <!--<li><a href="{{ route('admin.pelaporan_gratifikasi_upgp.index') }}"><i class="fa fa-circle-o"></i>Laporan UPG Pembantu</a></li>-->
            </ul>
          </li>
        @endif
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>
