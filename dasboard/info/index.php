<?php
include "../../koneksi/koneksi.php";
$connection = mysqli_connect($servername, $username, $password, $dbname);

// Periksa apakah parameter UID telah dikirim melalui URL
if (isset($_GET['uid'])) {
    $uid = $_GET['uid'];

    // Ambil data dari tabel data berdasarkan UID yang dikirim melalui link
    $query_run = mysqli_query($connection, "SELECT * FROM log_masuk_keluar WHERE uid = '$uid' ORDER BY waktu_masuk DESC LIMIT 1");
    $row = mysqli_fetch_array($query_run);


    // // Ambil data masuk yang paling terakhir
    // $que = mysqli_query($connection, "SELECT * FROM akses WHERE uid = '$uid' ORDER BY masuk DESC LIMIT 1");
    // $ro = mysqli_fetch_array($que);

    // // Ambil data keluar yang paling terakhir
    // $qu = mysqli_query($connection, "SELECT * FROM keluar WHERE uid = '$uid' ORDER BY keluar DESC LIMIT 1");
    // $r = mysqli_fetch_array($qu);
?>
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
        </style>
    </head>

    <body>
        <nav class="navbar">
            <span class="navbar-brand">DETAIL</span>
        </nav>

        <div class="container">
            <h2><a href="../index.php" class="add-member-button" style="padding: 7px;">KEMBALI</a></h2>

            <table>
                <tr>
                    <th>Nama</th>
                    <th>NPM/NIK</th>
                    <th>No Kartu</th>
                    <th>No Plat</th>
                    <th>Kendaraan</th>
                    <th>Masuk</th>
                    <th>Keluar</th>
                </tr>
                <tr>
                    <td><?php echo $row['nama']; ?></td>
                    <td><?php echo $row['npm']; ?></td>
                    <td><?php echo $row['uid']; ?></td>
                    <td><?php echo $row['no_plat']; ?></td>
                    <td><?php echo $row['kendaraan']; ?></td>
                    <td><?php echo ($row ? $row['waktu_masuk'] : 'N/A'); ?></td>
                    <td><?php echo ($row ? $row['waktu_keluar'] : 'N/A'); ?></td>
                </tr>
            </table>
        </div>

        <div class="container">
            <a href="tabel.php" class="catatan-button">Download All</a>
        </div>

    </body>

    </html>
<?php
} else {
    echo "UID tidak ditemukan.";
}
?>