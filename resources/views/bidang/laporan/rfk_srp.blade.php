@extends('layouts.app')
@push('css')

@endpush
@section('content')
<section class="content">
  <div class="row">
    <div class="col-xs-12">
      <div class="box box-primary">
        <div class="box-header">
          <h3 class="box-title"><i class="fa fa-clipboard"></i> Laporan RFK</h3>


        </div>
        <!-- /.box-header -->
        <div class="box-body text-sm">
          <dl>
            <dd><strong>TAHUN :</strong> {{$tahun}}</dd>
            <dd><strong>BULAN :</strong> {{$nama_bulan}}</dd>
            <dd><strong>PROGRAM :</strong> {{$program->nama}}</dd>
            <dd><strong>KEGIATAN :</strong> {{$kegiatan->nama}}</dd>
            <dd><strong>SUB KEGIATAN :</strong> {{$subkegiatan->nama}}</dd>
          </dl>
        </div>
        <!-- /.box-body -->
      </div>
      <!-- /.box -->
    </div>
  </div>
  <div class="row">
    <div class="col-md-12">
      <!-- Block buttons -->
      <div class="box">
        <div class="box-body">
          @include('bidang.laporan.rfk_menu')
        </div>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-md-12">
      <!-- Block buttons -->
      <div class="box">
        <div class="box-body table-responsive">
          <table class="table table-bordered table-condensed">
            <tbody>
              <tr style="font-size:12px;" class="bg-purple">
                <th style="width: 10px">NO</th>
                <th style="text-align: center">URAIAN</th>
                <th style="text-align: center">KEUANGAN <br/>%</th>
                <th style="text-align: center">FISIK <br/>%</th>
              </tr>
              <tr>
                <th>1</th>
                <th>Rencana</th>
                <th style="text-align: center">{{round($data->sum('rencanaTTB'),2)}}</th>
                <th style="text-align: center">{{round($data->sum('fisikRencanaTTB'),2)}}</th>
              </tr>
              <tr>
                <th>2</th>
                <th>Realisasi</th>
                <th style="text-align: center">{{round($data->sum('realisasiTTB'),2)}}</th>
                <th style="text-align: center">{{round($data->sum('fisikRealisasiTTB'),2)}}</th>
              </tr>
              <tr>
                <th></th>
                <th></th>
                <th style="text-align: center">{{round($data->sum('deviasiTTB'),2)}}</th>
                <th style="text-align: center">{{round($data->sum('fisikDeviasiTTB'),2)}}</th>
              </tr>
            </tbody>
          </table>

        </div>
      </div>
    </div>
  </div>


</section>


@endsection
@push('js')
@endpush