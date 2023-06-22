<link rel="stylesheet" href="css/keranjang.css">

<?php
include 'lib/koneksi.php';

if (isset($_SESSION['username'])) $user = $_SESSION['username'];
$ambiluser = $conn->prepare("SELECT * FROM tbl_users WHERE username = :user");
$ambiluser->bindparam(':user', $user);
$ambiluser->execute();
$data = $ambiluser->fetch(PDO::FETCH_OBJ);
if (isset($_SESSION['username'])) $id = $data->id_user;

$query = $conn->prepare("SELECT id, deskripsi, harga, ukuran, qty, kurir, total
                        FROM tbl_keranjang
                        JOIN tbl_barang ON tbl_keranjang.id_barang = tbl_barang.id_barang
                        WHERE tbl_keranjang.id_user = :id
                        GROUP BY tbl_keranjang.id");

$query->bindparam(':id', $id);
$query->execute();
$data = $query->fetchAll();
$count = $query->rowCount();
?>

<div class="container">

    <div class="keranjang-title">
        <h1>Keranjang Belanja : <?php echo isset($count) ? $count : 0; ?></h1>
    </div>

    <table class="produk-table">
        <thead>
            <tr>
                <th>No</th>
                <th>Id Pesanan</th>
                <th>Deskripsi</th>
                <th>Harga</th>
                <th>Ukuran</th>
                <th>Qty</th>
                <th>Kurir</th>
                <th>Total</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $no = 1;
            $jumlah = 0;
            if (isset($data) && is_array($data)) {
                foreach ($data as $value) :
                    $subTotal = isset($value['harga']) && isset($value['qty']) ? $value['harga'] * $value['qty'] : 0;
                    $jumlah += $subTotal;
            ?>
                    <tr>
                        <td>
                            <?php echo $no; ?>
                        </td>
                        <td>
                            <?php echo isset($value['id']) ? $value['id'] : ''; ?>
                        </td>
                        <td>
                            <?php echo isset($value['deskripsi']) ? $value['deskripsi'] : ''; ?>
                        </td>
                        <td>
                            <?php echo isset($value['harga']) ? "Rp. " . $value['harga'] : ''; ?>
                        </td>
                        <td>
                            <?php echo isset($value['ukuran']) ? $value['ukuran'] : ''; ?>
                        </td>
                        <td>
                            <form method="POST" action="?page=keranjang_ubah&id=<?php echo isset($value['id']) ? $value['id'] : ''; ?>">
                                <input type="number" name="qty" value="<?php echo isset($value['qty']) ? $value['qty'] : ''; ?>" onchange="this.form.submit()">
                            </form>
                        </td>
                        <td>
                            <?php echo isset($value['kurir']) ? $value['kurir'] : ''; ?>
                        </td>
                        <td>
                            <?php echo "Rp. " . $subTotal; ?>
                        </td>
                        <td>
                            <a class="hapus-btn" href="?page=keranjang_hapus&id=<?php echo isset($value['id']) ? $value['id'] : ''; ?>"><i class="fas fa-trash"></i> Hapus</a>
                        </td>
                    </tr>
            <?php
                    $no++;
                endforeach;
            }
            ?>
        </tbody>
    </table>

    <div class="totalPembayaran">
        <h3 class="total-title">Total Pembayaran :</h3>
        <h3 class="total-amount">Rp<?php echo $jumlah; ?></h3>
    </div>
    <?php if (isset($count) && $count > 0) { ?>
        <div class="prosesPemesanan">
            <a class="proses-btn" href="?page=pesanan&id=<?php echo $id ?>&jum=<?php echo $jumlah ?>">Check Out</a>
            <p class="info-text"><span>Note :</span> Anda dapat <strong>menghapus</strong> barang dalam keranjang jika ada perubahan. Jika tidak ada perubahan lagi, Anda dapat melanjutkan <strong>Pemesanan</strong> dengan memilih tombol <strong>Proses</strong>.</p>
        </div>
    <?php } ?>
</div>

<script>
    function updateQuantity(itemId, newQuantity) {
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                // Callback function when the request is complete
                // You can handle any response from the server here
                location.reload(); // Refresh the page after updating the quantity
            }
        };
        xhttp.open("GET", "update_quantity.php?itemId=" + itemId + "&quantity=" + newQuantity, true);
        xhttp.send();
    }
</script>