<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="css/style.css">

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
</head>

<body>
    <?php
    include 'includes/database.php';
    if(isset($_POST['login'])){
        $email = htmlspecialchars($_POST['email']);
        $password = htmlspecialchars($_POST['password']);

        if(!empty($email) && !empty($password)){
            $sqlstate = $pdo->prepare('SELECT * FROM users WHERE email=? AND password=?');
            $sqlstate->execute([$email,$password]);

            if($sqlstate->rowCount()>=1){
                session_start();
                $_SESSION['users'] = $sqlstate->fetch(PDO::FETCH_ASSOC);
                header('location:admin.php');
            }else{
                ?>
                <div class="alert alert-danger fixed-top fw-bold text-center" role="alert">
                    Login or password incorrect!
                </div>
                <?php
            }
        }else{
            ?>
            <div class="alert alert-danger fixed-top fw-bold text-center" role="alert">
                Required Fields!
            </div>
            <?php
            }
            
        }
        ?>

    <div class="login-box">

        <div class="logo">
            <img src="assets/hov_logo6.PNG">
        </div>


        <form method="post">

            <div class="mb-3">
                <input type="email" class="form-control" placeholder="Email" name="email">
            </div>

            <div class="mb-3">
                <input type="password" class="form-control" placeholder="Password" name="password">
            </div>

            <button class="btn-login" name="login">
                Login
            </button>

        </form>

        <div class="signup">
            No account ?
            <a href="register.php" target="_blank">Register</a>
        </div>

    </div>

</body>

</html>