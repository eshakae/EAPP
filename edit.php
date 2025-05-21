<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Data</title>
    <link rel="stylesheet" href="css/style.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
            padding: 20px;
            background-image: url('file/bg.png');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            background-attachment: fixed;
        }
        .logo {
            max-width: 120px;
            margin-bottom: 20px;
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

    $id = $_GET['id'];
    $stmt = $conn->prepare("SELECT * FROM pendaftar WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $data = $result->fetch_assoc();

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $nama = $_POST['nama'];
        $kelas = $_POST['kelas'];
        $jurusan = $_POST['jurusan'];
        $ekskul = $_POST['ekstrakurikuler'];

        $stmt = $conn->prepare("UPDATE pendaftar SET nama = ?, kelas = ?, jurusan = ?, ekstrakurikuler = ? WHERE id = ?");
        $stmt->bind_param("ssssi", $nama, $kelas, $jurusan, $ekskul, $id);
        $stmt->execute();

        echo "<p class='success'>Data berhasil diperbarui!</p>";
        header("Refresh: 0; URL=admin.php");
    }

    function selected($value, $selected) {
        return $value === $selected ? 'selected' : '';
    }
?>
<form method="POST">
    <input type="text" name="nama" value="<?= htmlspecialchars($data['nama']) ?>" required>

    <!-- Pilihan Kelas -->
    <select name="kelas" required>
        <option value="" disabled>Pilih kelas</option>
        <option value="X" <?= selected('X', $data['kelas']) ?>>X</option>
        <option value="XI" <?= selected('XI', $data['kelas']) ?>>XI</option>
        <option value="XII" <?= selected('XII', $data['kelas']) ?>>XII</option>
    </select>

    <!-- Pilihan Jurusan -->
    <select name="jurusan" required>
        <option value="" disabled>Pilih jurusan</option>
        <?php
            $jurusanList = ['RPL', 'SIJA', 'TKJ', 'DKV', 'TP', 'TKR', 'DPIB', 'TITL', 'TKP', 'DGM'];
            foreach ($jurusanList as $j) {
                echo "<option value=\"$j\" ".selected($j, $data['jurusan']).">$j</option>";
            }
        ?>
    </select>

    <!-- Pilihan Ekstrakurikuler -->
    <select name="ekstrakurikuler" required>
        <option value="" disabled>Pilih ekstrakurikuler</option>
        <?php
            $ekskulList = [
                'Paskibra', 'Pramuka', 'PMR', 'Rohis', 'Rohkris', 'English Club', 'KBBI', 'Japanese Club',
                'Silat', 'Karate', 'Badminton', 'Basket', 'Futsal', 'Volly',
                'Karya Ilmiah Remaja', 'Siot', 'Band', 'ESSA Media'
            ];
            foreach ($ekskulList as $e) {
                echo "<option value=\"$e\" ".selected($e, $data['ekstrakurikuler']).">$e</option>";
            }
        ?>
    </select>

    <button type="submit">Update</button>
</form>
</body>
</html>
