<?php include 'koneksi.php'; ?>

<!DOCTYPE html>
<html>
<head>
    <title>Tambah Staf</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
    .btn-pink {
        background-color: #ff4da6;
        color: white;
        border: none;
    }

    .btn-pink:hover {
        background-color: #e60073;
        color: white;
    }
</style>
</head>

<body>

<div class="container mt-5">
    <h3>Tambah Staf</h3>

    <form method="post" action="simpan_staf.php">
        <input type="text" name="username" class="form-control mb-2" placeholder="Username" required>
        
        <input type="password" name="password" class="form-control mb-2" placeholder="Password" required>
        
        <input type="text" name="nama" class="form-control mb-2" placeholder="Nama">

        <select name="role" class="form-control mb-2">
            <option value="admin">Admin</option>
            <option value="staf">Staf</option>
            <option value="ceo">pemilik</option>
        </select>

        <button type="submit" class="btn btn-pink">Simpan</button>
        <button onclick= history.back() class="btn btn-secondary">Kembali</button>
    </form>
</div>

</body>
</html>