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
              <h3 class="box-title"><i class="fa fa-clipboard"></i> BUKU KAS UMUM - PENGELUARAN</h3>
    
              <div class="box-tools">
                <a href="/staf/transaksi/bku/addrekening/{{$data->id}}" class="btn btn-sm btn-primary btn-flat"><i class="fa fa-plus-circle"></i> Rekening</a>
                
                <a href="/staf/transaksi/bku/print/{{$id}}" class="btn btn-sm btn-danger btn-flat" target="_blank"><i class="fa fa-file"></i> PRINT</a>
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
                  <th></th>
                  <th class="text-center">Comment</th>
                </tr>
                <tr style="font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif; font-size:10px;">
                  <td></td>
                  <td></td>
                  <td></td>
                  <td>Terima dari Bendahara Pengeluaran</td>
                  <td>{{number_format($penerimaan_bku)}}</td>
                  <td></td>
                  <td></td>
                  <td></td>
                </tr>
                <tr style="font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif; font-size:10px;">
                  <td></td>
                  <td></td>
                  <td></td>
                  <td>{{$data->subkegiatan}}</td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                </tr>
                @foreach ($rekening as $item)
                    <tr  style="font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif; font-size:10px;">
                      <td rowspan="{{$item->detailRekening->count() + 1}}"  class="text-center"><a href="/staf/transaksi/bku/rekening/delete/{{$item->id}}"
                        onclick="return confirm('Yakin ingin di hapus');"
                        class="btn btn-xs btn-flat"><i class="fa fa-trash"></i></a>
                      </td>
                      <td class="text-center" rowspan="{{$item->detailRekening->count() + 1}}">
                        @if ($item->tanggal == null)
                            
                        @else
                        {{\Carbon\Carbon::parse($item->tanggal)->format('d-m-Y')}}
                        @endif
                      </td>
                      <td class="text-center" rowspan="{{$item->detailRekening->count() + 1}}">{{koderekening($item->koderek->kode1,$item->koderek->kode2,$item->koderek->kode3,$item->koderek->kode4,$item->koderek->kode5,$item->koderek->kode6)}}
                      <br/>
                        <a href="#"
                        class="btn btn-xs btn-flat tambah-uraian" data-bku_rekening_id="{{$item->id}}"><i class="fa fa-plus-circle"></i></a>
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
                        <td>
                          <a href="#"
                            class="btn btn-xs btn-flat edit-uraian" data-bku_rekening_detail_id="{{$item2->id}}" data-uraian="{{$item2->uraian}}" data-penerimaan="{{$item2->penerimaan}}" data-pengeluaran="{{$item2->pengeluaran}}" data-pajak="{{$item2->pajak}}"><i class="fa fa-edit"></i></a>

                          <a href="/staf/transaksi/bku/detailrekening/delete/{{$item2->id}}"
                          onclick="return confirm('Yakin ingin di hapus');"
                          class="btn btn-xs btn-flat"><i class="fa fa-trash"></i></a>
                        </td>
                        <td style="text-align: right">
                          {{$item->comment_verifikator}}
                        </td>
                        
                      </tr>
                      @endforeach
                        {{-- <tr>
                        <td>
                          <a href="#"
                            class="btn btn-xs btn-flat tambah-uraian" data-bku_rekening_id="{{$item->id}}"><i class="fa fa-plus-circle"></i></a>
                        </td>
                        </tr> --}}
                    </tr>
                @endforeach
                
              </tbody>
              <tfoot>
                <tr style="font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif; font-size:10px; background-color:silver;">
                  <td></td>
                  <td></td>
                  <td></td>
                  <td>Total Bulan Ini</td>
                  <td style="text-align: right">{{number_format($total->sum('penerimaan') + $penerimaan_bku)}}</td>
                  <td style="text-align: right">{{number_format($total->sum('pengeluaran'))}}</td>
                  <td></td>
                  <td></td>
                </tr>
              </tfoot>
            </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
    </div>

    <div class="modal fade" id="modal-tambah">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header bg-purple">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title"><i class="ion ion-clipboard"></i> Tambah Uraian</h4>
          </div>
          <form method="post" action="/staf/transaksi/bku/detail/{{$id}}/simpanuraian">
          <div class="modal-body">
              @csrf
              
              <div class="form-group">
                  <label>Uraian</label>
                  <input type="text" id="uraian" class="form-control" name="uraian">
                  <input type="hidden" id="bku_rekening_id" class="form-control" name="bku_rekening_id">
              </div>
              <div class="form-group">
                  <label>Penerimaan</label>
                  <input type="text" class="form-control" name="penerimaan" onkeypress="return hanyaAngka(event)">
              </div>
              <div class="form-group">
                  <label>Pengeluaran</label>
                  <input type="text" class="form-control" name="pengeluaran" onkeypress="return hanyaAngka(event)">
              </div>
              <div class="form-group">
                  <label>Pajak</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                  <input type="radio" name="pajak" value="1" required>&nbsp;Ya&nbsp;&nbsp;&nbsp;&nbsp;
                  <input type="radio" name="pajak" value="0" required>&nbsp;Tidak
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

    <div class="modal fade" id="modal-edit">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header bg-purple">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title"><i class="ion ion-clipboard"></i> Edit Uraian</h4>
          </div>
          <form method="post" action="/staf/transaksi/bku/detail/{{$id}}/updateuraian">
          <div class="modal-body">
              @csrf
              
              <div class="form-group">
                  <label>Uraian</label>
                  <input type="text" id="detail_uraian" class="form-control" name="uraian">
                  <input type="hidden" id="bku_rekening_detail_id" class="form-control" name="bku_rekening_detail_id">
              </div>
              <div class="form-group">
                  <label>Penerimaan</label>
                  <input type="text" id="penerimaan" class="form-control" name="penerimaan" onkeypress="return hanyaAngka(event)">
              </div>
              <div class="form-group">
                  <label>Pengeluaran</label>
                  <input type="text" id="pengeluaran" class="form-control" name="pengeluaran" onkeypress="return hanyaAngka(event)">
              </div>
              
              <div class="form-group">
                <label>Pajak</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <input type="radio" id="pajak1" name="pajak" value="1" required>&nbsp;Ya&nbsp;&nbsp;&nbsp;&nbsp;
                <input type="radio" id="pajak2" name="pajak" value="0" required>&nbsp;Tidak
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
  function hanyaAngka(evt) {
    var charCode = (evt.which) ? evt.which : event.keyCode
     if (charCode > 31 && (charCode < 48 || charCode > 57))

      return false;
    return true;
  }
</script>
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

