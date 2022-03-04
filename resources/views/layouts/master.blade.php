
<!DOCTYPE html>
<html lang="en">
<head>
  @include('layouts.styleCss')
</head>

<body>
  <div id="app">
    <div class="main-wrapper">
      <div class="navbar-bg"></div>
      @include('layouts.navbar')
      <div class="main-sidebar">
        @include('layouts.sidebar')
      </div>

      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>@yield('halaman')</h1>
          </div>
          <div class="section-body">
            <div class="row">
                <div class="col-12 col-md-12 col-lg-12">
                  <div class="card">
                    <div class="card-header">
                      <h4>@yield('judul-card')</h4>
                    </div>
                    @if (session()->has('message'))
                        <div class="alert alert-info">
                          {{session('message')}}
                        </div>
                    @endif
                    <div class="card-body">
                       @yield('content')
                    </div>
                </div>
          </div>
        </section>
      </div>
      <footer class="main-footer">
        <div class="footer-left">
          Copyright &copy; 2018 <div class="bullet"></div> Design By <a href="https://nauval.in/">Muhamad Nauval Azhar</a>
        </div>
        <div class="footer-right">
          2.3.0
        </div>
      </footer>
    </div>
  </div>

  <!-- General JS Scripts -->
    @include('layouts.scriptJavascript')

  <!-- Page Specific JS File -->
</body>
</html>
