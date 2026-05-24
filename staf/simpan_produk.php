<?php
include 'koneksi.php';

// ambil data dari form
$nama  = $_POST['nama'];
$harga = $_POST['harga'];
$stok  = $_POST['stok'];

// ambil data gambar
$gambar = $_FILES['gambar']['name'];
$tmp    = $_FILES['gambar']['tmp_name'];

// folder tujuan (samakan dengan produk.php / hapus_produk.php)
$folder = "../admin/gambar/";

// validasi upload
if ($gambar != "") {

    // ambil ekstensi file
    $ext = pathinfo($gambar, PATHINFO_EXTENSION);
    $ext_valid = ['jpg','jpeg','png','gif'];

    if (!in_array(strtolower($ext), $ext_valid)) {
        echo "<script>alert('Format gambar tidak valid!');history.back();</script>";
        exit;
    }

    // rename file biar unik
    $nama_baru = time() . '_' . $gambar;

    // upload file
    if (move_uploaded_file($tmp, $folder . $nama_baru)) {

        // simpan ke database
        mysqli_query($conn, "INSERT INTO produk 
            (nama_produk, harga, stok, gambar) 
            VALUES ('$nama','$harga','$stok','$nama_baru')");

        echo "<script>alert('Produk berhasil ditambahkan!');window.location='index.php?menu=produk';</script>";

    } else {
        echo "<script>alert('Gagal upload gambar!');history.back();</script>";
    }

} else {
    echo "<script>alert('Gambar wajib diisi!');history.back();</script>";
}
?>