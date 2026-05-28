<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Register Page</title>
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

        .register-box {
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

        .btn-register {
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
    require_once 'database.php';
    if(isset($_POST['register'])){
        $fullname = htmlspecialchars($_POST['fullname']);
        $email = htmlspecialchars($_POST['email']);
        $password = htmlspecialchars($_POST['password']);

        if(!empty($fullname) && !empty($email) && !empty($password)){
            $sqlstate = $pdo->prepare('INSERT INTO users VALUES(null,?,?,?)');
            $sqlstate->execute([$fullname,$email,$password]);
            header('location:login.php');
        }else{
            echo "Required Fields";
        }
    }
    ?>

    <div class="register-box">

        <div class="logo">
            <img src="assets/hov_logo6.PNG">
        </div>


        <form method="post">

            <div class="mb-3">
                <input type="text" class="form-control" placeholder="FullName" name="fullname">
            </div>

            <div class="mb-3">
                <input type="email" class="form-control" placeholder="Email" name="email">
            </div>

            <div class="mb-3">
                <input type="password" class="form-control" placeholder="Password" name="password">
            </div>

            <button class="btn-register" name="register">
                Register
            </button>

        </form>

        <div class="signup">
            Already have an account ?
            <a href="login.php" target="_blank">Login</a>
        </div>

    </div>

</body>

</html>