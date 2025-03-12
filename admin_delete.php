<?php
include 'database/database.php';
session_start();

// Menghapus data berdasarkan ID
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "DELETE FROM users WHERE id = $id";
    
    if (mysqli_query($conn, $query)) {
        header("Location: admin.php");
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>
