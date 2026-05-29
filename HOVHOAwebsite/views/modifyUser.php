<?php include '../includes/header.php' ?>

    <title>Modify User Page</title>
    <style>
    body {
        background: #f5f5f5;
        font-family: Arial, sans-serif;
        height: 100vh;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .login-box {
        background: white;
        width: 400px;
        padding: 40px;
        border-radius: 12px;
        box-shadow: 0 5px 20px rgba(0, 0, 0, 0.1);
    }

    .logo {
        text-align: center;
        margin-bottom: 30px;
    }

    .logo img {
        width: 180px;
    }

    .form-control {
        height: 50px;
        border-radius: 8px;
    }

    .btn-login {
        background: black;
        color: white;
        width: 100%;
        height: 50px;
        border: none;
        border-radius: 8px;
        font-weight: bold;
        transition: 0.3s;
    }

    .btn-login:hover {
        background: #222;
    }

    .signup {
        text-align: center;
        margin-top: 20px;
    }

    .signup a {
        text-decoration: none;
        font-weight: bold;
        color: black;
    }
    </style>

<body>
    <?php
    session_start();
    
    include '../includes/database.php';
    
    if(isset($_POST['modifyUser'])){
        $fullname = htmlspecialchars($_POST['fullname']);
        $email = htmlspecialchars($_POST['email']);
        $password = htmlspecialchars($_POST['password']);
        $idUser = $_SESSION['users']['idUser'];

        if(!empty($fullname) && !empty($email) && !empty($password) && !empty($idUser)){
            $sqlstate = $pdo->prepare('UPDATE users
                                        SET fullname = ?,
                                        email = ?,
                                        password = ?
                                        WHERE idUser = ?');
            $sqlstate->execute([$fullname,$email,$password,$idUser]);
            header('location:login.php');
        }else{
            ?>
                <div class="alert alert-danger fixed-top fw-bold text-center" role="alert">
                    Something's missing!
                </div>
                <?php
            }
    }
        ?>

    <div class="login-box">

        <div class="logo">
            <img src="../assets/hov_logo6.PNG">
        </div>


        <form method="post">

            <div class="mb-3">
                <input type="text" class="form-control" value="<?php echo $_SESSION['users']['fullname'] ?>" name="fullname">
            </div>

            <div class="mb-3">
                <input type="email" class="form-control" value="<?php echo $_SESSION['users']['email'] ?>" name="email">
            </div>

            <div class="mb-3">
                <input type="password" class="form-control" value="<?php echo $_SESSION['users']['password'] ?>" name="password">
            </div>

            <button class="btn-login" name="modifyUser">
                Modify
            </button>

        </form>

        <div class="signup">
            No account ?
            <a href="register.php" target="_blank">Register</a>
        </div>

    </div>

</body>

</html>