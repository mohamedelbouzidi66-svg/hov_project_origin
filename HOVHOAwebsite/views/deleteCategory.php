<?php
    include '../includes/database.php';
    session_start();

    $id_category = $_GET['id_category'];
    // delete category query
    $sqlState = $pdo->query("DELETE FROM category 
                            WHERE id_category = '$id_category'");

    $_SESSION['message'] = "Category Deleted Successfully!";
    $_SESSION['type'] = "success";
    header('location:category.php');
?>