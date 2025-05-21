<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Pendaftaran</title>
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

            <!-- Pilihan Kelas -->
            <select name="kelas" required>
                <option value="" disabled selected>Pilih kelas</option>
                <option value="X">X</option>
                <option value="XI">XI</option>
                <option value="XII">XII</option>
            </select>

            <!-- Pilihan Jurusan -->
            <select name="jurusan" required>
                <option value="" disabled selected>Pilih jurusan</option>
                <option value="RPL">RPL</option>
                <option value="SIJA">SIJA</option>
                <option value="TKJ">TKJ</option>
                <option value="DKV">DKV</option>
                <option value="TP">TP</option>
                <option value="TKR">TKR</option>
                <option value="DPIB">DPIB</option>
                <option value="TITL">TITL</option>
                <option value="TKP">TKP</option>
                <option value="DGM">DGM</option>
            </select>

            <!-- Pilihan Ekstrakurikuler -->
            <select name="ekstrakurikuler" required>
                <option value="" disabled selected>Pilih ekstrakurikuler</option>
                <option value="Paskibra">Paskibra</option>
                <option value="Pramuka">Pramuka</option>
                <option value="PMR">PMR</option>
                <option value="Rohis">Rohis</option>
                <option value="Rohkris">Rohkris</option>
                <option value="English Club">English Club</option>
                <option value="KBBI">KBBI</option>
                <option value="Japanese Club">Japanese Club</option>
                <option value="Silat">Silat</option>
                <option value="Karate">Karate</option>
                <option value="Badminton">Badminton</option>
                <option value="Basket">Basket</option>
                <option value="Futsal">Futsal</option>
                <option value="Volly">Volly</option>
                <option value="Karya Ilmiah Remaja">Karya Ilmiah Remaja</option>
                <option value="Siot">Siot</option>
                <option value="Band">Band</option>
                <option value="ESSA Media">ESSA Media</option>
            </select>

            <button type="submit">Daftar</button>
        </form>

        <!-- Form Logout -->
        <form action="logout.php" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin logout?')">
            <button type="submit">Logout</button>
        </form>
    </body>
</html>
