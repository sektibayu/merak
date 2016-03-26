@extends('layouts.general')
@section('content')
@include('partials.flash-overlay-modal')

<section class="content-header">
	<h1 style="text-align: center;">EKSTRA</h1>
</section>
<section class="content">
	<div class="row">
		<div class="col-md-6 col-md-offset-3">
			<!-- Horizontal Form -->
			<div class="box box-info">
                    <!-- <div class="box-body">
                        <a href="#bonrequest"><button>PRINT BON PERMINTAAN BARANG</button></a>
                    </div>
                    <div class="box-body">
                        <a href="{{ URL::to('ekstra/printsaldo') }}"><button>PRINT SALDO SELURUH BARANG</button></a>
                    </div> -->
                    <button class="btn btn-primary" title="printbon" data-toggle="modal" data-target="#bonrequest">&nbsp;&nbsp;PRINT BON PERMINTAAN BARANG</button>
                    <br>
                    <br>
                    <a href="{{ URL::to('ekstra/printsaldo') }}"><button class="btn btn-primary" title="printsaldo" data-target="{{ URL::to('ekstra/printsaldo') }}">PRINT SALDO SELURUH BARANG</button></a
>                    <div class="modal fade" id="bonrequest" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                    <h4 class="modal-title" id="myModalLabel">PRINT BON PERMINTAAN BARANG</h4>
                                </div>
                                <div class="modal-body">
                                   <!-- isi table -->
                                    <form action=" {{ URL::to('ekstra/printbon') }}" method="get" class="form-horizontal">
                                        <div class="box-body">
                                            <div class="form-group">
                                                <label for="inputEmail3" class="col-sm-4 control-label">Waktu</label>
                                                <div class="col-sm-7">
                                                    <input type="date" name="waktu" class="form-control" placeholder="DD/MM/YY" required>
                                                </div>
                                            </div>
                                        </div><!-- /.box-body -->
                                        <div class="box-footer">
                                            <div class="col-sm-4">
                                            </div>
                                            <div class="col-sm-7">
                                                <button type="submit" class="btn btn-default pull-right">Submit</button>
                                                <button type="button" class="btn btn-info pull-left" data-dismiss="modal">Cancel</button>
                                            </div>
                                        </div><!-- /.box-footer -->
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
            </div><!-- /.box -->
        </div><!-- /.box -->
    </div>
</section>


@stop
@section('custom_foot')
<script type="text/javascript">
</script>
@stop