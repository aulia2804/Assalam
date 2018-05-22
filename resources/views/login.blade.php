<!DOCTYPE html>
<html>
@include ('head')
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href=""><b>Assalam</b> Jaya</a>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <form action="" method="post">
      <div class="form-group has-feedback">
        <input type="text" class="form-control" placeholder="Nama pengguna" name="username">
        <!-- <span class="glyphicon glyphicon-envelope form-control-feedback"></span> -->
      </div>
      <div class="form-group has-feedback">
        <input type="password" class="form-control" placeholder="Kata sandi" name="password">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="row">
        <div class="col-xs-4 pull-right">
          <a href="{{URL::to('beranda')}}" type="submit" class="btn btn-primary btn-block btn-flat">Masuk</a>
        </div>
        <!-- /.col -->
      </div>
      <div class="row">
        <div class="col-xs-12">
        {{-- <p>belum punya akun?<a href="">Daftar</a></p> --}}
        </div>
      </div>
    </form>
  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->
</body>
</html>
