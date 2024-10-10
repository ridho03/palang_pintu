<?php
include "../koneksi/koneksi.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Koneksi ke database sudah dilakukan sekali
    if (!$conn) {
        die("Koneksi database gagal: " . mysqli_connect_error());
    }

    // Mengambil data dari form
    $id = mysqli_real_escape_string($conn, $_POST["id"]);
    $nama = mysqli_real_escape_string($conn, $_POST["nama"]);
    $alamat = mysqli_real_escape_string($conn, $_POST["alamat"]);
    $merk = mysqli_real_escape_string($conn, $_POST["merk"]);
    $tipe = mysqli_real_escape_string($conn, $_POST["tipe"]);
    $tanggal_berlaku = mysqli_real_escape_string($conn, $_POST["tanggal_berlaku"]);
    $uid = mysqli_real_escape_string($conn, $_POST["uid"]);
    $no_plat = mysqli_real_escape_string($conn, $_POST["no_plat"]);
    $CC = mysqli_real_escape_string($conn, $_POST["CC"]);

    // File Upload Handling
    if (isset($_FILES["file"]) && $_FILES["file"]["error"] == 0) {
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
            return; // Hentikan eksekusi jika berkas sudah ada
        } elseif (!in_array($extension, $allowed_extensions)) {
            echo "Berkas harus memiliki ekstensi jpg, jpeg, png, atau gif.";
            return; // Hentikan eksekusi jika ekstensi tidak diperbolehkan
        } else {
            // Tambahkan timestamp ke nama berkas untuk keunikan
            $file_name = time() . '_' . $file_name;

            // Upload file ke direktori
            if (move_uploaded_file($file_tmp, $upload_dir . $file_name)) {
                // Persiapan query
                $stmt = mysqli_prepare($conn, "INSERT INTO data (id, merk, tipe, tanggal_berlaku, nama, alamat, uid, no_plat, CC, files) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

                if ($stmt === false) {
                    die("Query salah: " . mysqli_error($conn));
                }

                // Bind parameter ke statement, tambahkan file_name (10 parameter)
                mysqli_stmt_bind_param($stmt, "ssssssssss", $id, $merk, $tipe, $tanggal_berlaku, $nama, $alamat, $uid, $no_plat, $CC, $file_name);

                // Eksekusi statement
                if (mysqli_stmt_execute($stmt)) {
                    echo "<script>
                        alert('Data Berhasil Ditambahkan');
                        window.location.href = 'index.php?uid=" . $_POST['uid'] . "';
                    </script>";
                } else {
                    // Jika terjadi kesalahan, tampilkan pesan error
                    echo "<script>alert('Gagal menambahkan data: " . mysqli_error($conn) . "');</script>";
                }

                // Tutup statement
                mysqli_stmt_close($stmt);
            } else {
                echo "Gagal mengunggah berkas.";
            }
        }
    } else {
        echo "Tidak ada berkas yang diunggah.";
    }

    // Tutup koneksi
    mysqli_close($conn);
}
?>