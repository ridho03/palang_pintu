<?php
if (isset($_GET['uid'])) {
    $uid = $_GET['uid'];
    //echo "User ID: " . $uid; // Menampilkan UID
}
?>


<!DOCTYPE html>
<html>

<head>
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #ecf0f1;
            color: #333;
            margin: 0;
            padding: 0;
        }

        .dropdown {
            color: black;
        }

        .dropdown-toggle {
            background-color: #3498db;
        }

        .btn-group {
            background-color: white;
        }

        .dropdown-toggl {
            background-color: white;
        }

        .navbar {
            background-color: #3498db;
            padding: 10px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            color: white;
        }

        .navbar-brand {
            color: #fff;
            font-size: 24px;
            font-weight: bold;
        }

        .container {
            max-width: auto;
            margin: 0 auto;
            padding: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th,
        td {
            padding: 15px;
            text-align: center;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #219049;
            color: #fff;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        .box {
            background-color: #f2f2f2;
            padding: 10px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
            max-width: auto;
            margin: 20px 0;
        }

        .add-member-button {
            background-color: #27ae60;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .add-member-button:hover {
            background-color: #219049;
        }

        .catatan-button {
            background-color: #f39c12;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .catatan-button:hover {
            background-color: #d68910;
        }

        .uga-button {
            background-color: #e74c3c;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .uga-button:hover {
            background-color: #c43c2c;
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
        <span class="navbar-brand">DASHBOARD ADMIN</span>
        <div class="btn-group">
            <button type="button" class="btn btn-danger dropdown-toggle" data-bs-toggle="dropdown"
                aria-expanded="false">
                Profil
            </button>
            <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="../../index.html">Keluar</a></li>
            </ul>
        </div>
    </nav>
    <h3 class="custom-heading">Jenis Kendaraan</h3>


    <div>
        <!-- <h2>Data Data <a href="tambah.php" class="add-member-button" style="padding: 7px;">Add Member</a> -->
        <!--  -->

        <table>
            <tr>
                <th>ID</th>
                <th>Nama</th>
                <th>Alamat</th>
                <th>Merk</th>
                <th>No Plat</th>
                <th>Tipe</th>
                <th>CC</th>
                <th>Tanggal Berlaku</th>
                <th>Kuota karbon</th>
                <th>Sisa karbon</th>
                <th scope="col">Foto</th>
                <th>Aksi</th>
            </tr>
            <?php
            include "../../koneksi/koneksi.php";
            $connection = mysqli_connect($servername, $username, $password, $dbname);

            // Query untuk mendapatkan data berdasarkan uid
            $query_run = mysqli_query($conn, "SELECT * FROM data WHERE uid='$uid'");

            while ($row = mysqli_fetch_array($query_run)) {
                // Tampilkan data dari tabel data
                echo "<tr>";
                echo "<td>" . $row['id'] . "</td>";
                echo "<td>" . $row['nama'] . "</td>";
                echo "<td>" . $row['alamat'] . "</td>";
                echo "<td>" . $row['merk'] . "</td>";
                echo "<td>" . $row['no_plat'] . "</td>";
                echo "<td>" . $row['tipe'] . "</td>";
                echo "<td>" . $row['CC'] . "</td>";
                echo "<td>" . $row['tanggal_berlaku'] . "</td>";
                echo "<td>" . $row['kkarbon'] . " kgCO2eq</td>";
                echo "<td>" . $row['skarbon'] . " kgCO2eq</td>";
                echo "<td><img src='../../image/" . $row["files"] . "' alt='" . $row["files"] . "' style='width:100px; height:auto;'></td>";

                echo "<td>";
                // Tombol untuk aksi hapus, sekarang menggunakan id
                echo "<a href='../../hapus/data.php?id=" . $row['id'] . "' class='btn btn-danger'>Hapus</a> ";
                // Tombol untuk aksi ubah
                echo "<a href='../../ubah/data.php?id=" . $row['id'] . "' class='btn btn-warning'>Ubah</a> ";
                // Tombol untuk aksi info
                echo "<a href='../info/admin.php?id=" . $row['id'] . "' class='btn btn-info'>Info</a>";
                echo "</td>";
                echo "</tr>";
            }
            ?>
        </table>
        <button type="button" class="btn btn-secondary btn-lg" style="margin: 12px;"
            onclick="window.location.href='index.php';">Back</button>

    </div>
    <p></p>

</body>

</html>