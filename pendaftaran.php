<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Data</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php
        session_start();
        require_once 'db.php';

        // Cek apakah user sudah login sebagai siswa
        if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'siswa') {
            header('Location: login.php');
            exit();
        }

        // Proses pendaftaran
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nama = $_POST['nama'];
            $kelas = $_POST['kelas'];
            $jurusan = $_POST['jurusan'];
            $ekskul = $_POST['ekstrakurikuler'];

            // Menyimpan data pendaftaran ke database
            $stmt = $conn->prepare("INSERT INTO pendaftar (nama, kelas, jurusan, ekstrakurikuler) VALUES (?, ?, ?, ?)");
            $stmt->bind_param("ssss", $nama, $kelas, $jurusan, $ekskul);
            $stmt->execute();

            // Menampilkan pesan sukses
            echo "<p class='success'>Pendaftaran berhasil!</p>";
        }
        ?>

        <!-- Form Pendaftaran -->
        <form method="POST">
            <input type="text" name="nama" placeholder="Nama" required>
            <input type="text" name="kelas" placeholder="Kelas" required>
            <input type="text" name="jurusan" placeholder="Jurusan" required>
            <input type="text" name="ekstrakurikuler" placeholder="Ekstrakurikuler" required>
            <button type="submit">Daftar</button>
        </form>

        <!-- Form Logout -->
        <form action="logout.php" method="POST">
            <button type="submit">Logout</button>
        </form>
    </body>
</html>
