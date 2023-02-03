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
              <h3 class="box-title"><i class="fa fa-clipboard"></i> NPD</h3>
    
              <div class="box-tools">
                
                
                <a href="/admin/transaksi/npd/pdf/{{$id}}" class="btn btn-sm btn-danger btn-flat"><i class="fa fa-file"></i> PRINT</a>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
              <table class="table table-hover table-condensed table-bordered">
                <tbody>
                <tr style="font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif; font-size:10px; background-color:silver">
                  <th class="text-center">No</th>
                  <th class="text-center" style="vertical-align: middle">Kode Rekening</th>
                  <th class="text-center" style="vertical-align: middle">Uraian</th>
                  <th class="text-center">Anggaran</th>
                  <th class="text-center">Akumulasi Pencairan Sebelumnya</th>
                  <th class="text-center">Pencairan Saat Ini</th>
                  <th>Sisa</th>
                </tr>
                @php
                    $no =1;
                @endphp
                @foreach ($detail as $item)
                    <tr style="font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif; font-size:10px;">
                      <td>{{$no++}}</td>
                      <td class="text-center">
                        {{koderekening($item->koderek->kode1,$item->koderek->kode2,$item->koderek->kode3,$item->koderek->kode4,$item->koderek->kode5,$item->koderek->kode6)}} 
                      </td>
                      <td>
                        {{$item->koderek->uraian}}
                      </td>
                      <td style="text-align: right">
                        {{number_format($item->ja)}}
                      </td>
                      <td style="text-align: right">
                        {{number_format($item->aps)}}
                      </td>
                      <td style="text-align: right">
                        {{number_format($item->psi)}}
                      </td>
                      <td style="text-align: right">
                        {{number_format($item->sisa_npd)}}
                      </td>
                      
                    </tr>
                @endforeach
                
              </tbody>
              <tfoot>
                <tr style="font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif; font-size:10px; background-color:silver;">
                  <td></td>
                  <td></td>
                  <td>Jumlah</td>
                  <td style="text-align: right">{{number_format($detail->sum('ja'))}}</td>
                  <td style="text-align: right">{{number_format($detail->sum('aps'))}}</td>
                  <td style="text-align: right">{{number_format($detail->sum('psi'))}}</td>
                  <td style="text-align: right">{{number_format($detail->sum('sisa_npd'))}}</td>
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
          <form method="post" action="/admin/transaksi/bku/detail/{{$id}}/simpanuraian">
          <div class="modal-body">
              @csrf
              
              <div class="form-group">
                  <label>Uraian</label>
                  <input type="text" id="uraian" class="form-control" name="uraian">
                  <input type="hidden" id="bku_rekening_id" class="form-control" name="bku_rekening_id">
              </div>
              <div class="form-group">
                  <label>Penerimaan</label>
                  <input type="text" class="form-control" name="penerimaan">
              </div>
              <div class="form-group">
                  <label>Pengeluaran</label>
                  <input type="text" class="form-control" name="pengeluaran">
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
            <h4 class="modal-title"><i class="ion ion-clipboard"></i> Tambah Uraian</h4>
          </div>
          <form method="post" action="/admin/transaksi/bku/detail/{{$id}}/updateuraian">
          <div class="modal-body">
              @csrf
              
              <div class="form-group">
                  <label>Uraian</label>
                  <input type="text" id="detail_uraian" class="form-control" name="uraian">
                  <input type="hidden" id="bku_rekening_detail_id" class="form-control" name="bku_rekening_detail_id">
              </div>
              <div class="form-group">
                  <label>Penerimaan</label>
                  <input type="text" id="penerimaan" class="form-control" name="penerimaan">
              </div>
              <div class="form-group">
                  <label>Pengeluaran</label>
                  <input type="text" id="pengeluaran" class="form-control" name="pengeluaran">
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
  $("#modal-edit").modal();
});
</script>
@endpush

