<?php
include "../koneksi/koneksi.php";

// Ambil ID dari GET request
$id = $_GET['id'];

// Ambil UID dari tabel data berdasarkan ID
$query = mysqli_query($conn, "SELECT uid FROM data WHERE id = '$id'");
$data = mysqli_fetch_array($query);

// Cek apakah data ditemukan
if ($data) {
    $uid = $data['uid']; // Simpan UID dari data sebelum penghapusan

    // Hapus data berdasarkan ID
    $hapus = mysqli_query($conn, "DELETE FROM data WHERE id = '$id'");

    // Cek apakah proses penghapusan berhasil
    if ($hapus) {
        // Redirect ke halaman dashboard dengan UID di URL
        echo "<script>alert('Data berhasil dihapus');</script>";
        echo "<script>window.location.href = '../dasboard/index.php?uid=$uid';</script>";
    } else {
        echo "<script>alert('Data tidak dapat dihapus'); window.location.href = '../dasboard/index.php';</script>";
    }
} else {
    // Jika UID tidak ditemukan
    echo "<script>alert('UID tidak ditemukan'); window.location.href = '../dasboard/index.php';</script>";
}
?>