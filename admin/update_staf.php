<?php
include 'koneksi.php';

$id       = $_POST['id'];
$username = $_POST['username'];
$nama     = $_POST['nama'];
$role     = $_POST['role'];
$password = $_POST['password'];

// jika password diisi
if(!empty($password)){
    $pass = md5($password);

    mysqli_query($conn, "UPDATE staf SET 
        username='$username',
        nama='$nama',
        role='$role',
        password='$pass'
    WHERE id='$id'");
} else {
    mysqli_query($conn, "UPDATE staf SET 
        username='$username',
        nama='$nama',
        role='$role'
    WHERE id='$id'");
}

header("Location:index.php?menu=staf");
?>