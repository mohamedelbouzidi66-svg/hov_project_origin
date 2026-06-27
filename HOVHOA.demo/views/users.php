<?php
    include '../includes/database.php';
    include '../includes/header.php';
    session_start(); 

    $role = $_SESSION['users']['role'];
    $connect = false;
    if(isset($_SESSION['users']) && $role == 'admin'){
        $connect = true;
    }
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
        if ($connect && $role == 'admin') {
    ?>
    <div class="sidebar">
        <br>
        <a href="adminDashboard.php">Dashboard</a>
        <a href="products.php">Products</a>
        <a href="category.php">Categories</a>
        <a href="#">Orders</a>
        <a href="users.php" class="active">Users</a>
        <a href="#">Settings</a>
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
        <h3>Your Users content goes here.</h3>
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
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">FullName</th>
                    <th scope="col">Email</th>
                    <th scope="col">Role</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody id="tableBody">
                <?php
                    $users = $pdo->query('SELECT * FROM users
                                        ')->fetchAll(PDO::FETCH_ASSOC);
                    foreach ($users as $index => $user) {
                ?>
                <tr class="<?= $index >= 5 ? 'hidden-row' : '' ?>">
                    <td><?= $user['fullname'] ?></td>
                    <td><?= $user['email'] ?></td>
                    <td><?= $user['role'] ?></td>
                    <td>
                        <a href="deleteUser.php?idUser=<?php echo $user['idUser'] ?>" 
                            onclick="return confirm('Do you really want to delete this User!')" 
                            class="btn btn-sm btn-danger"><i class="bi bi-trash"></i>
                        </a>
                    </td>
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