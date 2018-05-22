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
        Barang
        <small>Control Panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><i class="fa fa-dashboard"></i> Home</li>
        <li>Master</li>
        <li>Barang</li>
        <li>Satuan</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="box box-default">
        <div class="box-header with-border">
          <h3 class="box-title">Tambah Data Satuan</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body" style="background-color: #d2d6de">
          <form action="{{route('tambah_satuan.store')}}" method="post">
              {{ csrf_field() }}
          <div class="col-md-12">
            <div class="row" style="padding-left: 300px">
              <div class="form-group" style="width: 400px">
                <label>Nama :</label> 
                <!-- text input -->
                <input type="text" class="form-control" placeholder="Masukkan nama lengkap" name="nama">
              </div>
              <!-- /.form-group -->
            </div>
            <!-- /.row -->
            <div class="col-md-6">
              <a href="{{route('satuan.index')}}" class="btn btn-default" style="margin-top: 25px">Kembali</a>
            </div>
            <div class="col-md-6">
                <input type="submit" class="btn btn-primary pull-right" style="margin-top: 25px" value="Simpan">
            </div>
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
