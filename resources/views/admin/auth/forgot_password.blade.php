<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <meta name="description" content="">
      <meta name="author" content="">
      <title>SB Admin 2 - Forgot Password</title>
      <!-- Custom fonts for this template-->
      <link href="https://startbootstrap.github.io/startbootstrap-sb-admin-2/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
      <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
      <!-- Custom styles for this template-->
      <link href="https://startbootstrap.github.io/startbootstrap-sb-admin-2/css/sb-admin-2.min.css" rel="stylesheet">
      <link rel="stylesheet" href="{{ asset('adminAsset/css/custom-login.css') }}">
   </head>
   <body class="bg-gradient-primary">
      <div class="container">
         <!-- Outer Row -->
         <div class="row justify-content-center">
            <div class="col-xl-10 col-lg-12 col-md-9">
               <div class="card o-hidden border-0 shadow-lg my-5">
                  <div class="card-body p-0">
                     <!-- Nested Row within Card Body -->
                        <div class="col-lg-12">
                           <div class="logo">
                              <img src="{{ asset('adminAsset/images/logo.png') }}" alt="">
                           </div>
                           <div class="p-3">
                              <div class="text-center">
                                 <h1 class="h4 text-gray-900 mb-2">@lang('custom.button.forgot_password')?</h1>
                                 <p class="mb-4">
                                    Chúng tôi hiểu, đó là điều có thể sảy ra, Nhập email của bạn dưới đây và chúng tôi sẽ gửi cho bạn mã reset mật khẩu!
                                 </p>
                              </div>
                              <form class="user" method="POST" action="{{ route('admin.forgot_password') }}">
                                 @csrf
                                 <div class="form-group">
                                    <input name="email" type="email" class="form-control @error('email') is-invalid @enderror form-control-user" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Enter Email Address...">
                                    @if ($errors->any())
                                          <ul>
                                             @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                             @endforeach
                                          </ul>
                                    @endif
                                 </div>
                                 <button class="btn btn-primary btn-user btn-block">@lang('custom.button.reset_password')</button>
                              </form>
                              <hr>
                              <div class="text-center">
                                 <a class="small" href="{{url('/login')}}">@lang('custom.button.had_password')</a>
                              </div>
                           </div>
                        </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- Bootstrap core JavaScript-->
      <script src="https://startbootstrap.github.io/startbootstrap-sb-admin-2/vendor/jquery/jquery.min.js"></script>
      <script src="https://startbootstrap.github.io/startbootstrap-sb-admin-2/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
      <!-- Core plugin JavaScript-->
      <script src="https://startbootstrap.github.io/startbootstrap-sb-admin-2/vendor/jquery-easing/jquery.easing.min.js"></script>
      <!-- Custom scripts for all pages-->
      <script src="https://startbootstrap.github.io/startbootstrap-sb-admin-2/js/sb-admin-2.min.js"></script>
   </body>
</html>