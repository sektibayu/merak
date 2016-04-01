@extends('layouts.general')
@section('content')
@include('partials.flash-overlay-modal')
<section class="content-header">
    <h1>Transaksi</h1>
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
                                <th class="col-md-1">TANGGAL</th>
                                <th>NOMOR BARANG</th>
                                <th>NAMA</th>
                                <th>SPEK</th>
                                <th>JUMLAH</th>
                                <th>UM</th>
                                <th>KETERANGAN</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach ($items as $item)
                            <tr>
                                <td class="text-center">{{ $item->time }}</td>
                                <td class="text-center">{{ $item->no_part }}</td>
                                <td class="text-center">{{ $item->name }}</td>
                                <td class="text-center">{{ $item->spec }}</td>
                                <td class="text-center">{{ $item->stock }}</td>
                                <td class="text-center">{{ $item->pieces }}</td>
                                <td class="text-center">{{ $item->desc }}</td>
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
@stop