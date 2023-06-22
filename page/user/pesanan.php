<link rel="stylesheet" href="css/pesanan.css">

<?php
include 'lib/koneksi.php';

$date = date('Y-m-d-h-i-s');
$total = $_GET['jum'];
$id = $_GET['id'];
try {
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $insert = $conn->prepare("INSERT INTO tbl_pesanan (id_user,id_barang,ukuran,qty,kurir,date_in,total) SELECT id_user,id_barang,ukuran,qty,kurir,date_in,total FROM tbl_keranjang WHERE id_user=:id");
  $insert->bindparam(':id', $id);
  $insert->execute();

  $delete = $conn->prepare("DELETE FROM tbl_keranjang WHERE id_user=:id");
  $delete->bindparam(':id', $id);
  $delete->execute();
?>
  <div class="container">
    <div class="box">
      <div class="header">
        <h1>Pembayaran</h1>
        <img src="img/cierry-logo.svg" alt="" height="25">
      </div>
      <div class="status">
        <p>Status Pesanan :</p>
        <p class="statusLabel">Berhasil</p>
      </div>
      <div class="paymentAmount">
        <p class="payment-label">Jumlah Pembayaran :</p>
        <p class="payment-value"><?php echo "Rp" . $total . ",00"; ?></p>
      </div>
      <div class="description">
        <h3 class="label">Deskripsi</h3>
        <div class="descriptionText">
          <p>
            Lakukan pembayaran dengan transfer nominal sesuai <b>Jumlah Pembayaran</b> pada rekening :
          </p>
          <div>
            <p>Nama Bank</p>
            <p>: Bank SIGMA</p>
          </div>
          <div>
            <p>No. Rekening</p>
            <p>: 123-000-456789-1</p>
          </div>
          <div>
            <p>A.N.</p>
            <p>: Kack Cenn</p>
          </div>
          <div>
            <p>No. Referensi</p>
            <p>: CIERRY/<?php echo $id . "/" . $date; ?></p>
          </div>
        </div>
      </div>
      <div class="continue">
        <h3 class="label">Lanjutan</h3>
        <div class="continueText">
          <p>
            Jika sudah melakukan pembayaran, segera <b>Konfirmasi Pembayaran</b> dengan mengirimkan bukti pembayaran di :
          </p>
          <div>
            <p>Email</p>
            <p>: cierrybutik@gmail.com</p>
          </div>
          <div>
            <p>Telephone/WA</p>
            <p>: +62 812 3456 7891</p>
          </div>
          <div>
            <p>Instagram</p>
            <p>: @Cierry Butik Muslim</p>
          </div>
        </div>
      </div>
      <div class="thankyou">
        <p>
          Terima kasih telah membeli produk di website kami.
        </p>
        <div>
          <button onclick="PrintPage()">Cetak</button>
          <a class="thankyou-link" href="?page=belanja">Detail Pesanan</a>
        </div>
      </div>
    </div>
  </div>
<?php
} catch (PDOexception $e) {
  print "Added data failed: " . $e->getMessage() . "<br/>";
  die();
}
?>

<script type="text/javascript">
  let page = document.getElementsByClassName('container')

  function PrintPage() {
    window.print();
  }
</script>