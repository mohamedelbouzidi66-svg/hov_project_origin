<?php 
    include '../includes/header.php' ;
    include '../includes/database.php'; 
    session_start();

    $connect = false;
    if(isset($_SESSION['users'])){
        $role = $_SESSION['users']['role'];
        $connect = true;
    }

    if($connect){

        if(isset($_POST['addTocart'])){
        $idUser = $_SESSION['users']['idUser'];
        $idProduct = $_POST['idProduct'];
        $productImage = $_POST['productImage'];
        $description = $_POST['description'];
        $price = $_POST['price'];
        $quantity = $_POST['quantity'];
        $discount = $_POST['discount'];

        if( !empty($idUser) && 
            !empty($idProduct) && 
            !empty($productImage) && 
            !empty($description) && 
            !empty($price) && 
            !empty($quantity)){

            $bags = $pdo->query("SELECT * FROM cart 
                                WHERE idProduct = '$idProduct' 
                                AND idUser = '$idUser'");

            if($bags->rowCount()>0){

                $_SESSION['message'] = "Product already has been added to the bag!";
                $_SESSION['type'] = "danger";

            }else{
                $sqlstate = $pdo->prepare("INSERT INTO cart VALUES(null,?,?,?,?,?,?,?)");
                $sqlstate->execute([$idUser,
                                    $idProduct, 
                                    $productImage, 
                                    $description, 
                                    $price,
                                    $quantity,
                                    $discount]);
                                    
                $_SESSION['message'] = "Product Added To Bag!";
                $_SESSION['type'] = "success";
                }
                }
                header('location:cart.php');
                exit();
                }
    }else{
        $_SESSION['message'] = "Please log in to continue shopping!";
        $_SESSION['type'] = "primary";
        header('location:userLogin.php');
    }
?>