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
        Retur Pembelian
      </h1>
      <ol class="breadcrumb">
        <li><i class="fa fa-minus"> Pembelian</i></li>
        <li>Retur Pembelian</li>
      </ol>
    </section>
    <section class="content">
      <div class="col-md-12">
        <div class="col-md-3"></div>
        <div class="col-md-6">
          <div class="box box-default">
            <div class="box-header with-border" style="background-color: #1B4F72">
              <h3 class="box-title" style="color: #FDFEFE">Retur</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body" style="background-color: #d2d6de">
              <form action="{{route('retur_pembelian.store')}}" method="post">
                  {{ csrf_field() }}
              <div class="row" style="padding: 20px">
                <div class="form-group">
                  <label>Tanggal Retur Pembelian :</label>
                  <!--input-->
                  <div class="input-group date" style="width: 250px">
                    <div class="input-group-addon">
                      <i class="fa fa-calendar"></i>
                    </div>
                    <input type="text" class="form-control pull-right" id="datepicker" name="tanggal" required>
                  </div>
                  <!-- /.input group -->
                  <label style="float: left; font-size: 12px; color:red;">{{(string)Session::get('message1')}}</label> 
                  <label style="float: left; font-size: 12px; color:red;">{{(string)Session::get('message2')}}</label> 
                </div>
                <!-- /.form group -->
                <div class="form-group">
                  <label style="width: 100%;">ID Pembelian :</label>
                  <select class="form-control select2" style="width:50%;" name="pembelian" id="pembelian" required>
                    <option value="">Pilih Id Pembelian</option>
                    @foreach($pembelian as $pembelians)
                    <option value="{{$pembelians->id_pembelian}}">{{$pembelians->id_pembelian}}</option>
                    @endforeach
                  </select>
                </div>
                <div class="form-group" style="text-align: center; padding-top: 20px" >
                  <input type="submit" class="btn btn-success" value="Simpan">
                </div>
              </div>
              <!-- /.row -->
              </form>
              <!-- /.form-group -->
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
    //Timepicker
    $('.timepicker').timepicker({
      showInputs: false
    })
  })
</script>

<script type="text/javascript">
  $('#pembelian').change(function(e){
    var pembelian = $(this).val();
    $.ajax({
      url:'/autocomplete/'+pembelian,
      type:'GET',
      timeout:30000,
      success:function(e){
        if (e.length==0) {
          $('#tempo').val('');
        }else{
          $('#tempo').val(e[0].tanggal_jatuh_tempo);
        }
      }
    })
  })
</script>
</body>
</html>
