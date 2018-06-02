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
        Pelanggan
      </h1>
      <ol class="breadcrumb">
        <li><i class="fa fa-dashboard"></i> Home</li>
        <li>Master</li>
        <li>Pelanggan</li>
      </ol>
    </section>
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header" style="background-color: #1B4F72">
              <h3 class="box-title" style="color: #FDFEFE">Tabel Data Pelanggan</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th style="text-align:center">ID</th>
                    <th style="text-align:center">Nama</th>
                    <th style="text-align:center">Kontak</th>
                    <th style="text-align:center">Alamat</th>
                    <th></th>
                  </tr>
                </thead>
                <tbody>
                @foreach($data as $datas)
                <tr>
                  <td>{{$datas->id_pelanggan}}</td>
                  <td>{{$datas->nama_pelanggan}}</td>
                  <td>{{$datas->kontak_pelanggan}}</td>
                  <td>{{$datas->alamat_pelanggan}}</td>
                  <td>
                    <a href="{{route('ubah_pelanggan.edit', $datas->id_pelanggan)}}" class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i>Ubah Data</a>
                    <a href="#" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i></a>
                  </td>
                </tr>
                @endforeach
                </tbody>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
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
