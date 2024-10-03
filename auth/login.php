<?php
session_start();
include "../db.php"; // Pastikan file koneksi database disertakan

// Ambil username dan password dari form login
$username = $_POST['username'];
$password = $_POST['password'];

// Cek apakah username dan password diisi
if (isset($username) && isset($password)) {

    // Menggunakan prepared statement untuk keamanan
    $stmt = $conn->prepare("SELECT * FROM users WHERE username = ? AND password = ?");
    $stmt->bind_param("ss", $username, $password); // Tambahkan password ke parameter
    $stmt->execute();
    $result = $stmt->get_result();

    // Periksa apakah query berhasil dan ada hasilnya
    if ($result && $result->num_rows > 0) {
        // Ambil data user
        $row = $result->fetch_assoc();

        // Login sukses, set session
        $_SESSION['username'] = $row['username'];
        $_SESSION['role'] = $row['role']; // Jika ada role admin/user
        
        // Redirect ke halaman dashboard sesuai role
        if ($row['role'] == 'admin') {
            header("Location: ../pages/admin_dashboard.php");
        } else {
            header("Location: ../pages/user_dashboard.php");
        }
        exit();
    } else {
        // Username atau password salah
        echo "Username atau password salah!";
    }

} else {
    echo "Mohon isi username dan password!";
}
?>
