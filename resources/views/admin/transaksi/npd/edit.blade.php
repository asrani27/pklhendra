@extends('layouts.app')
@push('css')
    
@endpush
@section('content')
<section class="content">
   <div class="row">
    <div class="col-md-12">
        <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title"><i class="fa fa-clipboard"></i> Edit Data</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form class="form-horizontal" action="/admin/transaksi/npd/edit/{{$data->id}}" method="post">
                @csrf
              <div class="box-body">
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">No NPD</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" value="{{$data->nomor_npd}}" name="nomor_npd">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Kode SKPD</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" value="{{$data->kode_skpd}}" name="kode_skpd">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">SKPD</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" value="{{$data->skpd}}" name="skpd">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Kode program</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" value="{{$data->kode_program}}" name="kode_program">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">program</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" value="{{$data->program}}" name="program">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Kode kegiatan</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" value="{{$data->kode_kegiatan}}" name="kode_kegiatan">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">kegiatan</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" value="{{$data->kegiatan}}" name="kegiatan">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">No DPA</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" value="{{$data->no_dpa}}" name="no_dpa">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Tanggal</label>
                  <div class="col-sm-10">
                    <input type="date" class="form-control" value="{{$data->tanggal}}" name="tanggal">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Bulan</label>
                  <div class="col-sm-10">
                    <select name="bulan" class="form-control" required>
                      <option value="">-pilih-</option>
                      <option value="januari" {{$data->bulan == 'januari' ? 'selected':''}}>Januari</option>
                      <option value="februari" {{$data->bulan == 'februari' ? 'selected':''}}>Februari</option>
                      <option value="maret" {{$data->bulan == 'maret' ? 'selected':''}}>Maret</option>
                      <option value="april" {{$data->bulan == 'april' ? 'selected':''}}>April</option>
                      <option value="mei" {{$data->bulan == 'mei' ? 'selected':''}}>Mei</option>
                      <option value="juni {{$data->bulan == 'juni' ? 'selected':''}}">Juni</option>
                      <option value="juli" {{$data->bulan == 'juli' ? 'selected':''}}>Juli</option>
                      <option value="agustus" {{$data->bulan == 'agustus' ? 'selected':''}}>Agustus</option>
                      <option value="september" {{$data->bulan == 'september' ? 'selected':''}}>September</option>
                      <option value="oktober" {{$data->bulan == 'oktober' ? 'selected':''}}>Oktober</option>
                      <option value="november" {{$data->bulan == 'november' ? 'selected':''}}>November</option>
                      <option value="desember" {{$data->bulan == 'desember' ? 'selected':''}}>Desember</option>
                    </select>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Tahun</label>
                  <div class="col-sm-10">
                    <select name="tahun" class="form-control" required>
                      <option value="">-pilih-</option>
                      <option value="2023" {{$data->tahun == '2023' ? 'selected':''}}>2023</option>
                      <option value="2024" {{$data->tahun == '2024' ? 'selected':''}}>2024</option>
                    </select>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Sub Kegiatan</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" value="{{$data->subkegiatan}}" name="subkegiatan">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">NIP PPTK</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" value="{{$data->nip_pptk}}" name="nip_pptk">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">PPTK</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" value="{{$data->pptk}}" name="pptk">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">NIP Pengguna</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" value="{{$data->nip_pengguna}}" name="nip_pengguna">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Pengguna Anggaran</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" value="{{$data->pengguna}}" name="pengguna">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label"></label>
                  <div class="col-sm-10">
                    <button type="submit" class="btn btn-primary btn-flat btn-block"><i class="fa fa-send"></i> Simpan</button>
                    
                  </div>
                </div>
              </div>
            </form>
          </div>
    </div>
   </div>
    
</section>


@endsection
@push('js')

@endpush

