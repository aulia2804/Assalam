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
        <li>Data Retur Pembelian</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Tabel Data Retur Pembelian</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th style="text-align:center">ID</th>
                    <th style="text-align:center">Tanggal Retur</th>
                    <th style="text-align:center">Barang</th>
                    <th style="text-align:center">Pemasok</th>
                    <th style="text-align:center">Jumlah Barang</th>
                    <th style="text-align:center">Keterangan</th>
                    <th></th>
                  </tr>
                </thead>
                <tbody>
                @foreach($data as $datas)
                <tr>
                  <td>{{$datas->id_retur_pembelian}}</td>
                  <td>{{date_format(date_create("$datas->tanggal_retur"), "d F Y")}}</td>
                  <td>{{$datas->nama_barang}}</td>
                  <td>{{$datas->nama_pemasok}}</td>
                  <td>{{$datas->jumlah_barang}}</td>
                  <td>{{$datas->deskripsi_retur}}</td>
                  <td>
                    <a href="#" class="btn btn-info btn-xs"></i>Detail</a>
                    <a href="#" class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></a> 
                    <a href="#" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i></a> 
                  </td>
                </tr>
                @endforeach
                </tbody>
              </table>
            </div>
            <!-- /.box-body -->
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
  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 2.4.0
    </div>
    <strong>Copyright &copy; 2018 <a href="https://adminlte.io">Toko Bangunan Assalam Jaya</a>.</strong> All rights
    reserved.
  </footer>
</div>
@include ('footer')
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
