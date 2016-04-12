@extends('layouts.general')
@section('content')
@include('partials.flash-overlay-modal')
<section class="content-header">
    <h1>Item</h1>
</section>
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Detail Item</h3>
                </div>
                <div class="box-body">
                    <div class="col-md-12">
                    @if ($item != null)
                    <a href="{{ URL::to('item/update/' . $item->itemid) }}" class="btn btn-primary" title="Sunting"><span class="glyphicon glyphicon-pencil"></span></a>
                    <a href="{{ URL::to('item/delete/' . $item->itemid) }}" class="btn btn-danger"title="Hapus"><span class="glyphicon glyphicon-remove"></span></a>
                    @endif
                    <a href="{{ URL::to('item') }}" class="btn btn-default" title="Kembali ke Daftar"><span class="glyphicon glyphicon-list"></span></a>
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

@stop