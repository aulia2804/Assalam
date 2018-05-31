<!DOCTYPE html>
<html>
@include ('head')
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href=""><b>Assalam</b> Jaya</a>
    <a href="{{ route('login') }}" type="submit" class="btn btn-primary btn-block btn-flat">Masuk</a>
  </div>
  <!-- /.login-logo -->
</div>
<!-- /.login-box -->

<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' // optional
    });
  });
</script>
</body>
</html>
