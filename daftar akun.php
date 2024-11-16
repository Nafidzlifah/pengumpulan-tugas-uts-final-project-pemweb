<?php
// Menyertakan koneksi database
include 'koneksi.php';

// Menangani form submit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $email = $_POST['email'];

    // Hash password
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Menyiapkan query SQL dengan placeholder dan menggunakan backticks untuk nama tabel
    $stmt = $db->prepare("INSERT INTO `tbl_user` (username, password, email) VALUES (?, ?, ?)");

    // Mengikat parameter
    $stmt->bind_param("sss", $username, $hashed_password, $email);

    // Menjalankan query
    if ($stmt->execute()) {
        echo "Registrasi berhasil!";
    } else {
        echo "Error: " . $stmt->error;
    }

    // Menutup statement
    $stmt->close();
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrasi</title>
    <!-- Menyertakan Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        /* Menambahkan gambar latar belakang dari folder 'images' */
        body {
            background-image: url('gambar/bcg.jpg'); /* Ganti dengan path gambar yang sesuai */
            background-size: cover; /* Menyesuaikan ukuran gambar dengan layar */
            background-position: center; /* Memposisikan gambar di tengah */
            background-attachment: fixed; /* Membuat latar belakang tetap saat menggulir */
            height: 100vh; /* Memastikan body mengambil tinggi penuh layar */
            margin: 0; /* Menghilangkan margin default */
            display: flex;
            justify-content: center;
            align-items: center;
            position: relative; /* Menambahkan positioning relative untuk elemen yang lebih spesifik */
        }

        .container {
            position: relative; /* Memastikan kontainer form di atas background */
            z-index: 2; /* Form berada di atas GIF */
            background-color: rgba(255, 255, 255, 0.8); /* Memberikan sedikit transparansi untuk form */
            padding: 30px;
            border-radius: 10px;
            width: 100%;
            max-width: 500px; /* Ukuran form card */
        }

        .card {
            width: 100%;
            box-shadow: 0 4px 20px rgba(0, 0, 255, 0.4); /* Bayangan biru cerah */
            border-radius: 10px; /* Membuat sudut card lebih melengkung */
            overflow: hidden; /* Memastikan border-radius tidak terpotong */
        }

        .card-header {
            text-align: center;
            background-color: rgba(255, 255, 255, 0.8);
        }

        .card-body {
            background-color: rgba(255, 255, 255, 0.8);
            padding: 20px; /* Memberikan padding lebih untuk form */
        }

        .form-label {
            font-weight: bold; /* Menebalkan label untuk lebih jelas */
        }

        .form-control {
            border-radius: 5px; /* Membuat input lebih halus */
            margin-bottom: 15px; /* Memberikan jarak antar input */
        }

        input[type="submit"] {
            border-radius: 5px; /* Membuat tombol submit lebih halus */
        }

        /* Bayangan biru cerah pada tombol */
        input[type="submit"]:hover {
            box-shadow: 0 0 15px rgba(0, 0, 255, 0.6); /* Bayangan biru cerah saat hover */
        }

    </style>
</head>
<body>

    <!-- Kontainer form -->
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h4>Halaman Registrasi</h4>
            </div>
            <div class="card-body">
                <form method="POST" action="">
                    <div class="mb-3">
                        <label for="username" class="form-label">Username:</label>
                        <input type="text" id="username" name="username" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label">Email:</label>
                        <input type="email" id="email" name="email" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label for="password" class="form-label">Password:</label>
                        <input type="password" id="password" name="password" class="form-control" required>
                    </div>

                    <input type="submit" value="Registrasi" class="btn btn-primary w-100">
                </form>
                <div class="mt-3 text-center">
                    <p>Sudah punya akun? <a href="halaman login.php">Login di sini</a></p>
                </div>
            </div>
        </div>
    </div>

    <!-- Menyertakan Bootstrap JS dan dependensi -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>