<link rel="stylesheet" href="css/belanja.css">

<div id="box" style="padding: 0px 30px; margin-bottom: 60px;">

  <h1>Riwayat Pesanan</h1>

  <?php
  include 'lib/koneksi.php';

  if (isset($_SESSION['username'])) $user = $_SESSION['username'];
  $ambiluser = $conn->prepare("SELECT * FROM tbl_users WHERE username =:user");
  $ambiluser->bindparam(':user', $user);
  $ambiluser->execute();
  $data = $ambiluser->fetch(PDO::FETCH_OBJ);
  if (isset($_SESSION['username'])) $id = $data->id_user;

  $query = $conn->prepare("SELECT CONCAT('TR-', b.date_in, '-',b.id_pesanan, '-', b.id_user)  
                           AS id_pesanan, 
                           a.deskripsi, CONCAT('Rp', FORMAT(a.harga, 0, 'id_ID'), ',00') as harga, a.nama_image, 
                           b.ukuran, b.qty, b.kurir, DATE_FORMAT(b.date_in, '%W, %d %M %Y') AS date_in, CONCAT('Rp', FORMAT(b.total, 0, 'id_ID'), ',00') as total
                           FROM tbl_pesanan b
                           JOIN tbl_barang a ON b.id_barang = a.id_barang
                           JOIN tbl_users c ON b.id_user = c.id_user
                           WHERE b.id_user = :id
                           ORDER BY b.id_pesanan ASC");
  $query->bindparam(':id', $id);
  $query->execute();
  $data = $query->fetchAll();
  $count = $query->rowCount();
  ?>

  <?php
  $no = 1;
  foreach ($data as $value) : ?>

    <div class="riwayat">
      <img src="img/produk/<?= $value['nama_image']; ?>">
      <div class="detail">
        <div>
          <p>ID Pesanan : <?php echo $value['id_pesanan'] ?></p>
          <p>Nama Barang : <?php echo $value['deskripsi'] ?></p>
          <p>Harga : <?php echo $value['harga'] ?></p>
          <p>Size : <?php echo $value['ukuran'] ?></p>
          <p>Quantity : <?php echo $value['qty'] ?></p>
          <p>Total : <?php echo $value['total'] ?></p>
        </div>
        <div>
          <p>Kurir : <?php echo $value['kurir'] ?></p>
          <p>Transaction Date : <?php echo $value['date_in'] ?></p>
          <p>Status : <span>Sukses</span></p>
        </div>
      </div>
    </div>

  <?php
    $no++;
  endforeach;
  ?>

  <?php
  if ($count == 0) {
    echo "<center>-- Belum ada pesanan barang --</center>";
    echo "<br>";
  }
  ?>

</div>