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
      <div class="row">
        <div class="col-md-12">
          <div class="col-md-7">
            <div class="box box-default">
              <div class="box-header with-border">
                <h3 class="box-title">Transaksi</h3>
              </div>
              <!-- /.box-header -->
              <div class="box-body" style="background-color: #d2d6de">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th style="text-align: center;">ID</th>
                    <th style="text-align: center;">Tanggal Pembelian</th>
                    <th style="text-align: center;">Cara</th>
                    <th></th>
                  </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>{{$id->id_pelanggan}}</td>
                      <td>{{date('d F Y', strtotime($id->tanggal_penjualan))}}</td>
                      <td>{{$id->cara_penjualan}}</td>
                      <td>
                        <a href="" class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></a>
                      </td>
                    </tr>
                  </tbody>
                </table>  
              </div>
              <!-- /.box-body -->
            </div>
            <!-- /.box -->
            <div class="box box-default">
              <div class="box-header with-border">
                <h3 class="box-title">Pelanggan</h3>
              </div>
              <!-- /.box-header -->
              <div class="box-body" style="background-color: #d2d6de">
                <table id="example2" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th style="text-align: center;">Nama</th>
                    <th style="text-align: center;">Kontak</th>
                    <th style="text-align: center;">Alamat</th>
                    <th></th>
                  </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>{{$id->nama_pelanggan}}</td>
                      <td>{{$id->kontak_pelanggan}}</td>
                      <td>{{$id->alamat_pelanggan}}</td>
                      <td>
                        <a href="" class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></a>
                      </td>
                    </tr>
                  </tbody>
                </table>  
              </div>
              <!-- /.box-body -->
            </div>
            <!-- /.box -->
          </div>
          <div class="col-md-5">
            <div class="box box-default">
              <div class="box-header with-border">
                <h3 class="box-title">Barang</h3>
              </div>
              <!-- /.box-header -->
              <div class="box-body" style="background-color: #d2d6de">
                <form action="{{route('tambah_penjualan.store')}}" method="POST">
                  {{ csrf_field() }}
                <div class="form-group">
                  <label style="width: 100%;">Nama Barang :</label>
                  <select class="form-control select2" style="width:75%;" name="barang" id="barang" value="{{ old('barang') }}">
                    <option value="">Pilih Barang</option>
                    @foreach($barang as $barangs)
                    <option value="{{$barangs->id_barang}}">{{$barangs->nama_barang}}</option>
                    @endforeach
                  </select>
                </div>
                <!-- /.form-group -->
                <div class="form-group">
                  <label>Harga Barang :</label>
                  <!--input-->
                  <input type="text" class="form-control" style="width: 75%;" name="harga" id="harga" readonly value="{{ old('harga') }}">
                </div>
                <!-- /.form group -->
                <div class="form-group">
                  <label>Jumlah Barang :</label>
                  <!--input-->
                  <input type="text" class="form-control" style="width: 150px" name="jumlah" value="{{ old('jumlah') }}">
                  <label style="float: left; font-size: 12px; color:red;">{{(string)Session::get('message')}}</label>
                </div>
                <!-- /.form-group -->
                <div class="form-group" style="text-align: center;">
                  <input type="submit" class="btn btn-success" style="margin-top: 25px" value="Tambah">
                </div>  
              </form>     
              </div>
              <!-- /.box-body -->
            </div>
            <!-- /.box -->
          </div>
        </div>
      </div>
      <div class="box box-default">
        <div class="box-header">
          <h3 class="box-title">Daftar Barang</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body" style="background-color: #d2d6de">
          <table id="example3" class="table table-bordered table-striped">
            <thead>
            <tr>
              <th style="text-align: center;">ID Detail</th>
              <th style="text-align: center;">Barang</th>
              <th style="text-align: center;">Harga</th>
              <th style="text-align: center;">Jumlah</th>
              <th style="text-align: center;">Sub Total</th>
              <th></th>
            </tr>
            </thead>
            <tbody>
              @foreach($detail as $details)
              <tr>
                <td>{{$details->id_detail_penjualan}}</td>
                <td>{{$details->nama_barang}}</td>
                <td>{{$details->harga_jual}}</td>
                <td>{{$details->jumlah_barang}}</td>
                <td>{{$details->total_harga}}</td>
                <td>
                  <a href="" class="btn btn-danger btn-xs">Hapus</a>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>     
          <div class="box-body">
            <div class="row">
              <div class="col-md-10">
                <label class="pull-right">
                  Total
                </label>
              </div>
              <div class="col-md-2">
                <label>
                  {{$data_total->total_bayar}}
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
                <input type="text" class="form-control" name="uangmuka" style="width: 80%;">
              </div>
            </div>
          </div>
        
          <div class="col-md-6">
            <a href="" class="btn btn-default" style="margin-top: 25px">Kembali</a>
          </div>
          <div class="col-md-6">
            <a href="" class="btn btn-primary pull-right" style="margin-top: 25px">Selesai</a>
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
    'paging'      : true,
    'lengthChange': true,
    'searching'   : false,
    'ordering'    : true,
    'info'        : true,
    'autoWidth'   : true
    })
  })
</script>

<script>
  $(function () {
    $('#example2').DataTable({
    'paging'      : true,
    'lengthChange': true,
    'searching'   : true,
    'ordering'    : true,
    'info'        : true,
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