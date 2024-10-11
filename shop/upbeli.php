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

    // Cek apakah ID ada di tabel shop
    $check_shop_query = "SELECT karbon FROM shop WHERE id = ?";
    $check_shop_stmt = mysqli_prepare($conn, $check_shop_query);
    mysqli_stmt_bind_param($check_shop_stmt, "s", $id);
    mysqli_stmt_execute($check_shop_stmt);
    $result_shop = mysqli_stmt_get_result($check_shop_stmt);

    if (mysqli_num_rows($result_shop) === 0) {
        echo "<script>alert('ID tidak ditemukan dalam tabel shop. Upload gagal.'); window.location.href = 'index.php?uid=" . $uid . "';</script>";
        exit;
    }

    // Ambil nilai karbon dari tabel shop
    $row_shop = mysqli_fetch_assoc($result_shop);
    $karbon_value = $row_shop['karbon'];

    // Cek apakah jumlah karbon yang dimasukkan melebihi yang ada di tabel shop
    if ($karbon > $karbon_value) {
        echo "<script>alert('Jumlah karbon yang dimasukkan melebihi jumlah yang tersedia di tabel shop.'); window.location.href = 'index.php?uid=" . $uid . "';</script>";
        exit;
    }

    // Mengurangi nilai karbon di tabel shop
    $new_karbon_value = $karbon_value - $karbon; // Mengurangi nilai karbon sesuai input

    // Update nilai karbon di tabel shop
    $update_shop_stmt = mysqli_prepare($conn, "UPDATE shop SET karbon = ? WHERE id = ?");
    mysqli_stmt_bind_param($update_shop_stmt, "ds", $new_karbon_value, $id);

    if (mysqli_stmt_execute($update_shop_stmt)) {
        // Tambahkan nilai karbon ke skarbon di tabel data
        $update_data_stmt = mysqli_prepare($conn, "UPDATE data SET skarbon = skarbon + ? WHERE id = ?");
        mysqli_stmt_bind_param($update_data_stmt, "ds", $karbon, $id);

        if (mysqli_stmt_execute($update_data_stmt)) {
            echo "<script>
                alert('Berhasil mengurangi karbon dari tabel shop dan menambahkan ke skarbon di tabel data.');
                window.location.href = 'index.php?uid=" . $uid . "';
            </script>";
        } else {
            echo "<script>alert('Gagal memperbarui skarbon: " . mysqli_error($conn) . "');</script>";
        }

        // Tutup statement update data
        mysqli_stmt_close($update_data_stmt);

        // Jika karbon di tabel shop menjadi 0 setelah pengurangan, hapus data dari tabel shop
        if ($new_karbon_value <= 0) {
            $delete_stmt = mysqli_prepare($conn, "DELETE FROM shop WHERE id = ?");
            mysqli_stmt_bind_param($delete_stmt, "s", $id);
            if (mysqli_stmt_execute($delete_stmt)) {
                echo "<script>alert('Karbon menjadi 0, sehingga data dihapus dari tabel shop.');</script>";
            } else {
                echo "<script>alert('Gagal menghapus data dari tabel shop: " . mysqli_error($conn) . "');</script>";
            }
            mysqli_stmt_close($delete_stmt);
        }

    } else {
        echo "<script>alert('Gagal mengurangi karbon dari tabel shop: " . mysqli_error($conn) . "');</script>";
    }

    // Tutup statement shop
    mysqli_stmt_close($update_shop_stmt);
    // Tutup statement check shop
    mysqli_stmt_close($check_shop_stmt);

    // Tutup koneksi
    mysqli_close($conn);
}
?>