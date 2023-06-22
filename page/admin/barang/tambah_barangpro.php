<link rel="stylesheet" href="css/tambah_barangpro.css">

<div class="box-title">
    <p>Manajemen Barang Jualan</p>
</div>
<div id="box">
    <h1>Barang Jualan Tambah</h1>
    <?php
    include 'lib/koneksi.php';

    $desk = $_POST['deskripsi'];
    $harga = $_POST['harga'];
    $hargabeli = $_POST['hargabeli'];
    $stok = $_POST['stok'];

    $name_image = $_FILES['gambar']['name'];
    $loc_image = $_FILES['gambar']['tmp_name'];
    $type_image = $_FILES['gambar']['type'];

    $date = date('Ymd');

    $cek = array('png', 'jpg', 'jpeg', 'gif');
    $x = explode('.', $name_image);
    $extension = strtolower(end($x));
    $size_image = $_FILES['gambar']['size'];

    if (in_array($extension, $cek) === TRUE) {
        if ($size_image < 5044070) {
            move_uploaded_file($loc_image, "img/produk/$name_image");

            try {
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $pdo = $conn->prepare('INSERT INTO tbl_barang (deskripsi, harga, hargabeli, stok, created, nama_image, type_image, size_image)
                                      values (:deskripsi, :harga, :hargabeli, :stok, :created, :nama_image, :type_image, :size_image)');

                $insertdata = array(
                    ':deskripsi' => $desk,
                    ':harga' => $harga,
                    ':hargabeli' => $hargabeli,
                    ':stok' => $stok,
                    ':created' => $date,
                    ':nama_image' => $name_image,
                    ':type_image' => $type_image,
                    ':size_image' => $size_image
                );

                $pdo->execute($insertdata);

                echo "<div class='success-message'>";
                echo "<img src='img/icons/ceklist.png' alt='Success'>";
                echo "<br>";
                echo "<b>barang berhasil ditambahkan</b>";
                echo "</div>";
                echo "<meta http-equiv='refresh' content='1; url=?page=barang'>";
            } catch (PDOexception $e) {
                echo "<div class='error-message'>";
                echo "tambah barang gagal: " . $e->getMessage() . "<br/>";
                echo "</div>";
                die();
            }
        } else {
            echo "<div class='error-message'>";
            echo "<img src='img/icons/cancel.png' alt='Error'>";
            echo "<br>";
            echo "<b>ukuran file gambar terlalu besar</b>";
            echo "<br>";
            echo "<a href='?page=tambah_barang'>back</a>";
            echo "</div>";
        }
    } else {
        echo "<div class='error-message'>";
        echo "<img src='img/icons/cancel.png' alt='Error'>";
        echo "<br>";
        echo "<b>ekstensi file tidak sesuai</b>";
        echo "<br>";
        echo "<a href='?page=tambah_barang'>back</a>";
        echo "</div>";
    }
    ?>
</div>
