<header class="main-header">
    <a href="{{ url('/') }}" class="logo" style="background-color:#070719;">
        <span class="logo-mini"><img height="42" width="42" src="{{URL::to('images/merak.png')}}"></span>
        <span class="logo-lg"><img height="42" width="42" src="{{URL::to('images/merak.png')}}">&nbsp;Management Rak</span>
    </a>

    <nav class="navbar navbar-static-top" role="navigation">
        <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
        </a>

        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
                <li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
                  <span class="hidden-xs">{{Auth::user()->name}}</span>
                </a>
                <ul class="dropdown-menu">
                  <!-- User image -->
                  <li class="user-header" style="background: #FFFFFF;">
                    <br>
                    <br>
                    <p>
                      <img height="75" width="75" src="{{URL::to('images/merak.png')}}">
                    </p>
                  </li>
                  <!-- Menu Footer-->
                  <li class="user-footer">
                    <div class="pull-right">
                      <a href="{{URL::to('logout')}}" class="btn btn-default btn-flat">Sign out</a>
                    </div>
                  </li>
                </ul>
              </li>
            </ul>
        </div>
    </nav>
</header>
