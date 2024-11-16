<?php
// Koneksi ke database
include('config.php');

// Query untuk mengambil data tim dari database
$query = "SELECT * FROM teams";
$result = $conn->query($query);
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Daftar Team yang Telah Terdaftar</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      background-color: #f8f9fa;
    }
    .container {
      margin-top: 50px;
    }
  </style>
</head>
<body>

  <div class="container">
    <h1 class="text-center">Daftar Team yang Telah Terdaftar</h1>
    <table class="table table-striped">
      <thead>
        <tr>
          <th>ID</th>
          <th>Nama Tim</th>
          <th>Asal Domisili</th>
          <th>Anggota Tim</th>
          <th>Nomor WhatsApp</th>
        </tr>
      </thead>
      <tbody>
        <?php
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row['id'] . "</td>";
                echo "<td>" . $row['team_name'] . "</td>";
                echo "<td>" . $row['domicile'] . "</td>";
                echo "<td>" . $row['team_members'] . "</td>";
                echo "<td>" . $row['wa_number'] . "</td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='5' class='text-center'>Tidak ada tim yang terdaftar.</td></tr>";
        }
        ?>
      </tbody>
    </table>
  </div>

  <footer class="bg-dark text-white text-center py-3 mt-5">
    <div class="container">
      <p>&copy; 2024 Aplikasi Data Nasabah. Semua hak dilindungi.</p>
    </div>
  </footer>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

<?php
// Menutup koneksi
$conn->close();
?>
