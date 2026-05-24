<?php include 'koneksi.php'; ?>

<!DOCTYPE html>
<html>
<head>
    <title>Data Produk</title>
    
    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- DataTables -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>

    <!-- DataTables -->
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>

    <style>
        body {
            background: linear-gradient(135deg, #ffe6f0, #ffcce0);
        }

        .btn-pink {
            background:#ff4da6;
            color:white;
        }

        .btn-pink:hover {
            background:#e60073;
            color:white;
        }

        h3 {
            color:#ff4da6;
        }

        .dataTables_filter input {
            border-radius: 20px;
            border: 1px solid #ff4da6;
            padding: 5px 10px;
        }

        .dataTables_wrapper .dataTables_paginate .paginate_button.current {
            background: #ff4da6 !important;
            color: white !important;
            border-radius: 10px;
        }
    </style>
</head>

<body>

<div class="container mt-5">

<h3 class="text-center mb-4">Data Produk</h3>

<button onclick= history.back() class="btn btn-secondary mb-3"> Kembali</button>
<a href="?menu=tambah_produk" class="btn btn-pink mb-3">+ Tambah Produk</a>

<table id="tabelProduk" class="table table-bordered table-striped shadow">
    <thead class="text-center">
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Harga</th>
            <th>Stok</th>
            <th>Gambar</th>
            <th>Aksi</th>
        </tr>
    </thead>

    <tbody>
    <?php
    $no=1;
    $data = mysqli_query($conn,"SELECT * FROM produk");

    while($d=mysqli_fetch_array($data)){
    ?>
    <tr class="text-center align-middle">
        <td><?= $no++; ?></td>
        <td><?= $d['nama_produk']; ?></td>
        <td>Rp <?= number_format($d['harga']); ?></td>

        <td>
            <span class="badge bg-<?= $d['stok'] > 0 ? 'success' : 'danger' ?>">
                <?= $d['stok']; ?>
            </span>
        </td>

        <td>
            <img src="gambar/<?= $d['gambar']; ?>" width="80" class="rounded">
        </td>

        <td>
            <a href="?menu=edit_produk&id=<?= $d['id_produk']; ?>" class="btn btn-warning btn-sm">Edit</a>
            <a href="hapus_produk.php?id=<?= $d['id_produk']; ?>" 
               class="btn btn-danger btn-sm"
               onclick="return confirm('Yakin hapus?')">
               Hapus
            </a>
        </td>
    </tr>
    <?php } ?>
    </tbody>

</table>
</div>

<script>
$(document).ready(function() {
    $('#tabelProduk').DataTable({
        "pageLength": 5,
        "lengthMenu": [5, 10, 25, 50],
        "order": [[1, "asc"]],
        "columnDefs": [
            { "orderable": false, "targets": [4,5] }
        ],
        "language": {
            "search": "🔍 Cari:",
            "lengthMenu": "Tampilkan _MENU_ data",
            "info": "Menampilkan _START_ sampai _END_ dari _TOTAL_ data",
            "paginate": {
                "previous": "←",
                "next": "→"
            }
        }
    });
});
</script>

</body>
</html>