<ol class="breadcrumb">
  <li><a href="#">Home</a></li>
  <li><a href="#">Library</a></li>
  <li class="active">Data</li>
</ol>

<?php echo $this->session->flashdata('alert_danger'); ?>
<form method="post">
  <div class="form-group">
    <label for="exampleInputEmail1">Username</label>
    <input type="text" class="form-control" placeholder="Email" name="username" value="<?php echo isset( $username ) ? $username : null; ?>">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Password Lama</label>
    <input type="password" class="form-control" name="password_lama" placeholder="Masukkan Password Lama">
  </div>

  <div class="form-group">
    <label for="exampleInputPassword1">Password Baru</label>
    <input type="password" class="form-control" name="pass_baru" placeholder="Masukkan Password Baru">
  </div>

  <div class="form-group">
    <label for="exampleInputPassword1">Konfirm Password Baru</label>
    <input type="password" class="form-control" name="pass_konfirm" placeholder="Masukkan Konfirm Password Baru">
  </div>

  <input type="submit" class="btn btn-sm btn-primary" role="set-rule" name="submit" value="Submit">
</form>