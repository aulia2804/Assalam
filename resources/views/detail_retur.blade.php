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
        Detail Retur Pembelian
      </h1>
      <ol class="breadcrumb">
        <li><i class="fa fa-minus"> Pembelian</i></li>
        <li>Data Retur Pembelian</li>
        <li>Detail Retur Pembelian</li>
      </ol>
    </section>
    <section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="row">
            <div class="col-md-6">
              <div class="box box-default">
                <div class="box-header with-border" style="background-color: #1B4F72">
                  <h3 class="box-title" style="color: #FDFEFE">Transaksi</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body" style="background-color: #d2d6de">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                      <th style="text-align: center;">ID</th>
                      <th style="text-align: center;">Tanggal Retur</th>
                    </tr>
                    </thead>
                    <tbody>
                      @foreach($aa as $ar)
                      <tr>
                        <td>{{$ar->id_retur_pembelian}}</td>
                        <td>{{date_format(date_create("$ar->tanggal_retur"), "d F Y")}}</td>
                      </tr>
                      @endforeach
                    </tbody>
                  </table>  
                </div>
                <!-- /.box-body -->
              </div>
              <!-- /.box -->
            </div>
            <!-- / .col -->
            <div class="col-md-6">
              <div class="box box-default">
                <div class="box-header with-border" style="background-color: #1B4F72">
                  <h3 class="box-title" style="color: #FDFEFE">Pemasok</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body" style="background-color: #d2d6de">
                  <table id="example2" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                      <th style="text-align: center;">Nama</th>
                      <th style="text-align: center;">Kontak</th>
                      <th style="text-align: center;">Alamat</th>
                    </tr>
                    </thead>
                    <tbody>
                      @foreach($bb as $br)
                      <tr>
                        <td>{{$br->nama_pemasok}}</td>
                        <td>{{$br->kontak_pemasok}}</td>
                        <td>{{$br->alamat_pemasok}}</td>
                      </tr>
                      @endforeach
                    </tbody>
                  </table>  
                </div>
                <!-- /.box-body -->
              </div>
              <!-- /.box -->
            </div>
            <!-- / .col -->
          </div>
          <!-- / .row -->
        </div>
        <!-- / .col -->
        <div class="col-md-12">
          <div class="box box-default">
            <div class="box-header with-border" style="background-color: #1B4F72">
              <h3 class="box-title" style="color: #FDFEFE">Detail Barang</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body" style="background-color: #d2d6de">
              <table id="example3" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th style="text-align: center;">ID</th>
                  <th style="text-align: center;">Nama Barang</th>
                  <th style="text-align: center;">jumlah</th>
                  <th style="text-align: center;">Harga</th>
                  <th style="text-align: center;">Total Harga</th>
                  <th style="text-align: center;">Deskripsi</th>
                </tr>
                </thead>
                <tbody>
                  @foreach($cc as $cr)
                  <tr>
                    <td>{{$cr->id_detail_retur}}</td>
                    <td>{{$cr->nama_barang}}</td>
                    <td>{{$cr->jumlah_barang}}</td>
                    <td style="text-align: right;">{{ number_format($cr->harga_beli, 2)}}</td>
                    <td style="text-align: right;">{{ number_format($cr->total_harga, 2)}}</td>
                    <td>{{$cr->deskripsi_retur}}</td>
                  </tr>
                  @endforeach
                </tbody>
              </table>  
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- / .col -->
      </div>
      <!-- / .row -->
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

<script>
  $(function () {
    $('#example1').DataTable({
    'paging'      : false,
    'lengthChange': true,
    'searching'   : false,
    'ordering'    : true,
    'info'        : false,
    'autoWidth'   : true
    })
  })
</script>

<script>
  $(function () {
    $('#example2').DataTable({
    'paging'      : false,
    'lengthChange': true,
    'searching'   : false,
    'ordering'    : true,
    'info'        : false,
    'autoWidth'   : true
    })
  })
</script>

<script>
  $(function () {
    $('#example3').DataTable({
    'paging'      : true,
    'lengthChange': true,
    'searching'   : true,
    'ordering'    : true,
    'info'        : true,
    'autoWidth'   : true
    })
  })
</script>

<script type="text/javascript">
  $('#barang').change(function(e){
    var barang = $(this).val();
    $.ajax({
      url:'/autocomplete/'+barang,
      type:'GET',
      timeout:30000,
      success:function(e){
        if (e.length==0) {
          $('#harga').val('');
        }else{
          $('#harga').val(e[0].harga_jual);
        }
      }
    })
  })
</script>

</body>
</html>
