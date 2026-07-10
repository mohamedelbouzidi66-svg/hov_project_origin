<?php 

    include '../includes/header.php' ;
    include '../includes/database.php';
    include '../includes/nav.php'; 

    $idUser = isset($_SESSION['users']['idUser'])
            ? $_SESSION['users']['idUser']
            :null;

    // cart table query 
    $carts = $pdo->query("SELECT * FROM cart 
                        WHERE idUser = '$idUser'
                        ")->fetchAll(PDO::FETCH_ASSOC);

?>
    <title>HouseOfVintage - cart</title>
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
        }
    </style>

<body>
    <h2 class="mt-5 pt-5 mb-4 text-center fw-bold">Your Bag</h2>

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
            // cart table query
            $carts = $pdo->query("SELECT * FROM cart 
                                WHERE idUser = '$idUser'");
            if($carts->rowCount() == 0){
        ?>
            <h5 class="mt-5 pt-5 mb-4 text-center fw-light">Your Bag Is Empty</h5>
        <?php
            }else{
        ?>
        <table class="table w-75 mx-auto">
            <thead>
                <tr>
                    <th>Product</th>
                    <th>Description</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>TotalPrice</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody id="tableBody">
                <?php
                    foreach ($carts as $index => $cart) {
                ?>
                <tr class="<?= $index >= 5 ? 'hidden-row' : '' ?>">
                    <td>
                        <img src="../uploadImage/product/<?= $cart['productImage'] ?>" width="80">
                    </td>
                    <td><?= $cart['description'] ?></td>
                    <td>
                        <?php 
                            $discount = $cart['discount'];
                            $price = $cart['price'];
                            $discountedPrice = $price - $discount;
                            if($discount > 0){
                        ?>
                                <span class="card-title fw-light">
                                    <strike><?php echo $price ?>$</strike>
                                </span><br>

                                <span class="card-title fw-bold text-danger">
                                    <?php echo $discountedPrice ?> $
                                </span>
                        <?php
                            }else{
                        ?>
                                <span class="card-title fw-bold">
                                    <?php echo $cart['price'] ?>$
                                </span>
                        <?php
                            }
                        ?>
                    </td>
                    <td>
                        <?php 
                            $idProduct = $cart['idProduct'];

                            // product quantity query
                            $productQuantity = $pdo->query("SELECT quantity 
                                                            FROM product 
                                                            WHERE idProduct = '$idProduct'
                                                            ")->fetch(PDO::FETCH_ASSOC);
                            if($productQuantity['quantity'] == 1){
                        ?>
                            <h6>Only 1 available left</h6>
                        <?php
                            }else{
                        ?>
                            <form action="updateCart.php" method="POST" class="d-flex gap-2">
                                <input type="hidden" name="idBag" value="<?= $cart['idBag'] ?>">
                                <input type="number" name="newQuantity" min="1" value="<?= $cart['quantity'] ?>" 
                                        max="<?= $quantity['quantity'] ?>" class="w-25">
                                <input type="submit" name="update" value="update" class="btn btn-outline-dark">
                            </form>
                        <?php
                            }
                        ?>
                    </td>
                    <td>
                        <?php
                            $quantity = $cart['quantity'];
                            $totalPrice = ($price * $quantity) - $discount;
                        ?>
                        <span><?= $totalPrice ?>$</span>
                    </td>
                    <td>
                        <a href="deleteCartProduct.php?idBag=<?php echo $cart['idBag'] ?>" 
                            onclick="return confirm('Do you really want to delete this Product')" 
                            class="text-dark">
                            remove
                        </a>
                    </td>
                </tr>
                <?php
                    }
                ?>
            </tbody>
        </table>

        <div class="d-flex justify-content-between align-items-center w-75 mx-auto">
            <button id="seeMore" class="btn btn-primary shadow-none">
                See More
            </button>

            <a href="deleteAllcart.php?idUser=<?= $cart['idUser'] ?>" 
                class="btn btn-danger w-auto shadow-none"
                onclick="return confirm('Are you sure you want to delete all bag items!')">
                Delete All
            </a>
        </div>

        <br>

        <div class="d-flex justify-content-end align-items-center w-75 mx-auto">
            <span>
                <?php
                    $idUser = $_SESSION['users']['idUser'];
                    // total price of the cart query
                    $sql = $pdo->query("SELECT SUM((price * quantity) - discount) 
                                            AS subtotal 
                                            FROM cart 
                                            WHERE idUser = '$idUser'");
                    $subtotal_bag = $sql->fetch(PDO::FETCH_ASSOC);
                ?>
                    Subtotal : <span class="fw-bold"><?= number_format($subtotal_bag['subtotal']) ?> $</span>
            </span>
        </div>

        <div class="d-flex justify-content-end align-items-center w-75 mx-auto">
            <p class="fw-light">Shipping, taxes, and discount codes calculated at checkout.</p>
        </div>
        <div class="d-flex justify-content-end align-items-center w-75 mx-auto">
            <a href="checkout.php?idUser=<?= $cart['idUser'] ?>" 
                class="btn btn-secondary w-auto shadow-none">
                CHECK OUT NOW
            </a>
        </div>
                <?php
                    }
                ?>
    <br>

    <?php include '../includes/footer.php'; ?>

</body>
<script src="../js/main.js"></script>
</html>