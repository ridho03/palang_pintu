<?php
include "../../koneksi/koneksi.php";
$connection = mysqli_connect($servername, $username, $password, $dbname);

// Ambil ID dari URL (misalnya dari href link)
$id = isset($_GET['id']) ? $_GET['id'] : null;

// Query untuk mendapatkan data dari tabel sensor
$query_run = mysqli_query($connection, "SELECT * FROM sensor WHERE id='$id'");
?>
<!DOCTYPE html>
<html>

<head>
    <title>Data Sensor</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f7f7f7;
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
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
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
        }

        .btn:hover {
            background-color: #357abd;
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
    <h3 class="custom-heading">Data Sensor</h3>
    <div class="container">
        <table class="table table-success table-striped">
            <thead>
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">CO2</th>
                    <th scope="col">NO2</th>
                    <th scope="col">NH3</th>
                    <th scope="col">Jumlah Karbon</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($query_run && mysqli_num_rows($query_run) > 0) {
                    while ($row = mysqli_fetch_array($query_run)) {
                        echo "<tr>";
                        echo "<td>" . $row['id'] . "</td>";
                        echo "<td>" . $row['co2'] . "</td>";
                        echo "<td>" . $row['no2'] . "</td>";
                        echo "<td>" . $row['nh3'] . "</td>";
                        echo "<td>" . $row['jkarbon'] . "</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='4'>Tidak ada data ditemukan untuk ID ini</td></tr>";
                }
                ?>
            </tbody>

        </table>

    </div>

    </div>
</body>

</html>