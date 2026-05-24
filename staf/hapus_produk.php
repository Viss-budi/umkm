<?php
include 'koneksi.php';

$id = $_GET['id'];

$data = mysqli_query($conn,"SELECT gambar FROM produk WHERE id_produk='$id'");
$d = mysqli_fetch_array($data);

if(file_exists("gambar/".$d['gambar'])){
    unlink("gambar/".$d['gambar']);
}

mysqli_query($conn,"DELETE FROM produk WHERE id_produk='$id'");

header("Location:index.php?menu=produk");
?>