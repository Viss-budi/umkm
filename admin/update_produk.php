<?php
include 'koneksi.php';

$id    = $_POST['id'];
$nama  = $_POST['nama'];
$harga = $_POST['harga'];
$stok  = $_POST['stok'];

if($_FILES['gambar']['name'] != ""){
    
    $gambar = $_FILES['gambar']['name'];
    $tmp    = $_FILES['gambar']['tmp_name'];

    move_uploaded_file($tmp, "gambar/".$gambar);

    mysqli_query($conn,"UPDATE produk SET 
        nama_produk='$nama',
        harga='$harga',
        stok='$stok',
        gambar='$gambar'
        WHERE id_produk='$id'");

} else {

    mysqli_query($conn,"UPDATE produk SET 
        nama_produk='$nama',
        harga='$harga',
        stok='$stok'
        WHERE id_produk='$id'");
}

header("location:index.php?menu=produk");
?>