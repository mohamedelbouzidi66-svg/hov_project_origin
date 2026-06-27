<?php 
include '../includes/header.php';
include '../includes/database.php';
include '../includes/nav.php';

    $idProduct = isset($_GET['idProduct'])
        ? $_GET['idProduct']
        :null;
    $sqlState = $pdo->prepare('SELECT * FROM product 
                                WHERE idProduct = ?');
    $sqlState->execute([$idProduct]);
    $products = $sqlState->fetchAll(PDO::FETCH_ASSOC);

?>

    <title>Wishlist</title>
<style>
    .card-body{
        height: 8.2rem;
    }

    .fav-icon:hover::before{
        content: "\f415";
        font-family: "bootstrap-icons";
        font-weight: 300;
        font-size: 26px;
    }
</style>

<body>
    <h2 class="mt-5 pt-5 mb-4 text-center fw-bold">Your Wishlist</h2>
        <p class="mb-4 text-center fw-light">
            <a href="userLogin.php" class="text-dark">Login</a> to save your Wishlist to your Account
        </p>
        <div class="container">
        <?php
            foreach($products as $product){ 
        ?>
            <div class="row">
            <div class="col-lg-3 col-md-4 my-2">
                <form method="post" action="addTobag.php">
                    <div class="card border-0">
                        <a href="bagProduct.php?idProduct=<?= $product['idProduct'] ?>">
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
                                    <span class="card-title fw-bold">
                                        <strike><?php echo $product['price'] ?> MAD</strike>
                                    </span>
                                    <span class="card-title fw-bold text-danger">
                                        <?php echo $discountedPrice ?> MAD
                                    </span>
                            <?php
                                }else{
                            ?>
                                    <span class="card-title fw-bold"><?php echo $product['price'] ?> MAD</span>
                            <?php
                                }
                            ?>
                        <input type="hidden" name="idProduct" value="<?= $product['idProduct'] ?>">
                        <input type="hidden" name="productImage" value="<?= $product['image'] ?>">
                        <input type="hidden" name="description" value="<?= $product['description'] ?>">
                        <input type="hidden" name="price" value="<?= $product['price'] ?>">
                        <input type="hidden" name="discount" value="<?= $product['discount'] ?>">
                        <input type="submit" value="ADD TO BAG" name="addTobag" class="btn btn-outline-dark px-3 rounded-pill m-2 fs-4 fw-bold">
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