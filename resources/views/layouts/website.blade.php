<!DOCTYPE html> 
<html lang="en">
<head> 
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
 
    <!-- Title --> 
    <title>{{$content->name}} | Since 2000</title>
         

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="{{asset('website/images/Logo/Logo.png')}}">

    <!-- Font-Awesome (CSS) -->
    <link rel="stylesheet" href="{{asset('website/vendors/font-awesome/css/all.css')}}">

      <!-- Magnific-Popup (CSS) -->
      <link rel="stylesheet" href="{{asset('website/vendors/magnific-popup/magnific-popup.css')}}">

    <!-- Swiper (CSS) -->
    <link rel="stylesheet" href="{{asset('website/vendors/swiper/swiper.css')}}">
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" />
    <link rel="stylesheet" href="{{ asset('css/toastr.min.css') }}">

    <!-- Custom Stylesheets -->
    <link rel="stylesheet" href="{{asset('website/css/main.css')}}">
    <link rel="stylesheet" href="{{asset('website/css/custom.css')}}">
    <link rel="stylesheet" href="{{asset('website/css/responsive.css')}}">

</head>
<body>

  <!-- ==================== Scroll-Top Area (Start) ==================== -->
  <a href="#" class="scroll-top">
      <i class="fas fa-long-arrow-alt-up"></i>
  </a>
  <!-- ==================== Scroll-Top Area (End) ==================== -->



  <!-- ==================== Header Area (Start) ==================== -->
    @include('layouts.partials.web_header')
  <!-- ==================== Header Area (End) ==================== -->   


    @yield('web-content')


  <!-- ==================== Footer Area (Start) ==================== -->
 @include('layouts.partials.web_footer')
  <!-- ==================== Footer Area (End) ==================== -->

  


  <!-- Jquery -->
  <script src="{{asset('website/vendors/jquery/jquery-3.6.0.js')}}"></script>

  <!-- Magnific-Popup JS -->
  <script src="{{asset('website/vendors/magnific-popup/jquery.magnific-popup.js')}}"></script>

  <!-- Swiper (JS) -->
  <script src="{{asset('website/vendors/swiper/swiper.js')}}"></script>

  <!-- Custom Script Files -->
  <script src="{{asset('website/js/script.js')}}"></script>
  <script src="{{asset('website/js/nav-link-toggler.js')}}"></script>
  <script src="{{asset('website/js/home-slider.js')}}"></script>
  <script src="{{asset('website/js/gallery.js')}}"></script>
  <script src="{{ asset('js/toastr.min.js') }}"></script>
  <script src="{{asset('website/js/counter-up.js')}}"></script>
  <script src="{{asset('website/js/testi-slider.js')}}"></script>
    @stack('website_js')
  
  <script>
    @if (Session::has('message'))
        var type = "{{ Session::get('alert-type', 'info') }}"
        switch (type) {
            case 'info':
                toastr.info(" {{ Session::get('message') }} ");
                break;

            case 'success':
                toastr.success(" {{ Session::get('message') }} ");
                break;

            case 'warning':
                toastr.warning(" {{ Session::get('message') }} ");
                break;

            case 'error':
                toastr.error(" {{ Session::get('message') }} ");
                break;
        }
    @endif
</script>

</body>
</html>