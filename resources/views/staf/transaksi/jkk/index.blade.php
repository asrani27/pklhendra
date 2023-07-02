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
              <h3 class="box-title"><i class="fa fa-clipboard"></i> Data JKK</h3>
    
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
              <table class="table table-hover">
                <tbody>
                <tr style="font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif; font-size:10px; background-color:silver">
                  <th class="text-center">No</th>
                  <th>Nama / Jabatan</th>
                  <th>Jumlah Iuran JKK yang dibayar bulan </th>
                  <th>Aksi</th>
                </tr>
                @foreach ($data as $key => $item)
                <tr>
                    <td class="text-center">{{$data->firstItem() + $key}}</td>
                    <td>{{$item->nama}} <br/>{{$item->jabatan}}</td>
                    <td>{{number_format($item->iuran_jkk)}}</td>
                    <td>
                      <a href="#" data-id="{{$item->id}}" data-iuran="{{$item->iuran_jkk}}" class="btn btn-xs btn-flat edit-iuran btn-success"><i class="fa fa-edit"></i> isi</a>
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
</section>

<div class="modal fade" id="modal-edit">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header bg-purple">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title"><i class="ion ion-clipboard"></i> Iuran</h4>
      </div>
      <form method="post" action="/staf/transaksi/detail/{{$id}}/jkk">
      <div class="modal-body">
          @csrf
          
          <div class="form-group">
              <label>Iuran JKK</label>
              <input type="text" id="iuran" class="form-control" name="iuran" onkeypress="return hanyaAngka(event)">
              <input type="hidden" id="jkk_id" class="form-control" name="jkk_id">
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
@endsection
@push('js')
<script>
  $(document).on('click', '.edit-iuran', function() {
  $('#jkk_id').val($(this).data('id'));
  $('#iuran').val($(this).data('iuran'));
  $("#modal-edit").modal();
});
</script>

<script>
  function hanyaAngka(evt) {
    var charCode = (evt.which) ? evt.which : event.keyCode
     if (charCode > 31 && (charCode < 48 || charCode > 57))

      return false;
    return true;
  }
</script>
@endpush

