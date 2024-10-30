<?php
include "../koneksi/koneksi.php";
$sql = mysqli_query($conn, "select * from data where id='$_GET[id]'");
$data = mysqli_fetch_array($sql);
?>

<!DOCTYPE html>
<html>

<head>
    <title>Add Member</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f7f7f7;
            /* Warna latar belakang lebih lembut */
            margin: 0;
            padding: 0;
        }

        .navbar {
            background-color: #4a90e2;
            padding: 10px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .navbar-brand {
            color: #fff;
            font-size: 24px;
            font-weight: bold;
        }

        .form-container {
            max-width: 400px;
            margin: 100px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            /* Lebih lembut */
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
            /* Lebih lembut */
        }

        .form-group {
            margin-bottom: 15px;
        }

        .form-group label {
            display: block;
            margin-bottom: 5px;
            color: #666;
        }

        .form-group input[type="text"],
        .form-group input[type="password"],
        .form-group input[type="file"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }

        .btn {
            display: block;
            width: 100%;
            padding: 10px;
            background-color: #4a90e2;
            color: #fff;
            text-align: center;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
            /* Transisi saat dihover */
        }

        .btn:hover {
            background-color: #357abd;
            /* Warna biru sedikit lebih tua saat tombol dihover */
        }

        .register-link {
            text-align: center;
            color: #666;
            font-size: 14px;
            margin-top: 10px;
        }

        .register-link a {
            color: #4a90e2;
            text-decoration: none;
        }
    </style>
</head>

<body>
    <nav class="navbar">
        <span class="navbar-brand">Ubah Member</span>
    </nav>

    <div class="form-container">
        <form method="POST" action="" enctype="multipart/form-data">

            <div class="form-group">
                <label for="uid">ID</label>
                <input type="text" id="uid" name="uid" value="<?php echo $data['id']; ?>" readonly />
            </div>
            <div class="form-group">
                <label for="no_plat">No Plat</label>
                <input type="text" id="no_plat" name="no_plat" required maxlength="200"
                    value="<?php echo $data['no_plat']; ?>" />
            </div>
            <div class="form-group">
                <label for="nama">Nama</label>
                <input type="text" id="nama" name="nama" required maxlength="255"
                    value="<?php echo $data['nama']; ?>" />
            </div>
            <div class="form-group">
                <label for="alamat">Alamat</label>
                <input type="text" id="alamat" name="alamat" required maxlength="200"
                    value="<?php echo $data['alamat']; ?>" />
            </div>
            <div class="form-group">
                <label for="merk">Merk</label>
                <input type="text" id="merk" name="merk" required maxlength="200"
                    value="<?php echo $data['merk']; ?>" />
            </div>
            <div class="form-group">
                <label for="tipe">Tipe</label>
                <input type="text" id="tipe" name="tipe" required maxlength="200"
                    value="<?php echo $data['tipe']; ?>" />
            </div>
            <div class="form-group">
                <label for="tanggal_berlaku">Tanggal Berlaku</label>
                <input type="date" id="tanggal_berlaku" name="tanggal_berlaku" required maxlength="200"
                    value="<?php echo $data['tanggal_berlaku']; ?>" />
            </div>
            <div class="form-group">
                <label for="CC">CC Kendaraan</label>
                <input type="text" id="CC" name="CC" required maxlength="200" value="<?php echo $data['CC']; ?>" />
            </div>
            <input type="submit" name="submit" value="Submit" class="btn">
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        function cekUID() {
            $.ajax({
                type: "GET",
                url: "entry.php",
                cache: false,
                success: function (response) {
                    console.log(response);
                    $("#uid").val(response);
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    console.error(errorThrown);
                }
            });
        }
        setInterval(cekUID, 2000);
    </script>


</body>

</html>
<?php

include "../koneksi/koneksi.php";

if (isset($_POST['submit'])) {
    // Lakukan query update
    $query = "UPDATE data SET  
        no_plat = '$_POST[no_plat]',
        nama = '$_POST[nama]',
        uid = '$_POST[uid]',
        alamat = '$_POST[alamat]',
        merk = '$_POST[merk]',
        tipe = '$_POST[tipe]',
        CC = '$_POST[CC]',
        tanggal_berlaku = '$_POST[tanggal_berlaku]'
        WHERE id = '$_GET[id]'";

    if (mysqli_query($conn, $query)) {
        // Jika berhasil, arahkan ke halaman lain dengan parameter UID
        echo "<script>
            alert('Data Berhasil Diubah');
            window.location.href = '../../palang_pintu/dasboard/index.php?uid=" . $_POST['uid'] . "';
        </script>";
    } else {
        // Jika terjadi kesalahan, tampilkan pesan error
        echo "<script>alert('Gagal mengubah data');</script>";
    }
}
?>