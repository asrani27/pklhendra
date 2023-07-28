@extends('layouts.app')
@push('css')
    
@endpush
@section('content')
<section class="content">
   <div class="row">
    <div class="col-md-12">
        <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title"><i class="fa fa-clipboard"></i> Edit User</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form class="form-horizontal" action="/admin/data/user/edit/{{$data->id}}" method="post">
                @csrf
              <div class="box-body">
                
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Nama Lengkap</label>
                  <div class="col-sm-10">
                    <input type="text" name="nama" value="{{$data->name}}" class="form-control" required>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Username</label>
                  <div class="col-sm-10">
                    <input type="text" name="username"  value="{{$data->username}}" class="form-control" readonly>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Password</label>
                  <div class="col-sm-10">
                    <input type="text" name="password" class="form-control">
                    Note : 'Kosongkan jika password tidak ingin di ubah'
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Role</label>
                  <div class="col-sm-10">
                    <select name="role" class="form-control">
                      <option value="">-pilih-</option>
                      <option value="admin" {{$data->roles()->first()->name == 'admin' ? 'selected':''}}>admin</option>
                      <option value="staf" {{$data->roles()->first()->name == 'staf' ? 'selected':''}}>staf</option>
                      <option value="verifikator" {{$data->roles()->first()->name == 'verifikator' ? 'selected':''}}>verifikator</option>
                      <option value="bendahara_pengeluaran" {{$data->roles()->first()->name == 'bendahara_pengeluaran' ? 'selected':''}}>bendahara_pengeluaran</option>
                      <option value="bendahara_pencairan" {{$data->roles()->first()->name == 'bendahara_pencairan' ? 'selected':''}}>bendahara_pencairan</option>
                    </select>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label"></label>
                  <div class="col-sm-10">
                    <button type="submit" class="btn btn-primary btn-flat btn-block"><i class="fa fa-send"></i> Simpan</button>
                    <a href="/admin/data/user" class="btn bg-gray btn-flat btn-block"><i class="fa fa-arrow-left"></i> Kembali</a>
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

