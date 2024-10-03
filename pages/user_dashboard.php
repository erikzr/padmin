<?php
session_start();

// Cek apakah pengguna sudah login
if (!isset($_SESSION['username'])) {
    header('Location: ../index.php');
    exit();
}

// Ambil role dari session
$role = $_SESSION['role'];
$username = $_SESSION['username'];

// Pesan selamat datang berdasarkan role user
if ($role == 'user1') {
    $message = "Selamat datang, User Satu!";
} elseif ($role == 'user2') {
    $message = "Selamat datang, User Dua!";
} else {
    // Jika role tidak sesuai, redirect ke login
    header('Location: ../index.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard User</title>
    <!-- Masukkan Bootstrap atau CSS lainnya -->
</head>
<body>
    <div class="container">
        <h1><?php echo $message; ?></h1>
        <p>Username: <?php echo $username; ?></p>
        
        <!-- Konten lainnya untuk dashboard -->
    </div>
</body>
</html>
