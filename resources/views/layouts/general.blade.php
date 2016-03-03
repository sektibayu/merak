<!DOCTYPE html>
<html>
<head>
  @include('includes.head-general')
  @yield('custom_head')
</head>
<body class="skin-green">
<!-- <body class="skin-green-light"> -->
  <div class="wrapper">  
    @include('includes.header')
    <!-- sidebar -->
    <!-- <aside class="main-sidebar"> -->
    <!-- <aside class="main-sidebar" style="background-color: #ffffff"> -->
    <aside class="main-sidebar" style="background-color: #ECF0F5">
      <section class="sidebar">
          @include('includes.sidebar')
      </section>
    </aside>
    <!-- content -->
    <div class="content-wrapper">
        @include('includes.error')
        @yield('content')
    </aside>
  </div>
  @include('includes.footer')
  @yield('custom_foot')
</body>
</html>