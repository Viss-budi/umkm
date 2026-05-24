<!-- Content -->
<div class="container mt-5">

    <div class="card shadow p-4 welcome-box">
        <h3 class="mb-3" style="color:#ff4da6;">Dashboard Admin</h3>

        <p class="mb-0">
            Selamat datang, <strong><?php echo $_SESSION['nama']; ?></strong> 🎉
        </p>
    </div>

    <!-- Contoh Card Statistik -->
    <div class="row mt-4">

        <div class="col-md-4">
            <div class="card shadow text-center p-3">
                <h5>Total Produk</h5>
                <?php
                include"total_produk.php";
                ?>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card shadow text-center p-3">
                <h5>Total Staf</h5>
                <?php
                include"total_staf.php";
                ?>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card shadow text-center p-3">
                <h5>Penjualan Hari Ini</h5>
                <h3 style="color:#ff4da6;">Rp 2.500.000</h3>
            </div>
        </div>

    </div>

</div>