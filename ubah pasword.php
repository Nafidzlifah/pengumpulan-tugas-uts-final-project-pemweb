<?php

include "koneksi.php"; // File koneksi ke database
session_start();

// Periksa apakah pengguna sudah login
if (!isset($_SESSION['username'])) {
    header("Location: halaman login.php"); // Redirect jika belum login
    exit();
}

$error = "";
$username = $_SESSION['username'];

// Tangani permintaan ubah kata sandi
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $old_password = $_POST['old_password'];
    $new_password = $_POST['new_password'];

    // Query untuk mendapatkan data pengguna berdasarkan username
    $query = "SELECT * FROM tbl_user WHERE username = ?";
    $stmt = mysqli_prepare($db, $query);
    mysqli_stmt_bind_param($stmt, "s", $username);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if ($row = mysqli_fetch_assoc($result)) {
        // Validasi kata sandi lama
        if (password_verify($old_password, $row['password'])) {
            // Hash kata sandi baru
            $new_password_hashed = password_hash($new_password, PASSWORD_DEFAULT);

            // Perbarui kata sandi di database
            $update_query = "UPDATE tbl_user SET password = ? WHERE username = ?";
            $update_stmt = mysqli_prepare($db, $update_query);
            mysqli_stmt_bind_param($update_stmt, "ss", $new_password_hashed, $username);

            if (mysqli_stmt_execute($update_stmt)) {
                $error = "Kata sandi berhasil diubah.";
            } else {
                $error = "Gagal mengubah kata sandi. Coba lagi.";
            }
        } else {
            $error = "Kata sandi lama salah.";
        }
    } else {
        $error = "Akun tidak ditemukan.";
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ubah Kata Sandi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <h2 class="mt-5">Ubah Kata Sandi</h2>
        <?php if ($error): ?>
            <div class="alert alert-warning"><?php echo $error; ?></div>
        <?php endif; ?>
        <form method="POST" action="">
            <div class="mb-3">
                <label for="old_password" class="form-label">Kata Sandi Lama</label>
                <input type="password" class="form-control" id="old_password" name="old_password" required>
            </div>
            <div class="mb-3">
                <label for="new_password" class="form-label">Kata Sandi Baru</label>
                <input type="password" class="form-control" id="new_password" name="new_password" required>
            </div>
            <button type="submit" class="btn btn-primary">Ubah Kata Sandi</button>
            <a href="halaman login.php" class="btn btn-secondary">Kembali ke Halaman Login</a>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
