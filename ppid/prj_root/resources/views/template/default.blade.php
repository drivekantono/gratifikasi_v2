
<!DOCTYPE html>
<html>

@include('template.partial.head')

<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

    @include('template.partial.header')
    
    @include('template.partial.navbar')

    <div class="content-wrapper">
      
      @yield('content')
   
    </div>

    @include('template.partial.footer')

    @include('template.partial.controlnav')

</div>

  @include('template.partial.javascript')

</body>
</html>
