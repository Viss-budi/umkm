<?php
include 'koneksi.php';

$id = $_GET['id'];
$data = mysqli_query($conn,"SELECT * FROM produk WHERE id_produk='$id'");
$d = mysqli_fetch_array($data);
?>

<!DOCTYPE html>
<html>
<head>
<title>Edit Produk</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
<div class="container mt-5">
<h3 style="color:#ff4da6;">Edit Produk</h3>

<form action="update_produk.php" method="POST" enctype="multipart/form-data">
<input type="hidden" name="id" value="<?= $d['id_produk']; ?>">
<input type="text" name="nama" value="<?= $d['nama_produk']; ?>" class="form-control mb-3" required>
<input type="number" name="harga" value="<?= $d['harga']; ?>" class="form-control mb-3" required>
<input type="number" name="stok" value="<?= $d['stok']; ?>" class="form-control mb-3" required>
<img src="../admin/gambar/<?= $d['gambar']; ?>" width="100" class="mb-3"><br>

<input type="file" name="gambar" class="form-control mb-3">

<button class="btn btn-warning">Update</button>
<button onclick= history.back() class="btn btn-secondary">Kembali</button>

</form>
</div>
</body>
</html>