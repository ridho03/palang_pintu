<?php
include '../koneksi/koneksi.php';

$sql = mysqli_query($conn, "SELECT * FROM uid");
$result = mysqli_fetch_assoc($sql);

echo $result['uid'];
