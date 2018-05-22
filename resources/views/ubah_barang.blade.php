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
        <li>Barang</li>
        <li>Barang</li>
      </ol>
    </section>
    <!-- Main content -->
    <section class="content">
      <div class="box box-default">
        <!-- <div class="box-header with-border">
          <h3 class="box-title">Ubah Data Barang</h3>
        </div> -->
        <!-- /.box-header -->
        <div class="box-body" style="background-color: #d2d6de;">
          
          <div class="row" style="padding-left: 300px">
            <div class="col-xs-2">
              <div class="form-group pull-right" >
                <h5>Nama Barang:</h5>
              </div>
            </div>
            <div class="col-xs-4">
              <div class="form-group" >
                <!-- text input -->
                <input type="text" class="form-control" value="{{$datas->nama_barang}}">
              </div>
            </div>
          </div>
          <!-- /.row -->
          <div class="row" style="padding-left: 300px">
            <div class="col-xs-2">
              <div class="form-group pull-right" >
                <h5>Harga Beli :</h5>
              </div>
            </div>
            <div class="col-xs-3">
              <div class="form-group" >
                <!-- text input -->
                <input type="text" class="form-control" value="{{$datas->harga_beli}}">
              </div>
            </div>
          </div>
          <!-- /.row -->
          <div class="row" style="padding-left: 300px">
            <div class="col-xs-2">
              <div class="form-group pull-right" >
                <h5>Harga Jual :</h5>
              </div>
            </div>
            <div class="col-xs-3">
              <div class="form-group" >
                <!-- text input -->
                <input type="text" class="form-control" value="{{$datas->harga_jual}}">
              </div>
            </div>
          </div>
          <!-- /.row -->
          <div class="row" style="padding-left: 300px">
            <div class="col-xs-2">
              <div class="form-group pull-right" >
                <h5>Stock :</h5>
              </div>
            </div>
            <div class="col-xs-2">
              <div class="form-group" >
                <!-- text input -->
                <input type="text" class="form-control" value="{{$datas->stok}}">
              </div>
            </div>
          </div>
          <!-- /.row -->
          <div class="row" style="padding-left: 300px">
            <div class="col-xs-2">
              <div class="form-group pull-right" >
                <h5>Satuan :</h5>
              </div>
            </div>
            <div class="col-xs-2">
              <div class="form-group" >
                <select class="form-control">
                  <option selected="selected">zak</option>
                  <option>kilo</option>
                </select>
              </div>
            </div>
          </div>
          <!-- /.row -->
          <div class="row" style="padding-left: 300px">
            <div class="col-xs-2">
              <div class="form-group pull-right" >
                <h5>Pemasok :</h5>
              </div>
            </div>
            <div class="col-xs-4">
              <div class="form-group" >
                <!-- text input -->
                <input type="text" class="form-control" placeholder="">
              </div>
            </div>
          </div>
          <!-- /.row -->
          <div class="col-md-6">
            <a href="{{URL::to('barang')}}" class="btn btn-default" style="margin-top: 25px">Kembali</a>
          </div>
          <div class="col-md-6">
            <a href="{{URL::to('barang')}}" class="btn btn-primary pull-right" style="margin-top: 25px">Simpan</a>
          </div>
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
