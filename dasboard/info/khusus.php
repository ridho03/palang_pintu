<?php
include "../../koneksi/koneksi.php";
$connection = mysqli_connect($servername, $username, $password, $dbname);

$query_run = mysqli_query($connection, "SELECT * FROM sensor");

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
                <th>ID</th>
                <th>CO2</th>
                <th>NO2</th>
                <th>NH3</th>
            </tr>
            <?php
            while ($row = mysqli_fetch_array($query_run)) {
                echo "<tr>";
                echo "<td>" . $row['id'] . "</td>";
                echo "<td>" . $row['co2'] . "</td>";
                echo "<td>" . $row['no2'] . "</td>";
                echo "<td>" . $row['nh3'] . "</td>";
                echo "</tr>";
            }
            ?>
        </table>
    </div>

    <div class="container">
        <a href="tabel.php" class="catatan-button">Download All</a>
    </div>

</body>

</html>