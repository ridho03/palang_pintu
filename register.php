<?php
include "koneksi/koneksi.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];
    $uid = $_POST["uid"];

    // Perintah SQL untuk menyimpan data ke dalam tabel admin
    $sql = "INSERT INTO login (uid, username, password) VALUES ('$uid', '$username', '$password')";

    if (mysqli_query($conn, $sql)) {
        // Data berhasil disimpan, tampilkan pesan sukses menggunakan JavaScript
        echo '<script>alert("Berhasil Register!");';
        echo 'window.location.href = "/palang_pintu/index.html";</script>';
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        // Tampilkan pesan error
        echo '<script>alert("Gagal menyimpan data.");';
        echo 'window.location.href = "/palang_pintu/register.html";</script>';
        return;
    }
}

mysqli_close($conn);
