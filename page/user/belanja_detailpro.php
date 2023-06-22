<style>
  @import url('https://fonts.googleapis.com/css2?family=Glory:wght@100;400;600;700&family=Mukta:wght@200;300;400;500;600;700&family=Puritan&display=swap');

  @import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@200;400&family=Raleway&display=swap');

  b {
    font-family: 'glory';
    font-size: 20px;
  }
</style>
<div style="height: 90vh; display: flex; justify-content: center; align-items: center;">
  <?php

  include 'lib/koneksi.php';


  $iduser = $_POST['id_user'];
  $idbarang = $_POST['id_barang'];
  $harga = $_POST['harga'];
  $date = date('Ymd');
  $ukuran = $_POST['ukuran'];
  $qty = $_POST['qty'];
  $kurir = $_POST['kurir'];
  $total = $harga * $qty;
  $sisa = $_POST['sisa'];


  if ($qty > $sisa) {
    echo "<script>alert('Kuantitas pesanan melebihi sisa stok barang');window.location='?page=belanja_detail&id=$idbarang&st=$sisa'</script>";
  } elseif ($qty <= 0) {
    echo "<script>alert('Keliru dalam menginputkan kuantitas');window.location='?page=belanja_detail&id=$idbarang&st=$sisa'</script>";
  } else {

    try {
      $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      $pdo = $conn->prepare('INSERT INTO tbl_keranjang (id_user, id_barang, ukuran, qty, kurir, date_in, total)
                  values (:id_user, :id_barang, :ukuran, :qty, :kurir, :date_in, :total)');
      $insertdata = array(':id_user' => $iduser, ':id_barang' => $idbarang, ':ukuran' => $ukuran, 'qty' => $qty, 'kurir' => $kurir, ':date_in' => $date, ':total' => $total);

      $pdo->execute($insertdata);

      echo "<center><b>Pesanan berhasil ditambahkan ke keranjang</b></center>";
      echo "<meta http-equiv='refresh' content='1;
      url=?page=keranjang'>";
    } catch (PDOexception $e) {
      print "Added data failed: " . $e->getMessage() . "<br/>";
      die();
    }
  }

  ?>
</div>