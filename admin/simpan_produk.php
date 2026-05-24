<?php
include 'koneksi.php';

$nama  = $_POST['nama'];
$harga = $_POST['harga'];
$stok  = $_POST['stok']; 

$gambar = $_FILES['gambar']['name'];
$tmp    = $_FILES['gambar']['tmp_name'];

// biar nama file tidak bentrok
$gambar = time() . "_" . $gambar;

// simpan ke folder gambar
move_uploaded_file($tmp, __DIR__ . "/gambar/" . $gambar);

// insert ke database (sesuai field)
mysqli_query($conn,"INSERT INTO produk (nama_produk,harga,stok,gambar) 
VALUES ('$nama','$harga','$stok','$gambar')");

header("Location:index.php?menu=produk");
?>