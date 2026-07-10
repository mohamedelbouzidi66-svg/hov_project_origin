<?php 
    include '../includes/header.php';
    include '../includes/database.php';
    session_start(); 

    $role = $_SESSION['users']['role'];
    $connect = false;
    if(isset($_SESSION['users']) && $role == 'admin'){
        $connect = true;
    }

    // number of orders query
    $orders = $pdo->query('SELECT COUNT(idOrder) AS total_orders
                        FROM orders
                        ')->fetch(PDO::FETCH_ASSOC);

    // number of users query
    $users = $pdo->query('SELECT COUNT(idUser) AS total_users
                        FROM users 
                        WHERE role = "user"
                        ')->fetch(PDO::FETCH_ASSOC);

    // number of products query
    $products = $pdo->query('SELECT COUNT(idProduct) AS total_products
                            FROM product
                            ')->fetch(PDO::FETCH_ASSOC);
?>    

    <title><?= $_SESSION['users']['fullname'] ?> Dashboard</title>
    <style>
        body {
            overflow-x: hidden;
        }

        .img{
            height: 6rem;
            position: absolute;
            left: -250px;
            top: -6px;
        }

        .sidebar {
            width: 250px;
            height: 100vh;
            position: fixed;
            left: 0;
            top: 0;
            background: black;
            padding-top: 70px;
        }

        .sidebar a {
            color: white;
            text-decoration: none;
            display: block;
            padding: 12px 20px;
        }

        .sidebar a:hover {
            background: white;
            color: black;
        }

        .navbar {
            height: 70px;
            position: fixed;
            top: 0;
            left: 250px;
            right: 0;
            z-index: 1000;
        }

        .content {
            margin-left: 250px;
            margin-top: 70px;
            padding: 20px;
        }

        .active{
            background: lightslategrey;
            color: black;
        }
    </style>
</head>
<body>

    <?php
        if($connect && $role == 'admin'){
    ?>
    <div class="sidebar">
        <br>
        <a href="adminDashboard.php" class="active">Dashboard</a>
        <a href="products.php">Products</a>
        <a href="category.php">Categories</a>
        <a href="orders.php">Orders</a>
        <a href="users.php">Users</a>
    </div>
    
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark px-4">
        <div class="container-fluid">
            <a href="user.php">
                <img src="../assets/hovLogoblack.PNG" class="img">
            </a>

            <span class="navbar-brand">
                Welcome <span class="fw-bold"><?= $_SESSION['users']['fullname']?></span>
            </span>

            <div class="ms-auto">
                <a href="userLogout.php" 
                    class="btn btn-outline-light" 
                    onclick="return confirm('You are about to log out. Continue?')">
                    Logout  
                </a>
            </div>
        </div>
    </nav>

    <div class="content">
        <h3>Your dashboard content goes here.</h3>
        <div class="row g-3 mt-3">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h5>Total Products</h5>
                        <h3><?php echo $products['total_products']; ?></h3>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h5>Total Orders</h5>
                        <h3><?php echo $orders['total_orders'] ?></h3>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h5>Total Users</h5>
                        <h3><?php echo $users['total_users']; ?></h3>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <?php
        }else{
            header('location:userLogin.php');
        }
    ?>

</body>
</html>