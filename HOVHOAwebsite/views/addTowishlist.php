<?php 
    include '../includes/header.php' ;
    include '../includes/database.php'; 
    session_start();

    $idProduct = isset($_GET['idProduct'])
                ? $_GET['idProduct']
                :null;
    $sqlState = $pdo->query("SELECT * FROM product 
                                WHERE idProduct = '$idProduct'");
    $products = $sqlState->fetchAll(PDO::FETCH_ASSOC);

    $connect = false;
    if(isset($_SESSION['users'])){
        $role = $_SESSION['users']['role'];
        $connect = true;
    }

    if($connect){

        if(isset($_GET['idProduct'])){    
            foreach($products as $product){
                $idUser = $_SESSION['users']['idUser'];
                $idProduct = $product['idProduct'];
                $productImage = $product['image'];
                $description = $product['description'];
                $price = $product['price'];
                $quantity = $product['quantity'];
                $discount = $product['discount'];
            }

            // number of cart table rows query
            $wishlists = $pdo->query("SELECT * FROM wishlist 
                                    WHERE idProduct = '$idProduct' 
                                    AND idUser = '$idUser'");

            if($wishlists->rowCount()>0){

                $_SESSION['message'] = "Product already has been added to the wishlist!";
                $_SESSION['type'] = "danger";

            }else{
                $sqlstate = $pdo->prepare("INSERT INTO wishlist 
                                            VALUES(null,?,?,?,?,?,?,?)");

                $sqlstate->execute([$idUser,
                                    $idProduct, 
                                    $productImage, 
                                    $description, 
                                    $price,
                                    $quantity,
                                    $discount]);
                                    
                $_SESSION['message'] = "Product Added To wishlist!";
                $_SESSION['type'] = "success";
                }
                }
                header('location:wishlist.php');
                exit();

    }else{
        $_SESSION['message'] = "Please log in to save your wishlist!";
        $_SESSION['type'] = "primary";
        header('location:userLogin.php');
    }
?>