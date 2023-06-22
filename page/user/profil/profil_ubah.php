<link rel="stylesheet" href="css/profil_ubah.css">

<div class="container">
  <h1>Ubah Profil</h1>
  <?php
  include 'lib/koneksi.php';

  $user = $_SESSION['username'];
  $ambiluser = $conn->prepare("SELECT * FROM tbl_users WHERE username =:user");
  $ambiluser->bindparam(':user', $user);
  $ambiluser->execute();
  $data = $ambiluser->fetch(PDO::FETCH_OBJ);
  ?>

  <form name="ubah" class="content" action="?page=profil_ubahpro" method="post" enctype="multipart/form-data">
    <div class="">
      <p>Id User</p>
      <input type="hidden" name="id_user" value="<?php echo $data->id_user; ?>">
      <input type="text" name="id_user" value="<?php echo $data->id_user; ?>" disabled>
    </div>
    <div class="">
      <p>Nama Lengkap</p>
      <input type="text" name="nama_lengkap" value="<?php echo $data->nama_lengkap; ?>" required>
    </div>
    <div class="">
      <p>Email</p>
      <input type="text" name="email" value="<?php echo $data->email; ?>" required>
    </div>
    <div class="">
      <p>Alamat</p>
      <textarea name="alamat" rows="3" required><?php echo $data->alamat; ?></textarea>
    </div>
    <div class="">
      <p>No Hp</p>
      <input type="text" name="no_hp" value="<?php echo $data->no_hp; ?>" required>
    </div>
    <div class="">
      <p>Username</p>
      <input type="text" name="username" maxlength="6" value="<?php echo $data->username; ?>" required>
    </div>
    <div class="">
      <p>Password</p>
      <input type="password" name="password" maxlength="6" value="<?php echo $data->password; ?>" required>
    </div>
    <div class="">
      <p></p>
      <div>
        <input class="tombolSubmit" type="submit" name="ubah" value="Ubah">
        <a href="?page=profil">Kembali</a>
      </div>
    </div>

  </form>
</div>