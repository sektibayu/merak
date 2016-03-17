@extends('layouts.general')
@section('content')
@include('partials.flash-overlay-modal')

<section class="content-header">
    <h1>Transaksi</h1>
</section>
<section class="content">
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <!-- Horizontal Form -->
            <div class="box box-info">
                <div class="box-header with-border">
                    <h3 class="box-title">Buat Transaksi Baru</h3>
                </div><!-- /.box-header -->
                <!-- form start -->
                <form action="" method="post" class="form-horizontal">
                    <div class="box-body">
                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-4 control-label">userid</label>
                            <div class="col-sm-7">
                                <input type="text" name="userid" class="form-control" placeholder="user id" required>
                            </div>
                            <label for="inputEmail3" class="col-sm-4 control-label">statusid</label>
                            <div class="col-sm-7">
                                <input type="text" name="statusid" class="form-control" placeholder="status id" required>
                            </div>
                            <label for="inputEmail3" class="col-sm-4 control-label">time</label>
                            <div class="col-sm-7">
                                <input class="form-control" name="time" placeholder="YYYY-MM-DD" type="date">
                            </div>
                        </div>
                    </div><!-- /.box-body -->
                    <div class="box-footer">
                        <div class="col-sm-4">
                        </div>
                        <div class="col-sm-7">
                            <button type="submit" class="btn btn-info pull-right">Submit</button>
                        </div>
                  </div><!-- /.box-footer -->
                </form>
            </div><!-- /.box -->
        </div><!-- /.box -->
    </div>
</section>


@stop
@section('custom_foot')
    <script type="text/javascript">
    </script>
@stop