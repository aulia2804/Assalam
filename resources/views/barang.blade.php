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
        Barang
      </h1>
      <ol class="breadcrumb">
        <li><i class="fa fa-cube"> Barang</i></li>
        <li>Barang</li>
      </ol>
    </section>
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header" style="background-color: #1B4F72">
              <h3 class="box-title" style="color: #FDFEFE">Tabel Data Barang</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="col-xs-8">
                <a href="{{url('printBarang')}}" class="btn btn-primary" style="margin-bottom: 10px"><i class="fa fa-print"></i> Unduh PDF</a>
              </div>
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                  <?php $no=1; ?>
                  <tr>
                    <th style="text-align:center">ID</th>
                    <th style="text-align:center">Nama</th>
                    <th style="text-align:center">Harga Beli</th>
                    <th style="text-align:center">Harga Jual</th>
                    <th style="text-align:center">Stok</th>
                    <th style="text-align:center">Satuan</th>
                    <th style="text-align:center">Pemasok</th>
                    <th style="text-align: center;">
                      <a href="{{URL::to('transaksi_pembelian')}}" class="btn btn-warning btn-xs"><i class="">Restock</i></a>
                    </th>
                  </tr>
                </thead>
                <tbody>
                @foreach($data as $datas)
                <tr>
                  <td>{{$no++}}</td>
                  <td>{{$datas->nama_barang}}</td>
                  <td style="text-align: right;">{{ number_format($datas->harga_beli, 2)}}</td>
                  <td style="text-align: right;">{{ number_format($datas->harga_jual, 2)}}</td>
                  <td>{{$datas->stok}}</td>
                  <td>{{$datas->nama_satuan}}</td>
                  <td>{{$datas->nama_pemasok}}</td>
                  <td style="text-align: center;">
                    <button type="button" class="btn btn-primary btn-xs" data-toggle="modal" data-target="#update{{$datas->id_barang}}"><i class="fa fa-pencil"></i></button>
                  </td>
                </tr>
                 <div class="modal fade" id="hapus{{$datas->id_barang}}">
                  <div class="modal-dialog" style="witdh:400px">
                    <div class="modal-content" >
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">Peringatan</h4>
                      </div>
                      <div class="modal-body">
                        <!-- text input -->
                        <p>Anda yakin ingin menghapus pemasok {{$datas->nama_barang}}?</p>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Batal</button>
                        <form action="{{route('barang.destroy', $datas->id_barang)}}" method="POST">
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
                <div class="modal fade" id="update{{$datas->id_barang}}">
                  <div class="modal-dialog">
                    <form action="{{route('barang.update', $datas->id_barang)}}" method="post">
                        {{ csrf_field() }}
                        {{ method_field('PUT') }}
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">Ubah Data Barang</h4>
                      </div>
                      
                      <div class="modal-body">
                        <div class="form-group col-lg-12">
                          <div class="col-xs-3">
                            <h4>Nama</h4>
                          </div>
                          <div class="col-xs-9">
                            <input type="text" name="nama" class="form-control" value="{{$datas->nama_barang}}" required>
                          </div>
                        </div>
                        <div class="form-group col-lg-12">
                          <div class="col-xs-3">
                            <h4>Harga Beli</h4>
                          </div>
                          <div class="col-xs-9">
                            <input type="number" name="beli" class="form-control" value="{{$datas->harga_beli}}" readonly>
                          </div>
                        </div>
                        <div class="form-group col-lg-12">
                          <div class="col-xs-3">
                            <h4>Harga Jual</h4>
                          </div>
                          <div class="col-xs-9">
                            <input type="number" name="jual" class="form-control" value="{{$datas->harga_jual}}" required>
                          </div>
                        </div>
                        <div class="form-group col-lg-12">
                          <div class="col-xs-3">
                            <h4>Stok</h4>
                          </div>
                          <div class="col-xs-9">
                            <input type="number" name="stock" class="form-control" value="{{$datas->stok}}" readonly>
                          </div>
                        </div>
                        <div class="form-group col-lg-12">
                          <div class="col-xs-3">
                            <h4>Satuan</h4>
                          </div>
                          <div class=" col-xs-9">
                            <select class="form-control" name="satuan" required>
                              @foreach($data1 as $datas)
                              <option value="{{$datas->id_satuan}}">{{$datas->nama_satuan}}</option>
                              @endforeach
                            </select>
                          </div>
                        </div>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Tutup</button>
                        <input type="submit" class="btn btn-primary" value="Simpan">
                      </div>
                    </form>
                      
                    </div>
                    <!-- /.modal-content -->
                  </div>
                  <!-- /.modal-dialog -->
                </div>
                <!-- /.modal -->
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
