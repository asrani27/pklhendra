@extends('layouts.app')
@push('css')
    
@endpush
@section('content')
<section class="content">
    <div class="row">
        <div class="col-xs-12">
          @include('staf.transaksi.menu')
          <br/>
          <br/>
          <div class="box box-primary">
            <div class="box-header">
              <h3 class="box-title"><i class="fa fa-clipboard"></i> TANDA TERIMA</h3>
    
              <div class="box-tools">
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
              <table class="table table-hover table-condensed table-bordered">
                <tbody>
                <tr style="font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif; font-size:10px; background-color:silver">
                  <th class="text-center">No</th>
                  <th class="text-center" style="vertical-align: middle">Tanggal</th>
                  <th class="text-center" style="vertical-align: middle">Rekening</th>
                  <th class="text-center" style="vertical-align: middle">Bukti</th>
                  <th class="text-center" style="vertical-align: middle">Uraian</th>
                  <th class="text-center">Penerimaan</th>
                  <th class="text-center">Pengeluaran</th>
                  <th class="text-center">Nama Penerima / Nama Bank</th>
                  <th class="text-center">ID Billing</th>
                  <th class="text-center">NTPN</th>
                  <th class="text-center">Keterangan</th>
                  <th class="text-center"></th>
                </tr>
                @foreach ($rekening as $item2)
                <tr  style="font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif; font-size:10px;">
                    <td></td>
                    <td>{{\Carbon\Carbon::parse($item2->rekening->tanggal)->translatedFormat('d F Y')}}</td>
                    <td>{{koderekening($item2->rekening->koderek->kode1,$item2->rekening->koderek->kode2,$item2->rekening->koderek->kode3,$item2->rekening->koderek->kode4,$item2->rekening->koderek->kode5,$item2->rekening->koderek->kode6)}}</td>
                    <td>{{$item2->nomor}}/BPK/2.16.2.20.2.21.02.0000/2023</td>
                    <td>{{$item2->uraian}}</td>
                    <td>{{number_format($item2->penerimaan)}}</td>
                    <td>{{number_format($item2->pengeluaran)}}</td>
                    <td>{{$item2->penerima}}</td>
                    <td>
                      {{$item2->id_billing}}
                      <a href="#"
                      class="btn btn-xs btn-flat edit-billing" data-bku_rekening_detail_id="{{$item2->id}}" data-billing="{{$item2->id_billing}}"><i class="fa fa-edit"></i></a>
                    </td>
                    <td>{{$item2->ntpn}}</td>
                    <td>{{$item2->keterangan}}</td>
                    <td>
                      @if ($item2->pajak == 0)
                        <a href="/staf/transaksi/detail/{{$item2->id}}/tt/print" class="btn btn-sm btn-danger btn-flat" target="_blank"><i class="fa fa-file"></i> PRINT</a>
                      @else
                          
                      @endif
                      </td>
                </tr>
                @endforeach
                {{-- @foreach ($rekening as $item)
                    <tr  style="font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif; font-size:10px;">
                      <td rowspan="{{$item->detailRekening->count() + 1}}"  class="text-center">
                        
                      </td>
                      <td class="text-center" rowspan="{{$item->detailRekening->count() + 1}}">
                        @if ($item->tanggal == null)
                            
                        @else
                        {{\Carbon\Carbon::parse($item->tanggal)->format('d-m-Y')}}
                        @endif
                      </td>
                      
                      <td class="text-center" rowspan="{{$item->detailRekening->count() + 1}}">{{koderekening($item->koderek->kode1,$item->koderek->kode2,$item->koderek->kode3,$item->koderek->kode4,$item->koderek->kode5,$item->koderek->kode6)}}
                      <br/>
        
                      </td>
                      @foreach ($item->detailrekening as $item2)
                      <tr style="font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif; font-size:10px;">
                        
                        <td >
                            Nomor BKU
                          </td>
                        <td >
                          {{$item2->uraian}}
                        </td>
                        <td style="text-align: right">
                          {{number_format($item2->penerimaan)}}
                        </td>
                        <td style="text-align: right">
                          {{number_format($item2->pengeluaran)}}
                        </td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                      </tr>
                      @endforeach
                    </tr>
                @endforeach
                 --}}
              </tbody>
              {{-- <tfoot>
                <tr style="font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif; font-size:10px; background-color:silver;">
                  <td></td>
                  <td></td>
                  <td></td>
                  <td>Total Bulan Ini</td>
                  <td style="text-align: right">{{number_format($total->sum('penerimaan'))}}</td>
                  <td style="text-align: right">{{number_format($total->sum('pengeluaran'))}}</td>
                </tr>
              </tfoot> --}}
            </table>
            </div>
            <!-- /.box-body -->
          </div>
          <br/>
          
        </div>
    </div>

    <div class="modal fade" id="modal-edit">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header bg-purple">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title"><i class="ion ion-clipboard"></i> ID Billing</h4>
          </div>
          <form method="post" action="/staf/billing">
          <div class="modal-body">
              @csrf
              
              <div class="form-group">
                  <label>ID Billing</label>
                  <input type="text" id="id_billing" class="form-control" name="id_billing">
                  <input type="hidden" id="bku_rekening_detail_id" class="form-control" name="bku_rekening_detail_id">
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
  $(document).on('click', '.edit-billing', function() {
  $('#bku_rekening_detail_id').val($(this).data('bku_rekening_detail_id'));
  $('#id_billing').val($(this).data('billing'));
  $("#modal-edit").modal();
});
</script>
@endpush

