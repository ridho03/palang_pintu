<?php
include "../koneksi/koneksi.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Koneksi ke database
    include "../koneksi/koneksi.php";

    if (!$conn) {
        die("Koneksi database gagal: " . mysqli_connect_error());
    }

    $nama = $_POST["nama"];
    $npm = $_POST["npm"];
    $uid = $_POST["id"];
    $no_plat = $_POST["no_plat"];
    $kendaraan = $_POST["kendaraan"];

    // File Upload Handling
    $file_name = $_FILES["file"]["name"];
    $file_tmp = $_FILES["file"]["tmp_name"];
    $file_size = $_FILES["file"]["size"];
    
    // Direktori penyimpanan file
    $upload_dir = "../image/";
    $target_file = $upload_dir . basename($file_name);

    // Periksa apakah file sudah ada atau ekstensinya diperbolehkan
    $allowed_extensions = array("jpg", "jpeg", "png", "gif");
    $extension = pathinfo($file_name, PATHINFO_EXTENSION);

    if (file_exists($target_file)) {
        echo "Berkas sudah ada.";
    } elseif (!in_array($extension, $allowed_extensions)) {
        echo "Berkas harus memiliki ekstensi jpg, jpeg, png, atau gif.";
    } else {
        // Tambahkan timestamp ke nama berkas untuk keunikan
        $file_name = time() . '_' . $file_name;

        // Upload file ke direktori
        if (move_uploaded_file($file_tmp, $upload_dir . $file_name)) {
            // Persiapan query
            $stmt = mysqli_prepare($conn, "INSERT INTO data (nama, npm, uid, no_plat, kendaraan, files) VALUES (?, ?, ?, ?, ?, ?)");

            if ($stmt === false) {
                die("Query salah: " . mysqli_error($conn));
            }

            // Bind parameter ke statement
            mysqli_stmt_bind_param($stmt, "ssssss", $nama, $npm, $uid, $no_plat, $kendaraan, $file_name);

            if (mysqli_stmt_execute($stmt)) {
                echo "Data berhasil disimpan. <a href='tampil.php'>Kembali ke halaman lain</a>";
            } else {
                echo "Terjadi kesalahan: " . mysqli_error($conn);
            }

            mysqli_stmt_close($stmt);
        } else {
            echo "Gagal mengunggah berkas.";
        }
    }

    // Tutup koneksi
    mysqli_close($conn);
}

