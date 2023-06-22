<link rel="stylesheet" href="css/home.css">
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css">
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>


<div class="pesan">
  <?php if (isset($_SESSION['username']) == "") { ?>
    <p>Masuk dengan <b>akun</b> terlebih dahulu sebelum mulai belanja, belum punya akun ?
      <a href="page/daftar.php" class="tombol-biru">Yuk Daftar</a></p>
  <?php } ?>
</div>

<div class="slider">
  <img src="img/banner1.png" alt="Slide 1" >
  <img src="img/banner2.png" alt="Slide 2">
  <img src="img/banner3.png" alt="Slide 3">
</div>

<div class="table-container">
  <?php
  include 'lib/koneksi.php';
  $no = 1;
  $query = $conn->prepare("SELECT * FROM tbl_barang LIMIT 4");
  $query->execute();

  $data = $query->fetchAll();

  foreach ($data as $value) {
  ?>
    <div class="list">
      <br>
      <br>
      <img src="img/produk/<?php echo $value['nama_image']; ?>" width="100" style="margin-bottom: 10px;"><br>
      <br><?php echo $value['deskripsi']; ?>
      <br><b><?php echo "Rp." . $value['harga']; ?></b>
      <br>
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
      <button type="button">Stok : <?php
                                  if ($sisa > 0) echo $sisa;
                                  else echo "Habis";
                                  ?></button>
      <?php
      if ($sisa > 0) {
        if (isset($_SESSION['username']) != "") { ?>
          <a class="link" href="?page=belanja_detail&id=<?php echo $value['id_barang']; ?>&st=<?php echo $sisa; ?>">Beli</a>
      <?php }
      } ?>
    </div>
  <?php
    $no++;
  }
  ?>
</div>

</tr>
</table>
</div>
