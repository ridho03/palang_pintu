<!DOCTYPE html>
<html>

<head>
    <title>Data Member</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
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
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
        }

        .box {
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
            margin: 20px 0;
            display: flex;
            justify-content: space-between;
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

        .data-container {
            max-width: 45%;
            padding: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            border: 2px solid #3498db;
            /* Tambahkan border ke tabel */
        }

        th,
        td {
            padding: 10px;
            text-align: center;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #3498db;
            color: #fff;
            font-weight: bold;
            /* Tambahkan tebal pada judul kolom */
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        .photo-container {
            max-width: 50%;
            padding: 20px;
        }

        img {
            max-width: 100%;
            height: auto;
        }
    </style>
</head>

<body>
    <nav class="navbar">
        <span class="navbar-brand"><a href="../dasboard/index.php">DASHBOARD</a></span>
    </nav>

    <div class="container">
        <h1>Data Member</h1>

        <?php
        // Pastikan Anda memiliki koneksi ke database
        include "../koneksi/koneksi.php";

        // Query SQL untuk mengambil data dari tabel "data"
        $query = "SELECT * FROM data";

        // Eksekusi query
        $result = mysqli_query($conn, $query);

        if (mysqli_num_rows($result) > 0) {
            // Data ditemukan, tampilkan dalam bentuk tabel
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<div class='box'>";

                echo "<div class='data-container'>";
                echo "<table>";
                echo "<tr>";
                echo "<th>UID</th>";
                echo "<td>" . $row["id"] . "</td>";
                echo "</tr>";
                echo "<tr>";
                echo "<th>Nama</th>";
                echo "<td>" . $row["nama"] . "</td>";
                echo "</tr>";
                echo "<tr>";
                echo "<th>NPM/NIK</th>";
                echo "<td>" . $row["npm"] . "</td>";
                echo "</tr>";
                echo "<tr>";
                echo "<th>ID</th>";
                echo "<td>" . $row["uid"] . "</td>";
                echo "</tr>";
                echo "<tr>";
                echo "<th>No Plat</th>";
                echo "<td>" . $row["no_plat"] . "</td>";
                echo "</tr>";
                echo "<tr>";
                echo "<th>Jenis Kendaraan</th>";
                echo "<td>" . $row["kendaraan"] . "</td>";
                echo "</tr>";
                echo "</table>";
                echo "</div>";

                echo "<div class='photo-container'>";
                echo "<img src='../image/" . $row["files"] . "' alt='" . $row["files"] . "'>";
                echo "</div>";

                echo "</div>";
            }
        } else {
            echo "Tidak ada data yang ditemukan.";
        }

        // Tutup koneksi database
        mysqli_close($conn);
        ?>
    </div>
</body>

</html>