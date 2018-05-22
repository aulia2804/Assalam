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
        Pengguna
        <small>Control Panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><i class="fa fa-dashboard"></i> Home</li>
        <li>Master</li>
        <li>Pengguna</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="box box-default">
        <!-- <div class="box-header with-border">
          <h3 class="box-title">Tambah Data Pelanggan</h3>
        </div> -->
        <!-- /.box-header -->
        <div class="box-body" style="background-color: #d2d6de;">
          <form action="{{route('tambah_pengguna.store')}}" method="post">
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
                  <input type="text" class="form-control" name="nama" value="{{ old('nama') }}">
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
                  <select class="form-control" name="jenisKelamin">
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
                  <input type="text" class="form-control" name="notelp" value="{{ old('notelp') }}">
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
                  <input type="text" class="form-control" name="alamat" value="{{ old('alamat') }}">
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
                  <input type="text" class="form-control" name="username">
                  <label style="float: left; font-size: 12px; color:red;">{{(string)Session::get('message')}}</label> 
                </div>
              </div>
            </div>
            <!-- /.row -->
            <div class="row" style="padding-left: 200px">
              <div class="col-xs-3">
                <div class="form-group pull-right" >
                  <h5>Kata Sandi :</h5>
                </div>
              </div>
              <div class="col-xs-4">
                <div class="form-group" >
                  <!-- text input -->
                  <input type="password" class="form-control" name="password">
                </div>
              </div>
            </div>
            <!-- /.row -->
            <div class="row" style="padding-left: 200px">
              <div class="col-xs-3">
                <div class="form-group pull-right" >
                  <h5>Jabatan :</h5>
                </div>
              </div>
              <div class="col-xs-3">
                <div class="form-group" >
                  <!-- text input -->
                  <select class="form-control" name="jabatan">
                    <option value="Pemilik">Pemilik</option>
                    <option value="Admin">Admin</option>
                  </select>
                </div>
              </div>
            </div>
            <!-- /.row -->
            <div class="col-md-6">
              <a href="{{route('pengguna.index')}}" class="btn btn-default" style="margin-top: 25px">Kembali</a>
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
