<?php
include 'koneksi.php';

// proteksi login
if (!isset($_SESSION['login'])) {
    header("Location: login.php");
    exit;
}

// filter tanggal (optional)
$tgl_awal  = $_GET['tgl_awal'] ?? '';
$tgl_akhir = $_GET['tgl_akhir'] ?? '';

$where = "";

if (!empty($tgl_awal) && !empty($tgl_akhir)) {
    $where = "WHERE pm.tanggal BETWEEN '$tgl_awal' AND '$tgl_akhir'";
}

// query join
$query = mysqli_query($conn, "
    SELECT 
        pm.id_masuk,
        pm.tanggal,
        s.nama AS nama_staf,
        p.nama_produk AS nama_produk,
        d.jumlah
    FROM produk_masuk pm
    JOIN staf s ON pm.id_staf = s.id
    JOIN produk_masuk_detail d ON pm.id_masuk = d.id_masuk
    JOIN produk p ON d.id_produk = p.id_produk
    $where
    ORDER BY pm.tanggal DESC
");
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Laporan Pembelian</title>

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        .bg-pink {
            background-color: #ff4da6 !important;
        }
        .text-pink {
            color: #ff4da6;
        }
    </style>
</head>

<body class="bg-light">

<div class="container mt-4">

    <h2 class="mb-4 fw-bold">Laporan Pembelian</h2>

    <!-- FILTER -->
    <div class="card mb-4 shadow-sm">
        <div class="card-body">
            <form method="GET" class="row g-3">
    <input type="hidden" name="menu" value="laporan_pembelian">

    <div class="col-md-4">
        <label>Tanggal Awal</label>
        <input type="date" name="tgl_awal" class="form-control" value="<?= $tgl_awal ?>">
    </div>

    <div class="col-md-4">
        <label>Tanggal Akhir</label>
        <input type="date" name="tgl_akhir" class="form-control" value="<?= $tgl_akhir ?>">
    </div>

    <div class="col-md-4 d-flex align-items-end">
        <button class="btn btn-primary">Filter</button>
        <a href="index.php?menu=laporan_pembelian" class="btn btn-secondary ms-2">Reset</a>
    </div>
</form>
        </div>
    </div>

    <!-- TABEL -->
    <div class="card shadow-sm">
        <div class="card-body">

            <table class="table table-bordered table-striped">
                <thead class="table-dark">
                    <tr>
                        <th>No</th>
                        <th>Tanggal</th>
                        <th>Staf</th>
                        <th>Produk</th>
                        <th>Jumlah</th>
                    </tr>
                </thead>

                <tbody>
                <?php
                if (mysqli_num_rows($query) > 0) {
                    $no = 1;
                    while ($row = mysqli_fetch_assoc($query)) {
                ?>
                    <tr>
                        <td><?= $no++; ?></td>
                        <td><?= $row['tanggal']; ?></td>
                        <td><?= $row['nama_staf']; ?></td>
                        <td><?= $row['nama_produk']; ?></td>
                        <td><?= $row['jumlah']; ?></td>
                    </tr>
                <?php
                    }
                } else {
                    echo "<tr><td colspan='5' class='text-center'>Data tidak ditemukan</td></tr>";
                }
                ?>
                </tbody>

            </table>

        </div>
    </div>

</div>
<?php include "grafik_pembelian.php"; ?>
</body>
</html>