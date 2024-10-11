<?php

// Mengecek apakah UID ada di URL
if (isset($_GET['uid'])) {
    $uid = $_GET['uid'];
} else {
    die("UID tidak ditemukan.");
}

include "../koneksi/koneksi.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (!$conn) {
        die("Koneksi database gagal: " . mysqli_connect_error());
    }

    // Mengambil data dari form
    $id = mysqli_real_escape_string($conn, $_POST["id"]);
    $nama = mysqli_real_escape_string($conn, $_POST["nama"]);
    $karbon = mysqli_real_escape_string($conn, $_POST["karbon"]);

    // Cek apakah ID ada di tabel data
    $check_id_query = "SELECT * FROM data WHERE id = ?";
    $check_id_stmt = mysqli_prepare($conn, $check_id_query);

    if ($check_id_stmt === false) {
        die("Query salah: " . mysqli_error($conn));
    }

    mysqli_stmt_bind_param($check_id_stmt, "s", $id);
    mysqli_stmt_execute($check_id_stmt);
    $result = mysqli_stmt_get_result($check_id_stmt);

    // Jika ID tidak ditemukan, tampilkan pesan error
    if (mysqli_num_rows($result) === 0) {
        echo "<script>alert('ID tidak ditemukan dalam tabel data. Upload gagal.'); window.location.href = 'index.php?uid=" . $uid . "';</script>";
        exit;
    }

    // Menambahkan data ke tabel shop
    $stmt = mysqli_prepare($conn, "INSERT INTO shop (id, nama, karbon) VALUES (?, ?, ?)");

    if ($stmt === false) {
        die("Query salah: " . mysqli_error($conn));
    }

    // Bind parameter ke statement
    mysqli_stmt_bind_param($stmt, "sss", $id, $nama, $karbon);

    // Eksekusi statement untuk menambahkan data ke tabel shop
    if (mysqli_stmt_execute($stmt)) {
        // Jika berhasil menambahkan, kurangi nilai kkarbon di tabel data berdasarkan id
        $update_stmt = mysqli_prepare($conn, "UPDATE data SET skarbon = skarbon - ? WHERE id = ?");

        if ($update_stmt === false) {
            die("Query salah: " . mysqli_error($conn));
        }

        // Bind parameter ke statement update (karbon dan id)
        mysqli_stmt_bind_param($update_stmt, "ds", $karbon, $id);

        // Eksekusi statement untuk mengurangi nilai kkarbon di tabel data
        if (mysqli_stmt_execute($update_stmt)) {
            echo "<script>
                alert('Berhasil Menjual Karbon');
                window.location.href = 'index.php?uid=" . $uid . "';
            </script>";
        } else {
            echo "<script>alert('Gagal Menjual karbon: " . mysqli_error($conn) . "');</script>";
        }

        // Tutup statement update
        mysqli_stmt_close($update_stmt);

    } else {
        echo "<script>alert('Gagal menambahkan data: " . mysqli_error($conn) . "');</script>";
    }

    // Tutup statement insert
    mysqli_stmt_close($stmt);
    // Tutup statement check id
    mysqli_stmt_close($check_id_stmt);

    // Tutup koneksi
    mysqli_close($conn);
}
?>