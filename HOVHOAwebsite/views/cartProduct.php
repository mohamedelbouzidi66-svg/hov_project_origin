<?php 
    include '../includes/header.php' ;
    include '../includes/database.php';
    include '../includes/nav.php';

    $idProduct = $_GET['idProduct'] ;
    $sqlState = $pdo->prepare('SELECT * FROM product
                                WHERE idProduct = ?');
    $sqlState->execute([$idProduct]);
    $products = $sqlState->fetchAll(PDO::FETCH_ASSOC);
?>

    <title>HouseOfVintage</title>
    <style>
        .fav-icon:hover::before{
            content: "\f415";
            font-family: "bootstrap-icons";
            font-weight: 300;
        }
    </style>

<body>
        <br>
        <div class="container">
            <?php 
                foreach($products as $product){ 
            ?>
            <div class="card mb-3">
                <div class="row g-0">
                <div class="col-md-4">
                <form action="addTocart.php" method="POST">
                    <img src="../uploadImage/product/<?= $product['image'] ?>" 
                            class="img-fluid rounded-start" alt="...">
                    </div>
                    <div class="col-md-4">
                    <div class="card-body float-end" >
                    <h5 class="card-title m-4"><?= $product['description'] ?></h5>
                    <hr>
                    <span class="card-title fw-bold m-4">Label : 
                        <a href="style.php?label=<?= $product['label'] ?>" 
                            class="fw-light text-dark text-decoration-none">
                            <span><?= $product['label'] ?></span>
                        </a>
                    </span>
                    <br><br>
                    <span class="card-title fw-bold m-4">Style : 
                        <a href="product.php?style=<?= $product['style'] ?>" 
                            class="fw-light text-dark text-decoration-none">
                            <span><?= $product['style'] ?></span>
                        </a>
                    </span>
                    <hr>
                    </p>
                    <?php 
                        $discount = $product['discount'];
                        $price = $product['price'];
                        $discountedPrice = $price - $discount;
                        if(!empty($discount)){
                    ?>
                            <span class="card-title fw-light fs-3 m-4">
                                <strike><?php echo $product['price'] ?> MAD</strike>
                            </span>
                            <span class="card-title fw-bold text-danger fs-3">
                                <?php echo $discountedPrice ?> MAD
                            </span>
                            <span class="card-title text-danger fs-3 bg-light rounded-pill px-3 m-3">
                                save <?= $product['discount'] ?>%
                            </span><br>
                    <?php
                    }else{
                    ?>
                            <span class="card-title fw-bold fs-3 m-4">
                                <?php echo $product['price'] ?> MAD
                            </span>
                    <?php
                        }
                    ?>
                    <br>
                    <?php 
                        $quantity = $product['quantity'];
                        if($quantity == 1 ){
                    ?>
                        <input type="hidden" name="quantity" value="1">
                        <span class="card-title fw-bold m-4">unique item | only 1 available</span><br>
                    <?php
                        }else{
                    ?>
                        <label class="fw-bold ms-4">Select Quantity</label><br>
                        <input type="number" class="form-control shadow-none w-25 ms-4" 
                                name="quantity" max="<?= $quantity ?>" min="1" value="1">
                    <?php
                        }
                    ?>
                        <input type="hidden" name="idProduct" value="<?= $product['idProduct'] ?>">
                        <input type="hidden" name="productImage" value="<?= $product['image'] ?>">
                        <input type="hidden" name="description" value="<?= $product['description'] ?>">
                        <input type="hidden" name="price" value="<?= $product['price'] ?>">
                        <input type="hidden" name="discount" value="<?= $product['discount'] ?>">
                        <?php 
                            if($product['quantity'] == 0){
                        ?>
                                <span class="card-title text-danger fs-3 bg-light rounded-pill px-3 m-3">Out Of Stock</span><br>
                        <?php
                            }else{
                        ?>
                                <input type="submit" value="ADD TO BAG" name="addTocart" 
                                class="btn btn-outline-dark px-4 rounded-pill m-3 fs-3 fw-bold">
                                <a href="fav.php?idProduct=<?= $product['idProduct'] ?>">
                                    <i class="bi bi-heart fs-2 text-dark fav-icon m-2 px-2"></i>
                                </a>
                        <?php
                            }
                        ?>
                        <br>
                </form>
            </div>
            </div>
            <?php 
                } 
            ?>
        </div>
        </div>
    </div>

    <br>
    <?php
        $style = $product['style'];
        $sqlState = $pdo->prepare('SELECT * FROM product 
                                    WHERE style = ?');
        $sqlState->execute([$style]);
        $MayAlsoLike = $sqlState->fetchAll(PDO::FETCH_ASSOC);
    ?>

    <h2 class="mt-5 pt-5 mb-4 text-center fw-bold">Vintage <?= $style ?></h2>
    <div class="container">
        <div class="row">
            <?php foreach($MayAlsoLike as $product){ ?>
            <div class="col-lg-3 col-md-4 my-2 ">
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
                                    <span class="card-title fw-bold"><strike><?php echo $product['price'] ?> MAD</strike></span>
                                    <span class="card-title fw-bold text-danger"><?php echo $discountedPrice ?> MAD</span>
                            <?php
                                }else{
                            ?>
                                    <span class="card-title fw-bold"><?php echo $product['price'] ?> MAD</span>
                            <?php
                                }
                            ?>
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