<?php
    include '../includes/database.php';
    session_start();

    $idProduct = $_GET['idProduct'];
    // delete product query
    $sqlState = $pdo->query("DELETE FROM product 
                            WHERE idProduct = '$idProduct'");

    $_SESSION['message'] = "Product Deleted Successfully!";
    $_SESSION['type'] = "success";
    header('location:products.php');
?>