<?php
session_start();
include "koneksi.php";

$username = $_POST['username'];
$password = md5($_POST['password']);
$captcha  = $_POST['captcha'];

if($captcha != $_SESSION['captcha']){
    echo "<script>
    alert('Captcha salah');
    window.location='login.php';
    </script>";
    exit;
}

$query = mysqli_query($conn,"SELECT * FROM staf WHERE username='$username' AND password='$password'");

$data = mysqli_fetch_assoc($query);

if(mysqli_num_rows($query) > 0){

    $_SESSION['login'] = true;
    $_SESSION['id'] = $data['id']; // ini sudah benar ✅
    $_SESSION['username'] = $data['username'];
    $_SESSION['password'] = $data['password'];
    $_SESSION['nama'] = $data['nama'];
    $_SESSION['role'] = $data['role']; // <-- FIX DI SINI

    header("location:index.php");

}else{

    echo "Username atau password salah";

}
?>