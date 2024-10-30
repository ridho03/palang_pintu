<?php
include "../koneksi/koneksi.php";
$uid = $_GET['uid'];

$hapus = mysqli_query($conn, "delete from login where uid = '$uid'");

if ($hapus) {
    echo "<script> alert ('Data DIhapus')</script>";
    header("refresh:0;../dasboard/admin/index.php");
} else {
    echo "<script> alert ('Data Tidak DIhapus')</script>";
    header("refresh:0;../dasboard/admin/index.php");
}
