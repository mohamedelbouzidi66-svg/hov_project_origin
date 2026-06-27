<?php
include '../includes/header.php';
include '../includes/database.php';
session_start();

    if(isset($_POST['modifyProduct'])){

        $newImage = $_FILES['newImage'];
        $newLabel = htmlspecialchars($_POST['newLabel']);
        $newStyle = htmlspecialchars($_POST['newStyle']);
        $newDescription = htmlspecialchars($_POST['newDescription']);
        $newPrice = htmlspecialchars($_POST['newPrice']);
        $newQuantity = htmlspecialchars($_POST['newQuantity']);
        $newDiscount = htmlspecialchars($_POST['newDiscount']);
        $idProduct = $_POST['idProduct'];
        
        if (!empty($newImage) &&
            !empty($newLabel) && 
            !empty($newStyle) && 
            !empty($newDescription) &&
            !empty($newPrice) && 
            !empty($newQuantity) && 
            !empty($idProduct)) {
            
            $tmpName = $_FILES['newImage']['tmp_name'];
            $newFilenameproduct = $_FILES['newImage']['name'];
            move_uploaded_file($tmpName, '../uploadImage/product/' . $newFilenameproduct);

            $sqlstate = $pdo->prepare('UPDATE product
                                            SET image = ?,
                                            label = ?,
                                            style = ?,
                                            description = ?,
                                            price = ?,
                                            quantity = ?,
                                            discount = ?
                                            WHERE idProduct = ?');
            $sqlstate->execute([$newFilenameproduct,
                                $newLabel, 
                                $newStyle, 
                                $newDescription, 
                                $newPrice, 
                                $newQuantity, 
                                $newDiscount, 
                                $idProduct]);

            $_SESSION['message'] = "Product Modified Successfully";
            $_SESSION['type'] = "success";
            
        } else {
            $_SESSION['message'] = "Product Can Not Be Modified!";
            $_SESSION['type'] = "danger";
        }
        header('location:products.php');
        exit();
    }
?>