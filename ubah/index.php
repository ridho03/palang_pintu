<?php
include "../koneksi/koneksi.php";
$sql = mysqli_query($conn, "select * from data where uid='$_GET[uid]'");
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
        <span class="navbar-brand">Add Member</span>
    </nav>

    <div class="form-container">
        <form method="POST" action="" enctype="multipart/form-data">

            <div class="form-group">
                <label for="nama">Nama</label>
                <input type="text" id="nama" name="nama" required maxlength="255" value="<?php echo $data['nama']; ?>" />
            </div>
            <div class="form-group">
                <label for="npm">NPM/NIK</label>
                <input type="text" id="npm" name="npm" required maxlength="200" value="<?php echo $data['npm']; ?>" />
            </div>
            <div class="form-group">
                <label for="uid">UID</label>
                <input type="text" id="uid" name="id" value="<?php echo $data['uid']; ?>" readonly />
            </div>
            <div class="form-group">
                <label for="no_plat">No Plat</label>
                <input type="text" id="no_plat" name="no_plat" required maxlength="200" value="<?php echo $data['no_plat']; ?>" />
            </div>
            <div class="form-group">
                <label for="kendaraan">Jenis Kendaraan</label>
                <input type="text" id="kendaraan" name="kendaraan" required value="<?php echo $data['kendaraan']; ?>" />
            </div>
            <!-- <div class="form-group">
                <label for="file">Pilih berkas gambar</label>
                <input type="file" name="file" id="file" accept="image/*" value="<?php echo $data['files']; ?>" />

            </div> -->
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
                success: function(response) {
                    console.log(response);
                    $("#uid").val(response);
                },
                error: function(jqXHR, textStatus, errorThrown) {
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
    mysqli_query($conn, "UPDATE data SET  
    nama = '$_POST[nama]',
    npm = '$_POST[npm]',
    no_plat = '$_POST[no_plat]',
    kendaraan = '$_POST[kendaraan]'
WHERE uid = '$_GET[uid]'");


    echo "<script>alert('Data Berhasil Diubah'); window.location.href = '../../palang_pintu/dasboard/index.php';</script>";
}

?>