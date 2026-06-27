<?php 
    include '../includes/header.php';
    include '../includes/database.php';
    session_start();

    $connect = false;
    if(isset($_SESSION['users'])){
        $role = $_SESSION['users']['role'];
        $connect = true;
    }

    $labels = $pdo->query(" SELECT DISTINCT label
                                FROM category
    ")->fetchAll(PDO::FETCH_ASSOC);

    $idUser = isset($_SESSION['users']['idUser'])
        ? $_SESSION['users']['idUser']
        :null;
    $sql = $pdo->query("SELECT COUNT(idBag) AS total_bag 
                                FROM cart WHERE idUser = '$idUser'");
    $result = $sql->fetch(PDO::FETCH_ASSOC);

?>

    <nav class="navbar navbar-expand-lg navbar-light bg-light py-3">
        <div class="container-fluid">
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <?php foreach($labels as $label){ ?>
                    <a href="style.php?label=<?= $label['label'] ?>" class="btn icon shadow-none text-decoration-none">
                        <?= $label['label'] ?>
                    </a>
                    <?php } ?>
                    <a href="sale.php" class="btn icon shadow-none text-danger text-decoration-none">
                        SALE
                    </a>
                </div>
                </ul>

                <div>
                    <?php 
                        if($connect){
                    ?>
                        <a href="user.php">
                            <img src="../assets/hov_logo6.PNG" alt="" style="height: 4rem;" class="me-2">
                        </a>
                    <?php
                        }else{
                    ?>
                        <a href="index.php">
                            <img src="../assets/hov_logo6.PNG" alt="" style="height: 4rem;" class="me-2">
                        </a>
                    <?php
                        }
                    ?>
                </div>
            
                <form method="get" class="d-flex">
                    <input class="form-control shadow-none" type="search" placeholder="Search" aria-label="Search" name="search-input">
                    <button class="btn btn-outline-0" type="submit" name="search-btn"></button>
                </form>

                <a href="cart.php" class="btn icon shadow-none text-decoration-none"><i class="bi bi-bag fs-5">
                    <?php 
                        if($result['total_bag'] == 0){
                            ?>
                            <sup></sup>
                            <?php
                        }else{
                            ?>
                            <sup class="fw-bold bg-danger rounded-pill px-2 text-light"><?= $result['total_bag'] ?></sup>
                            <?php
                        }
                    ?>
                    </i>Bag
                </a>

                <a href="wishlist.php" class="btn icon shadow-none text-decoration-none">
                    <i class="bi bi-heart fs-5 me-2"></i>Wishlist
                </a>
                
                <?php
                    if($connect && $role == 'user'){
                        ?>
                        <a href="userDashboard.php" class="btn fs-8 me-0 fw-bold shadow-none">
                            <i class="bi bi-person fs-4 me-2"></i><?= $_SESSION['users']['fullname']?>
                        </a>
                <?php
                    }elseif($connect && $role == 'admin'){
                ?>
                        <a href="adminDashboard.php" class="btn fs-8 me-0 fw-bold shadow-none">
                            <i class="bi bi-person fs-4 me-2"></i><?= $_SESSION['users']['fullname']?>
                        </a>
                <?php    
                    }else{
                ?>
                        <a href="userLogin.php" class="btn shadow-none">
                            <i class="bi bi-person fs-4 me-2"></i>Account
                        </a>
                <?php
                }
                ?>
            </div>
        </div>
    </nav>
