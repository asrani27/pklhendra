@extends('layouts.app')
@push('css')
    
@endpush
@section('content')
<section class="content">
    <div class="row">
        <div class="col-xs-12">
          <div class="box box-primary">
            <div class="box-header">
              <h3 class="box-title"><i class="fa fa-clipboard"></i> Detail SPJ</h3>
    
              <div class="box-tools">
                <a href="/admin/transaksi/spj/adduraian/{{$data->id}}" class="btn btn-sm btn-primary btn-flat"><i class="fa fa-plus-circle"></i> Uraian</a>
                <a href="/admin/transaksi/spj" class="btn btn-sm btn-danger btn-flat"><i class="fa fa-arrow-left"></i> Kembali</a>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
              <table class="table table-hover table-bordered">
                <tbody>
                <tr style="font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif; font-size:10px; background-color:silver">
                  <th class="text-center" rowspan=2 style="vertical-align: middle">Kode Rekening</th>
                  <th class="text-center" rowspan=2 style="vertical-align: middle">uraian</th>
                  <th class="text-center" rowspan=2 style="vertical-align: middle">Jumlah Anggaran</th>
                  <th class="text-center" colspan=3>SPJ - LS GAJI</th>
                  <th class="text-center" colspan=3>SPJ - LS BARANG DAN JASA</th>
                  <th class="text-center" colspan=3>SPJ - UP/GU/TU</th>
                  <th class="text-center" rowspan=2>Jumlah SPJ <br/>(LS+UP/GU/TU) <br/>s.d. Bln ini</th>
                  <th class="text-center" rowspan=2>Sisa Pagu <br/>Anggaran</th>
                </tr>
                <tr style="font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif; font-size:8px;background-color:silver">
                
                  <th class="text-center">s.d. Bln Lalu</th>
                  <th class="text-center">Bulan ini</th>
                  <th class="text-center">s.d. Bln ini</th>
                  <th class="text-center">s.d. Bln Lalu</th>
                  <th class="text-center">Bulan ini</th>
                  <th class="text-center">s.d. Bln ini</th>
                  <th class="text-center">s.d. Bln Lalu</th>
                  <th class="text-center">Bulan ini</th>
                  <th class="text-center">s.d. Bln ini</th>
                </tr>
                <tr style="font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif; font-size:8px;background-color:silver">
                
                  <th class="text-center">1</th>
                  <th class="text-center">2</th>
                  <th class="text-center">3</th>
                  <th class="text-center">4</th>
                  <th class="text-center">5</th>
                  <th class="text-center">6 = (4+5)</th>
                  <th class="text-center">7</th>
                  <th class="text-center">8</th>
                  <th class="text-center">9 = (7+8)</th>
                  <th class="text-center">10</th>
                  <th class="text-center">11</th>
                  <th class="text-center">12 = (10+11)</th>
                  <th class="text-center">13 = (6+9+12)</th>
                  <th class="text-center">14 = (3-13)</th>
                </tr>
                @foreach ($data->detail as $key => $item)
                <tr style="font-size: 10px">
                    <td>{{koderekening($item->koderek->kode1,$item->koderek->kode2,$item->koderek->kode3,$item->koderek->kode4,$item->koderek->kode5,$item->koderek->kode6)}} 
                      <a href="/admin/transaksi/spj/detail/delete/{{$item->id}}"
                        onclick="return confirm('Yakin ingin di hapus');"
                        class="btn btn-xs btn-flat"><i class="fa fa-trash"></i></a>
                      </td>
                    <td>{{$item->koderek->uraian}}</td>
                    <td>
                      <a href="#" class="isiangka" data-id="{{$item->id}}" data-angka="{{$item->ja}}">{{$item->ja}}</a>
                    </td>
                    <td>
                      {{$item->ls_gaji1}}
                    </td>
                    <td>
                      {{$item->ls_gaji2}}
                    </td>
                    <td>
                      {{$item->ls_gaji3}}
                    </td>
                    <td>
                      {{$item->ls_bj1}}
                    </td>
                    <td>
                      {{$item->ls_bj2}}
                    </td>
                    <td>
                      {{$item->ls_bj3}}
                    </td>
                    <td>
                      {{$item->gu1}}
                    </td>
                    <td>
                      {{$item->gu2}}
                    </td>
                    <td>
                      {{$item->gu3}}
                    </td>
                    <td>
                      {{$item->jumlah}}
                    </td>
                    <td>
                      {{$item->sisa}}
                    </td>
                    {{-- <td>
                      <a href="/admin/transaksi/spj/detail/{{$item->id}}" class="btn btn-xs btn-flat  btn-success">detail</a>
                        <a href="/admin/transaksi/spj/edit/{{$item->id}}" class="btn btn-xs btn-flat  btn-success"><i class="fa fa-edit"></i></a>
                        <a href="/admin/transaksi/spj/delete/{{$item->id}}"
                            onclick="return confirm('Yakin ingin di hapus');"
                            class="btn btn-xs btn-flat  btn-danger"><i class="fa fa-trash"></i></a>
                    </td> --}}
                </tr>
                @endforeach
                
              </tbody></table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
    </div>

    <div class="modal fade" id="modal-editangka">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header bg-purple">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title"><i class="ion ion-clipboard"></i> Angka</h4>
          </div>
          <form method="post" action="/bidang/realisasifisik">
          <div class="modal-body">
              @csrf
              
              <div class="form-group">
                  <label>Angka</label>
                  <input type="text" id="angka" class="form-control" name="angka" readonly>
                  <input type="text" id="detail_id" class="form-control" name="idd" readonly>
              </div>
              
          </div>
          <div class="modal-footer">
            <button type="button" class="btn bg-grey pull-left" data-dismiss="modal"><i class="fa fa-sign-out"></i> Close</button>
            <button type="submit" class="btn bg-purple"><i class="fa fa-save"></i> Simpan</button>
          </div>
          </form>
        </div>
        <!-- /.modal-content -->
      </div>
      <!-- /.modal-dialog -->
    </div>
</section>


@endsection
@push('js')

<script>
  $(document).on('click', '.isiangka', function() {
  $('#detail_id').val($(this).data('id'));
  $('#angka').val($(this).data('angka'));
  $("#modal-editangka").modal();
});
</script>
@endpush

