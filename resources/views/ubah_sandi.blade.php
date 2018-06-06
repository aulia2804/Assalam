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
        Ubah Kata Sandi
      </h1>
    </section>
    <section class="content">
      <div class="box box-default">
        <div class="box-body" style="background-color: #d2d6de">
          <form action="{{url('sandi')}}" method="post">
            {{ csrf_field() }}
            <div class="row" style="padding-left: 300px">
              <div class="col-xs-2">
                <div class="form-group pull-right">
                  <h5>Kata Sandi Baru:</h5>
                </div>
              </div>
              <div class="col-xs-4">
                <div class="form-group">
                  <input type="password" class="form-control" name="password">
                </div>
              </div>
            </div>
            <!-- /.row -->
            <div class="col-md-6">
              <a href="{{route('beranda.index')}}" class="btn btn-default" style="margin-top: 25px">Kembali</a>
            </div>
            <div class="col-md-6">
              <input type="submit" class="btn btn-primary pull-right" style="margin-top: 25px" value="Simpan">
            </div>
          </form>
        </div>
        <!-- /.box-body -->
      </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  @include ('footer')
</div>
</body>
</html>
