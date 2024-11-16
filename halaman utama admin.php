<?php
session_start();

if (!isset($_SESSION['username']) || $_SESSION['role'] !== 'admin') {
  header("Location: halaman login.php");
  exit();
}


// Handle logout if the 'logout' query parameter is set
if (isset($_GET['logout']) && $_GET['logout'] == 'true') {
    session_destroy(); // Destroy the session
    header("Location: halaman login.php"); // Redirect to the login page
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

    .main-container {
      margin-top: 50px;
      text-align: center;
    }

    .btn-3d {
      padding: 10px 20px;
      font-size: 0.9rem;
      font-weight: bold;
      color: #fff;
      text-align: center;
      border: none;
      border-radius: 8px;
      text-decoration: none;
      transition: transform 0.2s ease, box-shadow 0.2s ease;
      box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.2);
    }

    .btn-3d:hover {
      transform: translateY(-3px);
      box-shadow: 0px 6px 12px rgba(0, 0, 0, 0.3);
    }

    .btn-registration {
      background-color: #007bff;
    }

    .btn-registered-users {
      background-color: #6f42c1;
    }

    .btn-award-list {
      background-color: #17a2b8;
    }

    .btn-logout {
      background-color: #dc3545;
    }

    .btn-template {
      background-color: #20c997;
    }

    /* Ensure the navbar items align to the right */
    .navbar-nav {
      margin-left: auto;
    }
  </style>
</head>
<body>

  <!-- Responsive Navbar -->
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">Aplikasi Pengelolaan Akun</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarButtons" aria-controls="navbarButtons" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarButtons">
        <div class="navbar-nav ms-auto"> <!-- Ensure buttons are aligned to the right -->
          <a href="announcement_form.php" class="btn-3d btn-registration nav-link">Pengisian Pengumuman</a>
          <a href="penghargaan.php" class="btn-3d btn-template nav-link">penghargaan</a>
          <a href="list penghargaan.php" class="btn-3d btn-award-list nav-link">Daftar Penghargaan</a>
          <a href="template.php" class="btn-3d btn-template nav-link">Template</a>
          <a href="akun terdaftar.php" class="btn-3d btn-registered-users nav-link">Daftar Akun</a>
          <a href="hapus akun.php" class="btn-3d btn-award-list nav-link">Hapus Akun</a>

          <a href="?logout=true" class="btn-3d btn-logout nav-link">Logout</a>
        </div>
      </div>
    </div>
  </nav>

  <div class="container main-container">
    <h1>Selamat Datang di Halaman Utama</h1>
    <p class="lead">Pilih salah satu menu di pojok kanan atas untuk melanjutkan.</p>
  </div>

  <footer class="bg-dark text-white text-center py-3 mt-5">
    <div class="container">
      <p>&copy; 2024 Aplikasi Pengelolaan Akun. Semua hak dilindungi.</p>
    </div>
  </footer>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
