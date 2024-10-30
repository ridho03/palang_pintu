<?php
include "koneksi/koneksi.php";

// Memeriksa koneksi
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Memeriksa data login
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Mengecek apakah username dan password valid
    $sql = "SELECT * FROM login WHERE username='$username' AND password='$password'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        // Ambil data pengguna
        $row = mysqli_fetch_assoc($result);
        $uid = $row['uid']; // Ambil UID dari hasil query login

        // Login berhasil, redirect dengan UID di URL
        echo '<script>alert("Berhasil Login!");</script>';
        header("Location: dasboard/index.php?uid=" . $uid);
        exit();
    } else {
        // Login gagal
        echo '<script>alert("Username atau password salah!");';
        echo 'window.location.href = "/palang_pintu/index.html";</script>';
        return;
    }
}

mysqli_close($conn);
