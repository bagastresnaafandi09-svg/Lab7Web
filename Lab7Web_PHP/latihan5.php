<!DOCTYPE html>
<html lang="id">
<head><meta charset="UTF-8"><title>Latihan GET</title></head>
<body>
<h2>Pencarian Kata Kunci (GET)</h2>
<form method="GET" action="">
    <label for="kata">Kata kunci:</label>
    <input id="kata" type="text" name="kata" value="<?= htmlspecialchars($_GET["kata"] ?? "", ENT_QUOTES, "UTF-8") ?>">
    <button type="submit">Cari</button>
</form>
<?php if (isset($_GET["kata"])): ?>
    <p>Kata kunci: <?= htmlspecialchars(trim($_GET["kata"]), ENT_QUOTES, "UTF-8") ?></p>
<?php endif; ?>
<p><a href="index.php">Kembali ke menu</a></p>
</body>
</html>
