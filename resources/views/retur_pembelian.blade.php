<!DOCTYPE html>
<html>
  @include ('head')
  <script>
  $(function () {
    // Replace the <textarea id="editor1"> with a CKEditor
    // instance, using default configuration.
    CKEDITOR.replace('editor1')
    //bootstrap WYSIHTML5 - text editor
    $('.textarea').wysihtml5()
  })
</script>
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
        Retur Pembelian
        <small>Preview</small>
      </h1>
      <ol class="breadcrumb">
        <li><i class="fa fa-dashboard"></i> Home</li>
        <li>Pembelian</li>
        <li>Retur Pembelian</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- SELECT2 EXAMPLE -->
      <div class="box box-default">
        <div class="box-header with-border">
          <h3 class="box-title">Retur</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body" style="background-color: #d2d6de">
          <div class="row" style="padding-left: 200px">
            <div class="col-md-4">
              <!-- Date -->
              <div class="form-group">
                <label>Tanggal Retur Pembelian :</label>
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
                <label>ID Pembelian :</label>
                <select class="form-control" style="width: 200px">
                  <option selected="selected">1</option>
                  <option>2</option>
                </select>
              </div>
              <!-- /.form-group -->

              <!-- Date -->
              <div class="form-group">
                <label>Tanggal Jatuh Tempo :</label>
                <!--input-->
                <div class="input-group date" style="width: 250px">
                  <input type="text" class="form-control" placeholder="">
                </div>
                <!-- /.input group -->
              </div>
              <!-- /.form group -->
            </div>
            <!-- /.col -->
            <div class="col-md-6">
              <div class="form-group" style="width: 400px">
                <label>Pemasok</label>
                <select class="form-control" style="width: 400px;">
                  <option selected="selected">Indotama</option>
                  <option>Semen Gresik</option>
                </select>
              </div>
              <!-- /.form-group -->
              <div class="form-group" style="width: 250px">
                <label>Telepon :</label> 
                <!-- text input -->
                <input type="text" class="form-control" placeholder="">
              </div>
              <div class="form-group" style="width: 400px">
                <label>Alamat :</label> 
                <!-- text input -->
                <input type="text" class="form-control" placeholder="">
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
            <div class="col-md-2">
              <!-- /.form-group -->
              <div class="form-group" style="width: 100%;">
                <label>ID Retur :</label> 
                <!-- text input -->
                <input type="text" class="form-control" placeholder="">
              </div>
            </div>
            <div class="col-md-3">
              <div class="form-group" style="width: 100%;">
                <label>Nama Barang :</label> 
                <!-- text input -->
                <select class="form-control" style="width: 100%">
                  <option selected="selected">Semen</option>
                  <option>Cat</option>
                </select>
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
            <div class="col-md-4">
              <!-- /.form-group -->
              <div class="form-group">
                <label>Deskripsi Retur :</label>
                <!-- text input -->
                <input type="text" class="form-control" placeholder="Alasan pengembalian barang..">
              </div>
            </div>
            <div class="col-md-2">
              <button type="submit" class="btn btn-primary" style="margin-top: 25px">Tambah</button>
            </div>
          </div>
          <!-- /.row -->
        </div>
        <!-- /.box-body -->
        
        <!-- /.box-header -->
        <div class="box-body">
          <div class="row">
            <div class="col-md-12">
              <div class="box-header">
                <h3 class="box-title">Daftar Retur Barang</h3>
              </div>
              <table class="table table-bordered">
                <tr style="background-color: #d2d6de">
                  <th style="width: 15px" class="text-center">No</th>
                  <th style="width: 15px" class="text-center">ID Retur</th>
                  <th style="width: 150px" class="text-center">Nama Barang</th>
                  <th style="width: 100px" class="text-center">Jumlah</th>
                  <th style="width: 150px" class="text-center">Harga Beli</th>
                  <th class="text-center">Deskripsi Retur</th>
                  <th style="width: 100px"></th>
                </tr>
                <tr class="text-center">
                  <td>1</td>
                  <td>1</td>
                  <td>Cat</td>
                  <td>3</td>
                  <td>50000</td>
                  <td>Wadah pecah dan cat kering</td>
                  <td>
                    <a href="#" class="btn btn-danger btn-xs"></i>Hapus</a>
                  </td>
                </tr>
              </table>
            </div>
          </div>
          <!-- /.row -->
          <div class="col-md-6">
            <a href="{{URL::to('data_retur_pembelian')}}" class="btn btn-default" style="margin-top: 25px">Kembali</a>
          </div>
          <div class="col-md-6">
            <a href="{{URL::to('')}}" class="btn btn-primary pull-right" style="margin-top: 25px">Selesai</a>
          </div>
          <div class="col-md-12">
            <p style="margin-top: 25px">*klik selesai jika barang yang akan dikembalikan pada saat ini sudah masuk ke dalam tabel</p>
          </div>
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
