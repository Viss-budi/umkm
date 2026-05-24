<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Staf</title>

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <style>
        body {
            background: linear-gradient(135deg, #ff9ecf, #ffc1e3);
            height: 100vh;
        }

        .card {
            border-radius: 15px;
        }

        .btn-pink {
            background-color: #ff4da6;
            color: white;
        }

        .btn-pink:hover {
            background-color: #e60073;
            color: white;
        }

        .form-control:focus {
            border-color: #ff4da6;
            box-shadow: 0 0 0 0.2rem rgba(255, 77, 166, 0.25);
        }
    </style>
</head>

<body class="d-flex justify-content-center align-items-center">

<div class="card shadow p-4" style="width: 350px;">
    <h3 class="text-center mb-4 text-pink" style="color:#ff4da6;">Login Staf</h3>

    <form method="POST" action="prosesLogin.php">

        <div class="mb-3">
            <label class="form-label">Username</label>
            <input type="text" name="username" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Password</label>
            <input type="password" name="password" class="form-control" required>
        </div>

        <div class="mb-3 text-center">
            <label class="form-label d-block">Captcha</label>
            <img src="captcha.php" class="mb-2 rounded">
            <input type="text" name="captcha" class="form-control" placeholder="Masukkan captcha" required>
        </div>

        <button type="submit" class="btn btn-pink w-100">Login</button>

    </form>
</div>

</body>
</html>