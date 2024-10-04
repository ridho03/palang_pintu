<?php
if (isset($_POST["uid"]) && isset($_POST["readerName"])) {
    include '../koneksi/koneksi.php';
    $uid = $_POST["uid"];
    $readerName = $_POST["readerName"];

    mysqli_query($conn, "DELETE FROM uid");
    $sql = mysqli_query($conn, "INSERT INTO uid VALUES ('$uid')");

    // Mengeksekusi query sesuai dengan data yang diterima
    if ($readerName == 'Reader 1') {
        // Proses data dari Reader 1
        $other = mysqli_query($conn, "SELECT * FROM data WHERE uid = '$uid'");
        $result = mysqli_fetch_assoc($other); // Menggunakan mysqli_fetch_assoc() untuk mengambil data

        if ($result) {
            $nama = $result['nama'];
            $npm = $result['npm'];
            $no_plat = $result['no_plat'];
            $kendaraan = $result['kendaraan'];

            // Contoh pernyataan SQL untuk menyisipkan data dengan waktu otomatis saat input
            $insertQuery = "INSERT INTO akses (uid, masuk) VALUES ('$uid', NOW())";

            if (mysqli_query($conn, $insertQuery)) {
                echo "UID exists";

                // Set waktu_keluar ke 0 saat data masuk
                $insert = "INSERT INTO log_masuk_keluar (uid, nama, npm, no_plat, kendaraan, waktu_masuk, waktu_keluar) VALUES ('$uid', '$nama', '$npm', '$no_plat', '$kendaraan', NOW(), 0)";

                if (mysqli_query($conn, $insert)) {
                    echo "";
                } else {
                    echo "Data dari Reader 1: Gagal menyimpan data ke tabel log_masuk_keluar.";
                }
            } else {
                echo "Data dari Reader 1: UID exists. Gagal menyimpan data ke tabel akses.";
            }
        }
    } elseif ($readerName == 'Reader 2') {
        // Proses data dari Reader 2
        $ada = mysqli_query($conn, "SELECT * FROM akses WHERE uid = '$uid'");
        $iya = mysqli_fetch_assoc($ada); // Menggunakan mysqli_fetch_assoc() untuk mengambil data

        if ($iya) {
            // Hapus data dari tabel akses yang sesuai dengan UID
            $deleteQuery = "DELETE FROM akses WHERE uid = '$uid'";
            if (mysqli_query($conn, $deleteQuery)) {
                // Update waktu_keluar di tabel log_masuk_keluar
                $updateQuery = "UPDATE log_masuk_keluar SET waktu_keluar = NOW() WHERE uid = '$uid'";
                if (mysqli_query($conn, $updateQuery)) {
                    echo "UID exists";
                } else {
                    echo "Data dari Reader 2: Gagal memperbarui waktu keluar di tabel log_masuk_keluar.";
                }
            } else {
                echo "Data dari Reader 2: Gagal menghapus data dari tabel akses.";
            }
        } else {
            echo "Data dari Reader 2: UID tidak ditemukan di tabel akses.";
        }
    } else {
        echo "Invalid request.";
    }
}
