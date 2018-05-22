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
        <small>Control Panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Pembelian</a></li>
        <li class="active">Data Transaksi Pembelian</li>
      </ol>
    </section>
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Tabel Data Transaksi Pembelian</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th style="text-align:center">ID</th>
                    <th style="text-align:center">Tanggal Pembelian</th>
                    <th style="text-align:center">Tanggal Jatuh Tempo</th>
                    <th style="text-align:center">Barang</th>
                    <th style="text-align:center">Pemasok</th>
                    <th style="text-align:center">Total</th>
                    <th style="text-align:center">Status</th>
                    <th></th>
                  </tr>
                </thead>
                <tbody>
                @foreach($data as $datas)
                <tr>
                  <td>{{$datas->id_pembelian}}</td>
                  <td>{{date_format(date_create("$datas->tanggal_pembelian"), "d F Y")}}</td>
                  <td>{{date_format(date_create("$datas->tanggal_jatuh_tempo"), "d F Y")}}</td>
                  <td>{{$datas->nama_barang}}</td>
                  <td>{{$datas->nama_pemasok}}</td>
                  <td>{{$datas->total_bayar}}</td>
                  <td>{{$datas->status}}</td>
                  <td>
                    <a href="" class="btn btn-info btn-xs"></i>Detail</a>
                    <a href="{{route('pelunasan_hutang.show', $datas->id_pembelian)}}" class="btn btn-success btn-xs"></i>Hutang</a>
                    <a href="#" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i></a> 
                  </td>
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
</body>
</html>
