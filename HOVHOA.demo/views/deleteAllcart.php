<?php
    include '../includes/database.php';
    session_start();
    
    $idUser = $_GET['idUser'];
    $sqlstate = $pdo->query("DELETE FROM cart WHERE idUser = '$idUser'");
    $_SESSION['message'] = "Products Deleted Successfully!";
    $_SESSION['type'] = "success";
    header('location:cart.php');
?>