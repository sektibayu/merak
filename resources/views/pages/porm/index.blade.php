@extends('layouts.general')
@section('content')
    @include('partials.flash-overlay-modal')
    <section class="content-header">
        <h1 align='center'>Statistik Nomor Surat Tak Terpakai E-Surat ITS per Unit</h1>
    </section>

    <section class="content">
        <script>
            $(document).ready(function(){
                var month = {{$bulan}}
                var year = {{$tahun}}
                var d = new Date();

                if (month == 01){
                    $("#labelbln").html("Januari");
                }
                else if (month == 02){
                    $("#labelbln").html("Pebruari");
                }
                else if (month == 03){
                    $("#labelbln").html("Maret");
                }
                else if (month == 04){
                    $("#labelbln").html("April");
                }
                else if (month == 05){
                    $("#labelbln").html("Mei");
                }
                else if (month == 06){
                    $("#labelbln").html("Juni");
                }
                else if (month == 07){
                    $("#labelbln").html("Juli");
                }
                else if (month == 08){
                    $("#labelbln").html('Agustus');
                }
                else if (month == 09){
                    $("#labelbln").html("September");
                }
                else if (month == 10){
                    $("#labelbln").html("Oktober");
                }
                else if (month == 11){
                    $("#labelbln").html("Nopember");
                }
                else {
                    $("#labelbln").html("Desember");
                }
                $('#labelth').html(year);
            });

            $(document).ready(function(){
                $("#pilih").click(function(){
                    var month = $('#selectbln').val()-1;
                    var monthlist = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'Nopember', 'Desember'];
                    $("#labelbln").html(monthlist.slice(month, month+1));
                    $('#labelth').html($('#selectth').val());
                    //alert(month);
                    //$("p").hide();
                });

                $("#lala").change(function(){
                    if (  $("#lala").val() == 0 ) {
                        $("#tampilanbulan").show();
                        $("#tampilantahun").hide();
                    } else {
                        $("#tampilanbulan").hide();
                        $("#tampilantahun").show();
                    };

                });
            });
        </script>

        <div class="box-header with-border">
            <div class="row" id="tampilanbulan">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">
                            Statistik Surat Bulan <label id='labelbln'>labelbln</label> - <label id='labelth'>labelth</label></p></p>
                        </h3>
                    </div>
                    <div class="box-body">
                        <div class="row">
                            <div class="col-md-3">
                            </div>
                            <div class="col-md-9">
                                <form action="" method="get" role="form">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <select class="selecter form-control" id='selectbln' name='bulan' required>
                                                <option value='1'>Januari</option>
                                                <option value='2'>Februari</option>
                                                <option value='3'>Maret</option>
                                                <option value='4'>April</option>
                                                <option value='5'>Mei</option>
                                                <option value='6'>Juni</option>
                                                <option value='7'>Juli</option>
                                                <option value='8'>Agustus</option>
                                                <option value='9'>September</option>
                                                <option value='10'>Oktober</option>
                                                <option value='11'>Nopember</option>
                                                <option value='12'>Desember</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <select class="selecter form-control" id='selectth' name='tahun' required>
                                                <option value='2016'>2016</option>
                                                <option value='2015'>2015</option>
                                                <option value='2014'>2014</option>
                                                <option value='2013'>2013</option>
                                                <option value='2012'>2012</option>
                                                <option value='2011'>2011</option>
                                                <option value='2010'>2010</option>
                                            </select>
                                            <input type="hidden" name="action" value="1">
                                        </div>
                                    </div>
                                    {!! csrf_field() !!}
                                    <div class="col-md-3">
                                        <button class="btn btn-success" id='pilih'>Pilih</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 " style="overflow-x: scroll;">
                                <table class="table table-bordered">
                                    <tr>
                                        <th style="width: 10px">#</th>
                                        <th style="min-width: 250px;">Station</th>
                                        @foreach($list as $l)
                                            <th style="min-width: 100px; text-align: center;">{{+$l}}</th>
                                        @endforeach
                                    </tr>
                                    @foreach($items as $key => $value)
                                        @if($key != 0)
                                            <tr>
                                                <td>{{$key}}</td>
                                                <td>{{$indeks[$key]}}</td>
                                                @foreach($value as $val)
                                                    <td style="text-align: center;">{{$val}}</td>
                                                @endforeach
                                            </tr>
                                            @if($key == 13)
                                                <tr style="background-color: #66FF00;">
                                                    <td></td>
                                                    <td>Total</td>
                                                    @foreach($subtotal as $val)
                                                        <td style="text-align: center;">{{$val}}</td>
                                                    @endforeach
                                                </tr>
                                            @endif
                                            @if($key == 14)
                                                <tr style="background-color: #66FF00;">
                                                    <td></td>
                                                    <td>Grand Total</td>
                                                    @foreach($total as $val)
                                                        <td style="text-align: center;">{{$val}}</td>
                                                    @endforeach
                                                </tr>
                                            @endif
                                        @endif
                                    @endforeach
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>




        </div>


    </section>


@stop
@section('custom_foot')
    <script type="text/javascript">
    </script>
@stop