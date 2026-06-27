<?php 
    include '../includes/header.php' ;
    include '../includes/database.php';
    include '../includes/nav.php'; 

    $idUser = isset($_SESSION['users']['idUser'])
                    ? $_SESSION['users']['idUser']
                    :null;
    $bags = $pdo->query("SELECT * FROM cart 
                        WHERE idUser = '$idUser'
                        ")->fetchAll(PDO::FETCH_ASSOC);

?>
    <title>HouseOfVintage</title>
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
            $bags = $pdo->query("SELECT * FROM cart WHERE idUser = '$idUser'");
            if($bags->rowCount() == 0){
        ?>
            <h5 class="mt-5 pt-5 mb-4 text-center fw-light">Your Bag Is Empty</h5>
        <?php
            }else{
        ?>
        <table class="table w-75 mx-auto">
            <thead>
                <tr>
                    <th scope="col">Product</th>
                    <th scope="col">Description</th>
                    <th scope="col">Price</th>
                    <th scope="col">Quantity</th>
                    <th scope="col">TotalPrice</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody id="tableBody">
                <?php
                    foreach ($bags as $index => $bag) {
                ?>
                <tr class="<?= $index >= 10 ? 'hidden-row' : '' ?>">
                    <td>
                        <img src="../uploadImage/product/<?= $bag['productImage'] ?>" width="80">
                    </td>
                    <td><?= $bag['description'] ?></td>
                    <td>
                        <?php 
                            $discount = $bag['discount'];
                            $price = $bag['price'];
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
                                    <?php echo $bag['price'] ?>$
                                </span>
                        <?php
                        }
                        ?>
                    </td>
                    <td>
                        <?php 
                            $idProduct = $bag['idProduct'];
                            $productQuantity = $pdo->query("SELECT quantity 
                                                        FROM product 
                                                        WHERE idProduct = $idProduct")->fetch(PDO::FETCH_ASSOC);
                            if($productQuantity['quantity'] == 1){
                        ?>
                            <h6>Only 1 available left</h6>
                        <?php
                            }else{
                        ?>
                            <form action="updateCart.php" method="POST" class="d-flex gap-2">
                                <input type="hidden" name="idBag" value="<?= $bag['idBag'] ?>">
                                <input type="number" name="newQuantity" min="1" value="<?= $bag['quantity'] ?>" 
                                        max="<?= $quantity['quantity'] ?>" class="w-25">
                                <input type="submit" name="update" value="update" class="btn btn-outline-dark">
                            </form>
                        <?php
                            }
                        ?>
                    </td>
                    <td>
                        <?php
                            $quantity = $bag['quantity'];
                            $totalPrice = ($price * $quantity) - $discount;
                        ?>
                        <span><?= $totalPrice ?>$</span>
                    </td>
                    <td>
                        <a href="deleteCartProduct.php?idBag=<?php echo $bag['idBag'] ?>" 
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

            <a href="deleteAllcart.php?idUser=<?= $bag['idUser'] ?>" 
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
                    $subtotal = $pdo->query("SELECT SUM((price * quantity) - discount) 
                                            AS subtotal 
                                            FROM cart 
                                            WHERE idUser = '$idUser'");
                    $result = $subtotal->fetch(PDO::FETCH_ASSOC);
                ?>
                    Subtotal : <span class="fw-bold"><?= number_format($result['subtotal']) ?> $</span>
            </span>
        </div>

        <div class="d-flex justify-content-end align-items-center w-75 mx-auto">
            <p class="fw-light">Shipping, taxes, and discount codes calculated at checkout.</p>
        </div>
                <?php
                    }
                ?>
    <br>

<?php include '../includes/footer.php'; ?>

</body>
<script src="../js/main.js"></script>
</html>