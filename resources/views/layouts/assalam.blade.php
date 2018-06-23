<!DOCTYPE html>
<html>
@include ('head')
<body class="hold-transition login-page">
<div style="background-image: url('/assets/dist/img/background1.jpg'); width: 1365px; height: 635px;">
  <div class="login-logo">
    <img src="{{URL::to('/assets/dist/img/assalam.png')}}" style="width: 500px; margin-top: 50px; margin-left: 700px">
    <br>
    <br>
    <p style="margin-left: 750px; margin-top: 50px; color: #000000">
    Jl. Kemiri - Pituruh <br>
    Desa Rejosari RT. 0/1 <br>
    Kec. Kemiri, Kab. Purworejo <br>
    0812 8047 7648</p>
    <a href="{{ route('login') }}" type="submit" class="btn btn-primary btn-block" style="width: 300px; margin-left: 900px; margin-top: 50px; color: #000000">MASUK</a>
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
