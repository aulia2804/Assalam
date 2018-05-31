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
        Satuan
      </h1>
      <ol class="breadcrumb">
        <li><i class="fa fa-cube"> Barang</i></li>
        <li class="active">Satuan</li>
      </ol>
    </section>
    <section class="content">
      <div class="row">
        <div class="col-xs-6"></div>
        <div class="col-xs-6">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Tabel Data Satuan</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="col-xs-8">
                <button type="button" style="margin-bottom:20px" class="btn btn-success" data-toggle="modal" data-target="#modal-default">
                  Tambah
                </button>
              </div>
              <div class="modal fade" id="modal-default">
                <div class="modal-dialog">
                  <form action="{{route('satuan.store')}}" method="post">
                    {{ csrf_field() }}
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                      <h4 class="modal-title">Tambah Satuan Baru</h4>
                    </div>
                    <div class="modal-body">
                      <!-- text input -->
                      <input type="text" class="form-control" placeholder="Masukkan nama satuan baru.." name="nama">
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Tutup</button>
                      <input type="submit" class="btn btn-primary" value="Simpan">
                    </div>
                  </div>
                  </form>
                  <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
              </div>
              <!-- /.modal -->
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th style="text-align:center">ID</th>
                    <th style="text-align:center">Nama</th>
                    <th></th>
                  </tr>
                </thead>
                <tbody>
                @foreach($data as $datas)
                <tr>
                  <td>{{$datas->id_satuan}}</td>
                  <td>{{$datas->nama_satuan}}</td>
                  <td>
                    <button type="button" class="btn btn-primary btn-xs" data-toggle="modal" data-target="#default{{$datas->id_satuan}}"><i class="fa fa-pencil"></i></button>
                    <a href="" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i></a> 
                  </td>
                </tr>
                <div class="modal fade" id="default{{$datas->id_satuan}}">
                  <div class="modal-dialog">
                    <form action="{{route('satuan.update', $datas->id_satuan)}}" method="post">
                        {{ csrf_field() }}
                        {{ method_field('PUT') }}
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">Ubah Satuan</h4>
                      </div>
                      <div class="modal-body">
                        <!-- text input -->
                        <input type="text" name="nama" class="form-control" value="{{$datas->nama_satuan}}">
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Tutup</button>
                        <input type="submit" class="btn btn-primary" value="Simpan">
                      </div>
                    </div>
                    </form>
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
