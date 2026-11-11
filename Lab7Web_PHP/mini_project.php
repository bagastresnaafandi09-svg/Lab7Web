<?php
$data = null;
$error = [];

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $nama = trim($_POST["nama"] ?? "");
    $nim = trim($_POST["nim"] ?? "");
    $prodi = trim($_POST["prodi"] ?? "");
    $semesterInput = $_POST["semester"] ?? "";
    $email = trim($_POST["email"] ?? "");

    if ($nama === "") $error[] = "Nama wajib diisi.";
    if ($nim === "") {
        $error[] = "NIM wajib diisi.";
    } elseif (!ctype_digit($nim)) {
        $error[] = "NIM harus berupa angka.";
    }
    if ($prodi === "") $error[] = "Program studi wajib diisi.";
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error[] = "Format email tidak valid.";
    }
    if (!ctype_digit((string)$semesterInput) ||
        (int)$semesterInput < 1 || (int)$semesterInput > 14) {
        $error[] = "Semester harus berupa angka 1 sampai 14.";
    }

    if (!$error) {
        $data = [
            "nama" => $nama,
            "nim" => $nim,
            "prodi" => $prodi,
            "semester" => (int)$semesterInput,
            "email" => $email
        ];
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mini Project Data Mahasiswa</title>
</head>
<body>
<h2>Formulir Data Mahasiswa</h2>
<form method="POST" action="">
    <label for="nama">Nama Lengkap:</label><br>
    <input id="nama" type="text" name="nama" required><br><br>

    <label for="nim">NIM:</label><br>
    <input id="nim" type="text" name="nim" required><br><br>

    <label for="prodi">Program Studi:</label><br>
    <input id="prodi" type="text" name="prodi" required><br><br>

    <label for="semester">Semester:</label><br>
    <input id="semester" type="number" name="semester" min="1" max="14" required><br><br>

    <label for="email">Email:</label><br>
    <input id="email" type="email" name="email" required><br><br>

    <button type="submit">Kirim Data</button>
    <button type="reset">Reset</button>
</form>

<?php if ($error): ?>
    <h3>Terjadi Kesalahan:</h3>
    <ul>
        <?php foreach ($error as $pesan): ?>
            <li><?= htmlspecialchars($pesan, ENT_QUOTES, "UTF-8") ?></li>
        <?php endforeach; ?>
    </ul>
<?php elseif ($data): ?>
    <h3>Data Mahasiswa Berhasil Diterima</h3>
    <p>Nama: <?= htmlspecialchars($data["nama"], ENT_QUOTES, "UTF-8") ?></p>
    <p>NIM: <?= htmlspecialchars($data["nim"], ENT_QUOTES, "UTF-8") ?></p>
    <p>Program Studi: <?= htmlspecialchars($data["prodi"], ENT_QUOTES, "UTF-8") ?></p>
    <p>Semester: <?= $data["semester"] ?></p>
    <p>Email: <?= htmlspecialchars($data["email"], ENT_QUOTES, "UTF-8") ?></p>
<?php endif; ?>
<p><a href="index.php">Kembali ke menu</a></p>
</body>
</html>
