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
        Beranda
      </h1>
      <ol class="breadcrumb">
        <li><i class="fa fa-dashboard"></i> Beranda</li>
      </ol>
    </section>
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-lg-2 col-xs-3">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
              @foreach($pembelian as $pembelians)
              <h3>{{$pembelians->pembelian}}</h3>
              @endforeach
              <p>Pembelian</p>
            </div>
            <div class="icon">
              <i class="ion ion-pricetag"></i>
            </div>
            <a href="{{URL::to('/data_transaksi_pembelian')}}" class="small-box-footer">Lihat <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-2 col-xs-3">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              @foreach($penjualan as $penjualans)
              <h3>{{$penjualans->penjualan}}</h3>
              @endforeach
              <p>Penjualan</p>
            </div>
            <div class="icon">
              <i class="ion ion-pricetags"></i>
            </div>
            <a href="{{URL::to('/data_transaksi_penjualan')}}" class="small-box-footer">Lihat <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
          <div class="col-lg-3 col-xs-5">
            <!-- small box -->
            <div class="small-box bg-red">
              <div class="inner">
                <h3>{{ number_format($beli->total)}}</h3>
                <p>Pengeluaran</p>
              </div>
              <div class="icon">
                <i class="ion ion-sad"></i>
              </div>
              <a href="#" class="small-box-footer"><i class="fa fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-xs-5">
            <!-- small box -->
            <div class="small-box bg-green">
              <div class="inner">
                <h3>{{ number_format($jual->total)}}</h3>
                <p>Pemasukan</p>
              </div>
              <div class="icon">
                <i class="ion ion-happy"></i>
              </div>
              <a class="small-box-footer"> <i class="fa fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
        <div class="col-lg-2 col-xs-3">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3>{{$barang}}</h3>
              <p>Barang</p>
            </div>
            <div class="icon">
              <i class="ion ion-filing"></i>
            </div>
            <a href="{{URL::to('/barang')}}" class="small-box-footer">Lihat <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
      </div>
      <!-- /.row -->
      <!-- Main row -->
      <div class="row">
        <!-- Left col -->
        <section class="col-md-6">
          <!-- Calendar -->
          <div class="box">
            <div class="box-header" style="background-color: #DF4F43">
              <h3 class="box-title" style="color: #FDFEFE">Peringatan Barang Habis</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body" style="background-color: #d2d6de">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th style="text-align:center">ID</th>
                    <th style="text-align:center">Nama Barang</th>
                    <th style="text-align:center">Jumlah</th>
                  </tr>
                </thead>
                <tbody>
                @foreach($stok as $stoks)
                <tr>
                  <td>{{$stoks->id_barang}}</td>
                  <td>{{$stoks->nama_barang}}</td>
                  <td>{{$stoks->stok}}</td>
                </tr>
                @endforeach
                </tbody>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </section>
        <!-- right col -->
        <section class="col-md-6">
          <!-- Calendar -->
          <div class="box">
            <div class="box-header" style="background-color: #DF4F43">
              <h3 class="box-title" style="color: #FDFEFE">Peringatan Jatuh Tempo</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body" style="background-color: #d2d6de">
              <table id="example2" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th style="text-align:center">ID</th>
                    <th style="text-align:center">Tanggal Jatuh Tempo</th>
                    <th style="text-align:center">Pemasok</th>
                    <th style="text-align:center">Hari - </th>
                  </tr>
                </thead>
                <tbody>
                @foreach($tanggal as $tanggals)
                  <?php 
                    $start_date = date('Y-m-d');
                    $end_date = $tanggals->tanggal_jatuh_tempo;

                    $start    = new \DateTime($start_date);
                    $end      = new \DateTime($end_date);
                    $interval = new \DateInterval('P1D'); // 1 day interval
                    $period   = new \DatePeriod($start, $interval, $end);
                    $jumlah=0;

                    foreach ($period as $day) {
                        $jumlah++;
                    }

                    if($jumlah<10){
                  ?>

                <tr>
                  <td>{{$tanggals->id_pembelian}}</td>
                  <td>{{date_format(date_create("$tanggals->tanggal_jatuh_tempo"), "d F Y")}}</td>
                  <td>{{$tanggals->nama_pemasok}}</td>
                  <td>{{$jumlah}}</td>
                </tr>

                <?php } ?>
                @endforeach
                </tbody>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </section>
        <!-- right col -->
      </div>
      <!-- /.row (main row) -->
      <div class="row">
        <section class="col-md-12">
          <!-- AREA CHART -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Grafik Penjualan dan Pembelian</h3>
            </div>
            <div class="box-body chart-responsive">
              <div id="chartContainer" style="height: 370px; max-width: 920px; margin: 0px auto;"></div>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </section>
      </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  @include ('footer')
</div>
<!-- ./wrapper -->

<script>
  $(function () {
    "use strict";

    // AREA CHART
    var area = new Morris.Area({
      element: 'revenue-chart',
      resize: true,
      data: [
        {y: '2011 Q1', item1: 2666, item2: 2666},
        {y: '2011 Q2', item1: 2778, item2: 2294},
      ],
      xkey: 'y',
      ykeys: ['item1', 'item2'],
      labels: ['Item 1', 'Item 2'],
      lineColors: ['#a0d0e0', '#3c8dbc'],
      hideHover: 'auto'
    });
  });
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
    'searching'   : false,
    'ordering'    : true,
    'info'        : true,
    'autoWidth'   : true
    })
  })
</script>

<script>
window.onload = function () {

var chart = new CanvasJS.Chart("chartContainer", {
  theme:"light2",
  animationEnabled: true,
  axisY :{
    includeZero: false,
    title: "Jumlah Transaksi",
    suffix: ""
  },
  toolTip: {
    shared: "true"
  },
  legend:{
    cursor:"pointer",
    itemclick : toggleDataSeries
  },
  data: [
 
 
  {
    type: "spline", 
    showInLegend: true,
    yValueFormatString: "##",
    name: "Penjualan",
    dataPoints: [
      { label: "Januari", y: <?php echo $bulan13; ?> },
      { label: "Februari", y: <?php echo $bulan14; ?> },
      { label: "Maret", y: <?php echo $bulan15; ?> },
      { label: "April", y: <?php echo $bulan16; ?> },
      { label: "Mei", y: <?php echo $bulan17; ?> },
      { label: "Juni", y: <?php echo $bulan18; ?> },
      { label: "Juli", y: <?php echo $bulan19; ?> },
      { label: "Agustus", y: <?php echo $bulan20; ?> },
      { label: "September", y: <?php echo $bulan21; ?> },
      { label: "Oktober", y: <?php echo $bulan22; ?> },
      { label: "November", y: <?php echo $bulan23; ?> },
      { label: "Desember", y: <?php echo $bulan24; ?> }
    ]
  },
  {
    type: "spline", 
    showInLegend: true,
    yValueFormatString: "##",
    name: "Pembelian",
    dataPoints: [
      { label: "Januari", y: <?php echo $bulan1; ?> },
      { label: "Februari", y: <?php echo $bulan2; ?> },
      { label: "Maret", y: <?php echo $bulan3; ?> },
      { label: "April", y: <?php echo $bulan4; ?> },
      { label: "Mei", y: <?php echo $bulan5; ?> },
      { label: "Juni", y: <?php echo $bulan6; ?> },
      { label: "Juli", y: <?php echo $bulan7; ?> },
      { label: "Agustus", y: <?php echo $bulan8; ?> },
      { label: "September", y: <?php echo $bulan9; ?> },
      { label: "Oktober", y: <?php echo $bulan10; ?> },
      { label: "November", y: <?php echo $bulan11; ?> },
      { label: "Desember", y: <?php echo $bulan12; ?> }
    ]
  }]
});
chart.render();

function toggleDataSeries(e) {
  if (typeof(e.dataSeries.visible) === "undefined" || e.dataSeries.visible ){
    e.dataSeries.visible = false;
  } else {
    e.dataSeries.visible = true;
  }
  chart.render();
}

}
</script>
</body>
</html>
