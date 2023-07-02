@extends('layouts.app')
@push('css')
    
@endpush
@section('content')
<section class="content">
    <div class="row">
        <div class="col-xs-12">
          <div class="box box-primary">
            <div class="box-header">
              <h3 class="box-title"><i class="fa fa-clipboard"></i> Laporan KWITANSI</h3>
    
              
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
                <tr style="font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif; font-size:10px;">
                    <td class="text-center">{{$data->firstItem() + $key}}</td>
                    <td>{{$item->bulan}} {{$item->tahun}}</td>
                    <td>{{$item->subkegiatan}}</td>
                    <td>{{$item->pptk}}<br/>{{$item->nip_pptk}}</td>
                    <td>{{$item->pengguna}}<br/>{{$item->nip_pengguna}}</td>
                    
                    <td>
                        <a href="/staf/laporan/kwitansi/detail/{{$item->id}}"  class="btn btn-sm btn-flat btn-danger" target="_blank"><i class="fa fa-list"></i> Detail</a>
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

