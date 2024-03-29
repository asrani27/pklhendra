@extends('layouts.app')
@push('css')
    
@endpush
@section('content')
<section class="content">
    <div class="row">
        <div class="col-xs-12">
          <div class="box box-primary">
            <div class="box-header">
              <h3 class="box-title"><i class="fa fa-clipboard"></i> Data Transaksi</h3>
    
              <div class="box-tools">
                <a href="/staf/transaksi/spj/add" class="btn btn-sm btn-primary btn-flat "><i class="fa fa-plus-circle"></i> Tambah SPJ</a>
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
                  <th></th>
                  <th>Status</th>
                  <th>Aksi</th>
                </tr>
                @foreach ($data as $key => $item)
                <tr style="font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif; font-size:10px;">
                    <td class="text-center">{{$data->firstItem() + $key}}</td>
                    <td>{{$item->bulan}} {{$item->tahun}}</td>
                    <td>{{$item->subkegiatan}}</td>
                    <td>{{$item->pptk}}<br/>{{$item->nip_pptk}}</td>
                    <td>{{$item->pengguna}}<br/>{{$item->nip_pengguna}}</td>
                    <td>
                      <a href="/staf/transaksi/detail/{{$item->id}}" class="btn btn-xs btn-flat  btn-primary">Transaksi</a>
                      @if ($item->status_verifikator == 0)
                      <a href="/staf/transaksi/spj/kirim/{{$item->id}}" class="btn btn-xs btn-flat  btn-success" onclick="return confirm('Yakin ingin dikirim?');"> Kirim Ke Verifikator</a>
                      @endif
                    </td>
                    <td>
                      @if ($item->status_verifikator == 0)
                      Verifikator : -    
                      @elseif($item->status_verifikator == 1)
                      Verifikator : diproses   
                      @elseif($item->status_verifikator == 2)
                      Verifikator : selesai
                      @endif
                      <br/>
                      @if ($item->status_pengeluaran == 0)
                      Pengeluaran : -    
                      @elseif($item->status_pengeluaran == 1)
                      Pengeluaran : diproses   
                      @elseif($item->status_pengeluaran == 2)
                      Pengeluaran : selesai
                      @endif
                      <br/>
                      @if ($item->status_pencairan == 0)
                      Pencairan : -    
                      @elseif($item->status_pencairan == 1)
                      Pencairan : diproses   
                      @elseif($item->status_pencairan == 2)
                      Pencairan : selesai
                      @endif
                    </td>
                    <td>
                        <a href="/staf/transaksi/spj/edit/{{$item->id}}" class="btn btn-xs btn-flat  btn-success"><i class="fa fa-edit"></i></a>
                        <a href="/staf/transaksi/spj/delete/{{$item->id}}"
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

