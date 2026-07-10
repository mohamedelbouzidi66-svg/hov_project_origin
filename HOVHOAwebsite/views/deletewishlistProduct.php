<?php
    include '../includes/database.php';
    session_start();
    
    $idWishlist = $_GET['idWishlist'];
    // delete product query
    $sqlstate = $pdo->query("DELETE FROM wishlist 
                            WHERE idWishlist = '$idWishlist'");
    $_SESSION['message'] = "Product Deleted Successfully!";
    $_SESSION['type'] = "success";
    header('location:wishlist.php');
?>