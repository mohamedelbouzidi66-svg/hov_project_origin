<?php
    include '../includes/database.php';
    include '../includes/header.php';
    session_start();

    if(isset($_POST['update'])){

        $idBag = $_POST['idBag'];
        $newQuantity = $_POST['newQuantity'];

        $sqlstate = $pdo->query("UPDATE cart 
                                SET quantity = $newQuantity 
                                WHERE idBag = $idBag");
        
        $_SESSION['message'] = "Quantity Updated Successfully";
        $_SESSION['type'] = "success";
        header('location:cart.php');
        exit();
    }
?>