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
        Pelunasan Hutang
        <small>Control Panel</small>
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Tabel Riwayat Pelunasan Hutang</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example99" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th style="text-align:center">ID</th>
                    <th style="text-align:center">ID Pembelian</th>
                    <th style="text-align:center">Tanggal Pelunasan Hutang</th>
                    <th style="text-align:center">Bayar</th>
                    <th style="text-align:center">Sisa</th>
                    <th style="text-align:center">Status</th>
                    <th style="text-align:center"></th>
                    <th></th>
                  </tr>
                </thead>
                <tbody>
                @foreach($data as $datas)
                <tr>
                  <td>{{$datas->id_pelunasan_hutang}}</td>
                  <td>{{$datas->id_pembelian}}</td>
                  <td>{{date_format(date_create("$datas->tanggal_pelunasan_hutang"), "d F Y")}}</td>
                  <td>{{$datas->bayar_hutang}}</td>
                  <td>{{$datas->sisa_hutang}}</td>
                  <td>{{$datas->status}}</td>
                  <td>
                    <a href="" class="btn btn-info btn-xs"></i>Detail</a>
                    <a href="" class="btn btn-success btn-xs"></i>Hutang</a>
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


<!-- Page script -->
<script>
  $(function () {
    $('#example99').DataTable({
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
