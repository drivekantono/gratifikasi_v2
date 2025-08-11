
<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from themeht.com/loptus/html/project-details.html by HTTrack Website Copier/3.x [XR&CO'2013], Thu, 10 Oct 2019 03:50:04 GMT -->

@include('template_fe.head')
<style>
                #chart-container {
                    font-family: Arial;
                    height: 420px;
                    border: 2px dashed #aaa;
                    border-radius: 5px;
                    overflow: auto;
                    text-align: center;
                    }
                #github-link {
                    position: fixed;
                    top: 0px;
                    right: 10px;
                    font-size: 3em;
                }

                #edit-panel {
                    text-align: center;
                    position: relative;
                    left: 10px;
                    width: calc(100% - 40px);
                    border-radius: 4px;
                    float: left;
                    margin-top: 10px;
                    padding: 10px;
                    color: #fff;
                    background-color: #449d44;
                }
                #edit-panel * {
                    font-size: 20px;
                } 
                #tree1 {
                    width: 100%;
                    height: 100%;
                    position: relative;
                }  
                #putih {
                    color: #FFFFFF;
                }
            </style>
<body>

    <!-- page wrapper start -->

    <div class="page-wrapper">

       @include('template_fe.header')

        <!--page title start-->

        <section class="page-title o-hidden text-center green-bg bg-contain animatedBackground" data-bg-img="{{ asset('fe/images/pattern/01.png') }}">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <h2 class="text-white animated bounceInLeft delay-2 duration-3" style="color: white">DAFTAR INFORMASI</h2>
                    </div>
                </div>
            </div>
            <div class="page-title-pattern"><img class="img-fluid" src="{{ asset('fe/images/bg/06-2.png') }}" alt=""></div>
        </section>

        <!--page title end-->


        <!--body content start-->

        <div class="page-content">
			<!--profil singkat-->
			@foreach($items; as $item)
				{{ $item->kategori_informasi }}
			@endforeach
			<!--visi dan misi-->
            
			<!--struktur organisasi-->			 
             
			<!--tugas dan kewenangan-->
            
        </div>

        <!--body content end-->

        @include('template_fe.footer')

    </div>

    <div class="scroll-top"><a class="smoothscroll" href="#top"><i class="flaticon-upload"></i></a></div>

    <!--back-to-top end-->

    @include('template_fe.javascript')
    <script src="{{asset('js/orgchart.js')}}"></script>
</html>

