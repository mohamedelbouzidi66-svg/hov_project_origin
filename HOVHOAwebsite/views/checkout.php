<?php 
    include '../includes/header.php';
    include '../includes/database.php';
    session_start();

    $idUser = $_SESSION['users']['idUser'];
    $carts = $pdo->query("SELECT * FROM cart
                        WHERE idUser = '$idUser'
                        ")->fetchAll(PDO::FETCH_ASSOC);
?>

    <title>checkout - HouseOfVintage</title>
<body>

    <nav class="navbar navbar-expand-lg navbar-light py-3 border-bottom border-dark border-3">
        <div class="container-fluid">
            <div class="collapse navbar-collapse" id="navbarNav">
                
                <div class="position-relative w-100">
                    <a href="user.php" class="d-flex justify-content-center align-items-center" >
                        <img src="../assets/hov_logo6.PNG" alt="" style="height: 5rem;">
                    </a>

                    <a href="cart.php" class="position-absolute end-0 top-50 translate-middle-y shadow-none text-decoration-none fw-bold text-dark me-5">
                        <i class="fa-solid fa-bag-shopping fs-5 me-2"></i>Bag
                    </a>
                </div>

            </div>
        </div>
    </nav>

    <div class="container py-5">
        <div class="row">

        <!-- Left -->
        <div class="col-lg-7">

            <p class="fw-light text-center">express checkout</h5>

            <div class="p-4 mb-4 align-items-between">

                <a href="" class="text-decoration-none">
                    <i class="fa-brands fa-cc-paypal fa-fade fa-2xl me-4" style="color: rgb(255, 230, 0); font-size: 80px;"></i>
                </a>
                <a href="" class="text-decoration-none">
                    <i class="fa-brands fa-google-pay fa-fade fa-2xl me-4" style="color: rgb(21, 0, 255); font-size: 80px;"></i>
                </a>
                <a href="" class="text-decoration-none">
                    <i class="fa-brands fa-apple-pay fa-fade fa-2xl me-4" style="color: rgb(0, 142, 255); font-size: 80px;"></i>
                </a>
                <a href="" class="text-decoration-none">
                    <i class="fa-brands fa-amazon-pay fa-fade fa-2xl" style="color: rgb(116, 192, 252); font-size: 60px;"></i>
                </a>


            </div>

            <div class="card p-4 mb-4">
                <h5>Contact</h5>

                <input type="email" class="form-control mb-3" placeholder="Email">

                <div class="form-check">
                    <input class="form-check-input" type="checkbox">
                    <label class="form-check-label">
                        Email me with news and offers
                    </label>
                </div>
            </div>

            <div class="card p-4">
                <h5>Shipping Address</h5>
                <form action="">

                    <input class="form-control mb-3" placeholder="First Name">
                    
                    <input class="form-control mb-3" placeholder="Last Name">

                    <input class="form-control mb-3" placeholder="Address">
                    
                    <div class="row">
                        <div class="col-md-6">
                            <input class="form-control mb-3" placeholder="City">
                        </div>
                        
                        <div class="col-md-6">
                            <input class="form-control mb-3" placeholder="Postal Code">
                        </div>
                    </div>
                </form>

                <button class="btn btn-dark w-100">
                    Continue to Shipping
                </button>

            </div>
            <br>

            <div class="card shadow-sm p-4">
                <div class="mb-3 d-flex">
                    <h4>Payment</h4>
                    <i class="fa-brands fa-cc-visa fa-2xl ms-3" style="color: rgb(46, 0, 255);"></i>
                    <i class="fa-brands fa-cc-mastercard fa-2xl ms-2" style="color: rgb(46, 0, 255);"></i>
                    <i class="fa-brands fa-cc-amex fa-2xl ms-2" style="color: rgb(46, 0, 255);"></i>
                </div>

                <div class="mb-3">
                    <input type="text"
                        class="form-control"
                        placeholder="Card Number">
                </div>

                <div class="mb-3">
                    <input type="text"
                        class="form-control"
                        placeholder="Cardholder Name">
                </div>

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <input type="text"
                            class="form-control"
                            placeholder="Expiration Date">
                    </div>

                    <div class="col-md-6 mb-3">
                        <input type="password"
                                class="form-control"
                                placeholder="Security Code (CVV)"
                                maxlength="4">
                    </div>
                </div>

                <button class="btn btn-dark w-100 py-2">
                    Pay Now
                </button>
            </div>

        </div>
            

        <!-- Right -->
        <div class="col-lg-5">

            <div class="card p-4 m-5">

                <div style="max-height: 400px; overflow-y: auto;">

                <?php 
                    foreach($carts as $cart):
                ?>
                <div class="d-flex align-items-center mt-3">

                    <img src="../uploadImage/product/<?= $cart['productImage'] ?>"
                        width="70"
                        class="rounded"><sup class="position-relative fw-light bg-dark rounded-pill fs-6 px-2 py-2 text-light" style="top: -35px;">
                                        <?= $cart['quantity'] ?>
                                        </sup>

                    <div class="ms-2 flex-grow-1">
                        <h6 class="fw-light"><?=$cart['description'] ?></h6>
                    </div>

                    <span class="ms-3">
                        <?php 
                            $discount = $cart['discount'];
                            $price = $cart['price'];
                            $discountedPrice = $price - $discount;
                            if($discount > 0){
                        ?>
                                <span class="card-title fw-bold">
                                    <?php echo $discountedPrice ?>$
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
                    </span>

                </div>
                <?php 
                    endforeach
                ?>
            </div>
                <hr>

                <div class="d-flex justify-content-between">
                    <?php
                        $idUser = $_SESSION['users']['idUser'];
                        // total price of the cart query
                        $sql = $pdo->query("SELECT SUM((price * quantity) - discount) 
                                                AS subtotal 
                                                FROM cart 
                                                WHERE idUser = '$idUser'");
                        $subtotal_bag = $sql->fetch(PDO::FETCH_ASSOC);
                    ?>
                    <span>Subtotal</span>
                    <strong><?= number_format($subtotal_bag['subtotal']) ?> $</strong>
                </div>

                <div class="d-flex justify-content-between">
                    <span>Shipping</span>
                    <strong>Calculated later</strong>
                </div>

                <hr>

                <div class="d-flex justify-content-between">
                    <h5>Total</h5>
                    <h5><?= number_format($subtotal_bag['subtotal']) ?> $</h5>
                </div>

            </div>

        </div>

    </div>
</div>

</body>
</html>