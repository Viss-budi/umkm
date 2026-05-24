<?php
include 'koneksi.php';

$query = mysqli_query($conn, "SELECT COUNT(*) AS total FROM staf where role='staf'");
$data = mysqli_fetch_assoc($query);

echo "Jumlah staf: " . $data['total'];
?>