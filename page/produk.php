<link rel="stylesheet" href="css/produk.css">

<div class="container" style="
    display: flex;
    justify-content: center;
    align-items: center;
    flex-direction: column;
    gap: 20px;
    padding: 30px;
  ">

  <h1>Product</h1>

  <div class="list">

    <?php
    include 'lib/koneksi.php';
    $no = 1;
    $query = $conn->prepare("SELECT * FROM tbl_barang");
    $query->execute();

    $data = $query->fetchAll();

    foreach ($data as $value) {
    ?>

      <a href="?page=belanja_detail&id=<?php echo $value['id_barang']; ?>&st=<?php echo $value['stok']; ?>">

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

      </a>

  </div>

</div>