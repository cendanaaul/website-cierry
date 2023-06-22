<!DOCTYPE html>
<html>

<head>
    <title>Register</title>
    <link rel="stylesheet" type="text/css" href="../css/daftar.css">
</head>

<body>

    <div class="container">
        <div class="login">
            <h1 class="login-header">Register</h1>
            <form class="login-container" action="daftar.php" method="post">
                <?php

                include "../lib/koneksi.php";
                session_start();
                if (isset($_POST['submit'])) {
                    $namalengkap = $_POST['nama_lengkap'];
                    $email = $_POST['email'];
                    $nohp = $_POST['no_hp'];
                    $alamat = $_POST['alamat'];
                    $username = $_POST['username'];
                    $password = $_POST['password'];
                    $status = 'user';

                    try {
                        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                        $pdo = $conn->prepare('INSERT INTO tbl_users (nama_lengkap, email, username, password, alamat, no_hp,title)
              values (:nama_lengkap, :email, :username, :password, :alamat, :no_hp, :title)');
                        $insertdata = array(':nama_lengkap' => $namalengkap, ':email' => $email, 'username' => $username, 'password' => $password, ':alamat' => $alamat, ':no_hp' => $nohp, ':title' => $status);
                        $pdo->execute($insertdata);

                        echo "<script>alert('Pembuatan Akun Berhasil');window.location='../page/login.php'</script>";
                        echo "<meta http-equiv='refresh' content='1;
  url=login.php'>";
                    } catch (PDOexception $e) {
                        print "pendaftaran gagal dilakukan: " . $e->getMessage() . "<br/>";
                        die();
                    }
                }

                ?>

                <input type="text" name="nama_lengkap" placeholder="Nama Lengkap" required>
                <input type="email" name="email" placeholder="Email" required>
                <input type="text" name="no_hp" placeholder="No HP" required>
                <input type="text" name="alamat" placeholder="Alamat" required>
                <input type="text" name="username" placeholder="Username" required>
                <input type="password" name="password" placeholder="Password" required>
                <input type="submit" name="submit" value="Register">
                <a href="login.php">Kembali</a>
                <p>Have any Account ? <a href="login.php" class="register-link">Login</a> Here</p>
            </form>
        </div>
    </div>
</body>



</html>