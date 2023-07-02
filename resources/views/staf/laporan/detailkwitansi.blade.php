@extends('layouts.app')
@push('css')
    
@endpush
@section('content')
<section class="content">
    <div class="row">
        <div class="col-xs-12">
          <div class="box box-primary">
            <div class="box-header">
              <h3 class="box-title"><i class="fa fa-clipboard"></i> PRINT KWITANSI</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
              <table class="table table-hover table-condensed table-bordered">
                <tbody>
                <tr style="font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif; font-size:10px; background-color:silver">
                  <th class="text-center">No</th>
                  <th class="text-center" style="vertical-align: middle">Penerima</th>
                  <th class="text-center" style="vertical-align: middle">Kode Rekening</th>
                  <th class="text-center">Uraian</th>
                  <th class="text-center">PPN</th>
                  <th class="text-center">Jumlah</th>
                  <th class="text-center"></th>
                </tr>
                @php
                    $no =1;
                @endphp
                @foreach ($data as $item)
                    <tr style="font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif; font-size:10px;">
                      <td class="text-center">{{$no++}}</td>
                      <td class="text-center">
                        {{$item->penerima}}
                        <a href="#"
                        class="btn btn-xs btn-flat edit-penerima" data-bku_rekening_detail_id="{{$item->id}}" data-penerima="{{$item->penerima}}"><i class="fa fa-edit"></i></a>
                      </td>
                      <td class="text-center">
                        {{koderekening($item->rekening->koderek->kode1,$item->rekening->koderek->kode2,$item->rekening->koderek->kode3,$item->rekening->koderek->kode4,$item->rekening->koderek->kode5,$item->rekening->koderek->kode6)}} 
                      </td>
                      <td>
                        {{$item->uraian}}
                      </td>
                      <td style="text-align: right">
                         {{number_format($item->ppn)}}
                      </td>
                      <td style="text-align: right">
                          {{number_format($item->pengeluaran)}}
                      </td>
                     <td  class="text-center">  
                      <a href="/staf/transaksi/kuitansi/satu/print/{{$item->id}}" target="_blank" class="btn btn-xs btn-primary btn-flat"><i class="fa fa-file"></i> Kwitansi</a> 
                      </td>
                      
                    </tr>
                @endforeach
                
              </tbody>
              
            </table>
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

