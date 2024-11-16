<?php
// Start session if needed
session_start();

// Define file path
$file_path = "data_terdaftar.txt";

// Initialize variable to store data
$data_entries = [];

// Check if the file exists and is readable
if (file_exists($file_path) && is_readable($file_path)) {
    // Read the file into an array of lines
    $file_lines = file($file_path, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

    // Parse the file content into structured data
    $current_entry = [];
    foreach ($file_lines as $line) {
        if (strpos($line, "Kelas Terbersih:") === 0) {
            $current_entry['kelas_terbersih'] = trim(substr($line, strlen("Kelas Terbersih:")));
        } elseif (strpos($line, "Kelas Terkotor:") === 0) {
            $current_entry['kelas_terkotor'] = trim(substr($line, strlen("Kelas Terkotor:")));
        } elseif (trim($line) === "==============================") {
            // Save the entry and reset for the next
            $data_entries[] = $current_entry;
            $current_entry = [];
        }
    }
}

?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Daftar Penghargaan Kelas</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      background-color: #f8f9fa;
    }
    .container {
      margin-top: 50px;
    }
    .table-container {
      margin-top: 30px;
    }
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
    .btn-back:hover {
      background-color: #0056b3;
      box-shadow: 0 10px 25px rgba(0, 123, 255, 0.4);
    }
    .btn-back:active {
      transform: translateY(4px);
      box-shadow: 0 2px 5px rgba(0, 123, 255, 0.4);
    }
  </style>
</head>
<body>
  <div class="container">
    <h2 class="text-center">Daftar Penghargaan Kelas</h2>

    <!-- Check if there are any entries -->
    <?php if (!empty($data_entries)): ?>
      <div class="table-responsive table-container">
        <table class="table table-bordered table-striped">
          <thead>
            <tr>
              <th>No</th>
              <th>Kelas Terbersih</th>
              <th>Kelas Terkotor</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($data_entries as $index => $entry): ?>
              <tr>
                <td><?php echo $index + 1; ?></td>
                <td><?php echo !empty($entry['kelas_terbersih']) ? $entry['kelas_terbersih'] : '-'; ?></td>
                <td><?php echo !empty($entry['kelas_terkotor']) ? $entry['kelas_terkotor'] : '-'; ?></td>
              </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
    <?php else: ?>
      <div class="alert alert-warning text-center">Tidak ada data yang terdaftar.</div>
    <?php endif; ?>
  </div>

  <!-- Back button to return to the main page -->
  <a href="halaman utama admin.php">
    <button class="btn-back">Kembali</button>
  </a>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
