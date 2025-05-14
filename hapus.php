<?php
    session_start();
    require_once 'db.php';

    $id = $_GET['id'];
    $stmt = $conn->prepare("DELETE FROM pendaftar WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();

    // Menampilkan notifikasi dan mengarahkan ke logout setelah beberapa detik
    echo "<p class='success'>Data berhasil dihapus!</p>";
    header("Refresh: 0; URL=admin.php"); 
?>
