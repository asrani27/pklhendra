@extends('layouts.app')
@push('css')
    
@endpush
@section('content')
<section class="content">
   <div class="row">
    <div class="col-md-12">
        <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title"><i class="fa fa-clipboard"></i> Tambah Rekening</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form class="form-horizontal" action="/staf/transaksi/bku/addrekening/{{$id}}" method="post">
                @csrf
              <div class="box-body">
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Tanggal</label>
                  <div class="col-sm-10">
                    <input type="date" name="tanggal" class="form-control" disabled>
                  </div>  
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Kode Rekening</label>
                  <div class="col-sm-10">
                    <select name="m_koderek_id" class="form-control" required>
                      <option value="">-pilih-</option>
                      @foreach ($data as $item)
                      <option value="{{$item->id}}">{{koderekening($item->kode1,$item->kode2,$item->kode3,$item->kode4,$item->kode5,$item->kode6)}} - {{$item->uraian}}</option>
                      @endforeach
                    </select>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label"></label>
                  <div class="col-sm-10">
                    <button type="submit" class="btn btn-primary btn-flat btn-block"><i class="fa fa-send"></i> Simpan</button>
                    <a href="/staf/transaksi/detail/{{$id}}/bku" class="btn bg-gray btn-flat btn-block"><i class="fa fa-arrow-left"></i> Kembali</a>
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

