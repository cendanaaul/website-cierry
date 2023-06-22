<?php
// keranjang_ubah.php

include 'lib/koneksi.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Perform necessary database operations to retrieve the item information based on the ID

    // For example:
    $query = $conn->prepare("SELECT * FROM tbl_keranjang WHERE id = :id");
    $query->bindParam(':id', $id);
    $query->execute();
    $item = $query->fetch(PDO::FETCH_ASSOC);

    // Check if the item exists
    if ($item) {
        $itemId = $item['id_barang'];

        // Retrieve the item price from the tbl_barang table
        $priceQuery = $conn->prepare("SELECT harga FROM tbl_barang WHERE id_barang = :itemId");
        $priceQuery->bindParam(':itemId', $itemId);
        $priceQuery->execute();
        $priceData = $priceQuery->fetch(PDO::FETCH_ASSOC);
        $harga = $priceData['harga'];

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Handle form submission and update the quantity in the database
            $newQuantity = $_POST['qty'];

            // Calculate the new total based on the updated quantity
            $newTotal = $harga * $newQuantity;

            // Perform necessary database operations to update the quantity and total

            // For example:
            $updateQuery = $conn->prepare("UPDATE tbl_keranjang SET qty = :qty, total = :total WHERE id = :id");
            $updateQuery->bindParam(':qty', $newQuantity);
            $updateQuery->bindParam(':total', $newTotal);
            $updateQuery->bindParam(':id', $id);
            $updateQuery->execute();

            // Redirect back to the keranjang page
            header("Location: ?page=keranjang");
            exit();
        }

        // Display the form to update the quantity
?>
        <div class="container">
            <h2>Ubah Jumlah Barang</h2>
            <form method="POST" action="?page=keranjang_ubah&id=<?php echo $id; ?>">
                <label for="qty">Jumlah:</label>
                <input type="number" name="qty" value="<?php echo $item['qty']; ?>">
                <input type="submit" value="Simpan">
            </form>
        </div>
<?php
    } else {
        echo "Item not found.";
    }
} else {
    echo "Invalid request.";
}
?>