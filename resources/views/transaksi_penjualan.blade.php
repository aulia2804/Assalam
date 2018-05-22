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
        Transaksi Penjualan
        <small>Preview</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Penjualan</a></li>
        <li class="active">Transaksi Penjualan</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- SELECT2 EXAMPLE -->
      <div class="box box-default">
        <div class="box-header with-border">
          <h3 class="box-title">Transaksi</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body" style="background-color: #d2d6de">
          <div class="row" style="padding-left: 200px">
            <div class="col-md-4">
              <!-- Date -->
              <div class="form-group">
                <label>Tanggal Penjualan :</label>
                <!--input-->
                <div class="input-group date" style="width: 250px">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                  <input type="text" class="form-control pull-right" id="datepicker">
                </div>
                <!-- /.input group -->
              </div>
              <!-- /.form group -->

              <div class="form-group">
                <label>Pembayaran :</label>
                <select class="form-control" style="width: 200px">
                  <option selected="selected">Tunai</option>
                  <option>Tempo</option>
                </select>
              </div>
              <!-- /.form-group -->

              <!-- Date -->
              <div class="form-group">
                <label>Tanggal Jatuh Tempo :</label>
                <!--input-->
                <div class="input-group date" style="width: 250px">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                  <input type="text" class="form-control pull-right" id="datepicker">
                </div>
                <!-- /.input group -->
              </div>
              <!-- /.form group -->
            </div>
            <!-- /.col -->
            <div class="col-md-6">
              <div class="form-group" style="width: 300px">
                <label>Pelanggan</label>
                <!-- text input -->
                <input type="text" class="form-control" name="nama">
              </div>
              <!-- /.form-group -->
              <div class="form-group" style="width: 250px">
                <label>Kontak :</label> 
                <!-- text input -->
                <input type="text" class="form-control" name="kontak">
              </div>
              <!-- /.form-group -->
              <div class="form-group" style="width: 400px">
                <label>Alamat :</label> 
                <!-- text input -->
                <input type="text" class="form-control" name="alamat">
              </div>
              <!-- /.form-group -->
            </div>
            <!-- /.col -->
          </div>
          <!-- /.row -->
          <div class="col-md-10">
            <button type="submit" class="btn btn-success pull-right" style="margin-top: 25px">Selanjutnya</button>
          </div>
        </div>
        <!-- /.box-body -->
        <div class="box-header with-border">
          <h3 class="box-title">Barang</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body" style="background-color: #d2d6de">
          <div class="row">
            <div class="col-md-1">
              <!-- /.form-group -->
              <div class="form-group" style="width: 100%;">
                <label>ID :</label> 
                <!-- text input -->
                <input type="text" class="form-control" placeholder="">
              </div>
            </div>
            <div class="col-md-3">
              <div class="form-group">
                <label>Nama Barang</label>
                <select class="form-control" style="width: 100%;">
                  <option selected="selected">Kayu</option>
                  <option>Semen</option>
                </select>
              </div>
            </div>
            <div class="col-md-2">
              <!-- /.form-group -->
              <div class="form-group" style="width: 100%;">
                <label>Harga Jual :</label> 
                <!-- text input -->
                <input type="text" class="form-control" placeholder="">
              </div>
            </div>
            <div class="col-md-1">
              <!-- /.form-group -->
              <div class="form-group" style="width: 100%;">
                <label>Jumlah :</label> 
                <!-- text input -->
                <input type="text" class="form-control" placeholder="">
              </div>
            </div>
            <div class="col-md-2">
              <!-- /.form-group -->
              <div class="form-group" style="width: 100%;">
                <label>Total :</label> 
                <!-- text input -->
                <input type="text" class="form-control" placeholder="">
              </div>
            </div>
            <div class="col-md-2">
              <button type="submit" class="btn btn-primary" style="margin-top: 25px">Tambah</button>
            </div>
          </div>
          <!-- /.row -->
        </div>
        <!-- /.box-body -->
        <div class="box-header with-border">
          <h3 class="box-title">Daftar Penjualan Barang</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <div class="row">
            <div class="col-md-12">
              <table class="table table-bordered">
                <tr style="background-color: #d2d6de">
                  <th style="width: 15px" class="text-center">No</th>
                  <th style="width: 15px" class="text-center">ID Jual</th>
                  <th class="text-center">Nama Barang</th>
                  <th style="width: 150px" class="text-center">Harga Barang</th>
                  <th style="width: 100px" class="text-center">Jumlah</th>
                  <th style="width: 150px" class="text-center">Total Harga</th>
                  <th style="width: 100px"></th>
                </tr>
                <tr style="text-align: center;">
                  <td>1</td>
                  <td>1</td>
                  <td>Semen</td>
                  <td>50000</td>
                  <td>3</td>
                  <td>150000</td>
                  <td>
                    <a href="#" class="btn btn-danger btn-xs"></i>Hapus</a>
                  </td>
                </tr>
              </table>
            </div>
          </div>
          <!-- /.row -->
          <div class="box-body">
            <div class="row">
              <div class="col-md-10">
                <label class="pull-right">
                  Total
                </label>
              </div>
              <div class="col-md-2">
                <label>
                  150000
                </label>
              </div>
            </div>
          </div>
          <div class="box-body">
            <div class="row">
              <div class="col-md-10">
                <label class="pull-right">
                  Uang Muka
                </label>
              </div>
              <div class="col-md-2">
                <input type="text" name="uangmuka" style="width: 80%;">
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <a href="{{URL::to('data_transaksi_penjualan')}}" class="btn btn-default" style="margin-top: 25px">Kembali</a>
          </div>
          <div class="col-md-6">
            <a href="{{URL::to('')}}" class="btn btn-primary pull-right" style="margin-top: 25px">Selesai</a>
          </div>
          <div class="col-md-12">
            <p style="margin-top: 25px">*klik selesai jika semua barang yang dijual pada saat ini sudah masuk ke dalam tabel</p>
          </div>
        </div>
        <!-- /.box-body -->
      </div>
      <!-- /.box -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  @include ('footer')
</div>
<!-- ./wrapper -->
</body>
</html>
