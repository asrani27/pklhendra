@extends('layouts.app')
@push('css')
    
@endpush
@section('content')
<section class="content">
    <div class="row">
        <div class="col-xs-12">
          @include('verifikator.transaksi.menu')
          <br/>
          <br/>
          <div class="box box-primary">
            <div class="box-header">
              <h3 class="box-title"><i class="fa fa-clipboard"></i> Data JKN</h3>
    
              <div class="box-tools">
                {{-- <a href="/verifikator/transaksi/detail/{{$id}}/jkn/add" class="btn btn-sm btn-primary btn-flat "><i class="fa fa-plus-circle"></i> Tambah</a> --}}
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
              <table class="table table-hover">
                <tbody>
                <tr style="font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif; font-size:10px; background-color:silver">
                  <th class="text-center">No</th>
                  <th>Nama / Jabatan</th>
                  <th>Jumlah Honorarium</th>
                  <th>Standar Potongan Iuran JKN KIS (UMP/UMK)</th>
                  <th>JKN KIS 4% (Rp.) Desember</th>
                  <th>Jlh Uang yg diterima (Rp.)</th>
                  <th>Aksi</th>
                </tr>
                @foreach ($data as $key => $item)
                <tr>
                    <td class="text-center">{{$data->firstItem() + $key}}</td>
                    <td>{{$item->nama}} <br/>{{$item->jabatan}}</td>
                    <td>{{number_format($item->honor)}}</td>
                    <td>{{number_format($item->umr)}}</td>
                    <td>{{number_format($item->potongan)}} x {{$item->jumlah}} Bulan</td>
                    <td>{{number_format($item->jumlah * $item->potongan)}}</td>
                    <td>
                        {{-- <a href="/staf/transaksi/detail/{{$id}}/jkn/edit/{{$item->id}}" class="btn btn-xs btn-flat btn-success"><i class="fa fa-edit"></i></a>
                        <a href="/staf/transaksi/detail/{{$id}}/jkn/delete/{{$item->id}}"
                            onclick="return confirm('Yakin ingin di hapus');"
                            class="btn btn-xs btn-flat  btn-danger"><i class="fa fa-trash"></i></a> --}}
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

