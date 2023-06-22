@extends('layouts.app')
@push('css')
    
@endpush
@section('content')
<section class="content">
    <div class="row">
        <div class="col-xs-12">
          <div class="box box-primary">
            <div class="box-header">
              <h3 class="box-title"><i class="fa fa-clipboard"></i> BUKU KAS UMUM - PENGELUARAN</h3>
    
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
                  <th class="text-center" style="vertical-align: middle">Uraian</th>
                  <th class="text-center">Penerimaan</th>
                  <th class="text-center">Pengeluaran</th>
                </tr>
                @foreach ($rekening as $item)
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
                          {{$item2->uraian}}
                        </td>
                        <td style="text-align: right">
                          {{number_format($item2->penerimaan)}}
                        </td>
                        <td style="text-align: right">
                          {{number_format($item2->pengeluaran)}}
                        </td>
                      </tr>
                      @endforeach
                    </tr>
                @endforeach
                
              </tbody>
              <tfoot>
                <tr style="font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif; font-size:10px; background-color:silver;">
                  <td></td>
                  <td></td>
                  <td></td>
                  <td>Total Bulan Ini</td>
                  {{-- <td style="text-align: right">{{number_format($total->sum('penerimaan'))}}</td>
                  <td style="text-align: right">{{number_format($total->sum('pengeluaran'))}}</td> --}}
                </tr>
              </tfoot>
            </table>
            </div>
            <!-- /.box-body -->
          </div>
          <br/>
          
        </div>
    </div>

    
</section>


@endsection
@push('js')

<script>
  $(document).on('click', '.tambah-uraian', function() {
  $('#bku_rekening_id').val($(this).data('bku_rekening_id'));
  $("#modal-tambah").modal();
});
</script>

<script>
  $(document).on('click', '.edit-uraian', function() {
  $('#bku_rekening_detail_id').val($(this).data('bku_rekening_detail_id'));
  $('#detail_uraian').val($(this).data('uraian'));
  $('#penerimaan').val($(this).data('penerimaan'));
  $('#pengeluaran').val($(this).data('pengeluaran'));
  var x = $(this).data('pajak');
  let pajak;
  if(x == 0){
    pajak =  document.getElementById("pajak2");
  }else{
    pajak =  document.getElementById("pajak1");
  }
  pajak.checked = true;

  $("#modal-edit").modal();
});
</script>
@endpush

