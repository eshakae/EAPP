<?php
require_once 'db.php';
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password']; // langsung ambil tanpa hash
    $role = $_POST['role'];

    // Blokir pembuatan akun admin lewat form ini
    if ($role === 'admin') {
        echo "<p class='error'>Tidak diizinkan membuat akun admin melalui form ini.</p>";
    } else {
        // Gunakan password asli tanpa di-hash
        $query = "INSERT INTO users (username, password, role) VALUES (?, ?, ?)";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("sss", $username, $password, $role);

        if ($stmt->execute()) {
            $_SESSION['user_id'] = $stmt->insert_id;
            $_SESSION['username'] = $username;
            $_SESSION['role'] = $role;

            // Arahkan ke halaman pendaftaran setelah registrasi siswa/siswi
            header("Location: pendaftaran.php");
            exit();
        } else {
            echo "<p class='error'>Gagal Mendaftar!</p>";
        }
    }
}
?>


<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Registrasi</title>
    <link rel="stylesheet" href="css/style.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
            padding: 20px;
            background-image: url('file/bg.png'); /* Ganti dengan path gambar kamu */
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            background-attachment: fixed;
        }
        .image-banner {
            max-width: 300px;
            margin: 20px auto;
            display: block;
        }
    </style>
</head>
<body>
    <form method="POST" action="register.php">
        <input type="text" name="username" placeholder="Username" required>
        <input type="password" name="password" placeholder="Password" required>

        <!-- Role hanya siswa/siswi -->
        <select name="role" required>
            <option value="" disabled selected>Pilih peran</option>
            <option value="siswa">Siswa</option>
        </select>

        <button type="submit">Daftar</button>
    </form>
</body>
</html>
