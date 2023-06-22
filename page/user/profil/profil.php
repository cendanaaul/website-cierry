<link rel="stylesheet" href="css/profil.css">

<div class="container">

    <?php
    include 'lib/koneksi.php';
    $user = $_SESSION['username'];
    $ambiluser = $conn->prepare("SELECT * FROM tbl_users WHERE username =:user");
    $ambiluser->bindparam(':user', $user);
    $ambiluser->execute();
    $data = $ambiluser->fetch(PDO::FETCH_OBJ);
    ?>

    <h1>Profil</h1>
    <div class="content">
        <div class="">
            <p>User ID</p>
            <p>:
                <?php echo $data->id_user; ?>
            </p>
        </div>
        <div class="">
            <p>Username</p>
            <p>:
                <?php echo $data->username; ?>
            </p>
        </div>
        <div>
            <p>Nama Lengkap</p>
            <p>:
                <?php echo $data->nama_lengkap; ?>
            </p>
        </div>
        <div>
            <p>Email</p>
            <p>:
                <?php echo $data->email; ?>
            </p>
        </div>
        <div>
            <p>Alamat</p>
            <p>:
                <?php echo $data->alamat; ?>
            </p>
        </div>
        <div class="">
            <p>No Hp</p>
            <p>:
                <?php echo $data->no_hp; ?>
            </p>
        </div>

        <div class="">
            <p>Password</p>
            <input type="password" name="" value="<?php echo $data->password; ?>" disabled>
        </div>
        <div class="action">
            <p></p>
            <div>
                <a class="tombol-biru" href="?page=profil_ubah">Ubah</a>
                <a class="tombol-merah" href="?">Kembali</a>
            </div>
        </div>
    </div>
</div>