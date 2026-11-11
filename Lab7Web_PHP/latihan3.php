<?php
$mahasiswa = ["Alya", "Bima", "Citra", "Doni", "Bagas", "Andi", "Salsa"];
?>
<!DOCTYPE html>
<html lang="id">
<head><meta charset="UTF-8"><title>Latihan 3 PHP</title></head>
<body>
<h2>Daftar Mahasiswa</h2>
<ol>
<?php foreach ($mahasiswa as $nama): ?>
    <li><?= htmlspecialchars($nama, ENT_QUOTES, "UTF-8") ?></li>
<?php endforeach; ?>
</ol>
<p><a href="index.php">Kembali ke menu</a></p>
</body>
</html>
