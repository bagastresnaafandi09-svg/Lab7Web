<?php
function hitungDiskon($harga, $persen) {
    $potongan = $harga * ($persen / 100);
    return $harga - $potongan;
}
function hitungLuasPersegiPanjang($panjang, $lebar) {
    return $panjang * $lebar;
}
$hargaAkhir = hitungDiskon(150000, 10);
$luas = hitungLuasPersegiPanjang(8, 4);
?>
<!DOCTYPE html>
<html lang="id">
<head><meta charset="UTF-8"><title>Latihan 4 PHP</title></head>
<body>
<h2>Hasil Function</h2>
<p>Harga awal: Rp150.000</p>
<p>Diskon: 10%</p>
<p>Harga setelah diskon: Rp<?= number_format($hargaAkhir, 0, ",", ".") ?></p>
<p>Luas persegi panjang (8 x 4): <?= $luas ?> cm²</p>
<p><a href="index.php">Kembali ke menu</a></p>
</body>
</html>
