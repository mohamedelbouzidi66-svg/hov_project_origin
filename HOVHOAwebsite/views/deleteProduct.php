<?php
include '../includes/database.php';
session_start();

    $idProduct = $_GET['idProduct'];
    $sqlState = $pdo->prepare('DELETE FROM product 
                                WHERE idProduct = ?');
    $sqlState->execute([$idProduct]);

    $_SESSION['message'] = "Product Deleted Successfully!";
    $_SESSION['type'] = "success";
    header('location:products.php');
?>