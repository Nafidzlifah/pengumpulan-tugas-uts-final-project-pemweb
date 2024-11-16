<?php
include "koneksi.php"; // File koneksi ke database

// Memulai sesi
session_start();

// Mengecek apakah pengguna telah login
if (!isset($_SESSION['username'])) {
    header("Location: halaman login.php"); // Arahkan ke halaman login jika belum login
    exit();
}

// Mengatur pesan kesalahan
$error = "";

// Menghapus akun berdasarkan permintaan
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['delete_username'])) {
    $delete_username = $_POST['delete_username'];

    // Query untuk menghapus akun dari database
    $query = "DELETE FROM tbl_user WHERE username = ?";
    $stmt = mysqli_prepare($db, $query);
    mysqli_stmt_bind_param($stmt, "s", $delete_username);

    if (mysqli_stmt_execute($stmt)) {
        $error = "Akun '$delete_username' berhasil dihapus.";
    } else {
        $error = "Gagal menghapus akun.";
    }
}

// Query untuk mengambil data dari tabel `tbl_user`
$query = "SELECT * FROM tbl_user WHERE role = 'user'";
$result = mysqli_query($db, $query);

// Cek apakah query berhasil dieksekusi
if (!$result) {
    die("Query gagal: " . mysqli_error($db));
}

// Ambil semua akun dari database
$users = mysqli_fetch_all($result, MYSQLI_ASSOC);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Akun Terdaftar</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .container {
            margin-top: 50px;
        }

        /* Card dengan bayangan */
        .card {
            box-shadow: 0 4px 20px rgba(0, 123, 255, 0.1);
            border-radius: 10px;
            padding: 20px;
        }

        /* Tabel dengan garis tebal */
        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            padding: 12px;
            text-align: center;
            border: 2px solid #007bff; /* Garis biru */
        }

        th {
            background-color: #007bff;
            color: white;
            font-weight: bold;
        }

        td {
            background-color: #f1f1f1;
        }

        tr:hover {
            background-color: #e9ecef;
        }

        .btn {
            background-color: #007bff;
            color: white;
            border-radius: 5px;
            border: none;
            padding: 10px 20px;
        }

        .btn:hover {
            background-color: #0056b3;
        }

        .alert {
            box-shadow: 0 4px 15px rgba(0, 123, 255, 0.1);
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="card">
            <h2 class="text-center">Daftar Akun Terdaftar</h2>
        
            <!-- Menampilkan pesan error atau sukses -->
            <?php if ($error): ?>
                <div class="alert alert-info"><?php echo $error; ?></div>
            <?php endif; ?>

            <!-- Menampilkan daftar akun terdaftar -->
            <?php if (!empty($users)): ?>
                <ul class="list-group mt-3">
                    <?php foreach ($users as $user): ?>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <?php echo htmlspecialchars($user['username']); ?>
                            <form method="POST" action="" style="margin: 0;">
                                <input type="hidden" name="delete_username" value="<?php echo htmlspecialchars($user['username']); ?>">
                                <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                            </form>
                        </li>
                    <?php endforeach; ?>
                </ul>
            <?php else: ?>
                <p class="text-center mt-3">Tidak ada akun yang terdaftar.</p>
            <?php endif; ?>

            <!-- Tombol kembali ke halaman utama -->
            <div class="text-center mt-4">
                <a href="halaman utama admin.php" class="btn">Kembali ke Halaman Utama Admin</a>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
