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
        <li>Transaksi Pembelian</li>
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
                    <th style="text-align: center;">Jatuh Tempo</th>
                    <th></th>
                  </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>{{$id->id_pembelian}}</td>
                      <td>{{date('d F Y', strtotime($id->tanggal_pembelian))}}</td>
                      <td>{{$id->cara_pembelian}}</td>
                      <td>{{date('d F Y', strtotime($id->tanggal_jatuh_tempo))}}</td>
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
                <h3 class="box-title">Barang & Pemasok</h3>
              </div>
              <!-- /.box-header -->
              <div class="box-body" style="background-color: #d2d6de">
                <form action="{{route('tambah_barang.store')}}" method="post">
                  {{ csrf_field() }}
                <div class="form-group">
                  <label>Nama Barang :</label>
                  <!--input-->
                  <input type="text" class="form-control" style="width: 75%;" name="barang" >
                </div>
                <!-- /.form group -->
                <div class="form-group">
                  <label>Jumlah Barang :</label>
                  <!--input-->
                  <input type="text" class="form-control" style="width: 100px" name="jumlah" >
                </div>
                <!-- /.form group -->
                <div class="form-group">
                  <label>Harga Beli :</label>
                  <!--input-->
                  <input type="text" class="form-control" style="width: 150px" name="beli" >
                </div>
                <!-- /.form-group -->
                <div class="form-group">
                  <label>Harga Jual :</label>
                  <!--input-->
                  <input type="text" class="form-control" style="width: 150px" name="jual" >
                </div>
                <!-- /.form group -->
                <div class="form-group">
                  <label style="width: 100%;">Satuan :</label>
                  <select class="form-control select2" style="width: 150px" name="satuan">
                    <option value="">Pilih Satuan</option>
                    @foreach($data2 as $datan)
                    <option value="{{$datan->id_satuan}}">{{$datan->nama_satuan}}</option>
                    @endforeach
                  </select>
                  <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modal-satuan"><i class="fa fa-plus"></i></button>
                </div>
                <!-- /.form group -->
                <div class="form-group">
                  <label style="width: 100%;">Pemasok :</label>
                  <select class="form-control select2" style="width:75%;" name="pemasok">
                    <option value="">Pilih Pemasok</option>
                    @foreach($data3 as $datas)
                    <option value="{{$datas->id_pemasok}}">{{$datas->nama_pemasok}}</option>
                    @endforeach
                  </select>
                  <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modal-default"><i class="fa fa-plus"></i></button>
                </div>
                <!-- /.form-group -->
                <div style="text-align: center;">
                  <input type="submit" class="btn btn-success" style="margin-top: 25px" value="Beli Barang">
                </div> 
              </form> 
              <!-- /.form-group -->
              </div>
              <!-- /.box-body -->
            </div>
            <!-- /.box -->
          </div>
        </div>
      </div>
      <div class="box box-default">
        <div class="box-header">
          <h3 class="box-title">Daftar Pembelian Barang</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body" style="background-color: #d2d6de">
          <table id="example2" class="table table-bordered table-striped">
            <thead>
            <tr>
              <th style="text-align: center;">ID Detail</th>
              <th style="text-align: center;">Barang</th>
              <th style="text-align: center;">Jumlah</th>
              <th style="text-align: center;">Harga Beli</th>
              <th style="text-align: center;">Sub Total</th>
              <th></th>
            </tr>
            </thead>
            <tbody>
              @foreach($detail as $details)
              <tr>
                <td>{{$details->id_detail_pembelian}}</td>
                <td>{{$details->nama_barang}}</td>
                <td>{{$details->jumlah_barang}}</td>
                <td>{{$details->harga_beli}}</td>
                <td>{{$details->total_harga}}</td>
                <td>
                  <button type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#del{{$details->id_detail_pembelian}}">Hapus</button>
                </td>
              </tr>
              <div class="modal fade" id="del{{$details->id_detail_pembelian}}">
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
                      <form action="{{route('hapus.destroy' , $details->id_detail_pembelian ) }}" method="POST">
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
          <form action="{{url('dpbeli')}}" method="POST">
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
            <input type="submit" class="btn btn-primary pull-right" style="margin-top: 25px" value="Simpan">
          </div>
          </form>
          <div class="col-md-6">
            <button type="button" class="btn btn-danger" style="margin-top: 25px" data-toggle="modal" data-target="#delete">Batalkan Pembelian</button>
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
                  <p>Anda yakin ingin membatalkan pembelian saat ini?</p>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Batal</button>
                  <a href="{{url('hapus_pembelian')}}" class="btn btn-danger">Hapus</a>
                </div>
              </div>
              <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
          </div>
          <!-- /.modal --> 
          <div class="col-md-12">
            <p style="margin-top: 25px">*klik selesai jika semua barang yang dibeli pada saat ini sudah masuk ke dalam tabel</p>
            <p>*klik "Batalkan Pembelian" untuk membatalkan pembelian</p>
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
  <div class="modal fade" id="modal-default">
    <div class="modal-dialog">
      <form action="{{url('tambah_pemasok')}}" method="post">
        {{ csrf_field() }}
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title">Tambah Pemasok Baru</h4>
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
  <div class="modal fade" id="modal-satuan">
    <div class="modal-dialog">
      <form action="{{url('tambah_satu')}}" method="post">
        {{ csrf_field() }}
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title">Tambah Satuan Baru</h4>
        </div>
        <div class="modal-body">
          <div class="form-group">
            <label>Nama :</label>
            <!--input-->
            <input type="text" class="form-control" style="width: 100%" name="nama" >
          </div>
          <!-- /.form-group -->
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
