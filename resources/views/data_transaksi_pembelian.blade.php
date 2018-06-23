<!DOCTYPE html>
<html>
  @include ('head')
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
  @include ('header')
  @include ('sidebar')
  <div class="content-wrapper">
    @include('sweet::alert')
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Transaksi Pembelian
      </h1>
      <ol class="breadcrumb">
        <li><i class="fa fa-minus"> Pembelian</i></li>
        <li>Data Transaksi Pembelian</li>
      </ol>
    </section>
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header" style="background-color: #1B4F72">
              <h3 class="box-title" style="color: #FDFEFE">Tabel Data Transaksi Pembelian</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body" style="background-color: #d2d6de">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th style="text-align:center">ID</th>
                    <th style="text-align:center">Tanggal Pembelian</th>
                    <th style="text-align:center">Jatuh Tempo</th>
                    <th style="text-align:center">Cara Pembelian</th>
                    <th style="text-align:center">Pemasok</th>
                    <th style="text-align:center">Total</th>
                    <th></th>
                  </tr>
                </thead>
                <tbody>
                @foreach($data as $datas)
                <tr>
                  <td>{{$datas->id_pembelian}}</td>
                  <td>{{date_format(date_create("$datas->tanggal_pembelian"), "d F Y")}}</td>
                  <td>{{date_format(date_create("$datas->tanggal_jatuh_tempo"), "d F Y")}}</td>
                  <td>{{$datas->cara_pembelian}}</td>
                  <td>{{$datas->nama_pemasok}}</td>
                  <td style="text-align: right;">{{ number_format($datas->total_bayar, 2)}}</td>
                  <td>
                    <a href="{{route('detail.show', $datas->id_pembelian)}}" class="btn btn-info btn-xs"></i>Detail</a>
                    @if($datas->cara_pembelian=='Kredit')
                    @if($datas->sisa_hutang==0)
                    <button type="button" class="btn btn-primary btn-xs disabled" data-toggle="modal" data-target="#update{{$datas->id_pembelian}}">Ubah Jatuh Tempo</button>
                    <a href="{{route('lihat_hutang.show', $datas->id_pembelian)}}" class="btn btn-success btn-xs"></i>Lunas</a>
                    @else
                    <button type="button" class="btn btn-primary btn-xs" data-toggle="modal" data-target="#update{{$datas->id_pembelian}}">Ubah Jatuh Tempo</button>
                    <a href="{{route('lihat_hutang.show', $datas->id_pembelian)}}" class="btn btn-warning btn-xs"></i>Hutang</a>
                    @endif
                    @endif
                    <a href="{{url('printBeli', $datas->id_pembelian)}}" class="btn btn-primary btn-xs"></i>cetak</a>
                  </td>
                </tr>
                <div class="modal fade" id="update{{$datas->id_pembelian}}">
                  <div class="modal-dialog">
                    <form action="{{route('tanggal_beli.update', $datas->id_pembelian)}}" method="post">
                        {{ csrf_field() }}
                        {{ method_field('PUT') }}
                      <div class="modal-content">
                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span></button>
                          <h4 class="modal-title">Ubah Tanggal Jatuh Tempo</h4>
                        </div>
                        <div class="modal-body">
                          <div class="form-group">
                            <label>Tanggal Jatuh Tempo :</label>
                            <div class="input-group date" style="width: 250px">
                              <div class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                              </div>
                              <input type="text" class="form-control pull-right" id="datepickerdd{{$datas->id_pembelian}}" name="jatuhtempo" required>
                            </div>
                          </div>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Tutup</button>
                          <input type="submit" class="btn btn-primary" value="Simpan">
                        </div>  
                      </div>
                    </form>
                  </div>
                </div>
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
    $('#datepickerx').datepicker({
      autoclose: true
    })

   @foreach($data as $key)
    //Date picker
    $('#datepickerdd{{$key->id_pembelian}}').datepicker({
      autoclose: true
    })
    @endforeach

    //Timepicker
    // $('.timepicker').timepicker({
    //   showInputs: false
    // })
  })
</script>
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
