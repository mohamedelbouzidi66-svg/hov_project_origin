<?php
include '../includes/database.php';
    session_start();
    
    $idBag = $_GET['idBag'];
    $sqlstate = $pdo->prepare('DELETE FROM cart WHERE idBag = ?');
    $sqlstate->execute([$idBag]);
    $_SESSION['message'] = "Product Deleted Successfully!";
    $_SESSION['type'] = "success";
    header('location:cart.php');
?>