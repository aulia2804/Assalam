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
            <div class="box-header" style="background-color: #1B4F72">
              <h3 class="box-title" style="color: #FDFEFE">Tabel Data Retur Pembelian</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body" style="background-color: #d2d6de">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th style="text-align:center">ID</th>
                    <th style="text-align:center">Tanggal Retur</th>
                    <th style="text-align:center">Barang</th>
                    <th style="text-align:center">Pemasok</th>
                    <th style="text-align:center">Jumlah Barang</th>
                    <th style="text-align:center">Deskripsi Retur</th>
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
                    @if($datas->proses=='Proses')
                      <a href="{{url('proses', $datas->id_detail_retur)}}" class="btn btn-warning btn-xs"></i>Proses</a>
                    @else
                      <a href="" class="btn btn-success btn-xs disabled">Selesai</a>
                    @endif
                  </td>
                  <td>
                    <a href="{{route('detail_retur.show',$datas->id_retur_pembelian)}}" class="btn btn-info btn-xs"></i>Detail</a>
                    @if($datas->proses=='Proses')
                    <button type="button" class="btn btn-primary btn-xs" data-toggle="modal" data-target="#update{{$datas->id_detail_retur}}"><i class="fa fa-pencil"></i></button>
                    <a href="{{url('printRetur', $datas->id_retur_pembelian)}}" class="btn btn-primary btn-xs">Cetak</a> 
                    @else
                    <a href="{{url('printRetur', $datas->id_retur_pembelian)}}" class="btn btn-primary btn-xs">Cetak</a> 
                    @endif
                  </td>
                </tr>
                <div class="modal fade" id="update{{$datas->id_detail_retur}}">
                  <div class="modal-dialog">
                    <form action="{{route('deskripsi_retur.update', $datas->id_detail_retur)}}" method="post">
                        {{ csrf_field() }}
                        {{ method_field('PUT') }}
                      <div class="modal-content">
                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span></button>
                          <h4 class="modal-title">Ubah Deskripsi Retur</h4>
                        </div>
                        <div class="modal-body">
                          <div class="form-group">
                            <label>Deskripsi Retur :</label>
                              <input type="text" class="form-control" name="deskripsi" required>
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
