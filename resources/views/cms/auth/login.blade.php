<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Education|DashBoard</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('cms/plugins/fontawesome-free/css/all.min.css') }}">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="{{ asset('cms/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('cms/dist/css/adminlte.min.css') }}">
    <link rel="stylesheet" href="{{ asset('cms/plugins/toastr/toastr.min.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
</head>

<body class="hold-transition login-page" style="background-color: white ">
    <div class="login-box " style="width:500px;  border:#0eb582 solid 1px"  >
        <!-- /.login-logo -->
        <div class="card card-outline"  >
            
            <div class="card-body ">
                <div class="card-header text-center border-0"  >
                    <a  class="h1" style="color: #0eb582;font-size: 80px"><b>{{ env('APP_NAME') }}</b></a>
                </div>
                <p class="font-weight-bold	 text-center" style=" 15px;" class="login-box-msg ">Sign In as <span  class="h5"  style="text-transform: capitalize ;color: #0eb582 ;text-decoration: underline">{{  $guard }}</span> To Enter
                    your Website-Dashboard</p>
                    @if ($guard == 'admin')
                    <a class="h5" style="text-decoration: underline ; color: #0eb582" href="{{ route('dashboard.login' ,'teacher') }}"> Login as Teacher</a>
                    @else
                    <a class="h5" style="text-decoration: underline ; color: #0eb582" href="{{ route('dashboard.login' ,'admin') }}"> Login as Admin</a>

                    @endif
                   
                <form>
                    <div class="input-group mb-3">
                        <input type="email" class="form-control" placeholder="Email" name="email" id="email" style="border:#0eb582 solid 1px">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope" style="color: #0eb582 "  ></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" class="form-control" placeholder="Password" name="password" style="border:#0eb582 solid 1px"
                            id="password">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock" style="color: #0eb582"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-8">
                            <div class="icheck-success">
                                <input type="checkbox" id="remember" style="background-color: #0eb582">
                                <label for="remember" >
                                    Remember Me
                                </label>
                            </div>
                        </div>
                        <!-- /.col -->
                        <div class="col-4">
                            <button type="button" onclick="login()" class="btn btn-info btn-block" style="background-color: #0eb582;">Sign In</button>
                        </div>
                        <!-- /.col -->
                    </div>
                </form>

                {{-- <div class="social-auth-links text-center mt-2 mb-3">
        <a href="#" class="btn btn-block btn-primary">
          <i class="fab fa-facebook mr-2"></i> Sign in using Facebook
        </a>
        <a href="#" class="btn btn-block btn-danger">
          <i class="fab fa-google-plus mr-2"></i> Sign in using Google+
        </a>
      </div> --}}
                <!-- /.social-auth-links -->

                {{-- <p class="mb-1">
        <a href="forgot-password.html">I forgot my password</a>
      </p> --}}
                {{-- <p class="mb-0">
        <a href="register.html" class="text-center">Register a new membership</a>
      </p> --}}
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
    <!-- /.login-box -->

    <!-- jQuery -->
    <script src="{{ asset('cms/plugins/jquery/jquery.min.js') }}"></script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('cms/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('cms/dist/js/adminlte.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script src="{{ asset('cms/plugins/toastr/toastr.min.js') }}"></script>
    <script src="{{ asset('cms/js/crud.js') }}"></script>
    
    
    
    <script>
      function login() {

        var guard = '{{ request('guard') }}';

        axios.post('/cms/'+guard+'/login', {
          email : document.getElementById('email').value,
          password : document.getElementById('password').value,
          remember_me : document.getElementById('remember').checked,
          guard: guard

        }) //الرابط الي بدي من خلاله ابعت عملية تسجيل الدخول ()مكانه فالراوت
            .then(function (response) {
                window.location.href='/cms/admin'

            })
            .catch(function (error) {

                if (error.response.data.errors !== undefined) {
                    showErrorMessages(error.response.data.errors);
                } else {
                    showMessage(error.response.data);
                }
        });

}
    </script>
</body>

</html>
