<?php
session_start();
require_once 'db.php';

if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'admin') {
    header('Location: login.php');
    exit();
}

$query = "SELECT * FROM pendaftar";
$result = $conn->query($query);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Admin - Daftar Pendaftar</title>
    <link rel="stylesheet" href="css/style.css">
</head>
    <body>
        <h2>Daftar Pendaftar</h2>

        <table>
            <tr>
                <th>Nama</th>
                <th>Kelas</th>
                <th>Jurusan</th>
                <th>Ekstrakurikuler</th>
                <th>Tanggal Daftar</th>
                <th>Aksi</th>
            </tr>
            <?php while ($row = $result->fetch_assoc()) : ?>
            <tr>
                <td><?= $row['nama'] ?></td>
                <td><?= $row['kelas'] ?></td>
                <td><?= $row['jurusan'] ?></td>
                <td><?= $row['ekstrakurikuler'] ?></td>
                <td><?= $row['tanggal_daftar'] ?></td>
                <td>
                    <a href="edit.php?id=<?= $row['id'] ?>">Edit</a> |
                    <a href="hapus.php?id=<?= $row['id'] ?>">Hapus</a>
                </td>
            </tr>
            <?php endwhile; ?>
        </table>

        <!-- Tombol Logout -->
        <form action="logout.php" method="POST">
            <button type="submit">Logout</button>
        </form>
    </body>
</html>
