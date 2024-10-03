<?php
session_start();

// Cek apakah pengguna sudah login
if (!isset($_SESSION['username']) || $_SESSION['role'] != 'admin') {
    header('Location: ../index.php');
    exit();
}

$username = $_SESSION['username'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin</title>
    <!-- Masukkan Bootstrap atau CSS lainnya -->
</head>
<body>
    <div class="container">
        <h1>Selamat datang, Admin!</h1>
        <p>Username: <?php echo $username; ?></p>
        
        <!-- Konten lainnya untuk dashboard admin -->
    </div>
</body>
</html>
