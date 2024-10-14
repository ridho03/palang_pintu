<?php
// Mengecek apakah UID ada di URL
if (isset($_GET['uid'])) {
    $uid = htmlspecialchars($_GET['uid']); // Menyaring UID untuk keamanan
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Member</title>
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
        .form-group input[type="number"] {
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
                <li><a class="dropdown-item" href="../dasboard/index.php?uid=<?php echo $uid; ?>">Dashboard</a></li>
                <li><a class="dropdown-item" href="../dasboard/tambah.php?uid=<?php echo $uid; ?>">Tambah Kendaraan</a>
                </li>
                <li><a class="dropdown-item" href="">Shop</a></li>
            </ul>
        </div>
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

    <div class="form-container">
        <form action="upbeli.php?uid=<?php echo $uid; ?>" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="id">ID Kendaraan</label>
                <input type="text" id="id" name="id" required maxlength="4" />
            </div>
            <div class="form-group">
                <label for="nama">Nama</label>
                <input type="text" id="nama" name="nama" required maxlength="255" />
            </div>
            <div class="form-group">
                <label for="karbon">Jumlah Karbon</label>
                <input type="number" id="karbon" name="karbon" required />
            </div>
            <input type="submit" value="Submit" class="btn">
        </form>
    </div>

</body>

</html>