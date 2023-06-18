@extends('layouts.app')
@push('css')
    
@endpush
@section('content')
<section class="content">
   <div class="row">
    <div class="col-md-12">
        <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title"><i class="fa fa-clipboard"></i> Edit Data</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form class="form-horizontal" action="/admin/transaksi/sptjb/edit/{{$data->id}}" method="post">
                @csrf
              <div class="box-body">
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Kode SKPD</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" value="{{$data->kode_skpd}}" name="kode_skpd">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">SKPD</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" value="{{$data->skpd}}" name="skpd">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Kode program</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" value="{{$data->kode_program}}" name="kode_program">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">program</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" value="{{$data->program}}" name="program">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Kode kegiatan</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" value="{{$data->kode_kegiatan}}" name="kode_kegiatan">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">kegiatan</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" value="{{$data->kegiatan}}" name="kegiatan">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">No DPA</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" value="{{$data->no_dpa}}" name="no_dpa">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Tanggal</label>
                  <div class="col-sm-10">
                    <input type="date" class="form-control" value="{{$data->tanggal}}" name="tanggal">
                  </div>
                </div>
                
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Kode Sub Kegiatan</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" value="{{$data->kode_subkegiatan}}" name="kode_subkegiatan">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Sub Kegiatan</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" value="{{$data->subkegiatan}}" name="subkegiatan">
                  </div>
                </div>
                
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label"></label>
                  <div class="col-sm-10">
                    <button type="submit" class="btn btn-primary btn-flat btn-block"><i class="fa fa-send"></i> Simpan</button>
                    
                  </div>
                </div>
              </div>
            </form>
          </div>
    </div>
   </div>
    
</section>


@endsection
@push('js')

@endpush

