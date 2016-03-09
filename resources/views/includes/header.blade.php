<header class="main-header">
    <a href="{{ url('/') }}" class="logo" style="background-color:#070719;">
        <span class="logo-mini">MERAK</span>
        <span class="logo-lg">Management Rak</span>
    </a>

    <nav class="navbar navbar-static-top" role="navigation">
        <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
        </a>

        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
                <li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
                  <span class="hidden-xs">User name</span>
                </a>
                <ul class="dropdown-menu">
                  <!-- User image -->
                  <li class="user-header">
                    <br>
                    <br>
                    <p>
                      Nama
                      <small>Posisi<br>Departemen</small>
                    </p>
                  </li>
                  <!-- Menu Footer-->
                  <li class="user-footer">
                    <div class="pull-right">
                      <a href="{{URL::to('auth/logout')}}" class="btn btn-default btn-flat">Sign out</a>
                    </div>
                  </li>
                </ul>
              </li>
            </ul>
        </div>
    </nav>
</header>
