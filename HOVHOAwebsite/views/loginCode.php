<?php
include '../includes/database.php';
session_start();

if (isset($_POST['login'])) {

    $email = htmlspecialchars($_POST['email']);
    $password = $_POST['password'];
    $role = htmlspecialchars($_POST['role']);

    if (!empty($email) && 
        !empty($password) && 
        !empty($role)) {

        $sqlstate = $pdo->prepare('SELECT * FROM users
                                    WHERE email = ? 
                                    AND role = ?');
        $sqlstate->execute([$email,
                            $role]);

        $user = $sqlstate->fetch(PDO::FETCH_ASSOC);

        if ($user && password_verify($password, $user['password'])) {

            $_SESSION['users'] = $user;

            if ($role == 'admin') {
                header('Location:adminDashboard.php');
            } else {
                header('Location:user.php');
            }
            exit();

        } else {
            $_SESSION['userMessage'] = "Email Or Password Incorrect!";
            $_SESSION['type'] = "danger";
        }
    } else {
        $_SESSION['userMessage'] = "There's A Problem Logging In!";
        $_SESSION['type'] = "danger!";
    }
        header('Location:userLogin.php');
        exit();
}
?>