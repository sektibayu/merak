<header class="main-header">
    <a style="background-color:#015EF1;" href="{{ url('/') }}" class="logo" title="Merak"><b>Merak</b></a>

    <nav class="navbar navbar-static-top" role="navigation" style="background-color:#3685ff;">
        <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
        </a>

        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
                @if (Auth::check())
                <li class="dropdown user user-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="glyphicon glyphicon-user"></i>
                        <span>{{ Auth::user()->name }} <i class="caret"></i></span>
                    </a>
                    <ul class="dropdown-menu">
                        <!-- User image -->
                        <li class="user-header bg-light-red" style="background-color:#015EF1;" >
                            <img src="{{ url(Auth::user()->getImage()) }}" class="img-circle" alt="User Image">
                            <p>
                                <strong>{{ Auth::user()->name }}</strong>
                                <br>
                                <strong>{{ ucwords(Auth::user()->getGroupRole()->name) }}</strong>
                            </p>
                        </li>
                        <li class="user-body">
                            <div class="text-center">
                                <form action="{{ url('user/change_role') }}" method="post" role="form">
                                    <div class="form-group">
                                        <label for="group_id">Login sebagai&nbsp;&nbsp;</label>
                                        <select class="form-control" id="group_id" name="group_id" onchange="this.form.submit()">
                                        @foreach (Auth::user()->headergroup(Auth::user()->id) as $group)
                                            <option value="{{ $group->id }}" @if($group->id == Auth::user()->getGroupRoleId()) {{ 'selected' }} @endif>{{ ucwords($group->name) }}</option>
                                        @endforeach
                                        </select>
                                    </div>
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                </form>
                                <br>
                            </div>
                        </li>
                        <!-- Menu Footer-->
                        <li class="user-footer">
                            <div class="pull-left">
                                <a href="{{ URL::to('/user/viewprofile')}}" class="btn btn-default btn-flat">Profil</a>
                            </div>
                            <div class="pull-right">
                                <a href="{{ url('logout') }}" class="btn btn-default btn-flat">Keluar</a>
                            </div>
                        </li>
                    </ul>
                </li>
                @else
                <li class="dropdown">
                    <a href="{{ url('login') }}">
                        <i class="fa fa-sign-in"></i>&nbsp; Login
                    </a>
                </li>
                @endif
            </ul>
        </div>
    </nav>
</header>