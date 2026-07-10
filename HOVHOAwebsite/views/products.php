<?php
    include '../includes/database.php';
    include '../includes/header.php';
    session_start();

    if(isset($_SESSION['users'])){
        $role = $_SESSION['users']['role'];
    }

    // Filter Products
    $where = "";
    if(isset($_GET['Filter'])){
        $category = $_GET['filter'];
        if(!empty($category)){
            $where = "WHERE style='$category'";
        }
    }

    // product table query under condition
    $productsFilter = $pdo->query("SELECT * FROM product $where
                                ")->fetchAll(PDO::FETCH_ASSOC);
    
    // category table query
    $categories = $pdo->query("SELECT * FROM category
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
        if (isset($_SESSION['users']) && $role == 'admin') {
    ?>
    <div class="sidebar">
        <br>
        <a href="adminDashboard.php">Dashboard</a>
        <a href="products.php" class="active">Products</a>
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
                Welcome <span class="fw-bold"><?= $_SESSION['users']['fullname'] ?></span>
            </span>

            <div class="ms-auto">
                <a href="userLogout.php" class="btn btn-outline-light">
                    Logout
                </a>
            </div>
        </div>
    </nav>

    <div class="content">
        <h3>Your Products content goes here.</h3>
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
            // product table query
            $products = $pdo->query("SELECT * FROM product");
            if($products->rowCount() == 0){
        ?>
            <h5 class="mt-5 pt-5 mb-4 text-center fw-light">No Products For Now</h5>
        <?php
            }else{
        ?>

        <!-- products table -->
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Image</th>
                    <th scope="col">Label</th>
                    <th scope="col">Style</th>
                    <th scope="col">Description</th>
                    <th scope="col">Price</th>
                    <th scope="col">Quantity</th>
                    <th scope="col">Discount</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody id="tableBody">
                <?php
                    foreach ($productsFilter as $index => $product) {
                ?>
                <tr class="<?= $index >= 10 ? 'hidden-row' : '' ?>">
                    <td>
                        <img src="../uploadImage/product/<?= $product['image'] ?>" width="80">
                    </td>
                    <td><?= $product['label'] ?></td>
                    <td><?= $product['style'] ?></td>
                    <td><?= $product['description'] ?></td>
                    <td><?= $product['price'] ?></td>
                    <td><?= $product['quantity'] ?></td>
                    <td><?= $product['discount'] ?></td>
                    <td>
                        <a href="modifyProduct.php?idProduct=<?php echo $product['idProduct'] ?>" 
                            class="btn btn-sm btn-success"><i class="bi bi-pencil-square"></i>
                        </a>
                        <a href="deleteProduct.php?idProduct=<?php echo $product['idProduct'] ?>" 
                            onclick="return confirm('Do you really want to delete this Product')" 
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
                        <option value="<?= $category['style'] ?>"><?= $category['style'] ?></option>
                    <?php
                        }
                    ?>
                </select>
                <input type="submit" class="form-control btn-primary" name="Filter" value="Filter">
            </form>

        </div>
        <?php 
            }
        ?>

<br><br>

        <div class="container">
            <section>
                <!-- add products form -->
                <form action="addProduct.php" method="post" enctype="multipart/form-data" class="p-4 border rounded shadow-sm">
                    <h3 class="mb-4">Add Product</h3>
                    <div class="mb-3">
                        <label class="form-label">Image</label>
                        <input type="file" name="image" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Label</label>
                        <select name="label" class="form-select">
                            <option value="">Select Label</option>
                                <?php 
                                    $categories = $pdo->query('SELECT DISTINCT label 
                                                                FROM category
                                                                ')->fetchAll(PDO::FETCH_ASSOC);
                                    foreach($categories as $label){ 
                                ?>
                            <option value="<?php echo $label['label'] ?>"><?php echo $label['label'] ?></option>
                                <?php 
                                    } 
                                ?>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Style</label>
                        <select name="style" class="form-select">
                            <option value="">Select Style</option>
                                <?php 
                                    $categories = $pdo->query('SELECT DISTINCT style 
                                                                FROM category
                                                                ')->fetchAll(PDO::FETCH_ASSOC);
                                    foreach($categories as $style){ 
                                ?>
                            <option value="<?php echo $style['style'] ?>"><?php echo $style['style'] ?></option>
                                <?php 
                                    } 
                                ?>
                        </select>
                    </div>

                <div class="mb-3">
                    <label class="form-label">Description</label>
                    <textarea name="description" class="form-control" rows="4" placeholder="Product description"></textarea>
                </div>

                <div class="mb-3">
                    <label class="form-label">Price</label>
                    <input type="number" name="price" class="form-control" min="0" placeholder="Enter price" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Quantity</label>
                    <input type="number" name="quantity" class="form-control" min="0" placeholder="Enter Quantity" required value="1">
                </div>

                <div class="mb-3">
                    <label class="form-label">Discount</label>
                    <input type="number" name="discount" class="form-control" min="0" placeholder="Enter Discount" required value="0">
                </div>

                <input type="submit" class="btn btn-dark w-100" name="addProduct" value="Add Product">

                </form>
            </section>
        </div>
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