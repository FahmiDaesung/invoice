<?php
session_start();
include("conn.php");
date_default_timezone_set('Asia/Jakarta');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = mysqli_real_escape_string($koneksi, $_POST['username']);
    $password = mysqli_real_escape_string($koneksi, $_POST['password']);

    $query = "SELECT * FROM admin WHERE username='$username' AND password='$password'";
    $result = mysqli_query($koneksi, $query);

    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);

        $_SESSION['id_user'] = $row['id_user'];
        $_SESSION['username'] = $row['username'];
        $_SESSION['nama'] = $row['nama'];
        $_SESSION['alamat'] = $row['alamat'];
        $_SESSION['level'] = $row['level'];
        $_SESSION['gambar'] = $row['gambar'];

        if ($_SESSION['level'] == 'Admin') {
            echo "success:" . $_SESSION['nama']; // Mengirim balasan sukses bersama dengan nama pengguna
        } else {
            echo "success"; // Mengirim balasan sukses tanpa nama pengguna untuk level lain
        }
    } else {
        echo "error"; // Mengirim balasan error jika login gagal
    }
}
?>
