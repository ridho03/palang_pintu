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
    $sql = "SELECT * FROM user WHERE username = ?";
    $stmt = mysqli_prepare($conn, $sql);
    
    // Bind parameter
    mysqli_stmt_bind_param($stmt, "s", $username);
    
    // Eksekusi statement
    mysqli_stmt_execute($stmt);
    
    // Mengambil hasil
    $result = mysqli_stmt_get_result($stmt);
    
    // Memeriksa apakah ada pengguna yang ditemukan
    if ($user = mysqli_fetch_assoc($result)) {
        // Verifikasi kata sandi
        if (password_verify($password, $user['password'])) {
            // Kata sandi valid, login berhasil
            header("Location: dasboard/index.php?uid=" . $uid);
        exit();
        } else {
            // Kata sandi salah
            echo '<script>alert("Username atau password salah!");';
            echo 'window.location.href = "/palang_pintu/index.html";</script>';
            return;
        }
    } else {
        // Pengguna tidak ditemukan
        echo '<script>alert("User Not Found!");';
        echo 'window.location.href = "/palang_pintu/index.html";</script>';
        return;
    }

    // Mengecek apakah username dan password valid
    $sql = "SELECT * FROM user WHERE username='$username' ";
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
