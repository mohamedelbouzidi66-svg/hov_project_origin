<?php
include '../includes/database.php';
session_start();

    $idUser = $_GET['idUser'];
    $sqlState = $pdo->prepare('DELETE FROM users 
                                WHERE idUser = ?');
    $sqlState->execute([$idUser]);

    $_SESSION['message'] = "User Deleted Successfully!";
    $_SESSION['type'] = "success";
    header('location:users.php');
?>