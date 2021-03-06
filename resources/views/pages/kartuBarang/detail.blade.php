@extends('layouts.general')
@section('content')
@include('partials.flash-overlay-modal')
<section class="content-header">
    <h1>Kartu Barang</h1>
</section>
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Detail Kartu Barang</h3>
                </div>
                <div class="box-body">
                    <div class="col-md-12">
                    @if ($item != null)
                    <a href="{{ URL::to('kartubarang/update/' . $item->itemid) }}" class="btn btn-primary" title="Sunting"><span class="glyphicon glyphicon-pencil"></span></a>
                    <a href="{{ URL::to('kartubarang/delete/' . $item->itemid) }}" class="btn btn-danger"title="Hapus"><span class="glyphicon glyphicon-remove"></span></a>
                    @endif
                    <a href="{{ URL::to('kartubarang') }}" class="btn btn-default" title="Kembali ke Daftar"><span class="glyphicon glyphicon-list"></span></a>
                    <br><br>
                    <button class="btn btn-primary" title="Tambah" data-toggle="modal" data-target="#modalplus{{$item->itemid}}"><span class="glyphicon glyphicon-plus"></span>&nbsp;&nbsp;Tambah</button>
                    <button class="btn btn-danger" title="Keluar" data-toggle="modal" data-target="#modalminus{{$item->itemid}}"><span class="glyphicon glyphicon-minus"></span>&nbsp;&nbsp;Keluar</button>
                    <!-- Modal -->
                    <div class="modal fade" id="modalplus{{$item->itemid}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                    <h4 class="modal-title" id="myModalLabel">Tambah Stok</h4>
                                </div>
                                <div class="modal-body">
                                   <!-- isi table -->
                                    <form action="" method="post" class="form-horizontal">
                                    {!! csrf_field() !!}
                                        <div class="box-body">
                                            <div class="form-group">
                                                <div class="col-sm-7">
                                                    <input type="hidden" name="plusminus" class="form-control" value="1" required>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="inputEmail3" class="col-sm-4 control-label">Tanggal</label>
                                                <div class="col-sm-7">
                                                    <input id="lala1" type="text" name="date" class="form-control" required>
                                                </div>
                                                <script type="text/javascript">
                                                    $("#lala1").datepicker();
                                                </script>
                                            </div>
                                            <div class="form-group">
                                                <label for="inputEmail3" class="col-sm-4 control-label">Waktu</label>
                                                <div class="col-sm-7">
                                                    <input placeholder="HH:MM" type="text" name="time" class="form-control" pattern="([01]?[0-9]|2[0-3]):[0-5][0-9]" required>
                                                </div> 
                                            </div>
                                            <!-- <div class="form-group">
                                                <label for="inputEmail3" class="col-sm-4 control-label">Waktu</label>
                                                <div class="col-sm-7">
                                                    <input type="time" name="waktu" class="form-control" required>
                                                </div>
                                            </div> -->
                                            <div class="form-group">
                                                <label for="inputEmail3" class="col-sm-4 control-label">Jumlah</label>
                                                <div class="col-sm-7">
                                                    <input type="number" name="jumlah" class="form-control" placeholder="jumlah" required>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="inputEmail3" class="col-sm-4 control-label">Harga Baru</label>
                                                <div class="col-sm-7">
                                                    <input type="number" name="harga_baru" class="form-control" placeholder="harga baru" required>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-sm-7">
                                                    <input type="hidden" name="statusid" class="form-control" value="" required>
                                                </div>
                                            </div>
                                        </div><!-- /.box-body -->
                                        <div class="box-footer">
                                            <div class="col-sm-4">
                                            </div>
                                            <div class="col-sm-7">
                                                <button type="button" class="btn btn-default pull-right" data-dismiss="modal">Cancel</button>
                                                <button type="submit" class="btn btn-info pull-left">Submit</button>
                                            </div>
                                        </div><!-- /.box-footer -->
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal fade" id="modalminus{{$item->itemid}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                    <h4 class="modal-title" id="myModalLabel">Keluar Stok</h4>
                                </div>
                                <div class="modal-body">
                                   <!-- isi table -->
                                   <form action="" method="post" class="form-horizontal">
                                   {!! csrf_field() !!}
                                        <div class="box-body">
                                            <div class="form-group">
                                                <div class="col-sm-7">
                                                    <input type="hidden" name="plusminus" class="form-control" value="0" required>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="inputEmail3" class="col-sm-4 control-label">Tanggal</label>
                                                <div class="col-sm-7">
                                                    <input id="lala2" type="text" name="date" class="form-control" required>
                                                </div>
                                                <script type="text/javascript">
                                                    $("#lala2").datepicker();
                                                </script>
                                            </div>
                                            <div class="form-group">
                                                <label for="inputEmail3" class="col-sm-4 control-label">Waktu</label>
                                                <div class="col-sm-7">
                                                    <input placeholder="HH:MM" type="text" name="time" class="form-control" pattern="([01]?[0-9]|2[0-3]):[0-5][0-9]" required>
                                                </div> 
                                            </div>
                                            {!! csrf_field() !!}
                                            <div class="form-group">
                                                <label for="inputEmail3" class="col-sm-4 control-label">Jumlah</label>
                                                <div class="col-sm-7">
                                                    <input type="number" name="jumlah" class="form-control" placeholder="jumlah" id="jumlahan" max="{{$item->stock}}" required>
                                                    <input type="hidden" id="stock" value="{{ $item->stock }}">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="inputEmail3" class="col-sm-4 control-label">Keterangan</label>
                                                <div class="col-sm-7">
                                                    <select name = "statusid">
                                                    <option></option>
                                                        @foreach ($status as $key)
                                                            @if($key->statusid > 0)
                                                                <option class="form-control" value="{{ $key->statusid }}">{{ $key->desc }}</option>
                                                            @endif
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div><!-- /.box-body -->
                                        <div class="box-footer">
                                            <div class="col-sm-4">
                                            </div>
                                            <div class="col-sm-7">
                                                <button type="button" class="btn btn-default pull-right" data-dismiss="modal">Cancel</button>

                                                <button type='submit' class='btn btn-info pull-left'>Submit</button>

                                            </div>
                                        </div><!-- /.box-footer -->
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <br><br>
                    @if ($item != null)
                    <table class="table table-striped table-hover table-bordered">
                        <tbody>
                            <tr>
                                <th>Nama</th>
                                <td>{{ $item->name }}</td>
                            </tr>
                            <tr>
                                <th>Spek</th>
                                <td>{{ $item->spec }}</td>
                            </tr>
                            <tr>
                                <th>Nomor Part</th>
                                <td>{{ $item->no_part }}</td>
                            </tr>
                            <tr>
                                <th class="col-md-3">Lokasi Rak</th>
                                <td>{{ $item->rack->code }}</td>
                            </tr>
                            <tr>
                                <th>Harga (IDR)</th>
                                <td>{{ $item->price }}</td>
                            </tr>
                            <tr>
                                <th>Stok</th>
                                <td>{{ $item->stock }}</td>
                            </tr>
                            <tr>
                                <th>Satuan</th>
                                <td>{{ $item->pieces }}</td>
                            </tr>
                        </tbody>
                    </table>
                    @endif
                </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="content">
    <div class="row">
    </div>
    <br>
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">List Transaction</h3>
                </div>
                <div class="box-body">
                    <table class="table table-striped table-hover table-bordered" id="table-department">
                        <thead>
                            <tr>
                                <th class="col-md-1">No.</th>
                                <th>Waktu</th>
                                <th>Masuk</th>
                                <th>Keluar</th>
                                <th>Keterangan</th>
                                <th class="col-md-1 text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php $i = 1; ?>
                        @foreach ($transactions as $transaction)
                            <tr>
                                <td class="text-center">{{ $i++ }}</td>
                                <td class="text-center">{{ $transaction->time}}</td>
                                <td class="text-center">
                                @if($transaction->inout == '1')
                                    {{ $transaction->tmp_stock }}
                                @endif
                                </td>
                                <td class="text-center">
                                @if($transaction->inout == '0')
                                    {{ $transaction->tmp_stock }}
                                @endif
                                </td>
                                <td class="text-center">
                                @if($transaction->desc == NULL)
                                <p>-</p>
                                @else
                                {{ $transaction->desc }}
                                @endif
                                </td>
                                <td class="text-center">
                                    <button type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#modal{{$i}}"><span class="glyphicon glyphicon-remove"></span></button>
                                    <!-- Modal -->
                                    <div class="modal fade" id="modal{{$i}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                                    <h4 class="modal-title" id="myModalLabel">Hapus Transaction?</h4>
                                                </div>
                                                <div class="modal-body">
                                                    Apakah anda yakin menghapus ? <br><br><br> klik "Ok!!" untuk konfirmasi
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                                                <a href="{{ URL::to('kartubarang/delTransaction/' . $transaction->transactionid) }}">
                                                    <button type="button" class="btn btn-primary">Ok!!</button>
                                                </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>

<script department="text/javascript">
    $(document).ready(function(){
        $(function() {
            $('#table-department').dataTable();
            $('#flash-overlay-modal').modal();
        });
    });
</script>

{{--<script>--}}
{{--function submitbtn() {--}}
    {{--var x = document.getElementById("jumlahan").value;--}}
    {{--var y = document.getElementById("stock").value;--}}
    {{--if(y >= x){--}}
        {{--document.getElementById("btn").innerHTML = "" ;--}}
    {{--}else{--}}
        {{--document.getElementById("btn").innerHTML = "";--}}
    {{--}--}}
{{--}--}}
{{--</script>--}}

@stop