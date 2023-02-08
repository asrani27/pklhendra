@extends('layouts.app')
@push('css')
    
@endpush
@section('content')
<section class="content">
    <div class="row">
        <div class="col-xs-12">
          @include('admin.transaksi.menu')
          <br/>
          <br/>
          <div class="box box-primary">
            <div class="box-header">
              <h3 class="box-title"><i class="fa fa-clipboard"></i> DETAIL SPJ</h3>
    
              <div class="box-tools">
                <a href="/admin/transaksi/spj/adduraian/{{$data->id}}" class="btn btn-sm btn-primary btn-flat"><i class="fa fa-plus-circle"></i> Uraian</a>
                <a href="/admin/transaksi/spj/print/{{$id}}" class="btn btn-sm btn-danger btn-flat" target="_blank"><i class="fa fa-file"></i> PRINT</a>
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
                <tr style="font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif; font-size:6px;background-color:silver">
                
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
                  <th class="text-center">12=(10+11)</th>
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
                    <td style="text-align: right">
                      <a href="#" class="isiangka" data-id="{{$item->id}}" data-angka="{{$item->ja}}" data-kolom="3">{{number_format($item->ja)}}</a>
                    </td>
                    <td style="text-align: right">
                      <a href="#" class="isiangka" data-id="{{$item->id}}" data-angka="{{$item->ls_gaji1}}" data-kolom="4">{{number_format($item->ls_gaji1)}}</a>
                    </td>
                    <td style="text-align: right">
                      <a href="#" class="isiangka" data-id="{{$item->id}}" data-angka="{{$item->ls_gaji2}}" data-kolom="5">{{number_format($item->ls_gaji2)}}</a>
                      
                    </td>
                    <td style="text-align: right">
                      {{number_format($item->ls_gaji1 + $item->ls_gaji2)}}
                      
                    </td>
                    <td style="text-align: right">
                      <a href="#" class="isiangka" data-id="{{$item->id}}" data-angka="{{$item->ls_bj1}}" data-kolom="7">{{number_format($item->ls_bj1)}}</a>
                      
                    </td>
                    <td style="text-align: right">
                      <a href="#" class="isiangka" data-id="{{$item->id}}" data-angka="{{$item->ls_bj2}}" data-kolom="8">{{number_format($item->ls_bj2)}}</a>
                      
                    </td>
                    <td style="text-align: right">
                      {{number_format($item->ls_bj1 + $item->ls_bj2)}}
                    </td>
                    <td style="text-align: right">
                      <a href="#" class="isiangka" data-id="{{$item->id}}" data-angka="{{$item->gu1}}" data-kolom="10">{{number_format($item->gu1)}}</a>
                    
                    </td>
                    <td style="text-align: right">
                      <a href="#" class="isiangka" data-id="{{$item->id}}" data-angka="{{$item->gu2}}" data-kolom="11">{{number_format($item->gu2)}}</a>
                     
                    </td>
                    <td style="text-align: right">
                      {{number_format($item->gu1 + $item->gu2)}}
                    
                    </td>
                    <td style="text-align: right">
                      {{number_format($item->jumlah)}}
                    </td>
                    <td style="text-align: right">
                      {{number_format($item->sisa)}}
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
                <tr style="font-size: 10px">
                  <td></td>
                  <td>JUMLAH</td>
                  <td style="text-align: right">{{number_format($detail->sum('ja'))}}</td>
                  <td style="text-align: right">{{number_format($detail->sum('ls_gaji1'))}}</td>
                  <td style="text-align: right">{{number_format($detail->sum('ls_gaji2'))}}</td>
                  <td style="text-align: right">{{number_format($detail->sum('ls_gaji3'))}}</td>
                  <td style="text-align: right">{{number_format($detail->sum('ls_bj1'))}}</td>
                  <td style="text-align: right">{{number_format($detail->sum('ls_bj2'))}}</td>
                  <td style="text-align: right">{{number_format($detail->sum('ls_bj3'))}}</td>
                  <td style="text-align: right">{{number_format($detail->sum('gu1'))}}</td>
                  <td style="text-align: right">{{number_format($detail->sum('gu2'))}}</td>
                  <td style="text-align: right">{{number_format($detail->sum('gu3'))}}</td>
                  <td style="text-align: right">{{number_format($detail->sum('jumlah'))}}</td>
                  <td style="text-align: right">{{number_format($detail->sum('sisa'))}}</td>
                </tr>
                <tr style="font-size: 10px">
                  <td></td>
                  <td>PENERIMAAN</td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                </tr>
                <tr style="font-size: 10px">
                  <td></td>
                  <td>&nbsp;&nbsp;&nbsp;- SP2D</td>
                  <td></td>
                  <td style="text-align: right">{{$sp2d->ls_gaji1}}</td>
                  <td style="text-align: right">{{$sp2d->ls_gaji2}}</td>
                  <td style="text-align: right">{{$sp2d->ls_gaji3}}</td>
                  <td style="text-align: right">{{$sp2d->ls_bj1}}</td>
                  <td style="text-align: right">{{$sp2d->ls_bj2}}</td>
                  <td style="text-align: right">{{$sp2d->ls_bj3}}</td>
                  <td style="text-align: right">{{$sp2d->gu1}}</td>
                  <td style="text-align: right">{{$sp2d->gu2}}</td>
                  <td style="text-align: right">{{$sp2d->gu3}}</td>
                  <td style="text-align: right">{{$sp2d->jumlah}}</td>
                  <td style="text-align: right"></td>
                </tr>
                <tr style="font-size: 10px">
                  <td></td>
                  <td>&nbsp;&nbsp;&nbsp;- Potongan Pajak</td>
                  <td></td>
                  <td style="text-align: right">{{$pp->ls_gaji1}}</td>
                  <td style="text-align: right">{{$pp->ls_gaji2}}</td>
                  <td style="text-align: right">{{$pp->ls_gaji3}}</td>
                  <td style="text-align: right">{{$pp->ls_bj1}}</td>
                  <td style="text-align: right">{{$pp->ls_bj2}}</td>
                  <td style="text-align: right">{{$pp->ls_bj3}}</td>
                  <td style="text-align: right">{{$pp->gu1}}</td>
                  <td style="text-align: right">{{$pp->gu2}}</td>
                  <td style="text-align: right">{{$pp->gu3}}</td>
                  <td style="text-align: right">{{$pp->jumlah}}</td>
                  <td style="text-align: right"></td>
                </tr>
                <tr style="font-size: 10px">
                  <td></td>
                  <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;a. PPN</td>
                  <td></td>
                  <td style="text-align: right">{{$ppn->ls_gaji1}}</td>
                  <td style="text-align: right">{{$ppn->ls_gaji2}}</td>
                  <td style="text-align: right">{{$ppn->ls_gaji3}}</td>
                  <td style="text-align: right">{{$ppn->ls_bj1}}</td>
                  <td style="text-align: right">{{$ppn->ls_bj2}}</td>
                  <td style="text-align: right">{{$ppn->ls_bj3}}</td>
                  <td style="text-align: right">{{$ppn->gu1}}</td>
                  <td style="text-align: right">{{$ppn->gu2}}</td>
                  <td style="text-align: right">{{$ppn->gu3}}</td>
                  <td style="text-align: right">{{$ppn->jumlah}}</td>
                  <td style="text-align: right"></td>
                </tr>
                <tr style="font-size: 10px">
                  <td></td>
                  <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;b. PPh - 21</td>
                  <td></td>
                  <td style="text-align: right">{{$pph21->ls_gaji1}}</td>
                  <td style="text-align: right">{{$pph21->ls_gaji2}}</td>
                  <td style="text-align: right">{{$pph21->ls_gaji3}}</td>
                  <td style="text-align: right">{{$pph21->ls_bj1}}</td>
                  <td style="text-align: right">{{$pph21->ls_bj2}}</td>
                  <td style="text-align: right">{{$pph21->ls_bj3}}</td>
                  <td style="text-align: right">{{$pph21->gu1}}</td>
                  <td style="text-align: right">{{$pph21->gu2}}</td>
                  <td style="text-align: right">{{$pph21->gu3}}</td>
                  <td style="text-align: right">{{$pph21->jumlah}}</td>
                  <td style="text-align: right"></td>
                </tr>
                <tr style="font-size: 10px">
                  <td></td>
                  <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;c. PPh - 22</td>
                  <td></td>
                  <td style="text-align: right">{{$pph22->ls_gaji1}}</td>
                  <td style="text-align: right">{{$pph22->ls_gaji2}}</td>
                  <td style="text-align: right">{{$pph22->ls_gaji3}}</td>
                  <td style="text-align: right">{{$pph22->ls_bj1}}</td>
                  <td style="text-align: right">{{$pph22->ls_bj2}}</td>
                  <td style="text-align: right">{{$pph22->ls_bj3}}</td>
                  <td style="text-align: right">{{$pph22->gu1}}</td>
                  <td style="text-align: right">{{$pph22->gu2}}</td>
                  <td style="text-align: right">{{$pph22->gu3}}</td>
                  <td style="text-align: right">{{$pph22->jumlah}}</td>
                  <td style="text-align: right"></td>
                </tr>
                <tr style="font-size: 10px">
                  <td></td>
                  <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;d. PPh - 23</td>
                  <td></td>
                  <td style="text-align: right">{{$pph23->ls_gaji1}}</td>
                  <td style="text-align: right">{{$pph23->ls_gaji2}}</td>
                  <td style="text-align: right">{{$pph23->ls_gaji3}}</td>
                  <td style="text-align: right">{{$pph23->ls_bj1}}</td>
                  <td style="text-align: right">{{$pph23->ls_bj2}}</td>
                  <td style="text-align: right">{{$pph23->ls_bj3}}</td>
                  <td style="text-align: right">{{$pph23->gu1}}</td>
                  <td style="text-align: right">{{$pph23->gu2}}</td>
                  <td style="text-align: right">{{$pph23->gu3}}</td>
                  <td style="text-align: right">{{$pph23->jumlah}}</td>
                  <td style="text-align: right"></td>
                </tr>
                <tr style="font-size: 10px">
                  <td></td>
                  <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;d. PPh Pasal 4 Ayat 2</td>
                  <td></td>
                  <td style="text-align: right">{{$pph4->ls_gaji1}}</td>
                  <td style="text-align: right">{{$pph4->ls_gaji2}}</td>
                  <td style="text-align: right">{{$pph4->ls_gaji3}}</td>
                  <td style="text-align: right">{{$pph4->ls_bj1}}</td>
                  <td style="text-align: right">{{$pph4->ls_bj2}}</td>
                  <td style="text-align: right">{{$pph4->ls_bj3}}</td>
                  <td style="text-align: right">{{$pph4->gu1}}</td>
                  <td style="text-align: right">{{$pph4->gu2}}</td>
                  <td style="text-align: right">{{$pph4->gu3}}</td>
                  <td style="text-align: right">{{$pph4->jumlah}}</td>
                  <td style="text-align: right"></td>
                </tr>
                <tr style="font-size: 10px">
                  <td></td>
                  <td>&nbsp;&nbsp;&nbsp;- Lain-lain</td>
                  <td></td>
                  <td style="text-align: right">{{$lain->ls_gaji1}}</td>
                  <td style="text-align: right">{{$lain->ls_gaji2}}</td>
                  <td style="text-align: right">{{$lain->ls_gaji3}}</td>
                  <td style="text-align: right">{{$lain->ls_bj1}}</td>
                  <td style="text-align: right">{{$lain->ls_bj2}}</td>
                  <td style="text-align: right">{{$lain->ls_bj3}}</td>
                  <td style="text-align: right">{{$lain->gu1}}</td>
                  <td style="text-align: right">{{$lain->gu2}}</td>
                  <td style="text-align: right">{{$lain->gu3}}</td>
                  <td style="text-align: right">{{$lain->jumlah}}</td>
                  <td style="text-align: right"></td>
                </tr>
                <tr style="font-size: 10px">
                  <td></td>
                  <td>JUMLAH PENERIMAAN</td>
                  <td></td>
                  <td style="text-align: right">{{$penerimaan->sum('ls_gaji1')}}</td>
                  <td style="text-align: right">{{$penerimaan->sum('ls_gaji2')}}</td>
                  <td style="text-align: right">{{$penerimaan->sum('ls_gaji3')}}</td>
                  <td style="text-align: right">{{$penerimaan->sum('ls_bj1')}}</td>
                  <td style="text-align: right">{{$penerimaan->sum('ls_bj2')}}</td>
                  <td style="text-align: right">{{$penerimaan->sum('ls_bj3')}}</td>
                  <td style="text-align: right">{{$penerimaan->sum('gu1')}}</td>
                  <td style="text-align: right">{{$penerimaan->sum('gu2')}}</td>
                  <td style="text-align: right">{{$penerimaan->sum('gu3')}}</td>
                  <td style="text-align: right">{{$penerimaan->sum('jumlah')}}</td>
                  <td style="text-align: right"></td>
                </tr>
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
          <form method="post" action="/admin/transaksi/spj/detail/simpan/angka">
          <div class="modal-body">
              @csrf
              
              <div class="form-group">
                  <label>Angka</label>
                  <input type="text" id="angka" class="form-control" name="angka">
                  <input type="hidden" id="kolom" class="form-control" name="kolom">
                  <input type="hidden" id="detail_id" class="form-control" name="detail_id" readonly>
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
  $('#kolom').val($(this).data('kolom'));
  $("#modal-editangka").modal();
});
</script>
@endpush

