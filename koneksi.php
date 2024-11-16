<?php
// database.php
$host = 'localhost'; // Sesuaikan dengan host database Anda
$user = 'root';      // Sesuaikan dengan username database Anda
$password = '';      // Sesuaikan dengan password database Anda
$dbname = 'akun user'; // Ganti dengan nama database Anda

// Membuat koneksi
$db = new mysqli($host, $user, $password, $dbname);

// Cek apakah koneksi berhasil
if ($db->connect_error) {
    die("Koneksi gagal: " . $db->connect_error);
}
