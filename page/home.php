<link rel="stylesheet" href="css/home.css">

<div class="hero" style="height: 90vh; font-family: 'glory'">
  <a href="?page=tentang">
    <h1>Mulai Berbelanja</h1>
  </a>
</div>

<div class="container" style="
    display: flex;
    height: 100vh;
    justify-content: center;
    align-items: center;
    flex-direction: column;
    gap: 20px;
  ">

  <h1>Product</h1>

  <div class="list">

    <?php
    include 'lib/koneksi.php';
    $no = 1;
    $query = $conn->prepare("SELECT * FROM tbl_barang LIMIT 3");
    $query->execute();

    $data = $query->fetchAll();

    foreach ($data as $value) {
    ?>

      <div class="item">

        <img src="img/produk/<?php echo $value['nama_image']; ?>">

        <div class="desc">
          <p><?php echo $value['deskripsi']; ?></p>
          <p><?php echo "Rp." . $value['harga']; ?></p>

          <?php

          $id = $value['id_barang'];
          $query = $conn->prepare("SELECT SUM(qty) AS jumlah FROM tbl_pesanan WHERE id_barang=:id");
          $query->bindparam(':id', $id);
          $query->execute();
          $data = $query->fetch(PDO::FETCH_OBJ);
          $hasil = $data->jumlah;

          $stok = $value['stok'];
          $sisa = ($stok - $hasil);
          ?>
          <P type="button">
            Stok : <?php
                    if ($sisa > 0) echo $sisa;
                    else echo "Habis";
                    ?>
          </P>

        </div>

      </div>

    <?php
      $no++;
    }

    ?>

  </div>

</div>