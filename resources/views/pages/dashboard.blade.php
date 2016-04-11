@extends('layouts.general')
@section('content')
@include('partials.flash-overlay-modal')

<section class="content-header">
  <!--   <h1>Dashboard</h1> -->
</section>
<section class="content">
    <div class="row">
    <img height="400" style="min-height: 150px; min-width: 150px; margin-left: auto; margin-right: auto; text-align: center;display: table-cell;vertical-align: middle" src="{{URL::to('images/merakbesar.png')}}">
    </div>
</section>


@stop
@section('custom_foot')
    <script type="text/javascript">
    </script>
@stop