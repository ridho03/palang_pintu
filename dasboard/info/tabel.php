<?php
include "../../library/fpdf.php";

$pdf = new FPDF('L', 'mm', 'A4');
$pdf->AddPage();

$pdf->SetFont('Times', 'B', 13);
$pdf->Cell(270, 10, 'Data', 0, 0, 'C');


$pdf->Ln(15); // Line break

$pdf->SetFont('Times', 'B', 9);
$pdf->Cell(10, 7, 'NO', 1, 0, 'C');
$pdf->Cell(30, 7, 'UID', 1, 0, 'C');
$pdf->Cell(40, 7, 'CO2', 1, 0, 'C');
$pdf->Cell(40, 7, 'NO2', 1, 0, 'C');
$pdf->Cell(30, 7, 'NH3', 1, 1, 'C');


$pdf->SetFont('Times', '', 10);

$no = 1;
$koneksi = mysqli_connect("localhost", "root", "", "carbon");

// Kueri SQL untuk mengambil data dari tabel
$query_data = "SELECT * FROM sensor";
$data_data = mysqli_query($koneksi, $query_data);

// // Kueri SQL untuk mengambil data dari tabel 'masuk'
// $query_masuk = "SELECT * FROM akses";
// $data_masuk = mysqli_query($koneksi, $query_masuk);

// // Kueri SQL untuk mengambil data dari tabel 'keluar'
// $query_keluar = "SELECT * FROM keluar";
// $data_keluar = mysqli_query($koneksi, $query_keluar);

// Menggabungkan data dari ketiga tabel
while ($d = mysqli_fetch_array($data_data)) {
    // $m = mysqli_fetch_array($data_masuk);
    // $k = mysqli_fetch_array($data_keluar);

    $pdf->Cell(10, 6, $no, 1, 0, 'C');
    $pdf->Cell(30, 6, $d['id'], 1, 0, 'C');
    $pdf->Cell(40, 6, $d['co2'], 1, 0, 'C');
    $pdf->Cell(40, 6, $d['no2'], 1, 0, 'C');
    $pdf->Cell(30, 6, $d['nh3'], 1, 1, 'C');


    $no++; // Tambahkan nomor urut
}

$pdf->Output();
