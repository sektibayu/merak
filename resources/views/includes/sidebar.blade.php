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
                <a href="{{URL::to('rack')}}">
                    <i class="fa fa-folder"></i>
                    <span>Rak</span>
                    {{--<i class="fa fa-angle-left pull-right"></i>--}}
                </a>
            </li>
            <li>
                <a href="{{URL::to('item')}}">
                    <i class="fa fa-folder"></i>
                    <span>Item</span>
                    {{--<i class="fa fa-angle-left pull-right"></i>--}}
                </a>
            </li>
            {{--<li>--}}
                {{--<a href="{{URL::to('transaction')}}">--}}
                    {{--<i class="fa fa-folder"></i>--}}
                    {{--<span>Transaction</span>--}}
                    {{--<i class="fa fa-angle-left pull-right"></i>--}}
                {{--</a>--}}
            {{--</li>--}}
            <li>
                <a href="{{URL::to('status')}}">
                    <i class="fa fa-folder"></i>
                    <span>Status</span>
                    {{--<i class="fa fa-angle-left pull-right"></i>--}}
                </a>
            </li>
            <li>
                <a href="{{URL::to('user')}}">
                    <i class="fa fa-folder"></i>
                    <span>User</span>
                    {{--<i class="fa fa-angle-left pull-right"></i>--}}
                </a>
            </li>
        </ul>
    </li>
    <li class="treeview" >
        <a href="#">
            <i class="fa fa-folder"></i>
            <span>Kartu Barang</span>
            {{--<i class="fa fa-angle-left pull-right"></i>--}}
        </a>
    </li>
    <li class="treeview" >
        <a href="#">
            <i class="fa fa-folder"></i>
            <span>Registrasi Pengeluaran Barang</span>
            {{--<i class="fa fa-angle-left pull-right"></i>--}}
        </a>
    </li>
        <li class="treeview" >
            <a href="#">
                <i class="fa fa-folder"></i>
                <span>Cost PO RM</span>
                {{--<i class="fa fa-angle-left pull-right"></i>--}}
            </a>
        </li>
        <li class="treeview" >
            <a href="{{URL::to('ekstra')}}">
                <i class="fa fa-folder"></i>
                <span>Ekstra</span>
                {{--<i class="fa fa-angle-left pull-right"></i>--}}
            </a>
            {{--<ul class="treeview-menu">--}}
                {{--<li>--}}
                    {{--<a href="">--}}
                        {{--<i class="fa fa-folder"></i>--}}
                        {{--<span>Print BON PERMINTAAN BARANG</span>--}}
                        {{--<i class="fa fa-angle-left pull-right"></i>--}}
                    {{--</a>--}}
                {{--</li>--}}
                {{--<li>--}}
                    {{--<a href="">--}}
                        {{--<i class="fa fa-folder"></i>--}}
                        {{--<span>Print SALDO SELURUH BARANG</span>--}}
                        {{--<i class="fa fa-angle-left pull-right"></i>--}}
                    {{--</a>--}}
                {{--</li>--}}
            {{--</ul>--}}
        </li>




</ul>
