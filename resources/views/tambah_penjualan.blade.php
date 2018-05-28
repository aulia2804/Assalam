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
                    <th style="text-align: center;">Tanggal Penjualan</th>
                    <th style="text-align: center;">Cara</th>
                    <th></th>
                  </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>{{$id->id_penjualan}}</td>
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
                  <input type="submit" class="btn btn-success" style="margin-top: 25px" value="Tambah Barang">
                </div>  
              </form>     
              </div>
              <!-- /.box-body -->
            </div>
            <!-- /.box -->
          </div>
          <!-- / .col -->
        </div>
        <!-- / .col -->
      </div>
      <!-- / .row -->
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
                  <button type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#hapus{{$details->id_detail_penjualan}}">Hapus</button>
                </td>
              </tr>
              <div class="modal fade" id="hapus{{$details->id_detail_penjualan}}">
                <div class="modal-dialog" style="witdh:400px">
                  <div class="modal-content" >
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                      <h4 class="modal-title">Peringatan</h4>
                    </div>
                    <div class="modal-body">
                      <!-- text input -->
                      <p>Anda yakin ingin menghapus {{$details->nama_barang}}?</p>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Batal</button>
                      <form action="{{route('hapus_detail.destroy' , $details->id_detail_penjualan ) }}" method="POST">
                          {{ csrf_field() }}
                          {{ method_field('DELETE') }}
                          <button class="btn btn-danger">Hapus</button>
                      </form> 
                    </div>
                  </div>
                  <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
              </div>
              <!-- /.modal --> 
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
          <form action="{{url('dpjual')}}" method="POST">
            {{ csrf_field() }}
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
          <div class="col-md-12">
            <input type="submit" class="btn btn-primary pull-right" style="margin-top: 25px" value="Selesai">
          </div>
          </form>
          <div class="col-md-6">
            <button type="button" class="btn btn-danger" style="margin-top: 25px" data-toggle="modal" data-target="#delete">Batalkan Penjualan</button>
          </div>
          <div class="modal fade" id="delete">
            <div class="modal-dialog" style="witdh:400px">
              <div class="modal-content" >
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                  <h4 class="modal-title">Peringatan</h4>
                </div>
                <div class="modal-body">
                  <!-- text input -->
                  <p>Anda yakin ingin membatalkan penjualan saat ini?</p>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Batal</button>
                  <a href="{{url('hapus_penjualan')}}" class="btn btn-danger">Hapus</a>
                </div>
              </div>
              <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
          </div>
          <!-- /.modal --> 
          <div class="col-md-12">
            <p style="margin-top: 25px">*PERINGATAN! membatalkan pembelian akan menghapus data pembelian saat ini</p>
            <p>*klik selesai jika semua barang yang dibeli pada saat ini sudah masuk ke dalam tabel</p>
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
