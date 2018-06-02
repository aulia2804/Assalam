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
        Pengguna
      </h1>
      <ol class="breadcrumb">
        <li><i class="fa fa-dashboard"></i> Master</li>
        <li>Pengguna</li>
      </ol>
    </section>
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header" style="background-color: #1B4F72">
              <h3 class="box-title" style="color: #FDFEFE">Tabel Data Pengguna</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="col-xs-8">
                <a href="{{route('tambah_pengguna.create')}}" class="btn btn-success" style="margin-bottom: 10px"><i class="fa fa-plus"></i> Tambah</a>
              </div>
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th style="text-align:center">ID</th>
                    <th style="text-align:center">Nama</th>
                    <th style="text-align:center">Kontak</th>
                    <th style="text-align:center">Alamat</th>
                    <th style="text-align:center">Jabatan</th>
                    <th style="text-align:center">Status</th>
                    <th></th>
                  </tr>
                </thead>
                <tbody>
                @foreach($data as $datas)
                <tr>
                  @if($datas->status_pengguna=='Publish')
                  <td>{{$datas->id_pengguna}}</td>
                  <td>{{$datas->nama_pengguna}}</td>
                  <td>{{$datas->kontak_pengguna}}</td>
                  <td>{{$datas->alamat_pengguna}}</td>
                  <td>{{$datas->rule}}</td>
                  <td>
                    @if($datas->status=='Active')
                      @if($datas->rule=='Pemilik')
                        <a href="{{url('active', $datas->id_pengguna)}}" class="btn btn-info btn-xs disabled"></i>Active</a>
                      @else
                        <a href="{{url('active', $datas->id_pengguna)}}" class="btn btn-info btn-xs"></i>Active</a>
                      @endif
                    @else
                      <a href="{{url('nonactive', $datas->id_pengguna)}}" class="btn btn-danger btn-xs">Non Active</a>
                    @endif
                  </td>
                  <td>
                    @if($datas->rule=='Pemilik')
                      <button type="button" class="btn btn-info btn-xs" data-toggle="modal" data-target="#default{{$datas->id_pengguna}}">Detail</button>
                      <a href="{{route('ubah_pengguna.edit', $datas->id_pengguna)}}" class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></a> 
                    @else
                      <button type="button" class="btn btn-info btn-xs" data-toggle="modal" data-target="#default{{$datas->id_pengguna}}">Detail</button>
                      <a href="{{route('ubah_pengguna.edit', $datas->id_pengguna)}}" class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></a> 
                      <button type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#hapus{{$datas->id_pengguna}}"><i class="fa fa-trash"></i></button>
                    @endif
                  </td>
                  @else
                  @endif
                </tr>

                <div class="modal fade" id="default{{$datas->id_pengguna}}">
                  <div class="modal-dialog">
                    <form action="{{route('pengguna.show', $datas->id_pengguna)}}" method="post">
                        {{ csrf_field() }}
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">Detail Pengguna</h4>
                      </div>
                      <div class="modal-body">
                          <div class="row" style="padding-left : 100px">
                            <div class="col-xs-4">
                              <div class="form-group" >
                                <h5>Nama Lengkap :</h5>
                              </div>
                            </div>
                            <div class="col-xs-6">
                              <div class="form-group">
                                <!-- text input -->
                                <h5>{{$datas->nama_pengguna}}</h5>
                              </div>
                            </div>
                          </div>
                          <!-- /.row -->
                          <div class="row" style="padding-left : 100px">
                            <div class="col-xs-4">
                              <div class="form-group " >
                                <h5>Jenis Kelamin :</h5>
                              </div>
                            </div>
                            <div class="col-xs-6">
                              <div class="form-group" >
                                <!-- text input -->
                                <h5>{{$datas->jenis_kelamin}}</h5>
                              </div>
                            </div>
                          </div>
                          <!-- /.row -->
                          <div class="row" style="padding-left : 100px" >
                            <div class="col-xs-4">
                              <div class="form-group " >
                                <h5>Nomor Telepon :</h5>
                              </div>
                            </div>
                            <div class="col-xs-6">
                              <div class="form-group" >
                                <!-- text input -->
                                <h5>{{$datas->kontak_pengguna}}</h5>
                              </div>
                            </div>
                          </div>
                          <!-- /.row -->
                          <div class="row" style="padding-left : 100px" >
                            <div class="col-xs-4">
                              <div class="form-group " >
                                <h5>Alamat :</h5>
                              </div>
                            </div>
                            <div class="col-xs-6">
                              <div class="form-group" >
                                <!-- text input -->
                                <h5>{{$datas->alamat_pengguna}}</h5>
                              </div>
                            </div>
                          </div>
                          <!-- /.row -->
                          <div class="row" style="padding-left : 100px" >
                            <div class="col-xs-4">
                              <div class="form-group " >
                                <h5>Nama Pengguna :</h5>
                              </div>
                            </div>
                            <div class="col-xs-6">
                              <div class="form-group" >
                                <!-- text input -->
                                <h5>{{$datas->username}}</h5>
                              </div>
                            </div>
                          </div>
                          <!-- /.row -->
                          <div class="row" style="padding-left : 100px" >
                            <div class="col-xs-4">
                              <div class="form-group " >
                                <h5>Jabatan :</h5>
                              </div>
                            </div>
                            <div class="col-xs-6">
                              <div class="form-group" >
                                <!-- text input -->
                                <h5>{{$datas->rule}}</h5>
                              </div>
                            </div>
                          </div>
                          <!-- /.row -->
                          <div class="row" style="padding-left : 100px" >
                            <div class="col-xs-4">
                              <div class="form-group " >
                                <h5>Status Pengguna :</h5>
                              </div>
                            </div>
                            <div class="col-xs-6">
                              <div class="form-group" >
                                <!-- text input -->
                              <h5>{{$datas->status}}</h5>
                              </div>
                            </div>
                          </div>
                          <!-- /.row -->  
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Tutup</button>
                      </div>
                    </div>
                    </form>
                    <!-- /.modal-content -->
                  </div>
                  <!-- /.modal-dialog -->
                </div>
                <!-- /.modal -->

                <div class="modal fade" id="hapus{{$datas->id_pengguna}}">
                  <div class="modal-dialog" style="witdh:400px">
                    <div class="modal-content" >
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">Peringatan</h4>
                      </div>
                      <div class="modal-body">
                        <!-- text input -->
                        <p>Anda yakin ingin menghapus pengguna {{$datas->nama_pengguna}}?</p>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Batal</button>
                        <form action="{{route('hapus_pengguna.destroy' , $datas->id_pengguna ) }}" method="POST">
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
                @endforeach
                </tbody>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!--/.box -->
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
