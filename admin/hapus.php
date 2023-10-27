<?php
include "koneksi.php";

// Memeriksa apakah parameter id_trx telah diterima dari URL
if (isset($_GET['id_trx'])) {
    $id_trx = $_GET['id_trx'];

    // Menyiapkan query SQL menggunakan prepared statement
    $query = "DELETE FROM trx WHERE id_trx = ?";

    // Membuat prepared statement
    $stmt = mysqli_prepare($conn, $query);

    // Memeriksa apakah prepared statement berhasil dibuat
    if ($stmt) {
        // Mengikat parameter sebagai VARCHAR
        mysqli_stmt_bind_param($stmt, "s", $id_trx);

        // Menjalankan prepared statement
        if (mysqli_stmt_execute($stmt)) {
            // Jika hapus berhasil, arahkan kembali ke halaman utama atau tampilkan pesan sukses
            header("Location: data_transaksi.php");
            exit();
        } else {
            // Jika terjadi kesalahan saat menghapus, tampilkan pesan error
            echo "Error: " . mysqli_error($conn);
        }

        // Menutup prepared statement
        mysqli_stmt_close($stmt);
    } else {
        // Jika prepared statement gagal, tampilkan pesan error
        echo "Error: Prepared statement failed.";
    }
} else {
    // Jika id_trx tidak valid, arahkan kembali ke halaman utama atau tampilkan pesan error
    header("Location: index.php"); // Ganti dengan halaman utama aplikasi Anda
    exit();
}

// Menutup koneksi database
mysqli_close($conn);
?>
