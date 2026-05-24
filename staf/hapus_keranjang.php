<?php
session_start();

$id = $_GET['id'];

unset($_SESSION['keranjang'][$id]);

echo "<script>
    alert('Produk dihapus dari keranjang');
    window.location='index.php?menu=transaksimasuk';
</script>";