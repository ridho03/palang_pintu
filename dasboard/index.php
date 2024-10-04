<!DOCTYPE html>
<html>

<head>
    <title>Dashboard</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #ecf0f1;
            color: #333;
            margin: 0;
            padding: 0;
        }

        .navbar {
            background-color: #3498db;
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
    </style>
</head>

<body>
    <nav class="navbar">
        <span class="navbar-brand">DASHBOARD</span>
    </nav>

    <div class="container">
        <h2>Data Member <a href="tambah.php" class="add-member-button" style="padding: 7px;">Add Member</a></h2>

        <table>
            <tr>
                <th>Nama</th>
                <th>NPM/NIK</th>
                <th>ID</th>
                <th>No Plat</th>
                <th>Kendaraan</th>
                <th>Aksi</th>
            </tr>
            <?php
            include "../koneksi/koneksi.php";
            $connection = mysqli_connect($servername, $username, $password, $dbname);
            $query_run = mysqli_query($connection, "select * from data");
            while ($row = mysqli_fetch_array($query_run)) {
            ?>
                <tr>
                    <td><?php echo $row['nama']; ?></td>
                    <td><?php echo $row['npm']; ?></td>
                    <td><?php echo $row['uid']; ?></td>
                    <td><?php echo $row['no_plat']; ?></td>
                    <td><?php echo $row['kendaraan']; ?></td>
                    <td class="aksi">
                        <a href="../hapus/index.php?uid=<?php echo $row['uid']; ?>" class="uga-button">Hapus</a>
                        <a href="../ubah/index.php?uid=<?php echo $row['uid']; ?>" class="uga-button">Ubah</a>
                    </td>
                </tr>
            <?php
            }
            ?>
        </table>
    </div>

    <!-- <div class="box">
        <h2 style="text-align: center;">Keterangan</h2>
        <table style="text-align: center;">
            <?php
            $connection = mysqli_connect($servername, $username, $password, $dbname);

            //         // Ambil data yang sesuai dari tabel data dan akses menggunakan INNER JOIN
            //         $query_run = mysqli_query($connection, "SELECT d.nama, d.npm, d.uid, d.no_plat, d.kendaraan
            //                                   FROM data d
            //                                   INNER JOIN akses a ON d.uid = a.uid");

            //         // Output baris pertama (judul)
            //         echo "<tr>";
            //         echo "<th>Nama</th>";
            //         echo "<th>NPM/NIK</th>";
            //         echo "<th>ID</th>";
            //         echo "<th>No Plat</th>";
            //         echo "<th>Kendaraan</th>";
            //         echo "<th>Aksi</th>";
            //         echo "</tr>";

            //         while ($row = mysqli_fetch_array($query_run)) {
            //             // Output data dalam tabel
            //             echo "<tr>";
            //             echo "<td>" . $row['nama'] . "</td>";
            //             echo "<td>" . $row['npm'] . "</td>";
            //             echo "<td>" . $row['uid'] . "</td>";
            //             echo "<td>" . $row['no_plat'] . "</td>";
            //             echo "<td>" . $row['kendaraan'] . "</td>";
            //             echo '<td class="aksi">
            //       <a href="info/index.php?uid=' . $row['uid'] . '" class="uga-button">Detail</a>
            //       </td>';
            //             echo "</tr>";
            //         }
            //         
            ?>

    //     </table>
    // </div> -->

    <div class="container">
        <a href="info/khusus.php" class="catatan-button">Catatan</a>
        <a href="tampil.php" class="catatan-button">Data Member</a>
    </div>

</body>

</html>