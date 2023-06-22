<link rel="stylesheet" href="css/navbar.css">

<nav>
  <ul>

    <?php

    session_start();

    if (isset($_SESSION['username'])) {

      // Login as Normal User
      if ($_SESSION['status'] == 'user') {
        $user = $_SESSION['username'];
        $title = $_SESSION['status'];

        echo "<li><a href='?page=home'>Home</a></li>";
        echo "<li><a href='?page=tentang'>About</a></li>";
        echo "<li><a href='?page=produk'>Produk</a></li>";
        echo "<li><a href='?page=belanja'>Pesanan</a></li>";
        echo "<li><a href='?page=keranjang'>Keranjang</a></li>";
        echo "<li><a href='?page=profil'>Profil</a></li>";
        echo "<li><a href='?page=contact'>Contact</a></li>";
        echo "<li class='logout'><a href='page/logout.php'>Logout</a></li>";
        echo "<li class='login'><a><b>Hai, </b>$user !!!</a></li>";

        // Login as Admin
      } elseif ($_SESSION['status'] == 'admin') {
        $user = $_SESSION['username'];
        $title = $_SESSION['status'];

        echo "<li><a href='?'>Home</a></li>";
        echo "<li><a href='?page=barang'>Barang</a></li>";
        echo "<li><a href='?page=transaksi'>Transaksi</a></li>";
        echo "<li><a href='?page=user'>User</a></li>";
        echo "<li><a href='?page=profilad'>Profil</a></li>";
        echo "<li><a href='?page=laporan'>Laporan</a></li>";
        echo "<li class='logout'><a href='page/logout.php'>Logout</a></li>";
        echo "<li class='login'><a><b>Hai, </b>$user !!!</a></li>";
      }
    }
    // Not Login
    else {

      echo "<li><a href='?'>Home</a></li>";
      echo "<li class='login'><a href='?page=tentang'>About</a></li>";
      echo "<li class='login'><a href='?page=contact'>Contact</a></li>";
      echo "<li class='login'><a href='page/login.php'>Masuk</a></li>";
    }

    ?>

  </ul>
  <img src="img/cierry-logo.svg" alt="">
</nav>