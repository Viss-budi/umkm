<?php include 'koneksi.php'; ?>
<!DOCTYPE html>
<html>
<head>
    <title>Data Staf</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- DataTables -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">

    <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
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
    </style>
</head>

<body>

<div class="container mt-5">
    <h3 class="text-center mb-4 text-danger">Data Staf</h3>

    <button onclick=history.back() class="btn btn-secondary mb-3">Kembali</button>
    <a href="?menu=tambah_staf" class="btn btn-pink mb-3">+ Tambah Staf</a>

    <table id="tabelStaf" class="table table-bordered table-striped shadow">
        <thead class="text-center">
            <tr>
                <th>No</th>
                <th>Username</th>
                <th>Nama</th>
                <th>Role</th>
                <th>Aksi</th>
            </tr>
        </thead>

        <tbody>
        <?php
        $no=1;
        $data = mysqli_query($conn,"SELECT * FROM staf");

        while($d=mysqli_fetch_array($data)){
        ?>
        <tr class="text-center">
            <td><?= $no++; ?></td>
            <td><?= $d['username']; ?></td>
            <td><?= $d['nama']; ?></td>
            <td>
   <span class="badge bg-<?=
    $d['role']=='admin' ? 'danger' :
    ($d['role']=='pemilik' ? 'dark' : 'primary')
?>">
    <?= strtoupper($d['role']); ?>
</span>
</td>
            <td>
                <a href="index.php?menu=edit_staf&id=<?= $d['id']; ?>" class="btn btn-warning btn-sm">Edit</a>
                <a href="hapus_staf.php?id=<?= $d['id']; ?>" 
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
    $('#tabelStaf').DataTable();
});
</script>

</body>
</html>