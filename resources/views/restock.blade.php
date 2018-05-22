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
        Transaksi Pembelian
        <small>Preview</small>
      </h1>
      <ol class="breadcrumb">
        <li><i class="fa fa-dashboard"></i> Home</li>
        <li>Barang</li>
        <li>Barang</li>
        <li>Transaksi Pembelian </li>
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
                <label>Tanggal Pembelian :</label>
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
              <div class="form-group">
                <label>Pemasok</label>
                <select class="form-control" style="width: 400px;">
                  <option selected="selected">Indotama</option>
                  <option>Semen Gresik</option>
                </select>
              </div>
              <!-- /.form-group -->
              <div class="form-group" style="width: 250px">
                <label>No Telp :</label> 
                <!-- text input -->
                <input type="text" class="form-control" placeholder="">
              </div>
              <!-- /.form-group -->
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
                <label>ID Beli :</label> 
                <!-- text input -->
                <input type="text" class="form-control" placeholder="">
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group" style="width: 100%;">
                <label>Nama Barang :</label> 
                <!-- text input -->
                <select class="form-control">
                  <option selected="selected">Papan</option>
                  <option>Semen</option>
                </select>
              </div>
            </div>
            <div class="col-md-2">
              <!-- /.form-group -->
              <div class="form-group" style="width: 100%;">
                <label>Jumlah :</label> 
                <!-- text input -->
                <input type="text" class="form-control" placeholder="">
              </div>
            </div>
            <div class="col-md-2">
              <!-- /.form-group -->
              <div class="form-group" style="width: 100%">
                <label>Harga Beli :</label> 
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
        <div class="box-header">
          <h3 class="box-title">Daftar Pembelian Barang</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body" style="background-color: #d2d6de">
          <div class="row">
            <div class="col-md-12">
              <table class="table table-bordered">
                <tr style="background-color: #f2f2f2">
                  <th style="width: 15px" class="text-center">No</th>
                  <th class="text-center">Nama Barang</th>
                  <th style="width: 100px" class="text-center">Jumlah</th>
                  <th style="width: 150px" class="text-center">Harga Beli</th>
                  <th style="width: 150px" class="text-center">Total Harga</th>
                  <th style="width: 100px"></th>
                </tr>
                <tr class="text-center">
                  <td>1</td>
                  <td>Semen</td>
                  <td>3</td>
                  <td>50000</td>
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
            <a href="{{URL::to('barang')}}" class="btn btn-default" style="margin-top: 25px">Kembali</a>
          </div>
          <div class="col-md-6">
            <a href="{{URL::to('')}}" class="btn btn-primary pull-right" style="margin-top: 25px">Selesai</a>
          </div>
          <div class="col-md-12">
            <p style="margin-top: 25px">*klik selesai jika semua barang yang dibeli pada saat ini sudah masuk ke dalam tabel</p>
          </div>
        </div>
        <!-- /.box-body -->
        </div>
      </div>
      <!-- /.box -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  
  @include ('footer')
</div>
<!-- ./wrapper -->


<!-- Page script -->
<script>
  $(function () {
    //Initialize Select2 Elements
    $('.select2').select2()

    //Datemask dd/mm/yyyy
    $('#datemask').inputmask('dd/mm/yyyy', { 'placeholder': 'dd/mm/yyyy' })
    //Datemask2 mm/dd/yyyy
    $('#datemask2').inputmask('mm/dd/yyyy', { 'placeholder': 'mm/dd/yyyy' })
    //Money Euro
    $('[data-mask]').inputmask()

    //Date range picker
    $('#reservation').daterangepicker()
    //Date range picker with time picker
    $('#reservationtime').daterangepicker({ timePicker: true, timePickerIncrement: 30, format: 'MM/DD/YYYY h:mm A' })
    //Date range as a button
    $('#daterange-btn').daterangepicker(
      {
        ranges   : {
          'Today'       : [moment(), moment()],
          'Yesterday'   : [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
          'Last 7 Days' : [moment().subtract(6, 'days'), moment()],
          'Last 30 Days': [moment().subtract(29, 'days'), moment()],
          'This Month'  : [moment().startOf('month'), moment().endOf('month')],
          'Last Month'  : [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
        },
        startDate: moment().subtract(29, 'days'),
        endDate  : moment()
      },
      function (start, end) {
        $('#daterange-btn span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))
      }
    )

    //Date picker
    $('#datepicker').datepicker({
      autoclose: true
    })

    //iCheck for checkbox and radio inputs
    $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
      checkboxClass: 'icheckbox_minimal-blue',
      radioClass   : 'iradio_minimal-blue'
    })
    //Red color scheme for iCheck
    $('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
      checkboxClass: 'icheckbox_minimal-red',
      radioClass   : 'iradio_minimal-red'
    })
    //Flat red color scheme for iCheck
    $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
      checkboxClass: 'icheckbox_flat-green',
      radioClass   : 'iradio_flat-green'
    })

    //Colorpicker
    $('.my-colorpicker1').colorpicker()
    //color picker with addon
    $('.my-colorpicker2').colorpicker()

    //Timepicker
    $('.timepicker').timepicker({
      showInputs: false
    })
  })
</script>
</body>
</html>
