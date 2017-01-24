<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <meta name="description" content="">
      <meta name="author" content="">
      <link rel="shortcut icon" href="assets/img/favicon.png">
      <title>Admin : Project Child</title>
      <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,400italic,700,800" rel="stylesheet" type="text/css">
      <link href="http://fonts.googleapis.com/css?family=Raleway:300,200,100" rel="stylesheet" type="text/css">
      <link href="http://fonts.googleapis.com/css?family=Open+Sans+Condensed:300,700" rel="stylesheet" type="text/css">
      <link href="{{ asset('assets/lib/bootstrap/dist/css/bootstrap.min.css') }}" rel="stylesheet">
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
      <!--if lt IE 9script(src='https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js')-->
      <link rel="stylesheet" type="text/css" href="{{ asset('assets/lib/jquery.nanoscroller/css/nanoscroller.css') }}">
      <link rel="stylesheet" type="text/css" href="{{ asset('assets/lib/jquery.gritter/css/jquery.gritter.css') }}">
      <link rel="stylesheet" type="text/css" href="{{ asset('assets/lib/bootstrap.switch/css/bootstrap3/bootstrap-switch.css') }}">
      <link rel="stylesheet" type="text/css" href="{{ asset('assets/lib/bootstrap.datetimepicker/css/bootstrap-datetimepicker.min.css') }}">
      <link rel="stylesheet" type="text/css" href="{{ asset('assets/lib/jquery.select2/select2.css') }}">
      <link rel="stylesheet" type="text/css" href="{{ asset('assets/lib/bootstrap.slider/css/bootstrap-slider.css') }}">

      <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">

      @yield('page_css')
   </head>
   <body>
      <div id="head-nav" class="navbar navbar-default navbar-fixed-top">
         @include('layouts.common.admin.nav')
      </div>
      <div id="cl-wrapper" class="fixed-menu">
         @yield('main_content')
      </div>
      <script type="text/javascript" src="{{ asset('assets/lib/jquery/jquery.min.js') }}"></script>
      <script type="text/javascript" src="{{ asset('assets/lib/jquery.nanoscroller/javascripts/jquery.nanoscroller.js') }}"></script>
      <script type="text/javascript" src="{{ asset('assets/js/cleanzone.js') }}"></script>
      <script src="{{ asset('assets/lib/bootstrap/dist/js/bootstrap.min.js') }}"></script>
      <script src="{{ asset('assets/lib/jquery.gritter/js/jquery.gritter.js') }}" type="text/javascript"></script>
      <script src="{{ asset('assets/lib/skycons/skycons.js') }}" type="text/javascript"></script>
      <script type="text/javascript" src="{{ asset('assets/lib/jquery.sparkline/jquery.sparkline.min.js') }}"></script>
      <script src="{{ asset('assets/lib/jquery.easypiechart/jquery.easypiechart.js') }}" type="text/javascript"></script>
      <script type="text/javascript" src="{{ asset('assets/lib/intro.js/intro.js') }}"></script>
      <script type="text/javascript" src="{{ asset('assets/lib/jquery.flot/jquery.flot.js') }}"></script>
      <script type="text/javascript" src="{{ asset('assets/lib/jquery.flot/jquery.flot.pie.js') }}"></script>
      <script type="text/javascript" src="{{ asset('assets/lib/jquery.flot/jquery.flot.resize.js') }}"></script>
      <script type="text/javascript" src="{{ asset('assets/lib/jquery-ui/jquery-ui.min.js') }}"></script>
      <script type="text/javascript" src="{{ asset('assets/lib/jquery-ui/jquery-ui.min.js') }}"></script>
      <script src="{{ asset('assets/lib/jquery.select2/select2.min.js') }}" type="text/javascript"></script>
      <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery.blockUI/2.70/jquery.blockUI.min.js"></script>
      <script type="text/javascript">
         $(document).ready(function(){
            //initialize the javascript
            App.init();
            $(".select2").select2({
               width:"100%", 
               minimumInputLength: 3,
               formatInputTooShort: function () {
                  return "Enter min 3 Character";
               }
            });
         });
      </script>

      @yield('page_scripts')
   </body>
</html>