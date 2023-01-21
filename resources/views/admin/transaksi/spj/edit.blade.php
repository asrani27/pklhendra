@extends('layouts.app')
@push('css')
    
@endpush
@section('content')
<section class="content">
   <div class="row">
    <div class="col-md-12">
        <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title"><i class="fa fa-clipboard"></i> Edit SPJ</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form class="form-horizontal" action="/admin/transaksi/spj/edit/{{$data->id}}" method="post">
                @csrf
              <div class="box-body">
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
                  <label for="inputEmail3" class="col-sm-2 control-label">PPTK</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" value="{{$data->pptk}}" name="pptk">
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
                    <a href="/admin/transaksi/spj" class="btn bg-gray btn-flat btn-block"><i class="fa fa-arrow-left"></i> Kembali</a>
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

