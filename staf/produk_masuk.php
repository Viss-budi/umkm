<?php
include 'koneksi.php';

// ambil data produk
$query = mysqli_query($conn, "SELECT * FROM produk");

// ambil keranjang
$keranjang = $_SESSION['keranjang'] ?? [];
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Transaksi Produk Masuk</title>

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        .bg-pink {
            background-color: #ff4da6 !important;
        }
        .btn-pink {
            background-color: #ff4da6;
            color: white;
        }
        .btn-pink:hover {
            background-color: #e60073;
            color: white;
        }
        .text-pink {
            color: #ff4da6;
        }
    </style>
</head>

<body class="bg-light">

<div class="container mt-4">

    <!-- Judul -->
    <h2 class="mb-4 fw-bold">Transaksi Produk Masuk</h2>

    <!-- FORM INPUT -->
    <div class="card shadow-sm mb-4">
        <div class="card-body">
            <form action="tambah_keranjang.php" method="POST" class="row g-3">

                <!-- Pilih Produk -->
                <div class="col-md-6">
                    <select name="id" class="form-select">
    <option value="">-- Pilih Produk --</option>
    <?php
    $data = mysqli_query($conn,"SELECT * FROM produk");
    while($d = mysqli_fetch_assoc($data)) {
        echo "<option value='".$d['id_produk']."'>".$d['nama_produk']."</option>";
    }
    ?>
</select>
                </div>

                <!-- Jumlah -->
                <div class="col-md-4">
                    <input type="number" name="jumlah" class="form-control" placeholder="Jumlah" min="1" required>
                </div>

                <!-- Tombol -->
                <div class="col-md-2 d-grid">
                    <button type="submit" class="btn btn-pink">Tambah</button>
                </div>

            </form>
        </div>
    </div>

    <!-- KERANJANG -->
    <div class="card shadow-sm">
        <div class="card-body">

            <h5 class="mb-3 fw-bold">Keranjang</h5>

            <table class="table table-bordered">
                <thead class="table-light">
                    <tr>
                        <th>No</th>
                        <th>Produk</th>
                        <th>Jumlah</th>
                        <th>Aksi</th>
                    </tr>
                </thead>

                <tbody>
                <?php
                if (!empty($keranjang)) {
                    $no = 1;
                    foreach ($keranjang as $id => $jumlah) {
                       $q = mysqli_query($conn, "SELECT * FROM produk WHERE id_produk='$id'");
                        $p = mysqli_fetch_assoc($q);
                ?>
                    <tr>
                        <td><?= $no++; ?></td>
                        <td><?= $p['nama_produk'] ?? 'Produk tidak ditemukan' ?></td>
                        <td><?= $jumlah; ?></td>
                        <td>
                            <a href="hapus_keranjang.php?id=<?= $id; ?>" 
                               class="btn btn-danger btn-sm"
                               onclick="return confirm('Hapus produk?')">
                               Hapus
                            </a>
                        </td>
                    </tr>
                <?php 
                    }
                } else {
                    echo "<tr><td colspan='4' class='text-center'>Keranjang kosong</td></tr>";
                }
                ?>
                </tbody>
            </table>

            <!-- Tombol Simpan -->
            <a href="simpan_transaksi.php" class="btn btn-success">
                Simpan Transaksi
            </a>

        </div>
    </div>

</div>

</body>
</html>