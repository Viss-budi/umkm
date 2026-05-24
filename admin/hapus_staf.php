<?php
include 'koneksi.php';

// cek apakah id ada
if(!isset($_GET['id'])){
    echo "<script>alert('ID tidak ditemukan!'); window.location='index.php?menu=staf';</script>";
    exit;
}

// amankan id
$id = intval($_GET['id']);

// cek data ada atau tidak
$cek = mysqli_query($conn, "SELECT * FROM staf WHERE id='$id'");
if(mysqli_num_rows($cek) == 0){
    echo "<script>alert('Data tidak ditemukan!'); window.location='index.php?menu=staf';</script>";
    exit;
}

// hapus data
mysqli_query($conn, "DELETE FROM staf WHERE id='$id'");

// redirect
echo "<script>alert('Data berhasil dihapus!'); window.location='index.php?menu=staf';</script>";
?>