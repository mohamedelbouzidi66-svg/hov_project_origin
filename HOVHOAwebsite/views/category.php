<?php
    include '../includes/database.php';
    include '../includes/header.php';
    session_start(); 

    if(isset($_SESSION['users'])){
        $role = $_SESSION['users']['role'];
    }

    $connect = false;
    if(isset($_SESSION['users']) && $role == 'admin'){
        $connect = true;
    }

    //Filter Categories
    $where = "";
    if(isset($_GET['Filter'])){
        $category = $_GET['filter'];
        if(!empty($category)){
            $where = "WHERE label='$category'";
        }
    }
    
    $categoriesFilter = $pdo->query("SELECT * FROM category $where
                                    ")->fetchAll(PDO::FETCH_ASSOC);

    $categories = $pdo->query("SELECT DISTINCT label FROM category
                                    ")->fetchAll(PDO::FETCH_ASSOC);    

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
        <a href="category.php" class="active">Categories</a>
        <a href="#">Orders</a>
        <a href="users.php">Users</a>
        <a href="#">Settings</a>
    </div>

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark px-4">
        <div class="container-fluid">
            <a href="index.php">
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
        <h3>Your Categories content goes here.</h3>
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
            <?php endif ?>
        
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Label</th>
                    <th scope="col">Style</th>
                    <th scope="col">Style Image</th>
                    <th scope="col">Created At</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    foreach ($categoriesFilter as $index => $category) {
                ?>
                <tr class="<?= $index >= 10 ? 'hidden-row' : '' ?>">
                    <td><?= $category['id_category'] ?></td>
                    <td><?= $category['label'] ?></td>
                    <td><?= $category['style'] ?></td>
                    <td>
                        <img src="../uploadImage/style/<?= $category['styleImage'] ?>" width="50">
                    </td>
                    <td><?= $category['created_at'] ?></td>
                    <td>
                        <a href="viewCategory.php?id_category=<?= $category['id_category'] ?>" 
                            class="btn btn-sm btn-primary"><i class="bi bi-eye"></i>
                        </a>
                        <a href="modifyCategory.php?id_category=<?= $category['id_category'] ?>" 
                            class="btn btn-sm btn-success"><i class="bi bi-pencil-square"></i>
                        </a>
                        <a href="deleteCategory.php?id_category=<?= $category['id_category'] ?>" 
                            onclick="return confirm('Do you really want to delete this categpry!')" 
                            class="btn btn-sm btn-danger"><i class="bi bi-trash"></i>
                        </a>
                    </td>
                </tr>
                <?php
                    }
                ?>
            </tbody>
        </table>

        <div class="d-flex justify-content-between align-items-center w-100 mb-3">

            <button id="seeMore" class="btn btn-primary">
                See More
            </button>

            <form method="get" class="d-flex gap-2">
                <select name="filter" class="form-select w-auto">
                    <option selected>Select Category</option>
                    <?php 
                        foreach($categories as $category){
                    ?>
                        <option value="<?= $category['label'] ?>"><?= $category['label'] ?></option>
                    <?php
                        }
                    ?>
                </select>
                <input type="submit" class="form-control btn-primary" name="Filter" value="Filter">
            </form>
        </div>

<br><br>

        <form action="addCategory.php" method="post" 
            enctype="multipart/form-data" class="p-4 border rounded shadow-sm">
            <h3 class="mb-4">Add Category</h3>

            <div class="mb-3">
                <label class="form-label">Label</label>
                <input type="text" name="label" class="form-control" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Label Image</label>
                <input type="file" name="labelImage" class="form-control" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Style</label>
                <input type="text" name="style" class="form-control" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Style Image</label>
                <input type="file" name="styleImage" class="form-control" required>
            </div>

            <input type="submit" class="btn btn-dark w-100" name="addCategory" value="Add Category">

        </form>
    </div>
    </div>
    <?php
        } else {
            header('location:userLogin.php');
        }
    ?>

</body>
    <script src="../js/main.js"></script>
</html>