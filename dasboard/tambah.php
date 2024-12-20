<?php

if (isset($_GET['uid'])) {
    $uidd = $_GET['uid'];
    //echo "User ID: " . $uid; // Menampilkan UID jika diperlukan
}

?>



<!DOCTYPE html>
<html>

<head>
    <title>Tambah Kendaraan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

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

        .custom-heading {
            font-size: 24px;
            /* Ukuran font */
            color: #333;
            /* Warna teks */
            text-align: center;
            /* Penjajaran teks di tengah */
            margin: 20px 0;
            /* Jarak atas dan bawah */
            font-weight: bold;
            /* Ketebalan teks */
            text-transform: uppercase;
            /* Mengubah teks menjadi huruf kapital */
            border-bottom: 2px solid #ccc;
            /* Garis bawah */
            padding-bottom: 10px;
            /* Jarak antara teks dan garis bawah */
        }
    </style>
</head>

<body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>

    <nav class="navbar">
        <div class="dropdown">
            <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown"
                aria-expanded="false">
                CARBON
            </button>
            <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="index.php?uid=<?php echo $uidd; ?>">Dashboard</a></li>
                <li><a class="dropdown-item" href="">Tambah Kendaraan</a></li>
                <!-- <li><a class="dropdown-item" href="info/data.php?uid=<?php echo $uidd; ?>">Catatan</a></li> -->
                <li><a class="dropdown-item" href="../shop/index.php?uid=<?php echo $uidd; ?>">Shop</a></li>
            </ul>
        </div>
        <!-- Example single danger button -->
        <div class="btn-group">
            <button type="button" class="btn btn-danger dropdown-toggle" data-bs-toggle="dropdown"
                aria-expanded="false">
                Profil
            </button>
            <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="../profil.php?uid=<?php echo $uidd; ?>">Profil</a></li>
                <li><a class="dropdown-item" href="../index.html">Keluar</a></li>
            </ul>
        </div>
    </nav>
    <span class="navbar-brand"></span>
    </nav>

    <div class="form-container">
        <form action="upload.php" method="post" enctype="multipart/form-data">
            <h3 class="custom-heading">Tambah Kendaraan</h3>

            <div class="form-group">
                <label for="uid">UID</label>
                <input type="text" id="uid" name="uid" value="<?php echo $uidd; ?>" readonly />
            </div>
            <div class="form-group">
                <label for="id">ID</label>
                <input type="text" id="id" name="id" required maxlength="4" />
            </div>
            <div class="form-group">
                <label for="jenis_kendaraan">Jenis Kendaraan</label>
                <select id="jenis_kendaraan" name="jenis_kendaraan" class="form-select" required>
                    <option value="">-- Pilih Jenis Kendaraan --</option>
                    <option value="Motor">motor</option>
                    <option value="Mobil">mobil</option>
                </select>
            </div>

            <div class="form-group">
                <label for="no_plat">No Plat</label>
                <input type="text" id="no_plat" name="no_plat" required maxlength="200" />
            </div>
            <div class="form-group">
                <label for="nama">Nama</label>
                <input type="text" id="nama" name="nama" required maxlength="255" />
            </div>
            <div class="form-group">
                <label for="alamat">Alamat</label>
                <input type="text" id="alamat" name="alamat" required maxlength="200" />
            </div>
            <div class="form-group">
                <label for="merk">Merk</label>
                <input type="text" id="merk" name="merk" required maxlength="200" />
            </div>
            <div class="form-group">
                <label for="tipe">Tipe</label>
                <input type="text" id="tipe" name="tipe" required maxlength="200" />
            </div>
            <div class="form-group">
                <label for="tanggal_berlaku">Tanggal Berlaku</label>
                <input type="date" id="tanggal_berlaku" name="tanggal_berlaku" required maxlength="200" />
            </div>
            <div class="form-group">
                <label for="CC">CC Kendaraan</label>
                <input type="text" id="CC" name="CC" required />
            </div>
            <div class="form-group">
                <label for="file">Pilih berkas gambar</label>
                <input type="file" name="file" id="file" accept="image/*" />

            </div>
            <input type="submit" value="Submit" class="btn">
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        //     function cekUID() {
        //         $.ajax({
        //             type: "GET",
        //             url: "entry.php",
        //             cache: false,
        //             success: function (response) {
        //                 console.log(response);
        //                 $("#uid").val(response);
        //             },
        //             error: function (jqXHR, textStatus, errorThrown) {
        //                 console.error(errorThrown);
        //             }
        //         });
        //     }
        //     setInterval(cekUID, 2000);
        // </script>
</body>


</html>