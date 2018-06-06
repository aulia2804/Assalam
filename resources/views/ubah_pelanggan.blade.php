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
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Pelanggan
      </h1>
      <ol class="breadcrumb">
        <li><i class="fa fa-dashboard">Master</i></li>
        <li>Pelanggan</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="box box-default">
       <!--  <div class="box-header with-border">
          <h3 class="box-title">Ubah Data Pelanggan</h3>
        </div> -->
        <!-- /.box-header -->
        <div class="box-body" style="background-color: #d2d6de;">
          @foreach($data as $datas)
          <form action="{{route('ubah_pelanggan.update', $datas->id_pelanggan)}}" method="post">
              {{ csrf_field() }}
              {{ method_field('PUT') }}
          <div class="row" style="padding-left: 150px">
            <div class="col-xs-3">
              <div class="form-group pull-right" >
                <h5>Nama Pelanggan:</h5>
              </div>
            </div>
            <div class="col-xs-4">
              <div class="form-group" >
                <!-- text input -->
                <input type="text" class="form-control" name="nama" value="{{$datas->nama_pelanggan}}" required>
              </div>
            </div>
          </div>
          <!-- /.row -->
          <div class="row" style="padding-left: 150px">
            <div class="col-xs-3">
              <div class="form-group pull-right" >
                <h5>Nomor Telepon :</h5>
              </div>
            </div>
            <div class="col-xs-3">
              <div class="form-group" >
                <!-- text input -->
                <input type="text" class="form-control" name="kontak" value="{{$datas->kontak_pelanggan}}" required>
              </div>
            </div>
          </div>
          <!-- /.row -->
          <div class="row" style="padding-left: 150px">
            <div class="col-xs-3">
              <div class="form-group pull-right" >
                <h5>Alamat :</h5>
              </div>
            </div>
            <div class="col-xs-6">
              <div class="form-group" >
                <!-- text input -->
                <input type="text" class="form-control" name="alamat" value="{{$datas->alamat_pelanggan}}" required>
              </div>
            </div>
          </div>
          <!-- /.row -->
          <div class="col-md-6">
            <a href="{{route('pelanggan.index')}}" class="btn btn-default" style="margin-top: 25px">Kembali</a>
          </div>
          <div class="col-md-6">
            <input type="submit" class="btn btn-primary pull-right" style="margin-top: 25px" value="Simpan">
          </div>
          </form>
          @endforeach
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
