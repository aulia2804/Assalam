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
      </h1>
      <ol class="breadcrumb">
        <li><i class="fa fa-plus"> Penjualan</i></li>
        <li>Data Transaksi Penjualan</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header" style="background-color: #1B4F72">
              <h3 class="box-title" style="color: #FDFEFE">Tabel Data Transaksi Penjualan</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body" style="background-color: #d2d6de">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th style="text-align:center">ID</th>
                    <th style="text-align:center">Tanggal Penjualan</th>
                    <th style="text-align:center">Pelanggan</th>
                    <th style="text-align:center">Total</th>
                    <th style="text-align:center">Uang Muka</th>
                    <th></th>
                  </tr>
                </thead>
                <tbody>
                @foreach($data as $datas)
                <tr>
                  <td>{{$datas->id_penjualan}}</td>
                  <td>{{date_format(date_create("$datas->tanggal_penjualan"), "d F Y")}}</td>
                  <td>{{$datas->nama_pelanggan}}</td>
                  <td style="text-align: right;">{{ number_format($datas->total_bayar, 2)}}</td>
                  <td style="text-align: right;">{{ number_format($datas->uang_muka, 2)}}</td>
                  <td>
                    <a href="{{route('detail_penjualan.show',$datas->id_penjualan)}}" class="btn btn-info btn-xs">Detail</a>
                    @if($datas->sisa_piutang==0)
                    <a href="{{route('lihat_piutang.show', $datas->id_penjualan)}}" class="btn btn-success btn-xs">Lunas</a>
                    @else
                    <a href="{{route('lihat_piutang.show', $datas->id_penjualan)}}" class="btn btn-warning btn-xs">Piutang</a>
                    @endif
                    <a href="{{url('printJual', $datas->id_penjualan)}}" class="btn btn-primary btn-xs">Cetak</a>
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

