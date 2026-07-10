<?php
    include '../includes/database.php';
    session_start();

    $idUser = $_GET['idUser'];
    // delete user query
    $sqlState = $pdo->prepare("DELETE FROM users 
                                WHERE idUser = '$idUser'");

    $_SESSION['message'] = "User Deleted Successfully!";
    $_SESSION['type'] = "success";
    header('location:users.php');
?>