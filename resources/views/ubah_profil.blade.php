<!DOCTYPE html>
<html>
  @include ('head')
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  @include ('header')

  <!-- Left side column. contains the logo and sidebar -->
  @include ('sidebar')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    @include('sweet::alert')
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Ubah Profil
      </h1>
    </section>
    <section class="content">
      <div class="box box-default">
        <div class="box-body" style="background-color: #d2d6de;">
        <form action="{{ url('updateprof') }}" method="post">
          {{ csrf_field() }}
            <div class="row" style="padding-left: 200px">
              <div class="col-xs-3">
                <div class="form-group pull-right" >
                  <h5>Nama Lengkap :</h5>
                </div>
              </div>
              <div class="col-xs-5">
                <div class="form-group" >
                  <!-- text input -->
                    <input type="text" class="form-control" name="nama" value="{{$data->nama_pengguna}}" required>
                  
                </div>
              </div>
            </div>
            <!-- /.row -->
            <div class="row" style="padding-left: 200px">
              <div class="col-xs-3">
                <div class="form-group pull-right" >
                  <h5>Jenis Kelamin :</h5>
                </div>
              </div>
              <div class="col-xs-3">
                <div class="form-group" >
                  <!-- text input -->
                  <select class="form-control" name="jenisKelamin" required>
                    <option value="Laki-Laki">Laki - Laki</option>
                    <option value="Perempuan">Perempuan</option>
                  </select>
                </div>
              </div>
            </div>
            <!-- /.row -->
            <div class="row" style="padding-left: 200px">
              <div class="col-xs-3">
                <div class="form-group pull-right" >
                  <h5>Nomor Telepon :</h5>
                </div>
              </div>
              <div class="col-xs-3">
                <div class="form-group" >
                  <!-- text input -->
                    <input type="text" class="form-control" name="notelp" value="{{$data->kontak_pengguna}}" required>
                </div>
              </div>
            </div>
            <!-- /.row -->
            <div class="row" style="padding-left: 200px">
              <div class="col-xs-3">
                <div class="form-group pull-right" >
                  <h5>Alamat :</h5>
                </div>
              </div>
              <div class="col-xs-6">
                <div class="form-group" >
                  <!-- text input -->
                    <input type="text" class="form-control" name="alamat" value="{{$data->alamat_pengguna}}" required>
                </div>
              </div>
            </div>
            <!-- /.row -->
            <div class="row" style="padding-left: 200px">
              <div class="col-xs-3">
                <div class="form-group pull-right" >
                  <h5>Nama Pengguna :</h5>
                </div>
              </div>
              <div class="col-xs-4">
                <div class="form-group" >
                  <!-- text input -->
                  <input type="text" class="form-control" name="username" value="{{$data->username}}" readonly>
                </div>
              </div>
            </div>
            <!-- /.row -->
            <div class="col-md-6">
              <a href="{{route('beranda.index')}}" class="btn btn-default" style="margin-top: 25px">Kembali</a>
            </div>
            <div class="col-md-6">
              <input type="submit" class="btn btn-primary pull-right" style="margin-top: 25px" value="Simpan">
            </div>
          </form>
        </div>
        <!-- /.box-body -->
      </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  
  @include ('footer')
</div>
<!-- ./wrapper -->
</body>
</html>
