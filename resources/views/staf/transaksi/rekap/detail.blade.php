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
              <h3 class="box-title"><i class="fa fa-clipboard"></i> REKAP</h3>
    
              <div class="box-tools">
                
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
              <table class="table table-hover table-bordered">
                <tbody>
                <tr style="font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif; font-size:10px; background-color:silver">
                  <th class="text-center" style="vertical-align: middle">Kode Rekening</th>
                  <th class="text-center" style="vertical-align: middle">uraian</th>
                  <th></th>
                </tr>
                
                @foreach ($data->detail as $key => $item)
                <tr style="font-size: 10px">
                  
                    <td>{{koderekening($item->koderek->kode1,$item->koderek->kode2,$item->koderek->kode3,$item->koderek->kode4,$item->koderek->kode5,$item->koderek->kode6)}} 
                      </td>
                    <td>{{$item->koderek->uraian}}</td>
                    <td>

                      <a href="/staf/transaksi/detail/{{$item->id}}/rekap/print" class="btn btn-xs btn-danger btn-flat" target="_blank"><i class="fa fa-file"></i> PRINT</a>
                    </td>
                  
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
          <form method="post" action="/staf/transaksi/spj/detail/simpan/angka">
          <div class="modal-body">
              @csrf
              
              <div class="form-group">
                  <label>Angka</label>
                  <input type="text" id="angka" class="form-control" name="angka" onkeypress="return hanyaAngka(event)">
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
  function hanyaAngka(evt) {
    var charCode = (evt.which) ? evt.which : event.keyCode
     if (charCode > 31 && (charCode < 48 || charCode > 57))

      return false;
    return true;
  }
</script>
<script>
  $(document).on('click', '.isiangka', function() {
  $('#detail_id').val($(this).data('id'));
  $('#angka').val($(this).data('angka'));
  $('#kolom').val($(this).data('kolom'));
  $("#modal-editangka").modal();
});
</script>
@endpush

