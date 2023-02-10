
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
              <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
                <div class="login-brand">
                  <img src="{{ asset('')}}assets/img/stisla-fill.svg" alt="logo" width="100" class="shadow-light rounded-circle">
                </div>
                @if (session()->has('message'))
                <div class="alert alert-danger">
                  {{session('message')}}
                </div>
                @endif
                <div class="card card-primary">
                  <div class="card-header"><h4>Login</h4></div>
    
                  <div class="card-body">
                    <form method="POST" action="/postlogin" class="needs-validation"  id="myForm">
                        {{ csrf_field() }}
                      <div class="form-group">
                        <label for="email">NIK</label>
                        <input id="email" type="text" class="form-control" name="email" tabindex="1" required autocomplete="nope">
                        <!-- <input id="password" type="hidden" class="form-control" name="password"  > -->
                      </div>
    
                      <div class="form-group">
                        <div class="d-block">
                            <label for="password" class="control-label">Nama Lengkap</label>
                          </div>
                        <input id="name" type="text" class="form-control" name="name" tabindex="2" required autocomplete="nope">
                        </div>
                      <div class="form-group">
                        <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">
                          Login
                        </button>
                      </div>
                    </form>
                  </div>
                </div>
                <div class="mt-5 text-muted text-center">
                  Don't have an account? <a href="/register">Create One</a>
                </div> <p><p>
               {{--  <div class="simple-footer">
                  Copyright &copy; Stisla 2018
                </div> --}}
              </div>
            </div>
          </div>
        </section>
    </div>

    <script>
      window.onload = function() {
          var src = document.getElementById("email"),
              dst = document.getElementById("password");
          src.addEventListener('input', function() {
              dst.value = src.value;
          });
      };
    </script>
  <!-- General JS Scripts -->
  @include('layouts.scriptJavascript')

  <!-- Page Specific JS File -->
  <script src="{{ asset('')}}assets/js/page/auth-register.js"></script>
</body>
</html>
