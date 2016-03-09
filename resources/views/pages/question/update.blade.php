

</td>@extends('layouts.general')
@section('content')
@include('partials.flash-overlay-modal')

<section class="content-header">
    <h1>Pertanyaan</h1>
</section>
<section class="content">
    <div class="row">
        <div class="col-md-7">
            <!-- Horizontal Form -->
            <div class="box box-info">
                <div class="box-header with-border">
                    <h3 class="box-title">Update Pertanyaan</h3>
                </div><!-- /.box-header -->
                <!-- form start -->
                <form action="" method="post" class="form-horizontal">
                    <div class="box-body">
                        <input type="hidden" name="enabled" value="1">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-4 control-label">Judul Pertanyaan</label>
                            <div class="col-sm-7">
                                <input type="text" name="title" class="form-control" placeholder="Judul Pertanyaan" value='{{ $old->title }}' required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-4 control-label">Isi Pertanyaan</label>
                            <div class="col-sm-7">
                              <textarea class="form-control wysih" rows="3" placeholder="Isi Pertanyaan..." name='content' >{{ $old->content }}</textarea>
                          </div>
                        </div>
                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-4 control-label">Teks Pembantu / Help Text</label>
                            <div class="col-sm-7">
                              <textarea class="form-control" rows="3" placeholder="Teks Pembantu" name='helptext'>{{ $old->helptext }}</textarea>
                          </div>
                        </div>
                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-4 control-label">Tipe Pertanyaan</label>
                            <div class="col-sm-7">
                              <select class="form-control" data-placeholder="Ditujukan Untuk..." name='role' style="width: 100%;">
                                @foreach ($types as $type)
                                  <option value='{{ $type['id'] }}' @if( $type['id'] == $old->type) {{'selected'}} @endif>
                                    {{ $type['value'] }}
                                  </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                      <div class="form-group">
                          <label for="inputEmail3" class="col-sm-4 control-label">Ditujukan Untuk</label>
                          <div class="col-sm-7">
                            <select class="form-control" data-placeholder="Select a State" style="width: 100%;">
                              @foreach ($roles as $role)
                                <option value='{{ $role['id'] }}'
                                  @if($role['id']==$old->role)
                                    {{"selected='selected'"}}
                                  @endif
                                >
                                  {{ $role['value']}}
                                </option>
                              @endforeach
                          </select>
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
        <div class="col-md-5">
            <!-- Horizontal Form -->
            <div class="box box-info">
                <div class="box-header with-border">
                    <h3 class="box-title">List Pertanyaan</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                    <table class="table table-striped table-hover table-bordere">
                        <tbody>
                            <tr>
                                <th class="text-center" style="width: 10px">#</th>
                                <th >Title </th>
                                <th class="col-md-1">Ditujukan Untuk </th>
                                <?php $i = 1;?>
                            </tr>
                            @foreach($items as $item)
                            <tr>
                                <td>{{$i++}}</td>
                                <td><a href="{{ URL::to('question/detail/' . $item->id) }}" title="">{{ $item->title }}</a></td>
                                <td><!--  TODO -->
                                @if($item->role==1)
                                  Semua Fungsionaris
                                @elseif($item->role==2)
                                  Pengurus Harian
                                @else
                                  Staff
                                @endif</td>
                                <td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div><!-- /.box-body -->
            </div><!-- /.box -->
        </div><!-- /.box -->
    </div>
</section>


@stop
@section('custom_foot')
    <script type="text/javascript">
        $(".select2").select2();
        $(".wysih").wysihtml5();
    </script>
@stop
