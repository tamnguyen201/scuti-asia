<!DOCTYPE html>
<html>
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <base href="{{asset('')}}">
      <title> Admin | @yield('title') </title>
      <meta name="csrf-token" content="{{ csrf_token() }}">
      <link href="adminAsset/css/bootstrap.min.css" rel="stylesheet">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css">
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
      <link href="adminAsset/css/font-awesome.min.css" rel="stylesheet">
      <link href="adminAsset/css/datepicker3.css" rel="stylesheet">
      <link href="adminAsset/css/styles.css" rel="stylesheet">
      <!--Custom Font-->
      <link href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
      <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
      <link rel="stylesheet" href="">
      @yield('css')

   </head>
   <body>
      <nav class="navbar navbar-custom navbar-fixed-top" role="navigation">
         <div class="container-fluid">
            <div class="navbar-header">
               <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#sidebar-collapse"><span class="sr-only">Toggle navigation</span>
               <span class="icon-bar"></span>
               <span class="icon-bar"></span>
               <span class="icon-bar"></span></button>
               <a class="navbar-brand" href="#">
                  <img src="{{ asset('adminAsset/images/logo.png') }}" alt="">
               </a>
            </div>
         </div>
         <!-- /.container-fluid -->
      </nav>

      @include('admin.layout.sideBar')
      
      <!--/.sidebar-->
      <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
         
         @yield('content')

      </div>

      @include('sweetalert::alert')
      
      <!-- /.row -->
      </div><!--/.main-->
      <script src="adminAsset/js/jquery-1.11.1.min.js"></script>
      <script src="adminAsset/js/bootstrap.min.js"></script>
      <script src="adminAsset/js/chart.min.js"></script>
      <script src="adminAsset/js/chart-data.js"></script>
      <script src="adminAsset/js/easypiechart.js"></script>
      <script src="adminAsset/js/easypiechart-data.js"></script>
      <script src="adminAsset/js/bootstrap-datepicker.js"></script>
      <script src="adminAsset/js/bootstrap-table.js"></script>
      <script src="adminAsset/js/custom.js"></script>
      <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
      <script src="https://unpkg.com/sweetalert2@7.18.0/dist/sweetalert2.all.js"></script>
      <script>
         $(function () {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
         })
      </script>
      
      @yield('script')

   </body>
</html>