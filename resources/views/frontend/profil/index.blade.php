
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
                  <h1 class=" text-white animated bounceInLeft delay-2 duration-3">PROFIL</h1>
                </div>        
              </div>
            </div>
           </div>
        </section>
        <!--page title start-->

        

        <!--page title end-->


        <!--body content start-->

        <div class="page-content">

            <section id="visi-misi" class="animatedBackground" data-bg-img="{{ asset('fe/images/pattern/05.png') }}">
                <div class="container">
                    <div class="row align-items-center">
                    <div class="col-lg-12 col-md-12 md-mt-5">
                        <div class="owl-carousel owl-theme" data-items="1">
                        <div class="item">
                            <div class="testimonial">
								<div class="testimonial-content" style="text-align:left; color:#ffffff ">
									<h2 class="title" style="color:#ffffff" >
										VISI DAN MISI
									</h2>   
									<p>{!! $items1->deskripsi !!}</p>
								
								</div>
								<div class="testimonial-quote"><i class="flaticon-quotation"></i>
								</div>
                            </div>
                        </div>
                        </div>
                    </div>
                    </div>
                </div>
            </section>
            <section class="grey-bg pos-r text-center o-hidden" id="tujuan">
                <div class="pattern-3">
                    <img class="img-fluid rotateme" src="{{ asset('fe/images/pattern/03.png') }}" alt="">
                </div>
                <div class="container">
                    <div class="row text-center">
                        <div class="col-lg-12 col-md-12 ml-auto mr-auto">
                            <div class="section-title">
                            
                            <h2 class="title">{{ $items3->title }}</h2> 
                            <p class="mb-0 text-black">{!! $items3->deskripsi !!}</p>
                            </div>
                        </div>
                    </div>
                    
                </div>
            </section>
            <section class="o-hidden" id="tugas-dan-fungsi">
                <div class="container">
				
					<div class="row text-center">
						<div class="col-lg-12 col-md-12 md-mt-5">
							<div class="section-title mb-4">
								<h2 class="title">{{$items->title}}</h2> 
							</div>
						</div>
                    </div>  
                    <div class="row align-items-center">
						<div class="col-lg-12 col-md-12 md-mt-5">
							<div class="section-title mb-4">
							<p class="mb-0 text-black">{!! $items->deskripsi !!}</p>
							</div>
						</div>
                    </div>                    
                </div>
            </section>
            
            <section class="grey-bg pos-r text-center o-hidden" id="maklumat">
                <div class="pattern-3">
                    <img class="img-fluid rotateme" src="{{ asset('fe/images/pattern/03.png') }}" alt="">
                </div>
                <div class="container">
                    <div class="row text-center">
                        <div class="col-lg-12 col-md-12 ml-auto mr-auto">
                            <div class="section-title">
                            
                            <h2 class="title">{{ $items6->title }}</h2> 
                            <p class="mb-0 text-black">{!! $items6->deskripsi !!}</p>
                            </div>
                        </div>
                    </div>
                    
                </div>
            </section>
             
            <section id="struktur-organisasi">
                <div class="container">
                    <div class="row text-center">
                    <div class="col-lg-8 col-md-12 ml-auto mr-auto">
                        <div class="section-title">
							<h2 class="title">{{ $items2->title }}</h2>
                        </div>
                    </div>
                    </div>
                    
                    <div class="post">
                      <div class="post-image">
                   		<img class="img-fluid" src="{{asset('uploads/profil/'.$items2->images)}}" alt="" >
                      </div>
                    </div>
                    
                    <div class="row">
                    <div class="col-lg-12 col-md-12">
						<p class="mb-0 text-black">{!! $items2->deskripsi!!}</p>
                    </div>
					</div>
				</div>
					
            </section>


			{{--Pejabat Struktural --}}
			<section class="grey-bg pos-r text-center o-hidden" id="pejabat">
                <div class="pattern-3">
                    <img class="img-fluid rotateme" src="{{ asset('fe/images/pattern/03.png') }}" alt="">
                </div>
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 ml-auto mr-auto">
                            <div class="section-title">
                            <h2 class="title">PEJABAT STRUKTURAL</h2> 
                            </div>
                        </div>
                    </div>
					
					<div class="col-lg-12 col-md-12 ml-auto mr-auto">
					  
							
					<class="box-body">
					  <table id="example1" class="table table-bordered table-striped">
						<thead>
						<tr>
						  <th>JABATAN</th>
						  <th>NAMA</th>
						</tr>
						</thead>
						@php
                          if (Request::get('page') && Request::get('page') > 1) {
                              $iterate = Request::get('page') - 1;
                              $no = ($perPage * $iterate) +1;
                          } else {
                              $no = 1;
                          }
						@endphp
                       
						<tbody>
						@foreach ($items4 as $item)
						  <tr>
							<td>{{ $item->title }}</td>
							<td>{{ $item->nama }}</td>
						  </tr>
						@endforeach 
						</tbody>       
					  </table>

					</div>			
                 </div>
            </section>
			
            {{-- Mantan Inspektorat --}}
             <section id="struktur-organisasi">
               
                <div class="container">
                    <div class="row text-center">
                        <div class="col-lg-12 col-md-12 ml-auto mr-auto">
                            <div class="section-title">
                            <h2 class="title">MANTAN INSPEKTUR</h2> 
                            </div>
                        </div>
                    </div>
											
                    <div class="row">
                        @php
                          if (Request::get('page') && Request::get('page') > 1) {
                              $iterate = Request::get('page') - 1;
                              $no = ($perPage * $iterate) +1;
                          } else {
                              $no = 1;
                          }
                      @endphp
                        @foreach($items5 as $item)
                        <div class="col-lg-3 col-md-6">
                          <div class="post">
                            <div class="grid-item cat1 cat3 popup-gallery" >
                              <div class="portfolio-item">
                                  <img class="img-center w-100" style="height: 300px;" src="{{ asset('uploads/galeri_inspektorat/'.$item->file) }}" alt="">
                                  <a class="popup-img" href="{{ asset('uploads/galeri_inspektorat/'.$item->file) }}"> <i class="flaticon-plus"></i>
                                  </a> 
                              </div>
                            </div>
                            <div class="post-desc" style="height: 150px;">
                              <div class="post-date"><span>{{$item->tahun}}</span>
                              </div>
                              <div class="post-title">
                                {{$item->name}}
                              </div>
                            </div>
                          </div>
                        </div>
                        @endforeach
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
    <script src="{{asset('js/orgchart.js')}}"></script>

	<script type="text/javascript">

    var tmps = {!! json_encode($items4->toArray())!!}

    var datas = [];

    tmps.forEach((item) => {
      datas.push({
        id: item.id,
        title : item['title'],
        name : item['nama'],
        pid : item['parent_id'],
        tags: [item[ 'tags' ]],
        img : "{{asset('uploads/struktur_organisasi')}}/"+item['images'],

      })
    })

    console.log(datas);

    for (var i = 0 ; i < datas.length ; i++) {
      var chart = new OrgChart(document.getElementById("tree1"), {
        // orientation: OrgChart.orientation.left,  
        mouseScrool: OrgChart.action.none,
        scaleInitial: OrgChart.match.boundary,
         // collapse: {
         //        level: 1,
         //        allChildren: true
         //    },
            expand: {
                nodes: [4]
            },
            nodeBinding: {
                field_0: "title",
                field_1: "name",
                img_0: "img"
            },
            
            nodes: datas

        });   
    }

</script>

</html>

