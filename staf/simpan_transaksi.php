<?php
session_start();
include 'koneksi.php';

// ambil id staf dari session (WAJIB ADA)
$id_staf = $_SESSION['id'] ?? 0;

$keranjang = $_SESSION['keranjang'] ?? [];

if (empty($keranjang)) {
    echo "<script>alert('Keranjang kosong!');window.location='index.php?menu=transaksimasuk';</script>";
    exit;
}

// simpan transaksi utama
mysqli_query($conn, "
    INSERT INTO produk_masuk (id_staf, tanggal) 
    VALUES ('$id_staf', CURDATE())
"); 

$id_masuk = mysqli_insert_id($conn);

// detail + update stok
foreach ($keranjang as $id_produk => $jumlah) {

    mysqli_query($conn, "
        INSERT INTO produk_masuk_detail (id_masuk, id_produk, jumlah)
        VALUES ('$id_masuk', '$id_produk', '$jumlah')
    ");

    mysqli_query($conn, "
        UPDATE produk 
        SET stok = stok + $jumlah 
        WHERE id_produk = '$id_produk'
    ");
}

// kosongkan keranjang
unset($_SESSION['keranjang']);

echo "<script>
    alert('Transaksi berhasil disimpan!');
    window.location='index.php?menu=transaksimasuk';
</script>";