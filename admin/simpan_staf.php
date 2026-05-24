<?php
include 'koneksi.php';

// Ambil data dari form
$username = $_POST['username'];
$password=md5 ($_POST['password']);
$nama     = $_POST['nama'];
$role     = $_POST['role'];

// Simpan ke database
mysqli_query($conn, "INSERT INTO staf (username, password, nama, role) 
VALUES ('$username', '$password', '$nama', '$role')");


header("Location:index.php?menu=staf");
?>