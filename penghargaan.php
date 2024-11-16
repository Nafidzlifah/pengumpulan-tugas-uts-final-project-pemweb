<?php
// Start session if needed
session_start();

// Define variables and set to empty values
$kelas_terbersih = $guru_kelas_bersih = $kelas_terkotor = $guru_kelas_kotor = "";
$success_message = "";

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if at least one section is filled
    if (!empty($_POST['kelas_terbersih']) || !empty($_POST['kelas_terkotor'])) {
        // Get form data and sanitize it
        $kelas_terbersih = !empty($_POST['kelas_terbersih']) ? htmlspecialchars($_POST['kelas_terbersih']) : '';
        $guru_kelas_bersih = !empty($_POST['guru_kelas_bersih']) ? htmlspecialchars($_POST['guru_kelas_bersih']) : '';
        $kelas_terkotor = !empty($_POST['kelas_terkotor']) ? htmlspecialchars($_POST['kelas_terkotor']) : '';
        $guru_kelas_kotor = !empty($_POST['guru_kelas_kotor']) ? htmlspecialchars($_POST['guru_kelas_kotor']) : '';

        // Build success message based on filled sections
        $success_message = "Pendaftaran berhasil! Data yang terdaftar:<br>";
        if ($kelas_terbersih) {
            $success_message .= "<strong>Kelas Terbersih:</strong> $kelas_terbersih (Guru: $guru_kelas_bersih)<br>";
        }
        if ($kelas_terkotor) {
            $success_message .= "<strong>Kelas Terkotor:</strong> $kelas_terkotor (Guru: $guru_kelas_kotor)<br>";
        }

        // Prepare data to be written to the text file
        $data_to_save = "Kelas Terbersih: $kelas_terbersih (Guru: $guru_kelas_bersih)\n";
        $data_to_save .= "Kelas Terkotor: $kelas_terkotor (Guru: $guru_kelas_kotor)\n";
        $data_to_save .= "==============================\n";

        // Write the data to the file
        $file = fopen("data_terdaftar.txt", "a"); // Open file in append mode
        fwrite($file, $data_to_save); // Write data to file
        fclose($file); // Close the file
    } else {
        // Error message if no section is filled
        $success_message = "Harap mengisi minimal satu bagian form untuk pendaftaran.";
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Form Pendaftaran Penghargaan</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      background-color: #f8f9fa;
    }
    .container {
      max-width: 600px;
      margin-top: 50px;
    }
    .form-title {
      text-align: center;
      margin-bottom: 30px;
    }

    /* Tombol kembali simple di pojok kanan atas dengan efek 3D */
    .btn-back {
      position: fixed;
      top: 20px;
      right: 20px;
      background-color: #007bff;
      color: white;
      border: none;
      padding: 12px 20px;
      font-size: 14px;
      cursor: pointer;
      border-radius: 10px;
      box-shadow: 0 5px 15px rgba(0, 123, 255, 0.3);
      transition: transform 0.2s, box-shadow 0.3s;
    }

    /* Efek saat hover dan tekan (3D dan animasi gerak) */
    .btn-back:hover {
      background-color: #0056b3;
      box-shadow: 0 10px 25px rgba(0, 123, 255, 0.4);
    }

    .btn-back:active {
      transform: translateY(4px); /* Animasi gerak saat ditekan */
      box-shadow: 0 2px 5px rgba(0, 123, 255, 0.4);
    }

  </style>
</head>
<body>
  <div class="container">
    <h2 class="form-title">Form Pendaftaran Penghargaan</h2>

    <?php if ($success_message): ?>
      <div class="alert <?php echo strpos($success_message, 'berhasil') !== false ? 'alert-success' : 'alert-danger'; ?>">
        <?php echo $success_message; ?>
      </div>
    <?php endif; ?>

    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">

      <!-- Kelas Terbersih Section -->
      <div class="mb-4">
        <h4>Kelas Terbersih</h4>
        <div class="mb-3">
          <label for="kelas_terbersih" class="form-label">Nama Kelas</label>
          <input type="text" class="form-control" id="kelas_terbersih" name="kelas_terbersih" value="<?php echo $kelas_terbersih; ?>">
        </div>
        <div class="mb-3">
          <label for="guru_kelas_bersih" class="form-label">Nama Guru</label>
          <input type="text" class="form-control" id="guru_kelas_bersih" name="guru_kelas_bersih" value="<?php echo $guru_kelas_bersih; ?>">
        </div>
      </div>

      <!-- Kelas Terkotor Section -->
      <div class="mb-4">
        <h4>Kelas Terkotor</h4>
        <div class="mb-3">
          <label for="kelas_terkotor" class="form-label">Nama Kelas</label>
          <input type="text" class="form-control" id="kelas_terkotor" name="kelas_terkotor" value="<?php echo $kelas_terkotor; ?>">
        </div>
        <div class="mb-3">
          <label for="guru_kelas_kotor" class="form-label">Nama Guru</label>
          <input type="text" class="form-control" id="guru_kelas_kotor" name="guru_kelas_kotor" value="<?php echo $guru_kelas_kotor; ?>">
        </div>
      </div>

      <!-- Submit Button -->
      <button type="submit" class="btn btn-primary w-100">Daftar</button>
    </form>
  </div>

  <!-- Tombol Kembali -->
  <a href="halaman utama admin.php">
    <button class="btn-back">Kembali</button>
  </a>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
