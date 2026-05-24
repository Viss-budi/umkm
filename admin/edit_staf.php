<?php 
include 'koneksi.php';

$id = $_GET['id'];
$data = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM staf WHERE id='$id'"));
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Staf</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Icon -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

    <style>
        body {
            background: linear-gradient(135deg, #ffe6f0, #ffcce0);
        }

        .card {
            border: none;
            border-radius: 15px;
        }

        .card-header {
            background-color: #ff4da6;
            color: white;
            border-radius: 15px 15px 0 0;
        }

        .btn-pink {
            background-color: #ff4da6;
            color: white;
            border-radius: 10px;
        }

        .btn-pink:hover {
            background-color: #e60073;
        }

        .form-control:focus {
            border-color: #ff4da6;
            box-shadow: 0 0 5px rgba(255,77,166,0.5);
        }
    </style>
</head>

<body>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">

            <div class="card shadow">
                
                <div class="card-header text-center">
                    <h5><i class="bi bi-person-gear"></i> Edit Data Staf</h5>
                </div>

                <div class="card-body">

                    <form method="post" action="update_staf.php">
                        
                        <input type="hidden" name="id" value="<?= $data['id']; ?>">

                        <!-- Username -->
                        <div class="mb-3">
                            <label class="form-label">Username</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="bi bi-person"></i></span>
                                <input type="text" name="username" 
                                    value="<?= $data['username']; ?>" 
                                    class="form-control" required>
                            </div>
                        </div>

                        <!-- Nama -->
                        <div class="mb-3">
                            <label class="form-label">Nama Lengkap</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="bi bi-card-text"></i></span>
                                <input type="text" name="nama" 
                                    value="<?= $data['nama']; ?>" 
                                    class="form-control">
                            </div>
                        </div>

                        <!-- Role -->
                        <select name="role" class="form-select">
    <option value="admin" <?= $data['role']=='admin'?'selected':''; ?>>Admin</option>
    <option value="staf" <?= $data['role']=='staf'?'selected':''; ?>>Staf</option>
    <option value="pemilik" <?= $data['role']=='pemilik'?'selected':''; ?>>Pemilik</option>
</select>

                        <!-- Password Opsional -->
                        <div class="mb-3">
                            <label class="form-label">Password Baru (Opsional)</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="bi bi-lock"></i></span>
                                <input type="password" name="password" class="form-control" placeholder="Kosongkan jika tidak diubah">
                            </div>
                        </div>

                        <!-- Tombol -->
                        <div class="d-flex justify-content-between">
                            <button onclick= history.back() class="btn btn-secondary">
                                <i class="bi bi-arrow-left"></i> Kembali
                            </button>

                            <button type="submit" class="btn btn-pink">
                                <i class="bi bi-save"></i> Update
                            </button>
                        </div>

                    </form>

                </div>

            </div>

        </div>
    </div>
</div>

</body>
</html>