<?php
session_start();
if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'siswa') {
    header('Location: login.php');
    exit();
}
?>
<html>
<head><link rel="stylesheet" href="style.css"></head>
<body>
<h2>Selamat datang, <?= $_SESSION['username'] ?>!</h2>
<p><a href="pendaftaran.php">Daftar Ekstrakurikuler</a></p>
<p><a href="logout.php">Logout</a></p>
</body>
</html>
