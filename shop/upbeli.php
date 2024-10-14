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
    $check_data_query = "SELECT id FROM data WHERE id = ?";
    $check_data_stmt = mysqli_prepare($conn, $check_data_query);
    mysqli_stmt_bind_param($check_data_stmt, "s", $id);
    mysqli_stmt_execute($check_data_stmt);
    $result_data = mysqli_stmt_get_result($check_data_stmt);

    if (mysqli_num_rows($result_data) === 0) {
        echo "<script>alert('ID tidak ditemukan dalam tabel data. Proses gagal.'); window.location.href = 'index.php?uid=" . $uid . "';</script>";
        exit;
    }

    // Cek nilai total karbon yang tersedia di tabel shop
    $check_karbon_query = "SELECT SUM(karbon) as total_karbon FROM shop";
    $check_karbon_stmt = mysqli_prepare($conn, $check_karbon_query);
    mysqli_stmt_execute($check_karbon_stmt);
    $result_karbon = mysqli_stmt_get_result($check_karbon_stmt);
    $row_karbon = mysqli_fetch_assoc($result_karbon);

    // Cek apakah jumlah karbon yang dimasukkan melebihi total yang tersedia
    if ($karbon > $row_karbon['total_karbon']) {
        echo "<script>alert('Jumlah karbon yang dimasukkan melebihi jumlah total yang tersedia di tabel shop.'); window.location.href = 'index.php?uid=" . $uid . "';</script>";
        exit;
    }

    // Mengurangi nilai karbon di tabel shop berdasarkan input dari form
    $update_shop_stmt = mysqli_prepare($conn, "UPDATE shop SET karbon = karbon - ? WHERE karbon > 0");
    mysqli_stmt_bind_param($update_shop_stmt, "d", $karbon);

    if (mysqli_stmt_execute($update_shop_stmt)) {
        // Tambahkan nilai karbon ke skarbon di tabel data
        $update_data_stmt = mysqli_prepare($conn, "UPDATE data SET skarbon = skarbon + ? WHERE id = ?");
        mysqli_stmt_bind_param($update_data_stmt, "ds", $karbon, $id);

        if (mysqli_stmt_execute($update_data_stmt)) {
            echo "<script>
                alert('Berhasil membeli karbon.');
                window.location.href = 'index.php?uid=" . $uid . "';</script>";
        } else {
            echo "<script>alert('Gagal memperbarui skarbon: " . mysqli_error($conn) . "');</script>";
        }

        mysqli_stmt_close($update_data_stmt);

        // Cek apakah karbon di tabel shop menjadi 0 atau kurang setelah pengurangan
        $check_karbon_after_update = "SELECT SUM(karbon) as total_karbon FROM shop";
        $check_karbon_stmt_after_update = mysqli_prepare($conn, $check_karbon_after_update);
        mysqli_stmt_execute($check_karbon_stmt_after_update);
        $result_karbon_after_update = mysqli_stmt_get_result($check_karbon_stmt_after_update);
        $row_karbon_after_update = mysqli_fetch_assoc($result_karbon_after_update);

        if ($row_karbon_after_update['total_karbon'] <= 0) {
            // Jika karbon menjadi 0 atau kurang, hapus semua data dari tabel shop
            $delete_stmt = mysqli_prepare($conn, "DELETE FROM shop WHERE karbon = 0");
            if (mysqli_stmt_execute($delete_stmt)) {
                echo "<script>alert('Karbon menjadi 0, sehingga data dihapus dari tabel shop.');</script>";
            } else {
                echo "<script>alert('Gagal menghapus data dari tabel shop: " . mysqli_error($conn) . "');</script>";
            }
            mysqli_stmt_close($delete_stmt);
        }
        mysqli_stmt_close($check_karbon_stmt_after_update);

    } else {
        echo "<script>alert('Gagal mengurangi karbon dari tabel shop: " . mysqli_error($conn) . "');</script>";
    }

    // Tutup statement shop
    mysqli_stmt_close($update_shop_stmt);
    // Tutup statement check data
    mysqli_stmt_close($check_data_stmt);

    // Tutup koneksi
    mysqli_close($conn);
}
?>