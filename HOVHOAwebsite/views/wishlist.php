<?php 
    include '../includes/header.php';
    include '../includes/database.php';
    include '../includes/nav.php';

    $idUser = isset($_SESSION['users']['idUser'])
            ? $_SESSION['users']['idUser']
            :null;

    // wishlist table query 
    $wishlists = $pdo->query("SELECT * FROM wishlist 
                            WHERE idUser = '$idUser'
                            ")->fetchAll(PDO::FETCH_ASSOC);

?>

    <title>HouseOfVintage - wishlist</title>
    <style>
        body {
            overflow-x: hidden;
        }
        .hidden-row{
            display: none;
        }
        .fav-icon:hover::before{
            content: "\f415";
            font-family: "bootstrap-icons";
            font-weight: 300;
            font-size: 20px;
        }
    </style>
<body>
    <h2 class="mt-5 pt-5 mb-4 text-center fw-bold">Your Wishlist</h2>

        <!-- success/fail message -->
        <?php 
            if(isset($_SESSION['message'])): ?>
                <div class="alert text-center w-75 mx-auto alert-<?= $_SESSION['type']; ?>">
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
            // wishlist table query
            $wishlists = $pdo->query("SELECT * FROM wishlist 
                                    WHERE idUser = '$idUser'");
            if($wishlists->rowCount() == 0){
        ?>
            <h5 class="mt-5 pt-5 mb-4 text-center fw-light">Your Wishlist Is Empty</h5>
        <?php
            }else{
        ?>
        <div class="container">
        <div class="row">
            <?php 
                foreach($wishlists as $wishlist){
            ?>
            <div class="col-lg-3 col-md-4 my-2">
                <form action="addTocart.php" method="post">
                    <div class="card border-0">
                        <img src="../uploadImage/product/<?= $wishlist['productImage'] ?>"
                            class="card-img-top hover-move">
                        <div class="card-body justify-content-evenly mb-2">
                            <p class="mb-0">
                                <?php echo $wishlist['description'] ?>
                            </p>
                            <?php 
                                $discount = $wishlist['discount'];
                                $price = $wishlist['price'];
                                $discountedPrice = $price - $discount;
                                if(!empty($discount)){
                            ?>
                                    <span class="card-title fw-light">
                                        <strike><?php echo $wishlist['price'] ?> $</strike>
                                    </span>
                                    <span class="card-title fw-bold text-danger">
                                        <?php echo $discountedPrice ?> $
                                    </span>
                            <?php
                                }else{
                            ?>
                                    <span class="card-title fw-light">
                                        <?php echo $wishlist['price'] ?> $
                                    </span>
                            <?php
                                }
                            ?>
                            <br>
                            <?php 
                                $idProduct = $wishlist['idProduct'];
                                $sqlState = $pdo->query("SELECT * FROM product
                                                        WHERE idProduct = '$idProduct'");
                                $products = $sqlState->fetchAll(PDO::FETCH_ASSOC);
                                foreach($products as $product){}
                                $quantity = $product['quantity'];
                                if($quantity == 1 ){
                            ?>
                                <input type="hidden" name="quantity" value="1">
                                <span class="card-title fw-bold">unique item | only 1 available</span><br>
                            <?php
                                }else{
                            ?>
                                <label class="fw-bold">Select Quantity</label><br>
                                <input type="number" class="form-control shadow-none w-25" 
                                        name="quantity" max="<?= $quantity ?>" min="1" value="1">
                            <?php
                                }
                            ?>
                            <input type="hidden" name="idProduct" value="<?= $wishlist['idProduct'] ?>">
                            <input type="hidden" name="productImage" value="<?= $wishlist['productImage'] ?>">
                            <input type="hidden" name="description" value="<?= $wishlist['description'] ?>">
                            <input type="hidden" name="price" value="<?= $wishlist['price'] ?>">
                            <input type="hidden" name="discount" value="<?= $wishlist['discount'] ?>">
                            <input type="submit" value="ADD TO BAG" name="addTocart" 
                                class="btn btn-outline-dark px-4 rounded-pill m-3 fs-6 fw-bold">

                            <a href="deletewishlistProduct.php?idWishlist=<?php echo $wishlist['idWishlist'] ?>" 
                                onclick="return confirm('Do you really want to delete this Product')" 
                                class="text-dark px-4 rounded-pill m-4 fs-6 fw-bold">
                                remove
                            </a>
                            <div class="d-flex align-items-center gap-3 mt-3">

                </form>
                        </div>
                    </div>
                </div>
            </div>
        <?php 
            } 
            }
        ?>

    <br>

<?php include '../includes/footer.php'; ?>

</body>

</html>