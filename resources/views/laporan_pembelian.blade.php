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
    <section class="content-header">
      <h1>
        Laporan Pembelian
      </h1>
      <ol class="breadcrumb">
        <li><i class="fa fa-folder"> Laporan</i></li>
        <li>Laporan Pembelian</li>
      </ol>
    </section>
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Laporan Transaksi Pembelian</h3>
            </div>
            <div class="col-xs-8">
              <a href="{{url('printPembelian')}}" class="btn btn-primary" style="margin-bottom: 10px"><i class="fa fa-print"></i> Unduh PDF</a>
            </div>
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th style="text-align:center">No</th>
                    <th style="text-align:center">Tanggal Pembelian</th>
                    <th style="text-align:center">Jatuh Tempo</th>
                    <th style="text-align:center">Cara Pembelian</th>
                    <th style="text-align:center">Pemasok</th>
                    <th style="text-align:center">Total</th>
                    <th style="text-align:center">Pegawai</th>
                  </tr>
                </thead>
                <tbody>
                <?php $no=1; ?>
                @foreach($data as $datas)
                <tr>
                  <td>{{$no++}}</td>
                  <td>{{date_format(date_create("$datas->tanggal_pembelian"), "d F Y")}}</td>
                  <td>{{date_format(date_create("$datas->tanggal_jatuh_tempo"), "d F Y")}}</td>
                  <td>{{$datas->cara_pembelian}}</td>
                  <td>{{$datas->nama_pemasok}}</td>
                  <td>{{$datas->total_bayar}}</td>
                  <td>{{$datas->nama_pengguna}}</td>
                </tr>
                @endforeach
                </tbody>
              </table>
            </div>
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Laporan Detail Pembelian</h3>
            </div>
            <!-- /.box-header -->
            <div class="col-xs-8">
              <a href="" class="btn btn-primary" style="margin-bottom: 10px"><i class="fa fa-print"></i> Unduh PDF</a>
            </div>
            <div class="box-body">
              <table id="example2" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th style="text-align:center">No</th>
                    <th style="text-align:center">Tanggal</th>
                    <th style="text-align:center">Barang</th>
                    <th style="text-align:center">Jumlah</th>
                    <th style="text-align:center">Harga</th>
                    <th style="text-align:center">Subtotal</th>
                  </tr>
                </thead>
                <tbody>
                <?php $no=1; ?>
                @foreach($data1 as $datas)
                <tr>
                  <td>{{$no++}}</td>
                  <td>{{date_format(date_create("$datas->tanggal_pembelian"), "d F Y")}}</td>
                  <td>{{$datas->nama_barang}}</td>
                  <td>{{$datas->jumlah_barang}}</td>
                  <td>{{$datas->harga_beli}}</td>
                  <td>{{$datas->total_harga}}</td>
                </tr>
                @endforeach
                </tbody>
              </table>
            </div>
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  @include ('footer')
</div>
<!-- ./wrapper -->
<script>
  $(function () {
    $('#example1').DataTable({
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
</body>
</html>
