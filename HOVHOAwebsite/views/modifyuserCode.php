<?php
    include '../includes/database.php';
    session_start();

    if(isset($_POST['modifyUser'])){
        $fullname = htmlspecialchars($_POST['fullname']);
        $email = htmlspecialchars($_POST['email']);
        $password = htmlspecialchars($_POST['password']);
        $role = htmlspecialchars($_POST['role']);
        $idUser = $_SESSION['users']['idUser'];

        if(!empty($fullname) && 
            !empty($email) && 
            !empty($password) && 
            !empty($role) && 
            !empty($idUser)){

            $sqlstate = $pdo->prepare('UPDATE users
                                        SET fullname = ?,
                                        email = ?,
                                        password = ?,
                                        role = ?
                                        WHERE idUser = ?');
            $sqlstate->execute([$fullname,
                                $email,
                                $password,
                                $role,
                                $idUser]);
            header('location:userDashboard.php');
    }
}
?>