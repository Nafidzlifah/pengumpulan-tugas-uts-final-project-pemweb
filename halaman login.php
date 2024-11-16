<?php
// Menyertakan koneksi database
include 'koneksi.php';

// Menangani form submit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Query untuk mengambil data user dari database
    $sql = "SELECT * FROM tbl_user WHERE username = '$username'";
    $result = $db->query($sql);

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        
        // Memeriksa password
        if (password_verify($password, $user['password'])) {
            session_start();
        
            // Simpan username dan role ke dalam sesi
            $_SESSION['username'] = $user['username'];
            $_SESSION['role'] = $user['role'];
        
            echo "Login berhasil, selamat datang, " . $user['username'] . "!";
        
            // Arahkan ke halaman dashboard sesuai peran
            if ($user['role'] === 'admin') {
                header("Location: halaman utama admin.php");
            } else {
                header("Location: halaman utama.php");
            }
            exit();
        } else {
            echo "Password salah!";
        }
    } else {
        echo "Username tidak ditemukan!";
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <!-- Menyertakan Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        /* Menambahkan gambar latar belakang */
        body {
            background-image: url('gambar/bcg.jpg'); /* Ganti dengan nama file dan lokasi gambar Anda */
            background-size: cover; /* Menyesuaikan ukuran gambar dengan layar */
            background-position: center; /* Memposisikan gambar di tengah */
            background-attachment: fixed; /* Membuat latar belakang tetap saat menggulir */
            margin: 0;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            position: relative;
        }

        .container {
            position: relative;
            background-color: rgba(255, 255, 255, 0.8); /* Memberikan sedikit transparansi */
            padding: 30px;
            border-radius: 10px;
            width: 100%;
            max-width: 500px; /* Ukuran form card */
            box-shadow: 0 4px 10px rgba(0, 0, 255, 0.3); /* Bayangan biru pada form */
        }

        .form-control {
            border-radius: 5px; /* Membuat input lebih halus */
            margin-bottom: 15px; /* Memberikan jarak antar input */
            box-shadow: 0 2px 5px rgba(0, 0, 255, 0.3); /* Bayangan biru pada kolom input */
        }

        .btn {
            border-radius: 5px; /* Membuat tombol submit lebih halus */
            box-shadow: 0 2px 5px rgba(0, 0, 255, 0.3); /* Bayangan biru pada tombol */
        }

        .btn:hover {
            box-shadow: 0 4px 10px rgba(0, 0, 255, 0.6); /* Bayangan biru lebih besar pada tombol saat hover */
        }

        /* Card header */
        .card-header {
            text-align: center;
            background-color: rgba(255, 255, 255, 0.8);
            box-shadow: 0 2px 5px rgba(0, 0, 255, 0.3); /* Bayangan biru pada card header */
        }
    </style>
</head>
<body class="bg-light">
    <div class="container d-flex justify-content-center align-items-center">
        <div class="card shadow-lg" style="width: 100%; max-width: 400px;">
            <div class="card-header">
                <h4>Halaman Login</h4>
            </div>
            <div class="card-body">
                <form method="POST" action="">
                    <div class="mb-3">
                        <label for="username" class="form-label">Username:</label>
                        <input type="text" id="username" name="username" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password:</label>
                        <input type="password" id="password" name="password" class="form-control" required>
                    </div>
                    <button type="submit" class="btn btn-primary w-100">Login</button>
                </form>
                <div class="mt-3 text-center">
                    <p>Belum punya akun? <a href="daftar akun.php">Registrasi di sini</a></p>
                </div>
            </div>
        </div>
    </div>

    <!-- Menyertakan Bootstrap JS dan dependensi -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
