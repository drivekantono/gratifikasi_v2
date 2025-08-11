<?php

//Route::get('/{any}', 'DashboardController@dashboard')->where('any', '.*');

Route::get('/', 'DashboardController@dashboard')->name('landing_page');

//berita
Route::get('/berita/{id}', 'frontend\BeritaController@show')->name('frontend.berita.show');
Route::get('/berita', 'frontend\BeritaController@index')->name('frontend.berita.index');
Route::get('/berita/category/{id}', 'frontend\BeritaController@bycategory')->name('frontend.berita.bycategory');

//profil
Route::get('/tugas_dan_fungsi', 'frontend\ProfilController@tugasDanFungsi')->name('frontend.profil.tugas_dan_fungsi');
Route::get('/sdm','frontend\ProfilController@sdm')->name('frontend.profil.sdm');
Route::get('/struktur_organisasi','frontend\ProfilController@strukturOrganisasi')->name('frontend.profil.struktur_organisasi');
Route::get('/kedudukan_alamat','frontend\ProfilController@kedudukanDanAlamat')->name('frontend.profil.kedudukan_dan_alamat');
Route::get('/profil','frontend\ProfilController@index')->name('frontend.profil.index');
Route::get('/profil/lkjip', 'frontend\ProfilController@lkjip')->name('frontend.profil.lkjip');
Route::post('/profil/lkjip/bytahun', 'frontend\ProfilController@lkjipbytahun')->name('frontend.lkjip.bytahun');


//pembangunan kehutanan
Route::get('/pembangunan_kehutanan/nbs', 'frontend\PembangunanKehutananController@nbs')->name('frontend.pembangunan_kehutanan.nbs');
Route::get('/sakip/renstra_strategis', 'frontend\PembangunanKehutananController@renstraStrategis')->name('frontend.pembangunan_kehutanan.renstra_strategis');
Route::get('/sakip/rencana_kerja', 'frontend\PembangunanKehutananController@rencanaKerja')->name('frontend.pembangunan_kehutanan.rencana_kerja');
Route::post('/sakip/renstra_strategis/bytahun', 'frontend\PembangunanKehutananController@bytahun')->name('frontend.pembangunan_kehutanan.bytahun');
Route::post('/sakip/rencana_kerja/bytahun', 'frontend\PembangunanKehutananController@RenKerbytahun')->name('frontend.pembangunan_kehutanan.RenKenbytahun');


//Galeri
Route::get('/galeri', 'frontend\GaleriController@index')->name('frontend.galeri.index');
Route::post('/galeri/filter', 'frontend\GaleriController@filter')->name('frontend.galeri.filter');
// Route::post('/galeri/filter', 'frontend\GaleriController@filter')->name('frontend.galeri.filter');

//informasi public
Route::get('/peraturan_perundangan', 'frontend\InformasiPublicController@peraturanPerundangan')->name('frontend.peraturan_perundangan.index');
Route::get('/data_spasial_kehutanan', 'frontend\InformasiPublicController@dataSPasialKehutanan')->name('frontend.data_spasial_kehutanan.index');
Route::get('/pengaduan_masyarakat', 'frontend\InformasiPublicController@pengaduanMasyarakat')->name('frontend.pengaduan_masyarakat.index');
//tambah baru ARIC 2025-01-31
Route::get('/pelaporan_gratifikasi', 'frontend\InformasiPublicController@pelaporanGratifikasi')->name('frontend.pelaporan_gratifikasi.index');
Route::post('pelaporan_gratifikasi_data/store', 'PelaporanGratifikasiDataController@store')->name('frontend.pelaporan_gratifikasi_data.store');
Route::post('pelaporan_gratifikasi_form/store', 'PelaporanGratifikasiFormController@store')->name('frontend.pelaporan_gratifikasi_form.store');

//tambah baru ARIC 2022-09-07
Route::post('pengaduan_masyarakat_data/store', 'PengaduanMasyarakatDataController@store')->name('frontend.pengaduan_masyarakat_data.store');
//tambah baru kadek 19-03-2024
Route::get('/evakuasi', 'frontend\InformasiPublicController@evakuasi')->name('frontend.evakuasi');
//tambah baru ARIC 2024-09-11
Route::get('/wbs', 'frontend\InformasiPublicController@wbs')->name('frontend.wbs.index');

Route::get('/iso', 'frontend\InformasiPublicController@iso')->name('frontend.iso.index');
Route::get('/link_layanan', 'frontend\InformasiPublicController@linkLayanan')->name('frontend.link_layanan.index');
Route::get('/download_materi', 'frontend\InformasiPublicController@downloadMateri')->name('frontend.download_materi.index');
Route::get('/objek_wisata_alam', 'frontend\InformasiPublicController@objekWisataAlam')->name('frontend.objek_wisata_alam.index');
Route::get('/objek_wisata_alam/{id}', 'frontend\InformasiPublicController@objekWisataAlamShow')->name('frontend.objek_wisata_alam.show');

Route::get('/peraturan_perundangan/{id}/show', 'PeraturanPerundanganController@show')->name('user.peraturan_perundangan.show');
Route::get('/download_materi/{id}/show', 'DownloadMateriController@show')->name('user.download_materi.show');

Route::get('/sakip', 'frontend\InformasiPublicController@sakip')->name('frontend.sakip.index');
Route::post('/sakip/bytahun', 'frontend\InformasiPublicController@sakipbytahun')->name('frontend.sakip.sakipbytahun');
Route::get('/kehutanan_dalam_angka', 'frontend\InformasiPublicController@kehutananDalamAngka')->name('frontend.kehutanan_dalam_angka.index');
Route::post('/kehutanan_dalam_angka/bytahun', 'frontend\InformasiPublicController@kehutananDalamAngkabytahun')->name('frontend.kehutanan_dalam_angka.bytahun');


//Perhutanan sosial
Route::get('perhutanan_sosial', 'frontend\PerhutananSosialController@index')->name('frontend.perhutanan_sosial.index');


//agenda
Route::get('/agenda', 'frontend\AgendaController@index')->name('frontend.agenda.index');

//aspirasi
Route::post('/aspirasi/storetodb', 'frontend\AspirasiController@store')->name('frontend.aspirasi.store');
Route::get('/aspirasi','frontend\AspirasiController@index')->name('frontend.aspirasi.index');


Route::get('/anggaran_tahunan', 'frontend\AnggaranTahunanController@index')->name('frontend.anggaran_tahunan.index');
Route::post('/anggaran_tahunan/bytahun', 'frontend\AnggaranTahunanController@bytahun')->name('frontend.anggaran_tahunan.bytahun');

Route::get('/rekapitulasi', 'frontend\RekapitulasiController@index')->name('frontend.rekapitulasi.index');
	
Route::get('/coba', 'App/Http/Controllers/CobaController@index');


//====================================================================================================================

Auth::routes();

Route::group(['middleware' => 'role:admin', 'prefix' => 'admin'], function() {
    Route::get('home', 'HomeController@index')->name('admin.home');

    Route::get('log', 'LogController@index')->name('admin.log.index');
    Route::get('log/detail/{filter}', 'LogController@filter')->name('admin.log.filter');
    
	//Agenda Route
    Route::get('/agenda', 'AgendaController@index')->name('admin.agenda.index');
	Route::get('/agenda/create', 'AgendaController@create')->name('admin.agenda.create');
	Route::post('agenda/store', 'AgendaController@store')->name('admin.agenda.store');
	Route::get('/agenda/{id}/show', 'AgendaController@show')->name('admin.agenda.show');
	Route::get('/agenda/{id}/edit', 'AgendaController@edit')->name('admin.agenda.edit');
	Route::post('/agenda/{id}/update', 'AgendaController@update')->name('admin.agenda.update');
	Route::get('/agenda/{id}/destroy', 'AgendaController@destroy')->name('admin.agenda.destroy');

	//Berita Route
	Route::get('/berita', 'BeritaController@index')->name('admin.berita.index');
	Route::get('/berita/create', 'BeritaController@create')->name('admin.berita.create');
	Route::post('berita/store', 'BeritaController@store')->name('admin.berita.store');
	Route::get('/berita/{id}/show', 'BeritaController@show')->name('admin.berita.show');
	Route::get('/berita/{id}/edit', 'BeritaController@edit')->name('admin.berita.edit');
	Route::post('/berita/{id}/update', 'BeritaController@update')->name('admin.berita.update');
	Route::get('/berita/{id}/destroy', 'BeritaController@destroy')->name('admin.berita.destroy');

	//profil
	Route::get('/profil', 'Profil\MasterController@index')->name('admin.master.index');
	Route::get('/profil/create', 'Profil\MasterController@create')->name('admin.master.create');
	Route::post('profil/store', 'Profil\MasterController@store')->name('admin.master.store');
	Route::get('/profil/{id}/show', 'Profil\MasterController@show')->name('admin.master.show');
	Route::get('/profil/{id}/edit', 'Profil\MasterController@edit')->name('admin.master.edit');
	Route::post('/profil/{id}/update', 'Profil\MasterController@update')->name('admin.master.update');
	Route::get('/profil/{id}/destroy', 'Profil\MasterController@destroy')->name('admin.master.destroy');
	//profil->modul di profil
	Route::get('/profil/edit/kewenangan-fungsi', 'Profil\KewenanganFungsiController@edit')->name('admin.KewenanganFungsi.edit');
	Route::get('/profil/edit/sekretarait-bidang', 'Profil\SekretariatBidangController@edit')->name('admin.SekretariatBidang.edit');
	Route::get('/profil/edit/profil-kepala-dinas', 'Profil\ProfilKepalaDinasController@edit')->name('admin.ProfilKepalaDinas.edit');
	Route::get('/profil/edit/sdm', 'Profil\SdmController@edit')->name('admin.Sdm.edit');
	Route::get('/profil/edit/struktur-organisasi', 'Profil\StrukturOrganisasiController@edit')->name('admin.StrukturOrganisasi.edit');
	Route::get('/profil/edit/kedudukan-alamat', 'Profil\KedudukanAlamatController@edit')->name('admin.KedudukanAlamat.edit');
	Route::get('/profil/edit/tujuan', 'Profil\TujuanController@edit')->name('admin.tujuan.edit');
	Route::get('/profil/edit/visimisi', 'Profil\VisiMisiController@edit')->name('admin.visi_misi.edit');
	
	//PPID
	Route::get('/ppid/permohonan_informasi', 'ppid\PPIDController@permohonan_informasi')->name('admin.ppid.permohonan_informasi');
	Route::get('/ppid/permohonan_informasi/{pi_no}/show', 'ppid\PPIDController@permohonan_informasi_show')->name('admin.ppid.permohonan_informasi_show');
	Route::get('/ppid/permohonan_informasi/{pi_no}/edit', 'ppid\PPIDController@permohonan_informasi_edit')->name('admin.ppid.permohonan_informasi_edit');
	Route::post('/ppid/permohonan_informasi/{pi_no}/update', 'ppid\PPIDController@permohonan_informasi_update')->name('admin.ppid.permohonan_informasi_update');
	Route::get('/ppid/permohonan_informasi/{pi_no}/destroy', 'ppid\PPIDController@permohonan_informasi_destroy')->name('admin.ppid.permohonan_informasi_destroy');

	//pembangunan Hutan
	Route::get('/pembangunan_hutan', 'Pembangunan_hutan\MasterController@index')->name('admin.master_ph.index');
	Route::get('/pembangunan_hutan/create', 'Pembangunan_hutan\MasterController@create')->name('admin.master_ph.create');
	Route::post('Pembangunan_hutan/store', 'Pembangunan_hutan\MasterController@store')->name('admin.master_ph.store');
	Route::get('/pembangunan_hutan/{id}/show', 'Pembangunan_hutan\MasterController@show')->name('admin.master_ph.show');
	Route::get('/pembangunan_hutan/{id}/edit', 'Pembangunan_hutan\MasterController@edit')->name('admin.master_ph.edit');
	Route::post('/pembangunan_hutan/{id}/update', 'Pembangunan_hutan\MasterController@update')->name('admin.master_ph.update');
	Route::get('/pembangunan_hutan/{id}/destroy', 'Pembangunan_hutan\MasterController@destroy')->name('admin.master_ph.destroy');
	//pembangunan Hutan->modul di pembangunan hutan
	Route::get('/profil/edit/tujuan_umum_pembangunan', 'Pembangunan_hutan\TujuanUmumPembangunanController@edit')->name('admin.TujuanUmumPembangunan.edit');
	Route::get('/profil/edit/kegiatan_pembangunan', 'Pembangunan_hutan\KegiatanPembangunanController@edit')->name('admin.KegiatanPembangunan.edit');
	Route::get('/profil/edit/visi_misi', 'Pembangunan_hutan\VisiMisiController@edit')->name('admin.VisiMisi.edit');
	Route::get('/profil/edit/kebijakan_strategi', 'Pembangunan_hutan\KebijakanStrategiController@edit')->name('admin.KebijakanStrategi.edit');
	Route::get('/profil/edit/agenda_prioritas', 'Pembangunan_hutan\AgendaPrioritasController@edit')->name('admin.AgendaPrioritas.edit');
	Route::get('/profil/edit/program_pembangunan', 'Pembangunan_hutan\ProgramPembangunanController@edit')->name('admin.ProgramPembangunan.edit');

	//PHBM
	Route::get('/phbm', 'Phbm\MasterController@index')->name('admin.master_phbm.index');
	Route::get('/phbm/create', 'Phbm\MasterController@create')->name('admin.master_phbm.create');
	Route::post('phbm/store', 'Phbm\MasterController@store')->name('admin.master_phbm.store');
	Route::get('/phbm/{id}/show', 'Phbm\MasterController@show')->name('admin.master_phbm.show');
	Route::get('/phbm/{id}/edit', 'Phbm\MasterController@edit')->name('admin.master_phbm.edit');
	Route::post('/phbm/{id}/update', 'Phbm\MasterController@update')->name('admin.master_phbm.update');
	Route::get('/phbm/{id}/destroy', 'Phbm\MasterController@destroy')->name('admin.master_phbm.destroy');
	// PHBM-->modul di phbm
	Route::get('/phbm/edit/tentang_phbm', 'Phbm\TentangPhbmController@edit')->name('admin.TentangPhbm.edit');
	Route::get('/phbm/edit/profil_kelompok_lmdh', 'Phbm\KelompokLmdhController@edit')->name('admin.KelompokLmdh.edit');
	Route::get('/phbm/edit/sharing_dan_produksi', 'Phbm\SharingProduksiController@edit')->name('admin.SharingProduksi.edit');

	//SLider
	Route::get('/slider', 'SliderController@index')->name('admin.slider.index');
	Route::get('/slider/create', 'SliderController@create')->name('admin.slider.create');
	Route::post('slider/store', 'SliderController@store')->name('admin.slider.store');
	Route::get('/slider/{id}/show', 'SliderController@show')->name('admin.slider.show');
	Route::get('/slider/{id}/edit', 'SliderController@edit')->name('admin.slider.edit');
	Route::post('/slider/{id}/update', 'SliderController@update')->name('admin.slider.update');
	Route::get('/slider/{id}/destroy', 'SliderController@destroy')->name('admin.slider.destroy');

	// gallery umum
	Route::get('/galeri', 'GaleriController@index')->name('admin.galeri.index');
	Route::get('/galeri/create', 'GaleriController@create')->name('admin.galeri.create');
	Route::post('galeri/store', 'GaleriController@store')->name('admin.galeri.store');
	Route::get('/galeri/{id}/show', 'GaleriController@show')->name('admin.galeri.show');
	Route::get('/galeri/{id}/edit', 'GaleriController@edit')->name('admin.galeri.edit');
	Route::post('/galeri/{id}/update', 'GaleriController@update')->name('admin.galeri.update');
	Route::get('/galeri/{id}/destroy', 'GaleriController@destroy')->name('admin.galeri.destroy');

	// gallery mantan inspektorat
	Route::get('/galeri_inspektorat', 'GaleriInspektoratController@index')->name('admin.galeri_inspektorat.index');
	Route::get('/galeri_inspektorat/create', 'GaleriInspektoratController@create')->name('admin.galeri_inspektorat.create');
	Route::post('galeri_inspektorat/store', 'GaleriInspektoratController@store')->name('admin.galeri_inspektorat.store');
	Route::get('/galeri_inspektorat/{id}/show', 'GaleriInspektoratController@show')->name('admin.galeri_inspektorat.show');
	Route::get('/galeri_inspektorat/{id}/edit', 'GaleriInspektoratController@edit')->name('admin.galeri_inspektorat.edit');
	Route::post('/galeri_inspektorat/{id}/update', 'GaleriInspektoratController@update')->name('admin.galeri_inspektorat.update');
	Route::get('/galeri_inspektorat/{id}/destroy', 'GaleriInspektoratController@destroy')->name('admin.galeri_inspektorat.destroy');

	// hutan rakyat
	Route::get('/hutan_rakyat', 'HutanRakyatController@index')->name('admin.hutan_rakyat.index');
	Route::get('/hutan_rakyat/create', 'HutanRakyatController@create')->name('admin.hutan_rakyat.create');
	Route::post('hutan_rakyat/store', 'HutanRakyatController@store')->name('admin.hutan_rakyat.store');
	Route::get('/hutan_rakyat/{id}/show', 'HutanRakyatController@show')->name('admin.hutan_rakyat.show');
	Route::get('/hutan_rakyat/{id}/edit', 'HutanRakyatController@edit')->name('admin.hutan_rakyat.edit');
	Route::post('/hutan_rakyat/{id}/update', 'HutanRakyatController@update')->name('admin.hutan_rakyat.update');
	Route::get('/hutan_rakyat/{id}/destroy', 'HutanRakyatController@destroy')->name('admin.hutan_rakyat.destroy');

	//peraturan perundangan
	Route::get('/peraturan_perundangan', 'PeraturanPerundanganController@index')->name('admin.peraturan_perundangan.index');
	Route::get('/peraturan_perundangan/create', 'PeraturanPerundanganController@create')->name('admin.peraturan_perundangan.create');
	Route::post('peraturan_perundangan/store', 'PeraturanPerundanganController@store')->name('admin.peraturan_perundangan.store');
	Route::get('/peraturan_perundangan/{id}/show', 'PeraturanPerundanganController@show')->name('admin.peraturan_perundangan.show');
	Route::get('/peraturan_perundangan/{id}/edit', 'PeraturanPerundanganController@edit')->name('admin.peraturan_perundangan.edit');
	Route::post('/peraturan_perundangan/{id}/update', 'PeraturanPerundanganController@update')->name('admin.peraturan_perundangan.update');
	Route::get('/peraturan_perundangan/{id}/destroy', 'PeraturanPerundanganController@destroy')->name('admin.peraturan_perundangan.destroy');

	//Objek Wisata Alam
	Route::get('/objek_wisata_alam', 'ObjekWisataAlamController@index')->name('admin.objek_wisata_alam.index');
	Route::get('/objek_wisata_alam/create', 'ObjekWisataAlamController@create')->name('admin.objek_wisata_alam.create');
	Route::post('objek_wisata_alam/store', 'ObjekWisataAlamController@store')->name('admin.objek_wisata_alam.store');
	Route::get('/objek_wisata_alam/{id}/show', 'ObjekWisataAlamController@show')->name('admin.objek_wisata_alam.show');
	Route::get('/objek_wisata_alam/{id}/edit', 'ObjekWisataAlamController@edit')->name('admin.objek_wisata_alam.edit');
	Route::post('/objek_wisata_alam/{id}/update', 'ObjekWisataAlamController@update')->name('admin.objek_wisata_alam.update');
	Route::get('/objek_wisata_alam/{id}/destroy', 'ObjekWisataAlamController@destroy')->name('admin.objek_wisata_alam.destroy');

	//Kategori Berita
	Route::get('/kategori_berita', 'Berita\KategoriBeritaController@index')->name('admin.kategori_berita.index');
	Route::get('/kategori_berita/create', 'Berita\KategoriBeritaController@create')->name('admin.kategori_berita.create');
	Route::post('kategori_berita/store', 'Berita\KategoriBeritaController@store')->name('admin.kategori_berita.store');
	Route::get('/kategori_berita/{id}/show', 'Berita\KategoriBeritaController@show')->name('admin.kategori_berita.show');
	Route::get('/kategori_berita/{id}/edit', 'Berita\KategoriBeritaController@edit')->name('admin.kategori_berita.edit');
	Route::post('/kategori_berita/{id}/update', 'Berita\KategoriBeritaController@update')->name('admin.kategori_berita.update');
	Route::get('/kategori_berita/{id}/destroy', 'Berita\KategoriBeritaController@destroy')->name('admin.kategori_berita.destroy');
	//berita
	Route::get('/berita', 'Berita\BeritaController@index')->name('admin.berita.index');
	Route::get('/berita/create', 'Berita\BeritaController@create')->name('admin.berita.create');
	Route::post('berita/store', 'Berita\BeritaController@store')->name('admin.berita.store');
	Route::get('/berita/{id}/show', 'Berita\BeritaController@show')->name('admin.berita.show');
	Route::get('/berita/{id}/edit', 'Berita\BeritaController@edit')->name('admin.berita.edit');
	Route::post('/berita/{id}/update', 'Berita\BeritaController@update')->name('admin.berita.update');
	Route::get('/berita/{id}/destroy', 'Berita\BeritaController@destroy')->name('admin.berita.destroy');


	//Link Layanan
	Route::get('/link_layanan', 'LinkLayananController@index')->name('admin.link_layanan.index');
	Route::get('/link_layanan/create', 'LinkLayananController@create')->name('admin.link_layanan.create');
	Route::post('link_layanan/store', 'LinkLayananController@store')->name('admin.link_layanan.store');
	Route::get('/link_layanan/{id}/show', 'LinkLayananController@show')->name('admin.link_layanan.show');
	Route::get('/link_layanan/{id}/edit', 'LinkLayananController@edit')->name('admin.link_layanan.edit');
	Route::post('/link_layanan/{id}/update', 'LinkLayananController@update')->name('admin.link_layanan.update');
	Route::get('/link_layanan/{id}/destroy', 'LinkLayananController@destroy')->name('admin.link_layanan.destroy');

	//Link Informasi
	Route::get('/link_informasi', 'LinkInformasiController@index')->name('admin.link_informasi.index');
	Route::get('/link_informasi/create', 'LinkInformasiController@create')->name('admin.link_informasi.create');
	Route::post('link_informasi/store', 'LinkInformasiController@store')->name('admin.link_informasi.store');
	Route::get('/link_informasi/{id}/show', 'LinkInformasiController@show')->name('admin.link_informasi.show');
	Route::get('/link_informasi/{id}/edit', 'LinkInformasiController@edit')->name('admin.link_informasi.edit');
	Route::post('/link_informasi/{id}/update', 'LinkInformasiController@update')->name('admin.link_informasi.update');
	Route::get('/link_informasi/{id}/destroy', 'LinkInformasiController@destroy')->name('admin.link_informasi.destroy');

	//Data Statistika
	Route::get('/data_statistika', 'DataStatistikaController@index')->name('admin.data_statistika.index');
	Route::get('/data_statistika/create', 'DataStatistikaController@create')->name('admin.data_statistika.create');
	Route::post('data_statistika/store', 'DataStatistikaController@store')->name('admin.data_statistika.store');
	Route::get('/data_statistika/{id}/show', 'DataStatistikaController@show')->name('admin.data_statistika.show');
	Route::get('/data_statistika/{id}/edit', 'DataStatistikaController@edit')->name('admin.data_statistika.edit');
	Route::post('/data_statistika/{id}/update', 'DataStatistikaController@update')->name('admin.data_statistika.update');
	Route::get('/data_statistika/{id}/destroy', 'DataStatistikaController@destroy')->name('admin.data_statistika.destroy');

	//Data Statistika
	Route::get('/sakip', 'SakipController@index')->name('admin.sakip.index');
	Route::get('/sakip/create', 'SakipController@create')->name('admin.sakip.create');
	Route::post('sakip/store', 'SakipController@store')->name('admin.sakip.store');
	Route::get('/sakip/{id}/show', 'SakipController@show')->name('admin.sakip.show');
	Route::get('/sakip/{id}/edit', 'SakipController@edit')->name('admin.sakip.edit');
	Route::post('/sakip/{id}/update', 'SakipController@update')->name('admin.sakip.update');
	Route::get('/sakip/{id}/destroy', 'SakipController@destroy')->name('admin.sakip.destroy');

	//Renstra Strategis
	Route::get('/renstra_strategis', 'RenstraStrategisController@index')->name('admin.renstra_strategis.index');
	Route::get('/renstra_strategis/create', 'RenstraStrategisController@create')->name('admin.renstra_strategis.create');
	Route::post('renstra_strategis/store', 'RenstraStrategisController@store')->name('admin.renstra_strategis.store');
	Route::get('/renstra_strategis/{id}/show', 'RenstraStrategisController@show')->name('admin.renstra_strategis.show');
	Route::get('/renstra_strategis/{id}/edit', 'RenstraStrategisController@edit')->name('admin.renstra_strategis.edit');
	Route::post('/renstra_strategis/{id}/update', 'RenstraStrategisController@update')->name('admin.renstra_strategis.update');
	Route::get('/renstra_strategis/{id}/destroy', 'RenstraStrategisController@destroy')->name('admin.renstra_strategis.destroy');

	//Renstra Strategis
	Route::get('/rencana_kerja', 'RencanaKerjaController@index')->name('admin.rencana_kerja.index');
	Route::get('/rencana_kerja/create', 'RencanaKerjaController@create')->name('admin.rencana_kerja.create');
	Route::post('rencana_kerja/store', 'RencanaKerjaController@store')->name('admin.rencana_kerja.store');
	Route::get('/rencana_kerja/{id}/show', 'RencanaKerjaController@show')->name('admin.rencana_kerja.show');
	Route::get('/rencana_kerja/{id}/edit', 'RencanaKerjaController@edit')->name('admin.rencana_kerja.edit');
	Route::post('/rencana_kerja/{id}/update', 'RencanaKerjaController@update')->name('admin.rencana_kerja.update');
	Route::get('/rencana_kerja/{id}/destroy', 'RencanaKerjaController@destroy')->name('admin.rencana_kerja.destroy');

	//Contact US
	Route::get('/contact_us', 'ContactUsController@index')->name('admin.contact_us.index');
	Route::get('/contact_us/create', 'ContactUsController@create')->name('admin.contact_us.create');
	Route::post('contact_us/store', 'ContactUsController@store')->name('admin.contact_us.store');
	Route::get('/contact_us/{id}/show', 'ContactUsController@show')->name('admin.contact_us.show');
	Route::get('/contact_us/edit', 'ContactUsController@edit')->name('admin.contact_us.edit');
	Route::post('/contact_us/{id}/update', 'ContactUsController@update')->name('admin.contact_us.update');
	Route::get('/contact_us/{id}/destroy', 'ContactUsController@destroy')->name('admin.contact_us.destroy');


	//Produk-Foto
	Route::get('/produk', 'ProdukController@index')->name('admin.produk.index');
	Route::get('/produk/create', 'ProdukController@create')->name('admin.produk.create');
	Route::post('produk/store', 'ProdukController@store')->name('admin.produk.store');
	Route::get('/produk/{id}/show', 'ProdukController@show')->name('admin.produk.show');
	Route::get('/produk/{id}/edit', 'ProdukController@edit')->name('admin.produk.edit');
	Route::post('/produk/{id}/update', 'ProdukController@update')->name('admin.produk.update');
	Route::get('/produk/{id}/destroy', 'ProdukController@destroy')->name('admin.produk.destroy');

	//-PROGRES PERHUTANAN SOSIAL JAWA TIMUR
	Route::get('/pps_jatim', 'PpsJatimController@index')->name('admin.pps_jatim.index');
	Route::get('/pps_jatim/create', 'PpsJatimController@create')->name('admin.pps_jatim.create');
	Route::post('pps_jatim/store', 'PpsJatimController@store')->name('admin.pps_jatim.store');
	Route::get('/pps_jatim/{id}/show', 'PpsJatimController@show')->name('admin.pps_jatim.show');
	Route::get('/pps_jatim/{id}/edit', 'PpsJatimController@edit')->name('admin.pps_jatim.edit');
	Route::post('/pps_jatim/{id}/update', 'PpsJatimController@update')->name('admin.pps_jatim.update');
	Route::get('/pps_jatim/{id}/destroy', 'PpsJatimController@destroy')->name('admin.pps_jatim.destroy');

	//Instansi Kehutanan
	Route::get('/instansi_kehutanan', 'InstansiKehutananController@index')->name('admin.instansi_kehutanan.index');
	Route::get('/instansi_kehutanan/create', 'InstansiKehutananController@create')->name('admin.instansi_kehutanan.create');
	Route::post('instansi_kehutanan/store', 'InstansiKehutananController@store')->name('admin.instansi_kehutanan.store');
	Route::get('/instansi_kehutanan/{id}/show', 'InstansiKehutananController@show')->name('admin.instansi_kehutanan.show');
	Route::get('/instansi_kehutanan/{id}/edit', 'InstansiKehutananController@edit')->name('admin.instansi_kehutanan.edit');
	Route::post('/instansi_kehutanan/{id}/update', 'InstansiKehutananController@update')->name('admin.instansi_kehutanan.update');
	Route::get('/instansi_kehutanan/{id}/destroy', 'InstansiKehutananController@destroy')->name('admin.instansi_kehutanan.destroy');

	//Download Materi
	Route::get('/download_materi', 'DownloadMateriController@index')->name('admin.download_materi.index');
	Route::get('/download_materi/create', 'DownloadMateriController@create')->name('admin.download_materi.create');
	Route::post('download_materi/store', 'DownloadMateriController@store')->name('admin.download_materi.store');
	Route::get('/download_materi/{id}/show', 'DownloadMateriController@show')->name('admin.download_materi.show');
	Route::get('/download_materi/{id}/edit', 'DownloadMateriController@edit')->name('admin.download_materi.edit');
	Route::post('/download_materi/{id}/update', 'DownloadMateriController@update')->name('admin.download_materi.update');
	Route::get('/download_materi/{id}/destroy', 'DownloadMateriController@destroy')->name('admin.download_materi.destroy');

	//-PROGRES PERHUTANAN SOSIAL JAWA TIMUR
	Route::get('/lkjip', 'LkjipController@index')->name('admin.lkjip.index');
	Route::get('/lkjip/create', 'LkjipController@create')->name('admin.lkjip.create');
	Route::post('lkjip/store', 'LkjipController@store')->name('admin.lkjip.store');
	Route::get('/lkjip/{id}/show', 'LkjipController@show')->name('admin.lkjip.show');
	Route::get('/lkjip/{id}/edit', 'LkjipController@edit')->name('admin.lkjip.edit');
	Route::post('/lkjip/{id}/update', 'LkjipController@update')->name('admin.lkjip.update');
	Route::get('/lkjip/{id}/destroy', 'LkjipController@destroy')->name('admin.lkjip.destroy');


	Route::get('/struktur_organisasi2/index', 'StrukturOrganisasi2Controller@index')->name('admin.struktur_organisasi2.index');
	Route::get('/struktur_organisasi2/create', 'StrukturOrganisasi2Controller@create')->name('admin.struktur_organisasi2.create');
	Route::post('/struktur_organisasi2/store', 'StrukturOrganisasi2Controller@store')->name('admin.struktur_organisasi2.store');
	Route::get('/struktur_organisasi2/{id}/show', 'StrukturOrganisasi2Controller@show')->name('admin.struktur_organisasi2.show');
	Route::get('/struktur_organisasi2/{id}/edit', 'StrukturOrganisasi2Controller@edit')->name('admin.struktur_organisasi2.edit');
	Route::post('/struktur_organisasi2/{id}/update', 'StrukturOrganisasi2Controller@update')->name('admin.struktur_organisasi2.update');
	Route::get('/struktur_organisasi2/{id}/destroy', 'StrukturOrganisasi2Controller@destroy')->name('admin.struktur_organisasi2.destroy');
	Route::get('/struktur_organisasi2/show', 'StrukturOrganisasi2Controller@show')->name('admin.struktur_organisasi2.show');	


	//aspirasi
	Route::get('/aspirasi', 'AspirasiController@index')->name('admin.aspirasi.index');
	Route::get('/aspirasi/create', 'AspirasiController@create')->name('admin.aspirasi.create');
	Route::post('aspirasi/store', 'AspirasiController@store')->name('admin.aspirasi.store');
	Route::get('/aspirasi/{id}/show', 'AspirasiController@show')->name('admin.aspirasi.show');
	Route::get('/aspirasi/{id}/edit', 'AspirasiController@edit')->name('admin.aspirasi.edit');
	Route::post('/aspirasi/{id}/update', 'AspirasiController@update')->name('admin.aspirasi.update');
	Route::get('/aspirasi/{id}/destroy', 'AspirasiController@destroy')->name('admin.aspirasi.destroy');

	//aspirasi
	Route::get('/anggaran_tahunan', 'AnggaranTahunanController@index')->name('admin.anggaran_tahunan.index');
	Route::get('/anggaran_tahunan/create', 'AnggaranTahunanController@create')->name('admin.anggaran_tahunan.create');
	Route::post('anggaran_tahunan/store', 'AnggaranTahunanController@store')->name('admin.anggaran_tahunan.store');
	Route::get('/anggaran_tahunan/{id}/show', 'AnggaranTahunanController@show')->name('admin.anggaran_tahunan.show');
	Route::get('/anggaran_tahunan/{id}/edit', 'AnggaranTahunanController@edit')->name('admin.anggaran_tahunan.edit');
	Route::post('/anggaran_tahunan/{id}/update', 'AnggaranTahunanController@update')->name('admin.anggaran_tahunan.update');
	Route::get('/anggaran_tahunan/{id}/destroy', 'AnggaranTahunanController@destroy')->name('admin.anggaran_tahunan.destroy');

	//aspirasi
	Route::get('/rekapitulasi', 'RekapitulasiController@index')->name('admin.rekapitulasi.index');
	Route::get('/rekapitulasi/create', 'RekapitulasiController@create')->name('admin.rekapitulasi.create');
	Route::post('rekapitulasi/store', 'RekapitulasiController@store')->name('admin.rekapitulasi.store');
	Route::get('/rekapitulasi/{id}/show', 'RekapitulasiController@show')->name('admin.rekapitulasi.show');
	Route::get('/rekapitulasi/{id}/edit', 'RekapitulasiController@edit')->name('admin.rekapitulasi.edit');
	Route::post('/rekapitulasi/{id}/update', 'RekapitulasiController@update')->name('admin.rekapitulasi.update');
	Route::get('/rekapitulasi/{id}/destroy', 'RekapitulasiController@destroy')->name('admin.rekapitulasi.destroy');

	//aspirasi
	Route::get('/pengaduan_masyarakat', 'PengaduanMasyarakatController@index')->name('admin.pengaduan_masyarakat.index');
	Route::get('/pengaduan_masyarakat/create', 'PengaduanMasyarakatController@create')->name('admin.pengaduan_masyarakat.create');
	Route::post('pengaduan_masyarakat/store', 'PengaduanMasyarakatController@store')->name('admin.pengaduan_masyarakat.store');
	Route::get('/pengaduan_masyarakat/{id}/show', 'PengaduanMasyarakatController@show')->name('admin.pengaduan_masyarakat.show');
	Route::get('/pengaduan_masyarakat/{id}/edit', 'PengaduanMasyarakatController@edit')->name('admin.pengaduan_masyarakat.edit');
	Route::post('/pengaduan_masyarakat/{id}/update', 'PengaduanMasyarakatController@update')->name('admin.pengaduan_masyarakat.update');
	Route::get('/pengaduan_masyarakat/{id}/destroy', 'PengaduanMasyarakatController@destroy')->name('admin.pengaduan_masyarakat.destroy');

	//edit profil
	Route::get('/edit_pass/edit', 'EditPassController@edit')->name('admin.edit_pass.edit');
	Route::post('/edit_pass/{id}/update', 'EditPassController@update')->name('admin.edit_pass.update');

});

Route::group(['middleware' => 'role:super', 'prefix' => 'super'], function() {
    //Manajemen User
	Route::get('/manajemen_user', 'ManajemenUserController@index')->name('admin.manajemen_user.index');
	Route::get('/manajemen_user/create', 'ManajemenUserController@create')->name('admin.manajemen_user.create');
	Route::post('manajemen_user/store', 'ManajemenUserController@store')->name('admin.manajemen_user.store');
	Route::get('/manajemen_user/{id}/show', 'ManajemenUserController@show')->name('admin.manajemen_user.show');
	Route::get('/manajemen_user/{id}/edit', 'ManajemenUserController@edit')->name('admin.manajemen_user.edit');
	Route::post('/manajemen_user/{id}/update', 'ManajemenUserController@update')->name('admin.manajemen_user.update');
	Route::get('/manajemen_user/{id}/destroy', 'ManajemenUserController@destroy')->name('admin.manajemen_user.destroy');
});

Route::group(['middleware' => 'role:dumas', 'prefix' => 'dumas'], function() {
	//Home Filter Tahun
	Route::get('/home/{filter_tahun}', 'HomeController@filter_tahun')->name('admin.homefilter');
	
	//Pengaduan Masyarakat Lookup
	Route::get('/pengaduan_masyarakat_lookup', 'PengaduanMasyarakatLookupController@index')->name('admin.pengaduan_masyarakat_lookup.index');
	Route::post('pengaduan_masyarakat_lookup/store', 'PengaduanMasyarakatLookupController@store')->name('admin.pengaduan_masyarakat_lookup.store');
	Route::get('/pengaduan_masyarakat_lookup/{id}/show', 'PengaduanMasyarakatLookupController@show')->name('admin.pengaduan_masyarakat_lookup.show');
	Route::post('/pengaduan_masyarakat_lookup/{id}/update', 'PengaduanMasyarakatLookupController@update')->name('admin.pengaduan_masyarakat_lookup.update');
	Route::get('/pengaduan_masyarakat_lookup/{id}/destroy', 'PengaduanMasyarakatLookupController@destroy')->name('admin.pengaduan_masyarakat_lookup.destroy');

    //Pengaduan Masyarakat Data
	Route::get('/pengaduan_masyarakat_data', 'PengaduanMasyarakatDataController@index')->name('admin.pengaduan_masyarakat_data.index');
	Route::get('/pengaduan_masyarakat_data/{pmd_terlapor_nama}/popup', 'PengaduanMasyarakatDataController@popup')->name('admin.pengaduan_masyarakat_data.popup');
	Route::get('/pengaduan_masyarakat_data/create', 'PengaduanMasyarakatDataController@create')->name('admin.pengaduan_masyarakat_data.create');
	Route::post('pengaduan_masyarakat_data/store', 'PengaduanMasyarakatDataController@store')->name('admin.pengaduan_masyarakat_data.store');
	Route::get('/pengaduan_masyarakat_data/{id}/show', 'PengaduanMasyarakatDataController@show')->name('admin.pengaduan_masyarakat_data.show');
	Route::get('/pengaduan_masyarakat_data/{id}/showArray', 'PengaduanMasyarakatDataController@showArray')->name('admin.pengaduan_masyarakat_data.showArray');
	Route::get('/pengaduan_masyarakat_data/{id}/edit', 'PengaduanMasyarakatDataController@edit')->name('admin.pengaduan_masyarakat_data.edit');
	Route::post('/pengaduan_masyarakat_data/{id}/update', 'PengaduanMasyarakatDataController@update')->name('admin.pengaduan_masyarakat_data.update');
	Route::get('/pengaduan_masyarakat_data/{id}/destroy', 'PengaduanMasyarakatDataController@destroy')->name('admin.pengaduan_masyarakat_data.destroy');

	//Pengaduan Masyarakat Riwayat
	Route::get('/pengaduan_masyarakat_riwayat/{pm_no}/create', 'PengaduanMasyarakatRiwayatController@create')->name('admin.pengaduan_masyarakat_riwayat.create');
	Route::post('pengaduan_masyarakat_riwayat/store', 'PengaduanMasyarakatRiwayatController@store')->name('admin.pengaduan_masyarakat_riwayat.store');

});

Route::group(['middleware' => 'role:gratifikasi', 'prefix' => 'gratifikasi'], function() {
	//Pelaporan Gratifikasi Lookup
	Route::get('/pelaporan_gratifikasi_lookup', 'PelaporanGratifikasiLookupController@index')->name('admin.pelaporan_gratifikasi_lookup.index');
	Route::post('pelaporan_gratifikasi_lookup/store', 'PelaporanGratifikasiLookupController@store')->name('admin.pelaporan_gratifikasi_lookup.store');
	Route::get('/pelaporan_gratifikasi_lookup/{id}/show', 'PelaporanGratifikasiLookupController@show')->name('admin.pelaporan_gratifikasi_lookup.show');
	Route::post('/pelaporan_gratifikasi_lookup/update', 'PelaporanGratifikasiLookupController@update')->name('admin.pelaporan_gratifikasi_lookup.update');
	Route::get('/pelaporan_gratifikasi_lookup/{id}/destroy', 'PelaporanGratifikasiLookupController@destroy')->name('admin.pelaporan_gratifikasi_lookup.destroy');

    //Pelaporan Gratifikasi Data
	Route::get('/pelaporan_gratifikasi_data', 'PelaporanGratifikasiDataController@index')->name('admin.pelaporan_gratifikasi_data.index');
	Route::get('/pelaporan_gratifikasi_data/create', 'PelaporanGratifikasiDataController@create')->name('admin.pelaporan_gratifikasi_data.create');
	Route::post('pelaporan_gratifikasi_data/store', 'PelaporanGratifikasiDataController@store')->name('admin.pelaporan_gratifikasi_data.store');
	Route::get('/pelaporan_gratifikasi_data/{id}/show', 'PelaporanGratifikasiDataController@show')->name('admin.pelaporan_gratifikasi_data.show');
	Route::get('/pelaporan_gratifikasi_data/{id}/print', 'PelaporanGratifikasiDataController@print')->name('admin.pelaporan_gratifikasi_data.print');
	Route::get('/pelaporan_gratifikasi_data/{pgd_id}/{pgd_verifikasi}/verif', 'PelaporanGratifikasiDataController@verif')->name('admin.pelaporan_gratifikasi_data.verif');
	Route::get('/pelaporan_gratifikasi_data/{id}/edit', 'PelaporanGratifikasiDataController@edit')->name('admin.pelaporan_gratifikasi_data.edit');
	Route::post('/pelaporan_gratifikasi_data/{id}/update', 'PelaporanGratifikasiDataController@update')->name('admin.pelaporan_gratifikasi_data.update');
	Route::get('/pelaporan_gratifikasi_data/{id}/verifikasi', 'PelaporanGratifikasiDataController@verifikasi')->name('admin.pelaporan_gratifikasi_data.verifikasi');
	Route::post('/pelaporan_gratifikasi_data/{id}/updateVerifikasi', 'PelaporanGratifikasiDataController@updateVerifikasi')->name('admin.pelaporan_gratifikasi_data.updateVerifikasi');
	Route::get('/pelaporan_gratifikasi_data/{id}/kirim', 'PelaporanGratifikasiDataController@kirim')->name('admin.pelaporan_gratifikasi_data.kirim');
	Route::get('/pelaporan_gratifikasi_data/{id}/destroy', 'PelaporanGratifikasiDataController@destroy')->name('admin.pelaporan_gratifikasi_data.destroy');
	
	Route::get('/pelaporan_gratifikasi_data/form_email', 'PelaporanGratifikasiDataController@formEmail')->name('admin.pelaporan_gratifikasi_data.formEmail');
	Route::get('/pelaporan_gratifikasi_data/{id}/send_email', 'PelaporanGratifikasiDataController@sendEmail')->name('admin.pelaporan_gratifikasi_data.sendEmail');
	Route::get('/pelaporan_gratifikasi_data/send_wa', 'PelaporanGratifikasiDataController@sendWA')->name('admin.pelaporan_gratifikasi_data.sendWA');

	//Pelaporan Gratifikasi Form
	Route::get('/pelaporan_gratifikasi_form', 'PelaporanGratifikasiFormController@index')->name('admin.pelaporan_gratifikasi_form.index');
	Route::post('pelaporan_gratifikasi_form/store', 'PelaporanGratifikasiFormController@store')->name('admin.pelaporan_gratifikasi_form.store');
	Route::get('/pelaporan_gratifikasi_data/{id}/create_pgd', 'PelaporanGratifikasiFormController@create_pgd')->name('admin.pelaporan_gratifikasi_form.create.pgd');

	//Pelaporan Gratifikasi UPG Pembantu
	Route::get('/pelaporan_gratifikasi_upgp', 'PelaporanGratifikasiUpgpController@index')->name('admin.pelaporan_gratifikasi_upgp.index');
});







