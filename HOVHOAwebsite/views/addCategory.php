<?php
include "../includes/database.php";
session_start();

    if (isset($_POST['addCategory'])) {
        $label = htmlspecialchars($_POST['label']);
        $labelImage = $_FILES['labelImage'];
        $style = htmlspecialchars($_POST['style']);
        $styleImage = $_FILES['styleImage'];
        $created_at = date("Y-m-d");

        if (!empty($label) &&
            !empty($labelImage) &&
            !empty($style) &&
            !empty($styleImage) &&
            !empty($created_at)) {

            $tmpNamelabel = $_FILES['labelImage']['tmp_name'];
            $filenamelabel = uniqid() . $_FILES['labelImage']['name'];
            move_uploaded_file($tmpNamelabel, '../uploadImage/label/' . $filenamelabel);

            $tmpNamestyle = $_FILES['styleImage']['tmp_name'];
            $filenamestyle = uniqid() . $_FILES['styleImage']['name'];
            move_uploaded_file($tmpNamestyle, '../uploadImage/style/' . $filenamestyle);

            $sqlstate = $pdo->prepare('INSERT INTO category VALUES(null,?,?,?,?,?)');
            $sqlstate->execute([$label,
                                $filenamelabel,
                                $style, 
                                $filenamestyle,
                                $created_at]);
                                
            $_SESSION['message'] = "Category Added Successfully";
            $_SESSION['type'] = "success";
        } else {
            $_SESSION['message'] = "Category Can Not Be Added!";
            $_SESSION['type'] = "danger!";
        }
        header('location:category.php');
        exit();
    }
?>