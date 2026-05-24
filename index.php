<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>UMKM Store</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

<style>
body {
    background: #f5f5f5;
}

/* HEADER */
.header {
    background: linear-gradient(135deg, #ff4d4d, #ff884d);
    padding: 10px;
    color: white;
}

.search-box {
    background: white;
    border-radius: 8px;
    padding: 5px;
}

/* MENU ICON */
.menu-icon {
    text-align: center;
    font-size: 12px;
}

.menu-icon img {
    width: 40px;
}

/* KATEGORI */
.kategori-item {
    background: white;
    border-radius: 10px;
    text-align: center;
    padding: 10px;
}

.kategori-item img {
    width: 60px;
}

/* PRODUK */
.produk-card {
    background: white;
    border-radius: 10px;
    padding: 10px;
}

.produk-card img {
    width: 100%;
    border-radius: 10px;
}
</style>
</head>

<body>

<!-- HEADER -->
<div class="header">
    <div class="container-fluid">

        <!-- BAR ATAS -->
        <div class="d-flex justify-content-between small mb-1">
            <div>UMKM Marketplace</div>
<div>

    <a href="staf/login.php" class="btn btn-light btn-sm">
        Login Staf
    </a>

    <a href="admin/login.php" class="btn btn-dark btn-sm">
        Login Admin
    </a>

</div>
        </div>

        <!-- SEARCH -->
        <div class="d-flex align-items-center mb-2">
            <h5 class="me-2 mb-0">UMKM</h5>

            <div class="flex-grow-1 search-box d-flex">
                <input type="text" class="form-control border-0" placeholder="Cari produk UMKM...">
                <button class="btn btn-danger">🔍</button>
            </div>

            <div class="ms-2">🛒</div>
        </div>

        <div class="text-center small">
            Produk Lokal | Harga Terjangkau | UMKM Indonesia
        </div>

    </div>
</div>

<!-- MENU CEPAT -->
<div class="container mt-3">
    <div class="row text-center">
        <div class="col-3 menu-icon">
            <img src="https://cdn-icons-png.flaticon.com/512/992/992651.png">
            <div>Promo</div>
        </div>
        <div class="col-3 menu-icon">
            <img src="https://cdn-icons-png.flaticon.com/512/2331/2331940.png">
            <div>Pembayaran</div>
        </div>
        <div class="col-3 menu-icon">
            <img src="https://cdn-icons-png.flaticon.com/512/3081/3081648.png">
            <div>Pengiriman</div>
        </div>
        <div class="col-3 menu-icon">
            <img src="https://cdn-icons-png.flaticon.com/512/1828/1828884.png">
            <div>Voucher</div>
        </div>
    </div>
</div>

<!-- KATEGORI -->
<div class="container mt-4">
    <h6 class="mb-3">KATEGORI</h6>

    <div class="row g-2">

        <div class="col-4 col-md-3 col-lg-2">
            <div class="kategori-item">
                <img src="https://cdn-icons-png.flaticon.com/512/1046/1046784.png">
                <div>Makanan</div>
            </div>
        </div>

        <div class="col-4 col-md-3 col-lg-2">
            <div class="kategori-item">
                <img src="gambar/minuman.png">
                <div>Minuman</div>
            </div>
        </div>

        <div class="col-4 col-md-3 col-lg-2">
            <div class="kategori-item">
                <img src="gambar/snack.png">
                <div>Snack</div>
            </div>
        </div>

        <div class="col-4 col-md-3 col-lg-2">
            <div class="kategori-item">
                <img src="gambar/pulsa.png">
                <div>Pulsa</div>
            </div>
        </div>

        <div class="col-4 col-md-3 col-lg-2">
            <div class="kategori-item">
                <img src="gambar/top up.png">
                <div>Top Up</div>
            </div>
        </div>

    </div>
</div>

<!-- PRODUK -->
        <?php
include 'koneksi.php';

// ambil data produk
$produk = mysqli_query($conn, "SELECT * FROM produk ORDER BY id_produk DESC");
?>

<div class="container mt-4">
    <h6 class="mb-3">PRODUK UMKM</h6>

    <div class="row g-3">

        <?php while($row = mysqli_fetch_assoc($produk)) { ?>

        <div class="col-6 col-md-4 col-lg-3">
            <div class="produk-card">

                <!-- GAMBAR -->
                <img src="admin/gambar/<?= $row['gambar']; ?>"

                <!-- NAMA -->
                <div class="mt-2"><?= $row['nama_produk']; ?></div>

                <!-- HARGA -->
                <div class="text-danger fw-bold">
                    Rp <?= number_format($row['harga'], 0, ',', '.'); ?>
                </div>

                <!-- STOK -->
                <small class="text-muted">Stok: <?= $row['stok']; ?></small>

            </div>
        </div>

        <?php } ?>

    </div>
</div>

    </div>
</div>

</body>
</html>