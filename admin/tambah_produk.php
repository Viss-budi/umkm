<!DOCTYPE html>
<html>
<head>
<title>Tambah Produk</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
<div class="container mt-5" >
<h3 style="color:#ff4da6;">Tambah Produk</h3>

<form action="simpan_produk.php" method="POST" enctype="multipart/form-data">

<input type="text" name="nama" class="form-control mb-3" placeholder="Nama Produk" required>

<input type="number" name="harga" class="form-control mb-3" placeholder="Harga" required>

<input type="number" name="stok" class="form-control mb-3" placeholder="Stok" required>

<input type="file" name="gambar" class="form-control mb-3" required>

<button class="btn btn-success">Simpan</button>
<button onclick= history.back() class="btn btn-secondary">Kembali</button>

</form>
</div>
</body>
</html>