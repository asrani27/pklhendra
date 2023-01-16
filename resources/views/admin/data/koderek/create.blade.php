@extends('layouts.app')
@push('css')
    
@endpush
@section('content')
<section class="content">
   <div class="row">
    <div class="col-md-12">
        <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title"><i class="fa fa-clipboard"></i> Tambah Kode Rekening</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form class="form-horizontal" action="/admin/data/koderek/add" method="post">
                @csrf
              <div class="box-body">
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Koderek</label>
                  <div class="col-sm-1">
                    <input type="text" name="kode1" class="form-control">
                  </div>
                  <div class="col-sm-1">
                    <input type="text" name="kode2" class="form-control">
                  </div>
                  <div class="col-sm-1">
                    <input type="text" name="kode3" class="form-control">
                  </div>
                  <div class="col-sm-1">
                    <input type="text" name="kode4" class="form-control">
                  </div>
                  <div class="col-sm-1">
                    <input type="text" name="kode5" class="form-control">
                  </div>
                  <div class="col-sm-1">
                    <input type="text" name="kode6" class="form-control">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Nama Uraian</label>
                  <div class="col-sm-10">
                    <input type="text" name="uraian" class="form-control" required>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label"></label>
                  <div class="col-sm-10">
                    <button type="submit" class="btn btn-primary btn-flat btn-block"><i class="fa fa-send"></i> Simpan</button>
                    <a href="/admin/data/koderek" class="btn bg-gray btn-flat btn-block"><i class="fa fa-arrow-left"></i> Kembali</a>
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

