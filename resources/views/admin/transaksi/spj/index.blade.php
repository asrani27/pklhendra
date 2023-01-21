@extends('layouts.app')
@push('css')
    
@endpush
@section('content')
<section class="content">
    <div class="row">
        <div class="col-xs-12">
          <div class="box box-primary">
            <div class="box-header">
              <h3 class="box-title"><i class="fa fa-clipboard"></i> Data SPJ</h3>
    
              <div class="box-tools">
                <a href="/admin/transaksi/spj/add" class="btn btn-sm btn-primary btn-flat "><i class="fa fa-plus-circle"></i> Tambah SPJ</a>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
              <table class="table table-hover">
                <tbody>
                <tr>
                  <th class="text-center">No</th>
                  <th>Bulan Tahun</th>
                  <th>SubKegiatan</th>
                  <th>PPTK</th>
                  <th>Pengguna Anggaran</th>
                  <th>Aksi</th>
                </tr>
                @foreach ($data as $key => $item)
                <tr>
                    <td class="text-center">{{$data->firstItem() + $key}}</td>
                    <td>{{$item->bulan}} {{$item->tahun}}</td>
                    <td>{{$item->subkegiatan}}</td>
                    <td>{{$item->pptk}}</td>
                    <td>{{$item->pengguna}}</td>
                    <td>
                      <a href="/admin/transaksi/spj/detail/{{$item->id}}" class="btn btn-xs btn-flat  btn-success">detail</a>
                        <a href="/admin/transaksi/spj/edit/{{$item->id}}" class="btn btn-xs btn-flat  btn-success"><i class="fa fa-edit"></i></a>
                        <a href="/admin/transaksi/spj/delete/{{$item->id}}"
                            onclick="return confirm('Yakin ingin di hapus');"
                            class="btn btn-xs btn-flat  btn-danger"><i class="fa fa-trash"></i></a>
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


@endsection
@push('js')

@endpush

