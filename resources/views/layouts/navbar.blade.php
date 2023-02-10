<nav class="navbar navbar-expand-lg main-navbar">
<form class="form-inline mr-auto" method="GET" action="/cari">
  @csrf
    <div class="col-auto">
      <select onchange="yesnoCheck(this);" class="form-control form-select" type="search">
        <option value="kota">Kota</option>
        <option value="tanggal">tanggal</option>
        <option value="jam">jam</option>
        <option value="suhu">suhu</option>
      </select>
    </div>
    <div class="col">
      <div class="form-group">
        <input name="kota" id="ifkota"  class="form-control" type="search" placeholder="Cari kota" aria-label="Search">
        <button class="btn" id="ifkotaBtn"  btn-outline-success my-2 my-sm-0" type="submit"><i class="fas fa-search"></i></button>
      </div>
      <div class="form-group">
        <input name="tanggal" id="iftgl" style="display: none;" class="form-control" type="date" placeholder="Cari tanggal" aria-label="Search">
        <button id="ifBtnTgl" style="display: none;" class="btn btn-outline-success my-2 my-sm-0" type="submit"><i class="fas fa-search"></i></button>
       </div> 

       <div class="form-group">
        <input name="jam" id="ifjam" style="display: none;" class="form-control" type="time" placeholder="Cari jam" aria-label="Search">
        <button id="ifBtnjam" style="display: none;" class="btn btn-outline-success my-2 my-sm-0" type="submit"><i class="fas fa-search"></i></button>
       </div> 

       <div class="form-group">
        <input name="suhu" id="ifsuhu" style="display: none;" class="form-control" type="search" placeholder="Cari suhu" aria-label="Search">
        <button id="ifBtnsuhu" style="display: none;" class="btn btn-outline-success my-2 my-sm-0" type="submit"><i class="fas fa-search"></i></button>
       </div> 

        
      <div class="col"> 
      <div class="form-group ">
          @if (session()->has('message'))
                <div class="alert alert-danger">
                  {{session('message')}}
                </div>
          @endif
        </div>
      </div>    
      
      </div>
    </form>
    <ul class="navbar-nav navbar-right">
      
      <li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
        <img alt="image" src="{{ asset('')}}assets/img/avatar/avatar-1.png" class="rounded-circle mr-1">
        <div class="d-sm-none d-lg-inline-block">
          @if (!empty(auth()->user()->name))
               {{auth()->user()->name}}
          @else
                belum Login  
          @endif
        </div></a>
        <div class="dropdown-menu dropdown-menu-right">
          <div class="dropdown-title">Logged in 5 min ago</div>
          <a href="features-profile.html" class="dropdown-item has-icon">
            <i class="far fa-user"></i> Profile
          </a>
          <div class="dropdown-divider"></div>
          <a href="/logout" class="dropdown-item has-icon text-danger" >
            <i class="fas fa-sign-out-alt"></i> Logout
          </a>
          
        </div>
      </li>
    </ul>
  </nav>

  <script>
  function yesnoCheck(that) {
      if (that.value == "tanggal") {
            document.getElementById("iftgl").style.display = "block";
            document.getElementById("ifBtnTgl").style.display = "block";

            document.getElementById("ifkota").style.display = "none";
            document.getElementById("ifkotaBtn").style.display = "none";

            document.getElementById("ifsuhu").style.display = "none";
            document.getElementById("ifBtnsuhu").style.display = "none";

            document.getElementById("ifjam").style.display = "none";
            document.getElementById("ifBtnjam").style.display = "none";

        } else if(that.value == "jam"){
            document.getElementById("iftgl").style.display = "none";
            document.getElementById("ifBtnTgl").style.display = "none";

            document.getElementById("ifkota").style.display = "none";
            document.getElementById("ifkotaBtn").style.display = "none";

            document.getElementById("ifsuhu").style.display = "none";
            document.getElementById("ifBtnsuhu").style.display = "none";

            document.getElementById("ifjam").style.display = "block";
            document.getElementById("ifBtnjam").style.display = "block";
          
        }else if(that.value == "suhu"){
            document.getElementById("iftgl").style.display = "none";
            document.getElementById("ifBtnTgl").style.display = "none";

            document.getElementById("ifkota").style.display = "none";
            document.getElementById("ifkotaBtn").style.display = "none";

            document.getElementById("ifsuhu").style.display = "block";
            document.getElementById("ifBtnsuhu").style.display = "block";

            document.getElementById("ifjam").style.display = "none";
            document.getElementById("ifBtnjam").style.display = "none";
        }else{
            document.getElementById("iftgl").style.display = "none";
            document.getElementById("ifBtnTgl").style.display = "none";

            document.getElementById("ifkota").style.display = "block";
            document.getElementById("ifkotaBtn").style.display = "block";

            document.getElementById("ifsuhu").style.display = "none";
            document.getElementById("ifBtnsuhu").style.display = "none";

            document.getElementById("ifjam").style.display = "none";
            document.getElementById("ifBtnjam").style.display = "none";
        }
    }
  </script>