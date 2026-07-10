<?php
    include '../includes/database.php';
    session_start();

    if(isset($_POST['register'])){
        $fullname = htmlspecialchars($_POST['fullname']);
        $email = htmlspecialchars($_POST['email']);
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
        $role = htmlspecialchars($_POST['role']);

        if(!empty($fullname) && 
            !empty($email) && 
            !empty($password) && 
            !empty($role)){

            $sqlstate = $pdo->prepare('INSERT INTO users 
                                        VALUES(null,?,?,?,?)');
            $sqlstate->execute([$fullname,
                                $email,
                                $password,
                                $role]);

            $_SESSION['message'] = "Welcome $fullname, Please Log In!";
            $_SESSION['type'] = "success";
            header('location:userLogin.php');
        } else {
            $_SESSION['message'] = "User Can Not Be Added!";
            $_SESSION['type'] = "danger";
            header('location:userRegister.php');
        }
    }else{
            $_SESSION['message'] = "Required Fields!";
            $_SESSION['type'] = "danger";
            header('location:userRegister.php');
    }
?>