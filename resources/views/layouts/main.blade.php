<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Creative Admin Dashboard</title>
        <!-- ================= Favicon ================== -->
        <!-- Standard -->
        <link rel="shortcut icon" href="http://placehold.it/64.png/000/fff">
        <!-- Retina iPad Touch Icon-->
        <link rel="apple-touch-icon" sizes="144x144" href="http://placehold.it/144.png/000/fff">
        <!-- Retina iPhone Touch Icon-->
        <link rel="apple-touch-icon" sizes="114x114" href="http://placehold.it/114.png/000/fff">
        <!-- Standard iPad Touch Icon-->
        <link rel="apple-touch-icon" sizes="72x72" href="http://placehold.it/72.png/000/fff">
        <!-- Standard iPhone Touch Icon-->
        <link rel="apple-touch-icon" sizes="57x57" href="http://placehold.it/57.png/000/fff">
        <!-- Styles -->
        <link href="{{ asset('css/lib/calendar2/pignose.calendar.min.css') }}" rel="stylesheet">
        <link href="{{ asset('css/lib/chartist/chartist.min.css') }}" rel="stylesheet">
        <link href="{{ asset('css/lib/font-awesome.min.css') }}" rel="stylesheet">
        <link href="{{ asset('css/lib/themify-icons.css') }}" rel="stylesheet">
        <link href="{{ asset('css/lib/owl.carousel.min.css') }}" rel="stylesheet" />
        <link href="{{ asset('css/lib/owl.theme.default.min.css') }}" rel="stylesheet" />
        <link href="{{ asset('css/lib/weather-icons.css') }}" rel="stylesheet" />
        <link href="{{ asset('css/lib/menubar/sidebar.css') }}" rel="stylesheet">
        <link href="{{ asset('css/lib/helper.css') }}" rel="stylesheet">
        <link href="{{ asset('css/style.css') }}" rel="stylesheet">
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
          <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-sweetalert/1.0.1/sweetalert.min.css" rel="stylesheet" >
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-sweetalert/1.0.1/sweetalert.min.js"></script>
        <link href="{{ asset('css/lib/data-table/buttons.bootstrap.min.css') }}" rel="stylesheet" />
         <!-- <script src="https://cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script> -->
        <style type="text/css">body { padding-right: 0 !important }</style>
        <script src="//cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>
    </head>

    <body>
<script>
        CKEDITOR.replace( 'editor1' );
</script>
    @include('layouts.sidebar')

      @yield('content')

      

                        <div class="row">
                            <div class="col-lg-12">
                                <div class="footer">
                                    <p>2018 © Admin Board. - <a href="#">example.com</a></p>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </div>
        <script src="{{ asset('js/scripts.js') }}"></script>
        <!-- <script src="{{ asset('js/app.js') }}" ></script> -->
        <!-- jquery vendor -->
        <script src="{{ asset('js/lib/jquery.min.js') }}"></script>
        <script src="{{ asset('js/lib/jquery.nanoscroller.min.js') }}"></script>
        <!-- nano scroller -->
        <script src="{{ asset('js/lib/menubar/sidebar.js') }}"></script>
        <script src="{{ asset('js/lib/preloader/pace.min.js') }}"></script>
        <!-- sidebar -->

        <script src="{{ asset('js/lib/bootstrap.min.js') }}"></script>
        <!-- bootstrap -->

        <script src="{{ asset('js/lib/calendar-2/moment.latest.min.js') }}"></script>
        <script src="{{ asset('js/lib/calendar-2/pignose.calendar.min.js') }}"></script>
        <script src="{{ asset('js/lib/calendar-2/pignose.init.js') }}"></script>

        <!-- Data tabales -->
        <script src="{{ asset('js/lib/data-table/datatables.min.js') }}"></script>
        <script src="{{ asset('js/lib/data-table/buttons.dataTables.min.js') }}"></script>
        <script src="{{ asset('js/lib/data-table/buttons.print.min.js') }}"></script>
        <script src="{{ asset('js/lib/data-table/datatables-init.js') }}"></script>

        <script src="{{ asset('js/lib/weather/jquery.simpleWeather.min.js') }}"></script>
        <script src="{{ asset('js/lib/weather/weather-init.js') }}"></script>
        <script src="{{ asset('js/lib/circle-progress/circle-progress.min.js') }}"></script>
        <script src="{{ asset('js/lib/circle-progress/circle-progress-init.js') }}"></script>
        <script src="{{ asset('js/lib/chartist/chartist.min.js') }}"></script>
        <script src="{{ asset('js/lib/sparklinechart/jquery.sparkline.min.js') }}"></script>
        <script src="{{ asset('js/lib/sparklinechart/sparkline.init.js') }}"></script>
        <script src="{{ asset('js/lib/owl-carousel/owl.carousel.min.js') }}"></script>
        <script src="{{ asset('js/lib/owl-carousel/owl.carousel-init.js') }}"></script>
        <!-- scripit init-->
    <script src="{{ asset('js/dashboard2.js') }}"></script>



@if ($message = Session::get('success'))
<script type="text/javascript">
  $(document).ready(function() {
  swal({
  title: "Success",
  text: "{{ $message }}",
  timer: 2000,
  showConfirmButton: false,
  type: 'success'
  });
  });
</script>
@endif  
    </body>

</html>
