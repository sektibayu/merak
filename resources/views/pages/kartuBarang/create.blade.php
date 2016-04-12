@extends('layouts.general')
@section('content')
@include('partials.flash-overlay-modal')

<section class="content-header">
    <h1>Kartu Barang</h1>
</section>
<section class="content">
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <!-- Horizontal Form -->
            <div class="box box-info">
                <div class="box-header with-border">
                    <h3 class="box-title">Buat Item Baru</h3>
                </div><!-- /.box-header -->
                <!-- form start -->
                <form action="" method="post" class="form-horizontal">
                {!! csrf_field() !!}
                    <div class="box-body">
                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-4 control-label">NAMA</label>
                            <div class="col-sm-7">
                                <input type="text" name="name" class="form-control" placeholder="Name" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-4 control-label">SPEK</label>
                            <div class="col-sm-7">
                                <input type="text" name="spec" class="form-control" placeholder="spec" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-4 control-label">NOMOR PART</label>
                            <div class="col-sm-7">
                                <input type="text" name="no_part" class="form-control" placeholder="nomer part" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-4 control-label">LOKASI RACK</label>
                            <div class="col-sm-7">
                                <select name = "rackid">
                                    <option></option>
                                    @foreach ($item as $key)
                                    <option class="form-control" value="{{ $key->rackid }}">{{ $key->code }}</option> 
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-4 control-label">HARGA (IDR)</label>
                            <div class="col-sm-7">
                                <input type="number" name="price" class="form-control" placeholder="price" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-4 control-label">Pieces</label>
                            <div class="col-sm-7">
                                <input type="text" name="pieces" class="form-control" placeholder="PCS" required>
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