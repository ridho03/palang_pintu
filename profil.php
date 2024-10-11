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
                DASHBOARD
            </button>
            <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="dasboard/index.php?uid=<?php echo $uid; ?>">Dashboard</a></li>
                <li><a class="dropdown-item" href="dasboard/tambah.php?uid=<?php echo $uid; ?>">Tambah Kendaraan</a>
                </li>
                <!-- <li><a class="dropdown-item" href="dasboard/info/data.php?uid=<?php echo $uid; ?>">Catatan</a></li> -->
                <li><a class="dropdown-item" href="shop/index.php?uid=<?php echo $uid; ?>">Shop</a></li>
            </ul>
        </div>
        <div class="btn-group">
            <button type="button" class="btn btn-danger dropdown-toggle" data-bs-toggle="dropdown"
                aria-expanded="false">
                Profil
            </button>
            <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="#">Profil</a></li>
                <li><a class="dropdown-item" href="index.html">Keluar</a></li>
            </ul>
        </div>
    </nav>

    <div>
        <table class="data">
            <tr>
                <th>UID</th>
                <th>Username</th>
            </tr>

            <?php
            include "koneksi/koneksi.php";
            $connection = mysqli_connect($servername, $username, $password, $dbname);

            // Ambil UID dari URL
            $uid = isset($_GET['uid']) ? $_GET['uid'] : null;

            if ($uid) {
                // Query untuk menampilkan data sesuai UID yang diminta
                $query_run = mysqli_query($connection, "SELECT * FROM login WHERE uid='$uid'");
            } else {
                // Query untuk menampilkan semua data jika tidak ada UID yang diminta
                $query_run = mysqli_query($connection, "SELECT * FROM login");
            }

            while ($row = mysqli_fetch_array($query_run)) {
                ?>
                <tr>
                    <!-- Membuat link untuk UID -->
                    <td><?php echo $row['uid']; ?></td>
                    <td><?php echo $row['username']; ?></td>
                </tr>
                <?php
            }
            ?>
        </table>

    </div>
</body>

</html>