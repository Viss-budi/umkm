<?php
session_start(); // WAJIB

$id = $_POST['id'];
$jumlah = $_POST['jumlah'];

// validasi produk
if (empty($id)) {
    echo "<script>alert('Pilih produk dulu!');window.location='?menu=transaksimasuk';</script>";
    exit;
}

// validasi jumlah
if ($jumlah <= 0) {
    echo "<script>alert('Jumlah tidak valid');window.location='?menu=transaksimasuk';</script>";
    exit;
}

// buat keranjang jika belum ada
if (!isset($_SESSION['keranjang'])) {
    $_SESSION['keranjang'] = [];
}

// tambah ke keranjang
if (isset($_SESSION['keranjang'][$id])) {
    $_SESSION['keranjang'][$id] += $jumlah;
} else {
    $_SESSION['keranjang'][$id] = $jumlah;
}

echo "<script>
    alert('Produk berhasil ditambahkan ke keranjang');
    window.location='index.php?menu=transaksimasuk';
</script>";