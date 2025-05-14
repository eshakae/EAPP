<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Data</title>
    <link rel="stylesheet" href="css/style.css">
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
            
            // Menampilkan notifikasi dan mengarahkan ke logout setelah beberapa detik
            echo "<p class='success'>Data berhasil diperbarui!</p>";
            header("Refresh: 0; URL=admin.php");
        }
    ?>
    <form method="POST">
        <input type="text" name="nama" value="<?= $data['nama'] ?>" required>
        <input type="text" name="kelas" value="<?= $data['kelas'] ?>" required>
        <input type="text" name="jurusan" value="<?= $data['jurusan'] ?>" required>
        <input type="text" name="ekstrakurikuler" value="<?= $data['ekstrakurikuler'] ?>" required>
        <button type="submit">Update</button>
    </form>
</body>
</html>
