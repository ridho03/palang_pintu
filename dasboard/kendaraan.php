<?php
include "../koneksi/koneksi.php";
$connection = mysqli_connect($servername, $username, $password, $dbname);

$query_run = mysqli_query($connection, "SELECT * FROM data");

if (isset($_GET['uid'])) {
    $uid = $_GET['uid'];
    //echo "User ID: " . $uid; // Menampilkan UID jika diperlukan
}

?>
<!DOCTYPE html>
<html>

<head>
    <title>Add Member</title>
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
                <li><a class="dropdown-item" href="index.php?uid=<?php echo $uid; ?>">Dashboard</a></li>
                <li><a class="dropdown-item" href="tambah.php?uid=<?php echo $uid; ?>">Tambah Kendaraan</a></li>
                <!-- <li><a class="dropdown-item" href="info/data.php?uid=<?php echo $uid; ?>">Catatan</a></li> -->
                <li><a class="dropdown-item" href="">Data Kendaraan</a></li>
            </ul>
        </div>
        <!-- Example single danger button -->
        <div class="btn-group">
            <button type="button" class="btn btn-danger dropdown-toggle" data-bs-toggle="dropdown"
                aria-expanded="false">
                Profil
            </button>
            <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="../profil.php?uid=<?php echo $uid; ?>">Profil</a></li>
                <li><a class="dropdown-item" href="../index.html">Keluar</a></li>
            </ul>
        </div>
    </nav>
    <span class="navbar-brand"></span>
    </nav>

    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama</th>
                <th>Alamat</th>
                <th>Merk</th>
                <th>No Plat</th>
                <th>Tipe</th>
                <th>CC</th>
                <th>Tanggal Berlaku</th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
            <?php
            while ($row = mysqli_fetch_array($query_run)) {
                echo "<tr>";
                echo "<tr>";
                echo "<td>" . $row['id'] . "</td>";
                echo "<td>" . $row['nama'] . "</td>";
                echo "<td>" . $row['alamat'] . "</td>";
                echo "<td>" . $row['merk'] . "</td>";
                echo "<td>" . $row['no_plat'] . "</td>";
                echo "<td>" . $row['tipe'] . "</td>";
                echo "<td>" . $row['CC'] . "</td>";
                echo "<td>" . $row['tanggal_berlaku'] . "</td>";
                echo "<td><img src='../image/" . $row["files"] . "' alt='" . $row["files"] . "' style='width:100px; height:auto;'></td>";

                echo "</tr>";
            }
            ?>
        </tbody>
    </table>

    </script>
</body>


</html>