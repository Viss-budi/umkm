<?php
include 'koneksi.php';

$tgl_awal  = $_GET['tgl_awal'] ?? '';
$tgl_akhir = $_GET['tgl_akhir'] ?? '';

$where = "";

if (!empty($tgl_awal) && !empty($tgl_akhir)) {
    $where = "WHERE pm.tanggal BETWEEN '$tgl_awal' AND '$tgl_akhir'";
}

$query = mysqli_query($conn, "
    SELECT 
        DATE_FORMAT(pm.tanggal, '%Y-%m') AS bulan,
        SUM(d.jumlah) AS total
    FROM produk_masuk pm
    JOIN produk_masuk_detail d ON pm.id_masuk = d.id_masuk
    $where
    GROUP BY bulan
    ORDER BY bulan ASC
");

$data = [];

while ($row = mysqli_fetch_assoc($query)) {
    $data[] = [
        'bulan' => $row['bulan'],
        'total' => (int)$row['total']
    ];
}

header('Content-Type: application/json');
echo json_encode($data);