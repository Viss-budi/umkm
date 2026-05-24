<?php
include 'koneksi.php';

$query = mysqli_query($conn, "SELECT COUNT(*) AS total_produk FROM produk");
$data = mysqli_fetch_assoc($query);

echo "Jumlah produk: " . $data['total_produk'];
?>