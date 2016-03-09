<ul class="sidebar-menu">
    @if (Auth::check())
        <li>
            <a href="{{ URL::to('') }}">
                <i class="fa fa-home"></i>
                <span>Beranda</span>
            </a>
        </li>
    @endif

    <li class="treeview" >
        <a href="#">
            <i class="fa fa-folder"></i>
            <span>Akses Tabel</span>
            <i class="fa fa-angle-left pull-right"></i>
        </a>
        <ul class="treeview-menu">
            <li>
                <a href="#">
                    <i class="fa fa-folder"></i>
                    <span>Rak</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li>
                        <a href="{{ URL::to('rack') }}">
                            <i class="fa fa-angle-double-right"></i>
                            Manage
                        </a>
                    </li>
                    <li>
                        <a href="{{ URL::to('rack/create') }}">
                            <i class="fa fa-angle-double-right"></i>
                            Create
                        </a>
                    </li>
                </ul>
            </li>
        </ul>
    </li>



</ul>
