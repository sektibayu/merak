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
                {!! csrf_field() !!}
                    <div class="box-body">
                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-4 control-label">USERNAME</label>
                            <div class="col-sm-7">
                                <input type="text" name="userid" class="form-control" placeholder="user id" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-4 control-label">KETERANGAN</label>
                            <div class="col-sm-7">
                                <select name = "statusid" required>
                                    <option></option>
                                    @foreach ($status as $key)
                                    <option class="form-control" value="{{ $key->statusid }}">{{ $key->desc }}</option> 
                                    @endforeach
                                </select>
                                <!-- <input type="text" name="statusid" class="form-control" placeholder="status id" required> -->
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-4 control-label">WAKTU</label>
                            <div class="col-sm-7">
                                <input class="form-control" name="time" placeholder="YYYY-MM-DD" type="datetime">
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