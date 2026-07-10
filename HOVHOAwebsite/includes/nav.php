<?php 
    include '../includes/header.php';
    include '../includes/database.php';
    session_start();

    $connect = false;
    if(isset($_SESSION['users'])){
        $role = $_SESSION['users']['role'];
        $connect = true;
    }

    // navbar menu query
    $labels = $pdo->query(" SELECT DISTINCT label
                            FROM category
    ")->fetchAll(PDO::FETCH_ASSOC);

    $idUser = isset($_SESSION['users']['idUser'])
    ? $_SESSION['users']['idUser']
    :null;

    // number of products in cart query 
    $sql = $pdo->query("SELECT COUNT(idBag) AS total_bag 
                        FROM cart 
                        WHERE idUser = '$idUser'");
    $bag_product_num = $sql->fetch(PDO::FETCH_ASSOC);

    // number of products in cart query 
    $sql = $pdo->query("SELECT COUNT(idWishlist) AS total_wishlist 
                        FROM wishlist 
                        WHERE idUser = '$idUser'");
    $wishlist_product_num = $sql->fetch(PDO::FETCH_ASSOC);

?>

    <nav class="navbar navbar-expand-lg navbar-light py-3 border-bottom border-dark border-3">
        <div class="container-fluid">
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <?php foreach($labels as $label){ ?>
                    <a href="style.php?label=<?= $label['label'] ?>" 
                        class="btn icon shadow-none text-decoration-none">
                        <?= $label['label'] ?>
                    </a>
                    <?php 
                        } 
                    ?>
                    <a href="sale.php" class="btn icon shadow-none text-danger">
                        SALE
                    </a>
                </div>
                </ul>

                <div class="me-5">
                    <?php 
                        if($connect){
                    ?>
                        <a href="user.php" class="position-absolute start-50 translate-middle-x">
                            <img src="../assets/hov_logo6.PNG" alt="" style="height: 5rem;">
                        </a>
                    <?php
                        }else{
                    ?>
                        <a href="index.php" class="position-absolute start-50 translate-middle-x">
                            <img src="../assets/hov_logo6.PNG" alt="" style="height: 5rem;">
                        </a>
                    <?php
                        }
                    ?>
                </div>
            
                <div class="searchBox shadow-none icon fw-light">
                    <i class="bx bx-x cancel"></i>
                    <i class="fa-solid fa-magnifying-glass fs-5 me-2"></i>Search
                </div>

                <a href="cart.php" class="btn icon shadow-none text-decoration-none fw-light">
                    <i class="fa-solid fa-bag-shopping fs-4 me-1">
                    <?php 
                        if($bag_product_num['total_bag'] == 0){
                    ?>
                            <sup></sup>
                    <?php
                        }else{
                    ?>
                            <sup class="fw-bold bg-danger rounded-pill fs-6 px-2 text-light">
                                <?= $bag_product_num['total_bag'] ?>
                            </sup>
                    <?php
                        }
                    ?>
                    </i>Bag
                </a>

                <a href="wishlist.php" class="btn icon shadow-none text-decoration-none fw-light">
                    <i class="fa-regular fa-heart fs-4 me-1">
                    <?php 
                        if($wishlist_product_num['total_wishlist'] == 0){
                    ?>
                            <sup></sup>
                    <?php
                        }else{
                    ?>
                            <sup class="fw-bold bg-danger rounded-pill fs-6 px-2 text-light"><?= $wishlist_product_num['total_wishlist'] ?></sup>
                    <?php
                        }
                    ?>
                    </i>Wishlist
                </a>
                
                <?php
                    if($connect && $role == 'user'){
                        ?>
                        <a href="userDashboard.php" class="btn icon shadow-none text-decoration-none fw-light">
                            <i class="fa-solid fa-circle-user fs-4 me-2"></i><?= $_SESSION['users']['fullname']?>
                        </a>
                <?php
                    }elseif($connect && $role == 'admin'){
                ?>
                        <a href="adminDashboard.php" class="btn icon shadow-none text-decoration-none fw-light">
                            <i class="fa-solid fa-circle-user fs-4 me-2"></i><?= $_SESSION['users']['fullname']?>
                        </a>
                <?php    
                    }else{
                ?>
                        <a href="userLogin.php" class="btn icon shadow-none text-decoration-none fw-light">
                            <i class="fa-regular fa-circle-user fs-4 me-2"></i>Account
                        </a>
                <?php
                    }
                ?>
            </div>
        </div>
    </nav>
