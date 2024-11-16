<?php
session_start();
// Periksa apakah pengguna sudah login dan memiliki peran user
if (!isset($_SESSION['username']) || $_SESSION['role'] !== 'user') {
  header("Location: halaman login.php");
  exit();
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Halaman Utama</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      background-color: #f8f9fa;
    }

    /* Main Content Styling */
    .main-container {
      margin-top: 50px;
      text-align: center;
    }

    /* 3D Button Styling */
    .btn-3d {
      padding: 10px 20px;
      font-size: 0.9rem;
      font-weight: bold;
      color: #fff;
      border: none;
      border-radius: 8px;
      text-decoration: none;
      transition: transform 0.2s ease, box-shadow 0.2s ease;
      box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.2);
      margin: 5px;
      display: inline-flex; /* Make sure buttons are inline */
      justify-content: center; /* Center text horizontally */
      align-items: center; /* Center text vertically */
      text-align: center; /* Ensure text is centered */
    }

    .btn-3d:hover {
      transform: translateY(-3px);
      box-shadow: 0px 6px 12px rgba(0, 0, 0, 0.3);
    }

    /* Button Colors */
    .btn-registration { background-color: #007bff; } /* Bright Blue */
    .btn-award-list { background-color: #6f42c1; } /* Purple */
    .btn-announcement { background-color: #28a745; } /* Green */
    .btn-template { background-color: #20c997; } /* Teal */
    .btn-login { background-color: #ffc107; color: #212529; } /* Amber */
    .btn-logout { background-color: #dc3545; } /* Red */
  </style>
</head>
<body>
  
  <!-- Navbar with Collapse Button -->
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">SERTIFIKASI SMKN 1 KARAWANG</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarButtons" aria-controls="navbarButtons" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarButtons">
        <ul class="navbar-nav ms-auto"> <!-- Ensures buttons are on the right -->
          <li class="nav-item">
            <a href="form penghargaan.php" class="btn-3d btn-registration nav-link">Pendaftaran</a>
          </li>
          <li class="nav-item">
            <a href="award_list.php" class="btn-3d btn-award-list nav-link">Daftar Penghargaan</a>
          </li>
          <li class="nav-item">
            <a href="announcements.php" class="btn-3d btn-announcement nav-link">Pengumuman</a>
          </li>
          <li class="nav-item">
            <a href="ubah pasword.php" class="btn-3d btn-template nav-link">Ubah Password</a>
          </li>
          <li class="nav-item">
            <?php if (isset($_SESSION['username'])): ?>
              <a href="logout.php" class="btn-3d btn-logout nav-link">Logout</a>
            <?php else: ?>
              <a href="halaman login.php" class="btn-3d btn-login nav-link">Login</a>
            <?php endif; ?>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <!-- Main Content -->
  <div class="container main-container">
    <h1>Selamat Datang di Halaman Utama</h1>
    <p class="lead">Ini adalah halaman utama aplikasi. Silakan pilih menu di pojok kanan atas untuk melanjutkan.</p>
  </div>

  <footer class="bg-dark text-white text-center py-3 mt-5">
    <div class="container">
      <p>&copy; 2024 SERTIFIKASI SMKN 1 KARAWANG. Semua hak dilindungi.</p>
    </div>
  </footer>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
