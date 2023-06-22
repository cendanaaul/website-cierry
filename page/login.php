<!DOCTYPE html>
<html>

<head>
  <title>Login</title>
  <link rel="stylesheet" type="text/css" href="../css/login.css">
</head>

<body>

  <div class="container">

    <div class="login">

      <h1 class="loginHeader">Login</h1>

      <form class="login-container" action="login.php" method="post">
        <?php
        include "../lib/koneksi.php";
        session_start();

        if (isset($_POST['submit'])) {
          $user = $_POST['username'];
          $pwd = $_POST['password'];

          $pdo = $conn->prepare("SELECT * FROM tbl_users WHERE username=:a AND password=:b");
          $pdo->execute(array(':a' => $user, ':b' => $pwd));
          $count = $pdo->rowcount();
          $row = $pdo->fetch(PDO::FETCH_OBJ);

          if ($count == 0) {
            echo "<script>alert('Login Gagal!');window.location='../page/login.php'</script>";
          } else {
            $_SESSION['username'] = $user;
            $_SESSION['password'] = $pwd;
            $_SESSION['status'] = $row->title;

            echo "<meta http-equiv='refresh' content='1; url=../index.php'>";
          }
        }
        ?>

        <input type="text" name="username" placeholder="Username" required>
        <input type="password" name="password" placeholder="Password" required>
        <input type="submit" name="submit" value="Login">
        <a href="../index.php" class="back-link">Kembali</a>
        <p>Don't have any Account ? <a href="daftar.php" class="register-link">Register</a> First</p>

      </form>
    </div>
  </div>
</body>

</html>