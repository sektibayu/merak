<?php 
$seg1 = Request::segment(1);
$seg2 = Request::segment(2);
$seg3 = Request::segment(3);
$path = Request::path();
// print_r($url);
 ?>
@if (Auth::check())
    <div class="user-panel">
        <div class="pull-left image">
            <img src="{{ URL::to(Auth::user()->getImage()) }}" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
            <p><a href="{{ URL::to('user/detail/' . Auth::id() ) }}">{{ Auth::user()->name }}</a></p>
            <a href="#"><i class="fa fa-circle text-success"></i> {{ ucwords(Auth::user()->getGroupRole(Auth::user()->id)->name) }}</a>
        </div>
    </div>
    <?php $menus = Auth::user()->getGroupRole()->getSidebarMenu(); ?>
@else
    <?php $menus = array(); ?>
@endif



<ul class="sidebar-menu">
<?php /*
    @if (Auth::check())
        <li>
            <a href="{{ URL::to('dashboard') }}">
                <i class="fa fa-home"></i>
                <span>Beranda</span>
            </a>
        </li>
    @endif
*/ ?>

    <div style="padding-right: 15px; padding-left: 15px;">
            @foreach ($menus as $menu)
                @if ($menu->name=='Surat Baru')
                <a href="{{ URL::to($menu->url) }}" class="btn btn-primary btn-block margin-bottom"
                    style="margin-top: 20px; color: #fff;">
                    {{ $menu->name }}
                </a>    
                @endif
            @endforeach

            <div class="box box-solid">
                    <div class="box-header with-border">
                      <h3 class="box-title">Menu Utama</h3>
                      <!-- <div class='box-tools'>
                        <button class='btn btn-box-tool' data-widget='collapse'><i class='fa fa-minus'></i></button>
                      </div> -->
                    </div>
                <div class="box-body no-padding">
                  <ul class="nav nav-pills nav-stacked">
                    @foreach ($menus as $menu)
                        @if($menu->name!='Surat Baru')
                        <li
                        <?php  
                           $class = "";
                           if ($menu->url == $path) {
                                 # code...
                                 $class = "active";
                             }
                           else if ($menu->child->count()>0)
                            {
                                $class = "treeview ";
                                 if (strpos($menu->url,$seg1) !== false || $menu->url=='serstakeholder'){
                                    $class .= "active";
                                    if (strpos($menu->url,'inout') !== false 
                                        || strpos($menu->url,'serstakeholder') !== false
                                        || strpos($menu->url,'document') !== false ){
                                      $class = " ";
                                    }
                                 }
                             }
                             
                         ?>                    
                             class="<?php echo $class ?>"        
                        >
                            <a href="{{ URL::to($menu->url) }}">
                                <i class="fa fa-folder-o"></i>
                                <span>{{ $menu->name }}</span>
                                @if ($menu->child->count())
                                <i class="fa fa-angle-left pull-right"></i>
                                @endif

                                <!-- Persiapan unread messages -->
                                <!-- <span class="label label-primary pull-right">12</span> -->
                            </a>
                            @if($menu->child->count() != 0)
                                <ul class="treeview-menu" style="padding-left: 0px;">
                                @foreach($menu->child as $child)
                                    <li
                                    @if($menu->url == $path ) 
                                        class="active"
                                     @endif
                                    >
                                        <a href="{{ URL::to($child->url) }}">
                                            <i class="fa fa-angle-double-right"></i>
                                            {{ $child->name }}
                                        </a>
                                    </li>
                                @endforeach
                                </ul>
                            @endif
                        </li>
                        @endif
                    @endforeach

                  </ul>
                </div><!-- /.box-body -->
              </div><!-- /. box -->
              </div>

    <!-- @foreach ($menus as $menu)
        <li @if($menu->child->count()) class="treeview" @endif>
            <a href="{{ URL::to($menu->url) }}">
                <i class="fa fa-folder"></i>
                <span>{{ $menu->name }}</span>
                @if ($menu->child->count())
                <i class="fa fa-angle-left pull-right"></i>
                @endif
            </a>
            @if($menu->child->count() != 0)
                <ul class="treeview-menu">
                @foreach($menu->child as $child)
                    <li>
                        <a href="{{ URL::to($child->url) }}">
                            <i class="fa fa-angle-double-right"></i>
                            {{ $child->name }}
                        </a>
                    </li>
                @endforeach
                </ul>
            @endif
        </li>
    @endforeach -->
</ul>
