<?php
// dashboard.php
if(!isset($_SESSION['login'])){
    header("location:login.php");
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin</title>

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background: linear-gradient(135deg, #ffe6f0, #ffcce0);
        }

        .navbar {
            background-color: #ff4da6;
        }

        .navbar-brand, .nav-link {
            color: white !important;
            font-weight: 500;
        }

        .nav-link:hover {
            color: #ffe6f0 !important;
        }

        .dropdown-menu {
            border-radius: 10px;
        }

        .card {
            border-radius: 15px;
        }

        .welcome-box {
            background: white;
            border-left: 5px solid #ff4da6;
        }

        .btn-pink {
            background-color: #ff4da6;
            color: white;
        }

        .btn-pink:hover {
            background-color: #e60073;
        }
    </style>
</head>

<body>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg shadow">
    <div class="container">
        <a class="navbar-brand" href="#">Admin Panel</a>

        <button class="navbar-toggler bg-light" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            ☰
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">

                <li class="nav-item">
                    <a class="nav-link" href="index.php">Dashboard</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="index.php?menu=produk">Produk</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="index.php?menu=staf">Staf</a>
                </li>

                <!-- Dropdown Laporan -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">
                        Laporan
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#">Laporan Penjualan</a></li>
                        <li><a class="dropdown-item" href="#">Laporan Produk</a></li>
                        <li><a class="dropdown-item" href="#">Laporan Staf</a></li>
                    </ul>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="logout.php">Logout</a>
                </li>

            </ul>
        </div>
    </div>
</nav>

<?php
include "menu.php";
?>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

<?php
include "footer.php";
?>

</body>
</html>