<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="keywords" content="HTML5 Template" />
<meta name="description" content="HTML5 Template" />
<meta name="author" content="www.themeht.com" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />

<!-- gunakan -->
<script language='JavaScript'>
var txt="*Inspektorat Provinsi Jawa Timur* ";
var speed=300;
var refresh=null;
function action() { document.title=txt;
txt=txt.substring(1,txt.length)+txt.charAt(0);
refresh=setTimeout("action()",speed);}action();
</script>



<title>Inspektorat Provinsi Jawa Timur</title>
 
<!-- favicon icon -->
<link rel="shortcut icon" href="{{asset('favicon.ico')}}" />

<!-- inject css start -->

<!--== bootstrap -->
<link href="{{asset('fe/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" />

<!--== animate -->
<link href="{{asset('fe/css/animate.css')}}" rel="stylesheet" type="text/css" />

<!--== fontawesome -->
<link href="{{asset('fe/css/fontawesome-all.css')}}" rel="stylesheet" type="text/css" />

<!--== themify -->
<link href="{{asset('fe/css/themify-icons.css')}}" rel="stylesheet" type="text/css" />

<!--== audioplayer -->
<link href="{{asset('fe/css/audioplayer/media-player.css')}}" rel="stylesheet" type="text/css" />

<!--== magnific-popup -->
<link href="{{asset('fe/css/magnific-popup/magnific-popup.css')}}" rel="stylesheet" type="text/css" />

<!--== owl-carousel -->
<link href="{{asset('fe/css/owl-carousel/owl.carousel.css')}}" rel="stylesheet" type="text/css" />

<!--== base -->
<link href="{{asset('fe/css/base.css')}}" rel="stylesheet" type="text/css" />

<!--== shortcodes -->
<link href="{{asset('fe/css/shortcodes.css')}}" rel="stylesheet" type="text/css" />

<!--== default-theme -->
<link href="{{asset('fe/css/style.css')}}" rel="stylesheet" type="text/css" />

<!--== responsive -->
<link href="{{asset('fe/css/responsive.css')}}" rel="stylesheet" type="text/css" />
<link href="{{asset('fe/css/theme-color/theme-color-5.css')}}" rel="stylesheet" type="text/css" />



<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.2.7/fullcalendar.min.css"/>
<style type="text/css">
  

  @media only screen and (max-width: 1026px) {
    .cetar {
        display: none;
  }
}
</style>

<!-- inject css end -->
<link href="{{ asset('fe/css/jquery.orgchart.min.css') }}" rel="stylesheet" type="text/css" />

<link rel="stylesheet" type="text/css" href="{{asset('slider/dist/css/slider-pro.min.css')}}" media="screen"/>
<link rel="stylesheet" type="text/css" href="{{asset('slider/libs/fancybox/jquery.fancybox.css')}}" media="screen"/>
<link rel="stylesheet" type="text/css" href="{{asset('slider/css/examples.css')}}" media="screen"/>
<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,600' rel='stylesheet' type='text/css'>

{{-- 
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.3.5/css/swiper.min.css'>
 --}}

 {{-- <style type="text/css">
 	div.crop {
    position: relative;
    overflow: hidden;
    width: 100%;
    height: 450px;
}

div.crop img {
  display: block;
  margin: 0 auto;
  width: 100%;
  height: auto;
}

div.crop.crop-top img { margin: -10% auto 0; }
div.crop-bottom img { margin: 0 auto -10%; }
div.crop.crop-vertically img { margin: -9% auto; }
div.crop.crop-right img { width: 140%; }
div.crop.crop-left img { width: 140%; margin: 0 0 0 -40%; }
div.crop.crop-horizontally img { width: 180%; margin: 0 -20%; }
div.crop.crop-square img {
  width: 259.5%; /* calculate based on your original image... img-width*100/img-height */
  margin: 0 0 0 -79.75%; /* the above value minus 50 */
}

@media only screen and (max-width: 599px) {
  div.crop img {
    position: absolute;
    top: 0;
    left: 50%;
    margin-left: -300px;
  }
}
 </style> --}}
 
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>


<!--== popup show  
<script type="text/javascript">
    $(document).ready(function() {
         $('#modal').modal('show');
    })
</script>
 
 -->
</head>