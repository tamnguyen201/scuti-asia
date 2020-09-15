<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <meta name="description" content="">
      <meta name="author" content="">
      <title>SB Admin 2 - Login</title>
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
            <div class="">
               <div class="card o-hidden border-0 shadow-lg my-5">
                  <div class="card-body p-0">
                     <!-- Nested Row within Card Body -->
                     {{-- <div class="row"> --}}
                        <div class="col-lg-12">
                           <div class="logo">
                              <img src="{{ asset('adminAsset/images/logo.png') }}" alt="">
                           </div>
                           <div class="p-3">
                              <div class="text-center">
                                 <h1 class="h4 text-gray-900 mb-4">Welcome Back!</h1>
                              </div>
                              @if ( Session::has('success') )
                                 <div class="alert alert-success alert-dismissible" role="alert">
                                    <strong>{{ Session::get('success') }}</strong>
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                       <span aria-hidden="true">&times;</span>
                                       <span class="sr-only">Close</span>
                                    </button>
                                 </div>
                              @endif
                              @if ( Session::has('error') )
                                 <div class="alert alert-danger alert-dismissible" role="alert">
                                    <strong>{{ Session::get('error') }}</strong>
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                       <span aria-hidden="true">&times;</span>
                                       <span class="sr-only">Close</span>
                                    </button>
                                 </div>
                              @endif
                              @if ($errors->any())
                                 <div class="alert alert-danger alert-dismissible" role="alert">
                                    <ul>
                                          @foreach ($errors->all() as $error)
                                             <li>{{ $error }}</li>
                                          @endforeach
                                    </ul>
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                       <span aria-hidden="true">&times;</span>
                                       <span class="sr-only">Close</span>
                                    </button>
                                 </div>
                              @endif
                              <form class="user" action="{{ route('admin.post-login') }}" method="post">
                                 @csrf
                                 <div class="form-group">
                                    <input name="email" type="email" class="form-control form-control-user"  @error('email') is-invalid @enderror id="exampleInputEmail" aria-describedby="emailHelp">
                                    @error('email')
                                       <span class="invalid-feedback" role="alert">
                                          <strong>{{ $message }}</strong>
                                       </span>
                                    @enderror
                                 </div>
                                 <div class="form-group">
                                    <input name="password" type="password" class="form-control form-control-user"  @error('password') is-invalid @enderror id="exampleInputPassword">
                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                       <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                 </div>
                                 <div class="form-group">
                                    <div class="custom-control custom-checkbox small">
                                       <input name="remember_me" type="checkbox" class="custom-control-input" id="customCheck">
                                       <label class="custom-control-label" for="customCheck">@lang('custom.button.remember_me')</label>
                                    </div>
                                 </div>
                                 <input type="submit" name="submit" class="btn btn-primary btn-user btn-block" value="@lang('custom.button.login')">
                              </form>
                              <hr>
                              <div class="text-center">
                                 <a class="small" href="{{ route('admin.forgot_password') }}">@lang('custom.button.forgot_password')?</a>
                              </div>
                           </div>
                        </div>
                     {{-- </div> --}}
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