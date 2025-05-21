<?php
session_start();
if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'siswa') {
    header('Location: login.php');
    exit();
}
?>
<html>
<head>
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
    <script>
        function confirmLogout(event) {
            if (!confirm("Apakah Anda yakin ingin logout?")) {
                event.preventDefault(); // Batalkan logout kalau user klik Batal
            }
        }
    </script>
</head>
<body>
    <h2>Selamat datang, <?= $_SESSION['username'] ?>!</h2>
    <p><a href="pendaftaran.php">Daftar Ekstrakurikuler</a></p>
    <p><a href="logout.php" onclick="confirmLogout(event)">Logout</a></p>
</body>
</html>