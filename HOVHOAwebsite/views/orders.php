<?php
    include '../includes/database.php';
    include '../includes/header.php';
    session_start(); 

    $role = $_SESSION['users']['role'];
?>
    <title><?= $_SESSION['users']['fullname'] ?> Dashboard</title>
    <style>
        body {
            overflow-x: hidden;
        }

        .img {
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

        .active {
            background: lightslategrey;
            color: black;
        }

        .hidden-row{
            display: none;
        }
    </style>
</head>

<body>
    <?php
        if (isset($_SESSION['users']) && $role == 'admin') {
    ?>
    <div class="sidebar">
        <br>
        <a href="adminDashboard.php">Dashboard</a>
        <a href="products.php">Products</a>
        <a href="category.php">Categories</a>
        <a href="orders.php" class="active">Orders</a>
        <a href="users.php">Users</a>
    </div>

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark px-4">
        <div class="container-fluid">
            <a href="user.php">
                <img src="../assets/hovLogoblack.PNG" class="img">
            </a>
            <span class="navbar-brand">Welcome 
                <span class="fw-bold"><?= $_SESSION['users']['fullname'] ?></span>
            </span>

            <div class="ms-auto">
                <a href="userLogout.php" class="btn btn-outline-light">
                    Logout
                </a>
            </div>
        </div>
    </nav>

    <div class="content">
        <h3>Your Orders content goes here.</h3>
        <br>
        <?php 
            if(isset($_SESSION['message'])): ?>
                <div class="alert alert-<?= $_SESSION['type']; ?>">
                    <?= $_SESSION['message'] ?>
                </div>
        <?php
            unset($_SESSION['message']);
            unset($_SESSION['type']);
        ?>
        <?php 
            endif 
        ?>

        <?php
            // orders table query
            $orders = $pdo->query("SELECT * FROM orders");
            if($orders->rowCount() == 0){
        ?>
            <h5 class="mt-5 pt-5 mb-4 text-center fw-light">No Orders For Now</h5>
        <?php
            }else{
        ?>

        <!-- Orders Table -->
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">OrderID</th>
                    <th scope="col">UserID</th>
                    <th scope="col">TotalPrice</th>
                    <th scope="col">Created At</th>
                </tr>
            </thead>
            <tbody id="tableBody">
                <?php
                    $orders = $pdo->query('SELECT * FROM orders
                                        ')->fetchAll(PDO::FETCH_ASSOC);
                    foreach ($orders as $index => $order) {
                ?>
                <tr class="<?= $index >= 5 ? 'hidden-row' : '' ?>">
                    <td><?= $order['idOrder'] ?></td>
                    <td><?= $order['idUser'] ?></td>
                    <td><?= $order['totalPrice'] ?></td>
                    <td><?= $order['created_at'] ?></td>
                </tr>
                <?php
                    }
                ?>
            </tbody>
        </table>
        <button id="seeMore" class="btn btn-primary">
            See More
        </button>
<br><br>
        <?php 
            }
        ?>
    </div>
    </div>
    <br><br><br>
    <?php
        } else {
            header('location:userLogin.php');
        }
    ?>
</body>
<script src="../js/main.js"></script>
</html>