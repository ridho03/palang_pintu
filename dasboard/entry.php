<?php
include '../koneksi/koneksi.php';

$sql = mysqli_query($conn, "SELECT * FROM login");
$result = mysqli_fetch_assoc($sql);

echo $result['uid'];
