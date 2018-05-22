<!DOCTYPE html>
<html>
@include('head')
<body class="hold-transition register-page">
<div class="register-box">
  <div class="register-logo">
    <a href="../../index2.html"><b>Assalam</b> Jaya</a>
  </div>

  <div class="register-box-body">
    <form role="form" method="POST" action="{{ route('post.daftar') }}">
      {{ csrf_field() }}
      <div class="form-group has-feedback">
        <input type="text" class="form-control" placeholder="Nama lengkap" name="namaPengguna">
      </div>
      <div class="form-group has-feedback">
        <input type="email" class="form-control" placeholder="Nama pengguna contoh: andi39" name="usernamePengguna">
      </div>
      <div class="form-group has-feedback">
        <select class="form-control" style="width: 50%;" name="jenisKelamin">
          <option selected="selected">Laki-Laki</option>
          <option>Perempuan</option>
        </select>
      </div>
      <div class="form-group has-feedback">
        <input type="number" class="form-control" placeholder="Nomor telepon" name="teleponPengguna">
      </div>
      <div class="form-group has-feedback">
        <textarea class="form-control" rows="3" placeholder="Alamat lengkap" name="alamatPengguna"></textarea>
      </div>
      <div class="form-group has-feedback">
        <input type="password" class="form-control" placeholder="Kata sandi" name="password">
      </div>
      <div class="form-group has-feedback">
        <input type="password" class="form-control" placeholder="Ketik ulang kata sandi" name="confirmPassword">
      </div>
      <div class="row">
        <div class="col-xs-4 pull-right" style="margin-bottom: 20px">
          <!-- <a href="" class="btn btn-primary btn-block btn-flat">Daftar</a> -->
        </div>
        <!-- /.col -->
      </div>
    
      {!! Form::submit('Daftar', array('class'=>'btn btn-primary', 'style'=> 'width: 150px; height: 50px; margin: 30px; font-size: 20px')) !!}
                                           
    </form>

    <p style="font-size: 12px">*hubungi pemilik toko untuk mengaktifkan akun</p>
  </div>
  <!-- /.form-box -->
</div>
<!-- /.register-box -->
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
