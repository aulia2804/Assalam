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
      <div class="box box-default">
        <div class="box-header with-border">
          <h3 class="box-title">Transaksi</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body" style="background-color: #d2d6de">
          <form action="{{route('transaksi_penjualan.store')}}" method="POST">
            {{ csrf_field() }}
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
                  <input type="text" class="form-control pull-right" id="datepicker" name="tanggal">
                </div>
                <!-- /.input group -->
              </div>
              <!-- /.form group -->
              <div class="form-group">
                <label>Pembayaran :</label>
                <select class="form-control" style="width: 200px" name="cara">
                  <option value="">Pilih Jenis Pembayaran</option>
                  <option value="Tunai">Tunai</option>
                  <option value="Kredit">Kredit</option>
                </select>
              </div>
              <!-- /.form-group -->
            </div>
            <!-- /.col -->
            <div class="col-md-6">
              <div class="form-group" style="width: 300px">
                <label>Pelanggan :</label> 
                <select class="form-control select2" style="width: 85%;" id="pelanggan" name="pelanggan">
                  <option value="">Pilih Pelanggan</option>
                  @foreach($pelanggan as $pelanggans)
                  <option value="{{$pelanggans->id_pelanggan}}">{{$pelanggans->nama_pelanggan}}</option>
                  @endforeach
                </select>
                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modal-default"><i class="fa fa-plus"></i></button>
              </div>
              <!-- /.form-group -->
              <div class="form-group" style="width: 250px">
                <label>Kontak :</label> 
                <!-- text input -->
                <input type="text" class="form-control" name="kontak" id="kontak" readonly>
              </div>
              <!-- /.form-group -->
              <div class="form-group" style="width: 400px">
                <label>Alamat :</label> 
                <!-- text input -->
                <input type="text" class="form-control" name="alamat" id="alamat" readonly>
              </div>
              <!-- /.form-group -->
            </div>
            <!-- /.col -->
          </div>
          <!-- /.row -->
          <div class="col-md-10">
            <input type="submit" class="btn btn-success pull-right" value="Simpan">
          </div>
          </form>
        </div>
        <!-- /.box-body -->
      </div>
      <!-- /.box -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <div class="modal fade" id="modal-default">
    <div class="modal-dialog">
      <!-- url(nama route yang di web.php)-->
      <form action="{{url('tambah_pelanggan')}}" method="post">
        {{ csrf_field() }}
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title">Tambah Pelanggan Baru</h4>
        </div>
        <div class="modal-body">
          <div class="form-group">
            <label>Nama :</label>
            <!--input-->
            <input type="text" class="form-control" style="width: 100%" name="nama" >
          </div>
          <!-- /.form-group -->
          <div class="form-group">
            <label>Kontak :</label>
            <!--input-->
            <input type="text" class="form-control" style="width: 100%" name="kontak" >
          </div>
          <!-- /.form group -->
          <div class="form-group">
            <label>Alamat :</label>
            <!--input-->
            <input type="text" class="form-control" style="width: 100%" name="alamat" >
          </div>
          <!-- /.form group -->
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Tutup</button>
          <input type="submit" class="btn btn-primary" value="Simpan">
        </div>
      </div>
      </form>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
  <!-- /.modal -->
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
  $('#pelanggan').change(function(e){
    var pelanggan = $(this).val();
    $.ajax({
      url:'/autocomplete/'+pelanggan,
      type:'GET',
      timeout:30000,
      success:function(e){
        if (e.length==0) {
          $('#kontak').val('');
          $('#alamat').val('');
        }else{
          $('#kontak').val(e[0].kontak_pelanggan);
          $('#alamat').val(e[0].alamat_pelanggan);
        }
      }
    })
  })
</script>
</body>
</html>
