<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from themeht.com/loptus/html/project-details.html by HTTrack Website Copier/3.x [XR&CO'2013], Thu, 10 Oct 2019 03:50:04 GMT -->

@include('template_fe.head')
<body>
    <!-- page wrapper start -->

    <div class="page-wrapper">

       @include('template_fe.header')

        <section class="fullscreen-banner p-0 banner o-hidden grediant-overlay" data-overlay="10">
          <div class="d-none d-md-block">
            <img class="img-fluid" src="{{asset('fe/images/bg/08.png')}}" alt="">
          </div>
          <div class="align-center">
            <div class="container">
              <div class="row align-items-center" style="margin-top: -130px;">
                <div class="col-lg-6 col-md-12 order-lg-12 sm-mt-5">
                  <div class="seo-img animated zoomIn delay-5 duration-4">
                    <img class="img-center" src="{{asset('fe/images/banner/03.png')}}" alt="">
                  </div>
                </div>
                <div class="col-lg-6 col-md-12 order-lg-1 md-mt-5">
                  <h1 class=" text-white animated bounceInLeft delay-2 duration-3">PENGADUAN MASYARAKAT</h1>
                </div>        
              </div>
            </div>
           </div>
        </section>
        <!--page title start-->

        <!-- Modal -->
        <div class="modal fade" id="modalMessage" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Pesan</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body" style="text-align:center; background-color:#f7f7f7">
                        <img class="img-fluid" src="{{ asset('dist/img/01.gif') }}" alt="">
                        {{ $items_pesan['text'] }}
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>        

        <!--page title end-->


        <!--body content start-->

        <div class="page-content">
            <!--
            <section id="visi-misi" class="o-hidden">
                <div class="container">
                    <div class="row align-items-center">
                    <div class="col-lg-12 col-md-12 md-mt-5">
                        <div class="section-title text-center mb-4">
                            <h2 class="title">PENGADUAN MASYARAKAT</h2> 
                        </div>
                    </div>
                    <br>
                    @if($items->tata_cara != null)
                        <iframe src="{{$items->tata_cara != null ? asset('/uploads/pengaduan_masyarakat/'.$items->tata_cara) : "Tidak Ada Data"}}"  height="900px">
                        </iframe>
                    </div>
                    @endif
                </div>
            </section>
            -->
            <section id="tujuan" class="grey-bg animatedBackground" data-bg-img="{{ asset('fe/images/pattern/05.png') }}">
                <div class="container">
                    <!--
                    <div class="text-center row">
                        <div class="col-lg-12 col-md-12 ml-auto mr-auto">
                            <div class="section-title">
                            
                            <h2 class="title">ALUR PENGADUAN MASYARAKAT</h2> 
                            </div>
                        </div>
                    </div>
                    -->
                    <div class="row">
                        <div class="col-lg-12 col-md-6">
                            <div class="featured-item text-center p-0">
                                <div class="featured-desc">
                                    <p>
                                        @if($items->tata_cara != null)
                                        <!--<iframe src="{{$items->formulir != null ? asset('/uploads/pengaduan_masyarakat/'.$items->formulir) : "Tidak Ada Data"}}"  height="900px">
                                        </iframe>-->
                                        <img class="img-fluid" src="{{asset('uploads/pengaduan_masyarakat/'.$items->tata_cara)}}" alt="">
                                        @endif
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <section id="tugas-dan-fungsi" class="o-hidden">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-lg-12 col-md-12 md-mt-5">
                            <div class="section-title text-center mb-4">
                                <h2 class="title">FORMULIR PENGADUAN MASYARAKAT</h2> 
                            </div>

                            <form role="form" action="{{ route('frontend.pengaduan_masyarakat_data.store') }}" method="POST" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                @if (count($errors) > 0)
                                    <div class="alert alert-danger">
                                        <button type="button" class="close" data-dismiss="alert">×</button>
                                        <strong>Opps!</strong> There were something went wrong with your input.
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif

                                <input type="hidden" class="form-control pull-right" id="pmd_sumber" name="pmd_sumber" value="Website">
                                <input type="hidden" class="form-control pull-right" id="pmd_sifat" name="pmd_sifat" value="Umum">
                                <input type="hidden" class="form-control pull-right" id="pmd_tanggal" name="pmd_tanggal" value="{{ date('Y-m-d') }}">
                                <input type="hidden" class="form-control pull-right" id="pmd_tanggal_terima" name="pmd_tanggal_terima" value="{{ date('Y-m-d') }}">

                                <div class="col-lg-12 px-0">
                                    <div class="card grey-bg">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="card grey-bg mb-4">
                                                        <div class="card-header" style="background-color:#007bff2e">
                                                            <b>Data Pelapor</b>
                                                        </div>

                                                        <div class="card-body">
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="form-group">
                                                                        <label>Nama</label>
                                                                        <input type="text" class="form-control" id="pmd_pelapor_nama" name="pmd_pelapor_nama" value="{{ old('pmd_pelapor_nama') ? old('pmd_pelapor_nama') : '' }}">
                                                                        <div class="help-block with-errors" ></div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-12">
                                                                    <div class="form-group">
                                                                        <label>Pekerjaan</label>
                                                                        <input type="text" class="form-control" id="pmd_pelapor_pekerjaan" name="pmd_pelapor_pekerjaan" value="{{ old('pmd_pelapor_pekerjaan') ? old('pmd_pelapor_pekerjaan') : '' }}">
                                                                        <div class="help-block with-errors" ></div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-12">
                                                                    <div class="form-group">
                                                                        <label>No Telepon</label>
                                                                        <input type="text" class="form-control" id="pmd_pelapor_telepon" name="pmd_pelapor_telepon" value="{{ old('pmd_pelapor_telepon') ? old('pmd_pelapor_telepon') : '' }}">
                                                                        <div class="help-block with-errors" ></div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-12">
                                                                    <div class="form-group">
                                                                        <label>Email</label>
                                                                        <input type="text" class="form-control" id="pmd_pelapor_email" name="pmd_pelapor_email" value="{{ old('pmd_pelapor_email') ? old('pmd_pelapor_email') : '' }}">
                                                                        <div class="help-block with-errors" ></div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-12">
                                                                    <div class="form-group">
                                                                        <label>Alamat</label>
                                                                         <input type="text" class="form-control" id="pmd_pelapor_alamat" name="pmd_pelapor_alamat" value="{{ old('pmd_pelapor_alamat') ? old('pmd_pelapor_alamat') : '' }}">
                                                                        <div class="help-block with-errors" ></div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="card grey-bg mb-4">
                                                        <div class="card-header" style="background-color:#007bff2e">
                                                            <b>Data Terlapor</b>
                                                        </div>

                                                        <div class="card-body">
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="form-group">
                                                                        <label>Nama</label>
                                                                        <input type="text" class="form-control" id="pmd_terlapor_nama" name="pmd_terlapor_nama" value="{{ old('pmd_terlapor_nama') ? old('pmd_terlapor_nama') : '' }}">
                                                                        <div class="help-block with-errors" ></div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-12">
                                                                    <div class="form-group">
                                                                        <label>Pekerjaan</label>
                                                                        <input type="text" class="form-control" id="pmd_terlapor_pekerjaan" name="pmd_terlapor_pekerjaan" value="{{ old('pmd_terlapor_pekerjaan') ? old('pmd_terlapor_pekerjaan') : '' }}">
                                                                        <div class="help-block with-errors" ></div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-12">
                                                                    <div class="form-group">
                                                                        <label>Instansi / Unit Kerja</label>
                                                                        <input type="text" class="form-control" id="pmd_terlapor_instansi" name="pmd_terlapor_instansi" value="{{ old('pmd_terlapor_instansi') ? old('pmd_terlapor_instansi') : '' }}">
                                                                        <div class="help-block with-errors" ></div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-12">
                                                                    <div class="form-group">
                                                                        <label>Alamat Kantor</label>
                                                                        <input type="text" class="form-control" id="pmd_terlapor_alamat" name="pmd_terlapor_alamat" value="{{ old('pmd_terlapor_alamat') ? old('pmd_terlapor_alamat') : '' }}">
                                                                        <div class="help-block with-errors" ></div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label>Kategori Pengaduan Masyarakat</label>
                                                        <select id="pmd_kategori" name="pmd_kategori" class="form-control">
                                                            <option value=""></option>
                                                            @foreach ($items_aduan_kategori as $item_aduan_kategori)
                                                                <option value="{{ $item_aduan_kategori->pml_nilai }}" {{ ($item_aduan_kategori->pml_nilai === old('pmd_kategori')) ? 'selected' : '' }} >{{ $item_aduan_kategori->pml_nilai }}</option>
                                                            @endforeach
                                                        </select>
                                                        <div class="help-block with-errors" ></div>
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label>Judul Pengaduan Masyarakat</label>
                                                        <input type="text" class="form-control" id="pmd_judul" name="pmd_judul" value="{{ old('pmd_judul') ? old('pmd_judul') : '' }}">
                                                        <div class="help-block with-errors" ></div>
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label>Isi Pengaduan Masyarakat</label>
                                                        <input type="text" class="form-control" id="pmd_isi" name="pmd_isi" value="{{ old('pmd_isi') ? old('pmd_isi') : '' }}">
                                                        <div class="help-block with-errors" ></div>
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label>Harapan</label>
                                                        <input type="text" class="form-control" id="pmd_harapan" name="pmd_harapan" value="{{ old('pmd_harapan') ? old('pmd_harapan') : '' }}">
                                                        <div class="help-block with-errors" ></div>
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label>Kartu Identitas</label></br>
                                                        <input type="file" id="pmd_lampiran_identitas" name="pmd_lampiran_identitas">
                                                        <div class="help-block with-errors" ></div>
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label>Lampiran / Bukti Aduan</label></br>
                                                        <input type="file" id="pmd_lampiran_01" name="pmd_lampiran_01">
                                                        <div class="help-block with-errors" ></div>
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label>Lampiran / Bukti Aduan Lainnya (Jika Ada)</label></br>
                                                        <input type="file" id="pmd_lampiran_02" name="pmd_lampiran_02">
                                                        <div class="help-block with-errors" ></div>
                                                    </div>
                                                </div>
                                                <div class="col-md-12" style="padding-top:50px">
                                                    <button type="submit" class="btn btn-theme"><span>Kirim</span></button>
                                                </div>
                                            </div>
                                        </div>  
                                    </div>
                                </div> 
                            </form>
                        </div>
                    </div>
                </div>
            </section>
             
        </div>

        <!--body content end-->

        @include('template_fe.footer')

    </div>

    <div class="scroll-top"><a class="smoothscroll" href="#top"><i class="flaticon-upload"></i></a></div>

    <!--back-to-top end-->

    @include('template_fe.javascript')

    <script type="text/javascript">
        if ('{{ $items_pesan['text'] }}' !== '') {
            $("#modalMessage").modal("toggle");
        }
    </script>
   

</html>

