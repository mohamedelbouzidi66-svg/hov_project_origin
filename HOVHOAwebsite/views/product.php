<?php 
    include '../includes/header.php' ;
    include '../includes/database.php';

    $style = $_GET['style'] ;
    $sqlState = $pdo->prepare('SELECT * FROM product 
                                WHERE style = ?');
    $sqlState->execute([$style]);
    $products = $sqlState->fetchAll(PDO::FETCH_ASSOC);
?>

    <title><?= $style ?> Page</title>
    <style>
        .fav-icon:hover::before{
            content: "\f415";
            font-family: "bootstrap-icons";
            font-weight: 300;
            font-size: 20px;
        }
    </style>

<body>
    
    <?php include '../includes/nav.php'; ?>

    <h2 class="mt-5 pt-5 mb-4 text-center fw-bold">Vintage <?= $style ?></h2>
    <div class="container">
        <div class="row">
            <?php 
                foreach($products as $product){
            ?>
            <div class="col-lg-3 col-md-4 my-2">
                <form method="post" enctype="multipart/form-data">
                    <div class="card border-0">
                        <a href="cartProduct.php?idProduct=<?= $product['idProduct'] ?>">
                            <img src="../uploadImage/product/<?= $product['image'] ?>" 
                                class="card-img-top hover-move">
                        </a>
                        <div class="card-body justify-content-evenly mb-2">
                            <p class="mb-0">
                                <?php echo $product['description'] ?>
                            </p>
                            <?php 
                                $discount = $product['discount'];
                                $price = $product['price'];
                                $discountedPrice = $price - $discount;
                                if(!empty($discount)){
                            ?>
                                    <span class="card-title fw-light">
                                        <strike><?php echo $product['price'] ?> $</strike>
                                    </span>
                                    <span class="card-title fw-bold text-danger">
                                        <?php echo $discountedPrice ?> $
                                    </span>
                            <?php
                                }else{
                            ?>
                                    <span class="card-title fw-light">
                                        <?php echo $product['price'] ?> $
                                    </span>
                            <?php
                                }
                            ?>
                            <a href="addTowishlist.php?idProduct=<?= $product['idProduct'] ?>">
                                <i class="bi bi-heart fs-5 text-dark fav-icon float-end me-1"></i>
                            </a>
                            <div class="d-flex align-items-center gap-3 mt-3">
                </form>
                        </div>
                    </div>
                </div>
            </div>
        <?php 
            } 
        ?>

    <br>

<?php include '../includes/footer.php'; ?>

</body>

</html>