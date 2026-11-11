<!DOCTYPE html>
<html lang="id">
<head><meta charset="UTF-8"><title>Latihan 7 PHP</title></head>
<body>
<h2>Form Transaksi Barang</h2>
<form method="POST">
    <label for="barang">Nama Barang:</label>
    <input id="barang" type="text" name="barang" required>
    <br><br>
    <label for="harga">Harga:</label>
    <input id="harga" type="number" name="harga" min="0" step="0.01" required>
    <br><br>
    <label for="jumlah">Jumlah:</label>
    <input id="jumlah" type="number" name="jumlah" min="1" step="1" required>
    <br><br>
    <button type="submit">Hitung</button>
</form>
<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $barang = trim($_POST["barang"] ?? "");
    $hargaInput = $_POST["harga"] ?? "";
    $jumlahInput = $_POST["jumlah"] ?? "";
    if ($barang === "" || !is_numeric($hargaInput) ||
        !ctype_digit((string)$jumlahInput) ||
        (float)$hargaInput < 0 || (int)$jumlahInput < 1) {
        echo "<p>Periksa kembali nama barang, harga, dan jumlah.</p>";
    } else {
        $harga = (float)$hargaInput;
        $jumlah = (int)$jumlahInput;
        $subtotal = $harga * $jumlah;
        echo "<h3>Hasil Transaksi</h3>";
        echo "Barang: " . htmlspecialchars($barang, ENT_QUOTES, "UTF-8") . "<br>";
        echo "Harga: Rp" . number_format($harga, 0, ",", ".") . "<br>";
        echo "Jumlah: " . $jumlah . "<br>";
        echo "Subtotal: Rp" . number_format($subtotal, 0, ",", ".");
    }
}
?>
<p><a href="index.php">Kembali ke menu</a></p>
</body>
</html>
