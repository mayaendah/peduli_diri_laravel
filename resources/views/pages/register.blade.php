
<!DOCTYPE html>
<html lang="en">
<head>
    @include('layouts.styleCss')

  <!-- CSS Libraries -->
  <link rel="stylesheet" href="{{ asset('')}}node_modules/selectric/public/selectric.css">
</head>

<body>
    <div id="app">
        <section class="section">
          <div class="container mt-5">
            <div class="row">
              <div class="col-12 col-sm-6 offset-sm-3 ">
                <div class="login-brand">
                  <img src="../assets/img/stisla-fill.svg" alt="logo" width="100" class="shadow-light rounded-circle">
                </div>
                @if (session()->has('message'))
                <div class="alert alert-danger">
                  {{session('message')}}
                </div>
                @endif
                <div class="card card-primary">
                  <div class="card-header"><h4>Register</h4></div>
                  
                  <div class="card-body">
                    <form method="POST" action="/simpanUser">
                       {{ csrf_field() }}
                      <div class="form-group">
                        <label for="email">NIK</label>
                        <input id="email" type="text" class="form-control" name="nik" tabindex="1" autocomplete="nope" required autofocus>
                        @if ($errors->has('nik'))
                        <div class="class" style="color: red;text-align:center">
                          {{$errors->first('nik')}}
                        </div>
                      @endif
                      </div>
    
                      <div class="form-group">
                        <div class="d-block">
                            <label for="password" class="control-label">Nama Lengkap</label>
                        </div>
                        <input id="nama_lengkap" type="text" class="form-control" name="nama" tabindex="2"  required autocomplete="nope">
                        @if ($errors->has('nama'))
                        <div class="class">
                          {{$errors->first('nama')}}
                        </div>
                      @endif
                      </div>
    
                      {{-- <div class="form-group">
                        <div class="custom-control custom-checkbox">
                          <input type="checkbox" name="remember" class="custom-control-input" tabindex="3" id="remember-me">
                          <label class="custom-control-label" for="remember-me">Remember Me</label>
                        </div>
                      </div> --}}
    
                      <div class="form-group">
                        <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">
                          Register
                        </button>
                      </div>
                    </form>
                   
                    
    
                  </div>
                </div>
                <div class="mt-5 text-muted text-center">
                  Allready have an account? <a href="/login">Login</a>
                </div> 
               {{--  <div class="simple-footer">
                  Copyright &copy; Stisla 2018
                </div> --}}
              </div>
            </div>
          </div>
        </section>
    </div>
   
  <!-- General JS Scripts -->
  @include('layouts.scriptJavascript')

  <!-- Page Specific JS File -->
  <script src="{{ asset('')}}assets/js/page/auth-register.js"></script>
</body>
</html>
