<?php
    include '../includes/header.php';
    include '../includes/database.php';

    $connect = false;
    if(isset($_SESSION['users'])){
        $connect = true;
    }

    // navbar menu query
    $labels = $pdo->query(" SELECT DISTINCT label
                            FROM category
                        ")->fetchAll(PDO::FETCH_ASSOC);
?>
    <h2 class="mt-5 pt-4 mb-4 text-center fw-bold">Our Store</h2>

    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-8 p-4 mb-lg-0 mb-3 bg-white rounded">
                <iframe class="w-100 rounded" height="320px"
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3323.2771521713453!2d-7.643225299999999!3d33.5981127!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xda7d32ba683572f%3A0x183c0d055afdc6c6!2sHouse%20of%20Vintage%20-%20House%20of%20Art!5e0!3m2!1sen!2sma!4v1778781628086!5m2!1sen!2sma"
                        loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    </div>

    <div class="col-lg-4 col-md-4">
        <div class="bg-white p-4 fs-5 rounded mb-4">
            <h5>Call Us</h5>
            <a href="tel : +212621820624" 
                class="d-inline-block mb-2 text-decoration-none text-dark"><i
                class="bi bi-telephone-fill"></i>+212621820624</a>
    </div>

    <div class="bg-white p-4 rounded mb-4">
        <h5>Follow Us</h5>
        <span class="badge text-dark fs-5 p-1">
            <a href="https://www.instagram.com/houseofvintagehouseofart?utm_source=ig_web_button_share_sheet&igsh=ZDNlZDc0MzIxNw=="
                class="d-inline-block mb-2 text-decoration-none text-dark"><i
                class="bi bi-instagram me-1"></i></i>Instagram
            </a>
        </span>
        <br>
    <span class="badge text-dark fs-5 p-1">
        <a href="https://www.instagram.com/houseofvintagehouseofart?utm_source=ig_web_button_share_sheet&igsh=ZDNlZDc0MzIxNw=="
            class="d-inline-block mb-2 text-decoration-none text-dark">
            <i class="bi bi-facebook"></i>Facebook
        </a>
    </span>
            </div>
        </div>
    </div>

    <br>

    <div class="container-fluid text-center text-md-start mt-5">
        <div class="row">
            <div class="col-md-4 mb-4">
            <h5 class="fw-bold">HouseOfVintage</h5>
            <p>
                Abdesslam de House of Vintage partage sa passion pour la mode, le vintage, le style
                et son regard sur la fast fashion.
            </p>
    </div>

    <div class="col-md-4 mb-4">
        <h5 class="fw-bold mb-3">Quick Links</h5>
        <?php 
            if($connect): 
        ?>
            <a href="user.php" class="d-inline-block mb-2 text-decoration-none text-dark">
                HouseOfVintage
            </a><br>
        <?php 
            else : 
        ?>
            <a href="index.php" class="d-inline-block mb-2 text-decoration-none text-dark">
                HouseOfVintage
            </a><br>
        <?php 
            endif
        ?>

        <ul class="list-unstyled">
            <?php 
                foreach($labels as $label): 
            ?>
                <li>
                    <a href="style.php?label=<?= $label['label'] ?>" 
                        class="d-inline-block mb-2 text-decoration-none text-dark">
                        <?= $label['label'] ?>
                    </a><br>
                </li>
            <?php
                endforeach
            ?>
        </ul>
    </div>

    <div class="col-md-4 mb-4">
        <h5 class="fw-bold mb-3">Reach Us</h5>
        <p>Email : <a href="index.php" class="text-dark d-inline-block mb-0 fw-bold text-decoration-none">
                    HouseOfVintage@gmail.com</a>
        </p>
        <span>Phone :<p class="links d-inline-block fw-bold">+212 621820624</p></span>
        <p>Casablanca, Morocco</p>
    </div>

    </div>

    <hr class="border-light">

    <div class="text-center">
        <p class="mb-0">
            © 2026 <span class="bz fw-bolder">EL BOUZIDI</span> - All Rights Reserved
        </p>
    </div>

    </div>
    <br>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
