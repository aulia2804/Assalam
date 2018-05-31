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
        Transaksi Pembelian
      </h1>
      <ol class="breadcrumb">
        <li><i class="fa fa-minus"> Pembelian</i></li>
        <li>Transaksi Pembelian</a></li>
      </ol>
    </section>
    <section class="content">
      <div class="col-md-12">
        <div class="col-md-3"></div>
        <div class="col-md-6">
          <div class="box box-default">
            <div class="box-header with-border">
              <h3 class="box-title">Transaksi</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body" style="background-color: #d2d6de;">
              <form action="{{route('transaksi_pembelian.store')}}" method="post">
                  {{ csrf_field() }}
              <div class="row" style="padding: 20px">
                <!-- Date -->
                <div class="form-group">
                  <label>Tanggal Pembelian :</label>
                  <!--input-->
                  <div class="input-group date" style="width: 250px">
                    <div class="input-group-addon">
                      <i class="fa fa-calendar"></i>
                    </div>
                    <input type="text" class="form-control pull-right" id="datepicker" name="tanggal" >
                  </div>
                  <!-- /.input group -->
                </div>
                <!-- /.form group -->
                <div class="form-group">
                  <label>Pembayaran :</label>
                  <select class="form-control" style="width: 200px" name="cara">
                    <option selected="selected" value="Tunai">Tunai</option>
                    <option value="Kredit">Kredit</option>
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
                    <input type="text" class="form-control pull-right" id="datepicker1" name="kredit">
                  </div>
                  <!-- /.input group -->
                </div>
                <!-- /.form group -->
                <div class="form-group" style="text-align: center; padding-top: 20px" >
                  <input type="submit" class="btn btn-success" value="Simpan">
                </div>
              </div>
              <!-- /.row -->
              </form>  
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
      </div>
      
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

    //Date picker
    $('#datepicker').datepicker({
      autoclose: true
    })

    //Date picker
    $('#datepicker1').datepicker({
      autoclose: true
    })

    //Timepicker
    $('.timepicker').timepicker({
      showInputs: false
    })
  })
</script>

<script type="text/javascript">
  $('#pemasok').change(function(e){
    var pemasok = $(this).val();
    $.ajax({
      url:'/autocomplete/'+pemasok,
      type:'GET',
      timeout:30000,
      success:function(e){
        if (e.length==0) {
          $('#kontak').val('');
          $('#alamat').val('');
        }else{
          $('#kontak').val(e[0].kontak_pemasok);
          $('#alamat').val(e[0].alamat_pemasok);
        }
      }
    })
  })
</script>

</body>
</html>
