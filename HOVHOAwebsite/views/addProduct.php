<?php
    include '../includes/header.php';
    include "../includes/database.php";
    session_start();

    if (isset($_POST['addProduct'])) {
        $image = $_FILES['image'];
        $label = htmlspecialchars($_POST['label']);
        $style = htmlspecialchars($_POST['style']);
        $description = htmlspecialchars($_POST['description']);
        $price = htmlspecialchars($_POST['price']);
        $quantity = htmlspecialchars($_POST['quantity']);
        $discount = htmlspecialchars($_POST['discount']);

        if (!empty($image) &&
            !empty($label) && 
            !empty($style) && 
            !empty($description) && 
            !empty($price) && 
            !empty($quantity)) {

            $tmpName = $_FILES['image']['tmp_name'];
            $filename = uniqid() . $_FILES['image']['name'];
            move_uploaded_file($tmpName, '../uploadImage/product/' . $filename);

            $sqlstate = $pdo->prepare('INSERT INTO product 
                                        VALUES(null,?,?,?,?,?,?,?)');

            $sqlstate->execute([$filename,
                                $label,
                                $style,
                                $description,
                                $price,
                                $quantity,
                                $discount]);

            $_SESSION['message'] = "Product Added Successfully";
            $_SESSION['type'] = "success";

        } else {
            $_SESSION['message'] = "Product Can Not Be Added!";
            $_SESSION['type'] = "danger";

        }
        header('location:products.php');
        exit();
    }
?>