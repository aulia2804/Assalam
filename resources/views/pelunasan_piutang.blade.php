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
        Pelunasan Piutang
        <small>Control Panel</small>
      </h1>
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
          <div class="row" style="padding-left: 400px">
            <div class="col-md-4">
              <div class="form-group">
                <label>ID Pnjualan :</label>
                <select class="form-control" style="width: 100px">
                  <option selected="selected">1</option>
                  <option>2</option>
                </select>
              </div>
              <!-- /.form-group -->
              <!-- Date -->
              <div class="form-group">
                <label>Tanggal Pelunasan :</label>
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
                <label>Jumlah Bayar :</label> 
                <!-- text input -->
                <input type="text" class="form-control" placeholder="">
              </div>
              <!-- /.form-group -->

              <div class="form-group">
                <label>Sisa Piutang :</label> 
                <!-- text input -->
                <input type="text" class="form-control" placeholder="">
              </div>
              <!-- /.form-group -->

              <div class="form-group">
                <label>Status Piutang :</label> 
                <!-- text input -->
                <input type="text" class="form-control" placeholder="" style="width: 150px">
              </div>
              <!-- /.form-group -->
            </div>
            <!-- /.col -->
          </div>
          <!-- /.row -->
          <div class="col-md-10">
            <button type="submit" class="btn btn-success pull-right" style="margin-top: 25px">Simpan</button>
          </div>
        </div>
        <!-- /.box-body -->
        <div class="box-header">
          <h3 class="box-title">Riwayat Pelunasan Piutang</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body" style="background-color: #d2d6de">
          <div class="row">
            <div class="col-md-12">
              <table class="table table-bordered">
                <tr style="background-color: #f2f2f2">
                  <th style="width: 15px" class="text-center">No</th>
                  <th style="width: 50px" class="text-center">ID Penjualan</th>
                  <th style="width: 100px" class="text-center">Tanggal Pelunasan</th>
                  <th style="width: 100px" class="text-center">Jumlah Bayar</th>
                  <th style="width: 100px" class="text-center">Sisa Bayar</th>
                  <th style="width: 100px" class="text-center">Status Piutang</th>
                </tr>
                <tr class="text-center">
                  <td>1</td>
                  <td>1</td>
                  <td>2018/04/16</td>
                  <td>50000</td>
                  <td>100000</td>
                  <td>Belum Lunas</td>
                </tr>
              </table>
            </div>
          </div>
          <!-- /.row -->
        
          <div class="col-md-6">
            <a href="{{URL::to('data_transaksi_pembelian')}}" class="btn btn-default" style="margin-top: 25px">Kembali</a>
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
