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
        <li><i class="fa fa-plus"> Pembelian</i></li>
        <li>Transaksi Pembelian</li>
      </ol>
    </section>
    <section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="row">
            <div class="col-md-5">
              <div class="box box-default">
                <div class="box-header with-border">
                  <h3 class="box-title">Transaksi</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body" style="background-color: #d2d6de">
                  <form action="{{route('pelunasan_hutang.store')}}" method="post">
                    {{ csrf_field() }}
                  <div class="row" style="padding: 20px">
                    <!-- Date -->
                    <div class="form-group">
                      <label style="width: 100%;">ID Pembelian :</label>
                      <!--input-->
                      <input type="text" class="form-control" name="id_pembelian" value="{{ $id_pembelian }}" style="width: 200px">
                    </div>
                    <!-- /.form group -->
                    <div class="form-group">
                      <label style="width: 100%">Tanggal Pelunasan :</label>
                      <!--input-->
                      <div class="input-group date" style="width: 250px">
                        <div class="input-group-addon">
                          <i class="fa fa-calendar"></i>
                        </div>
                        <input type="text" class="form-control pull-right" id="datepicker" name="pelunasan" >
                      </div>
                      <!-- /.input group -->
                      <label style="float: left; font-size: 12px; color:red;">{{(string)Session::get('message1')}}</label>
                      <label style="float: left; font-size: 12px; color:red;">{{(string)Session::get('message2')}}</label>
                    </div>
                    <!-- /.form group -->
                    <div class="form-group">
                      <label style="width: 100%">Jumlah Uang :</label>
                      <!--input-->
                      <input type="text" class="form-control" name="uang" style="width: 200px">
                    </div>
                    <!-- /.form group -->
                    <label style="float: left; font-size: 12px; color:red;">{{(string)Session::get('message3')}}</label>
                    <div class="form-group" style="text-align: center; padding-top: 20px" >
                      <input type="submit" class="btn btn-success" value="Tambah Pelunasan">
                    </div>
                  </div>
                  <!-- /.row -->
                  </form>  
                  <table id="example2" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                      <th style="text-align: center;">ID</th>
                      <th style="text-align: center;">Total Pembelian</th>
                      <th style="text-align: center;">Sisa Hutang</th>
                    </tr>
                    </thead>
                    <tbody>
                      <?php $i=0; ?>
                      @foreach($data1 as $dapat)
                      <tr>
                        <td style="text-align: center;">{{$dapat->id_pembelian}}</td>
                        <td style="text-align: center;">{{$dapat->total_bayar}}</td>
                        <td style="text-align: center;">{{$dapat->sisa_hutang}}</td>
                      </tr> 
                      <?php $i=1; ?>
                      @endforeach
                    </tbody>
                  </table>  
                </div>
                <!-- /.box-body -->
              </div>
              <!-- /.box -->
            </div>
            <!-- / .col -->
            <div class="col-md-7">
              <div class="box box-default">
                <div class="box-header with-border">
                  <h3 class="box-title">Riwayat Pelunasan Hutang</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body" style="background-color: #d2d6de">
                  <table id="example3" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                      <th style="text-align: center;">ID</th>
                      <th style="text-align: center;">Tanggal Pelunasan</th>
                      <th style="text-align: center;">Jumlah Uang</th>
                      <th style="text-align: center;">Status Hutang</th>
                      <th style="text-align: center;"></th>
                    </tr>
                    </thead>
                    <tbody>
                      <?php $i=0; ?>
                      @foreach($data as $dapat)
                      <tr>
                        <td>{{$dapat->id_pelunasan_hutang}}</td>
                        <td>{{date_format(date_create("$dapat->tanggal_pelunasan_hutang"), "d F Y")}}</td>
                        <td>{{$dapat->bayar_hutang}}</td>
                        <td>{{$dapat->status}}</td>
                        <td>
                          @if($i!=0)
                          <button type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#del{{$dapat->id_pelunasan_hutang}}">Hapus</button>
                          @endif
                        </td>
                      </tr>
                      <div class="modal fade" id="del{{$dapat->id_pelunasan_hutang}}">
                        <div class="modal-dialog" style="witdh:400px">
                          <div class="modal-content" >
                            <div class="modal-header">
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span></button>
                              <h4 class="modal-title">Peringatan</h4>
                            </div>
                            <div class="modal-body">
                              <!-- text input -->
                              <p>Anda yakin ingin menghapus pelunasan ini?</p>
                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Batal</button>
                              <form action="{{route('pelunasan_hutang.destroy' , $dapat->id_pelunasan_hutang ) }}" method="POST">
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
                      <?php $i=1; ?>
                      @endforeach
                    </tbody>
                  </table>  
                </div>
                <!-- /.box-body -->
              </div>
              <!-- /.box -->
            </div>
          </div>
          <!-- / .row -->
        </div>
        <!-- / .col -->
      </div>
      <!-- / .row -->
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
    'paging'      : false,
    'lengthChange': true,
    'searching'   : false,
    'ordering'    : true,
    'info'        : false,
    'autoWidth'   : true
    })
  })
</script>

<script>
  $(function () {
    $('#example2').DataTable({
    'paging'      : false,
    'lengthChange': true,
    'searching'   : false,
    'ordering'    : true,
    'info'        : false,
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
