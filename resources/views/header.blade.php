<header class="main-header">
  <!-- Logo -->
  <a href="index2.html" class="logo">
    <!-- mini logo for sidebar mini 50x50 pixels -->
    <span class="logo-mini"><b>A</b>J</span>
    <!-- logo for regular state and mobile devices -->
    <span class="logo-lg"><b>Assalam</b>Jaya</span>
  </a>
  <!-- Header Navbar: style can be found in header.less -->
  <nav class="navbar navbar-static-top">
    <!-- Sidebar toggle button-->
    <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
      <span class="sr-only">Toggle navigation</span>
    </a>

    <div class="navbar-custom-menu">
      <ul class="nav navbar-nav">
        <!-- User Account: style can be found in dropdown.less -->
        <li class="dropdown user user-menu">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            <img src="{{URL::to('/assets/dist/img/user2.png')}}" class="user-image" alt="User Image">
            <span class="hidden-xs">
              {{ \Illuminate\Support\Facades\Auth::user()->username }}
            </span>
          </a>
          <ul class="dropdown-menu">
            <!-- User image -->
            <li class="user-header">
              <img src="{{URL::to('/assets/dist/img/user2.png')}}" class="img-circle" alt="User Image">
              <p>
                {{ \Illuminate\Support\Facades\Auth::user()->username }}
              </p>
            </li>
            @if(\Illuminate\Support\Facades\Auth::user()->rule == 'Pemilik')
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-right">
                  <a class="dropdown-item" 
                    href="{{ route('logout') }}" 
                    onclick="event.preventDefault(); 
                    document.getElementById('logout-form').submit();">
                      {{ __('Logout') }}
                  </a>
                  <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">@csrf</form>
                </div>
              </li>
            @else
              <!-- Menu Body -->
              <li class="user-body">
                <div class="row">
                  <div class="col-xs-6 text-center">
                    <a href="{{route('ubah_profil.index')}}" class="btn btn-info">Ubah Profil</a>
                  </div>
                  <div class="col-xs-6 text-center">
                    <a href="{{route('ubah_sandi.index')}}" class="btn btn-info">Ubah Kata Sandi</a>
                  </div>
                </div>
                <!-- /.row -->
              </li>
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-right">
                  <a class="dropdown-item" 
                    href="{{ route('logout') }}" 
                    onclick="event.preventDefault(); 
                    document.getElementById('logout-form').submit();">
                      {{ __('Logout') }}
                  </a>
                  <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">@csrf</form>
                </div>
              </li>
            @endif
          </ul>
        </li>
      </ul>
    </div>
  </nav>
</header>