<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="css/style.css">
    <title>Accessory Page</title>
    <style>
        .card-body{
            height: 11rem;
        }

        .fav-icon{
            color: black;
            transition: 0.2s;
        }

        .fav-icon:hover{
            color: black;
        }

        .fav-icon:hover::before{
            content: "\f415";
            font-family: "bootstrap-icons";
        }
    </style>
</head>

<body>
<?php include 'includes/nav.php' ?>

    <br><br>

    <h2 class="mt-5 pt-5 mb-4 text-center fw-bold">Vintage Accessory</h2>
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-4 my-3">
                <div class="card" style="width: 15rem;">
                    <a href="jp1.php" target="_blank"><img src="assets/ap1.jpg" class="card-img-top hover-move" style="height:fit-content" alt="tracksuit"></a>
                    <div class="card-body justify-content-evenly mb-2">
                        <p class="mb-0">
                            Omega Seamaster Automatic Pink Gold-Plated 1969
                        </p>
                        <h5 class="card-title fw-bolder">1000.0 MAD</h5>
                        <div class="d-flex align-items-center gap-3 mt-3">
                            <a href="tp1.php" class="btn btn-outline-dark px-3 py-2 rounded-pill m-0">
                                ADD TO BAG
                            </a>
                            <a href="fav.php">
                                <i class="bi bi-heart fs-4 text-dark fav-icon"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-4 my-3">
                <div class="card" style="width: 15rem;">
                    <a href="tp2.php" target="_blank"><img src="assets/ap2.webp" class="card-img-top hover-move" style="height:fit-content" alt="tracksuit"></a>
                    <div class="card-body justify-content-evenly mb-2">
                        <p class="mb-0">
                        Rolex Precision Cal.1600 18ct 1972
                        </p>
                        <div><br>
                            <h5 class="card-title fw-bolder">1500.0 MAD</h5>
                        </div>
                        <div class="d-flex align-items-center gap-3 mt-3">
                            <a href="tp1.php" class="btn btn-outline-dark px-3 py-2 rounded-pill m-0">
                                ADD TO BAG
                            </a>
                            <a href="fav.php">
                                <i class="bi bi-heart fs-4 text-dark fav-icon"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-4 my-3">
                <div class="card" style="width: 15rem;">
                    <a href="tp3.php" target="_blank"><img src="assets/ap3.jpg" class="card-img-top hover-move" style="height:fit-content" alt="tracksuit"></a>
                    <div class="card-body justify-content-evenly mb-2">
                        <p class="mb-0">
                            Rolex Oyster Perpetual Date Ref.1503 14ct 1979
                        </p>
                        <div><br>
                            <h5 class="card-title fw-bolder">1400.0 MAD</h5>
                        </div>
                        <div class="d-flex align-items-center gap-3 mt-3">
                            <a href="tp1.php" class="btn btn-outline-dark px-3 py-2 rounded-pill m-0">
                                ADD TO BAG
                            </a>
                            <a href="fav.php">
                                <i class="bi bi-heart fs-4 text-dark fav-icon"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-3 col-md-4 my-3">
                <div class="card" style="width: 15rem;">
                    <a href="tp4.php" target="_blank"><img src="assets/ap4.jpg" class="card-img-top hover-move" style="height:fit-content" alt="tracksuit"></a>
                    <div class="card-body justify-content-evenly mb-2">
                        <p class="mb-0">
                            Rolex Oyster Perpetual Datejust Ref.6305 18ct 1955
                        </p>
                        <h5 class="card-title fw-bolder">1700.0 MAD</h5>
                        <div class="d-flex align-items-center gap-3 mt-3">
                            <a href="tp1.php" class="btn btn-outline-dark px-3 py-2 rounded-pill m-0">
                                ADD TO BAG
                            </a>
                            <a href="fav.php">
                                <i class="bi bi-heart fs-4 text-dark fav-icon"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-4 my-3">
                <div class="card" style="width: 15rem;">
                    <a href="tp5.php" target="_blank"><img src="assets/ap5.jpg" class="card-img-top hover-move" style="height:auto" alt="tracksuit"></a>
                    <div class="card-body justify-content-evenly mb-2">
                        <p class="mb-0">
                            Patek Philippe Ellipse TV Ref.3852 18ct c1976
                        </p>
                        <div><br>
                            <h5 class="card-title fw-bolder">1700.0 MAD</h5>
                        </div>
                        <div class="d-flex align-items-center gap-3 mt-3">
                            <a href="tp1.php" class="btn btn-outline-dark px-3 py-2 rounded-pill m-0">
                                ADD TO BAG
                            </a>
                            <a href="fav.php">
                                <i class="bi bi-heart fs-4 text-dark fav-icon"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-4 my-3">
                <div class="card" style="width: 15rem;">
                    <a href="tp6.php" target="_blank"><img src="assets/ap6.webp" class="card-img-top hover-move" style="height:auto" alt="tracksuit"></a>
                    <div class="card-body justify-content-evenly mb-2">
                        <p class="mb-0">
                            IWC Ingenieur 18ct 1960
                        </p>
                        <div><br><br>
                            <h5 class="card-title fw-bolder">1500.0 MAD</h5>
                        </div>
                        <div class="d-flex align-items-center gap-3 mt-3">
                            <a href="tp1.php" class="btn btn-outline-dark px-3 py-2 rounded-pill m-0">
                                ADD TO BAG
                            </a>
                            <a href="fav.php">
                                <i class="bi bi-heart fs-4 text-dark fav-icon"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-4 my-3">
                <div class="card" style="width: 15rem;">
                    <a href="tp7.php" target="_blank"><img src="assets/ap7.webp" class="card-img-top hover-move" style="height:auto" alt="tracksuit"></a>
                    <div class="card-body justify-content-evenly mb-2">
                        <p class="mb-0">
                            Universal Geneve Uni-Compax Chronograph Cal.283 18ct 1943
                        </p>
                        <h5 class="card-title fw-bolder">2100.0 MAD</h5>
                        <div class="d-flex align-items-center gap-3 mt-3">
                            <a href="tp1.php" class="btn btn-outline-dark px-3 py-2 rounded-pill m-0">
                                ADD TO BAG
                            </a>
                            <a href="fav.php">
                                <i class="bi bi-heart fs-4 text-dark fav-icon"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-4 my-3">
                <div class="card" style="width: 15rem;">
                    <a href="tp8.php" target="_blank"><img src="assets/ap8.jpg" class="card-img-top hover-move" style="height:auto" alt="tracksuit"></a>
                    <div class="card-body justify-content-evenly mb-2">
                        <p class="mb-0">
                            Universal Geneve Cal.230 18ct c1942
                        </p>
                        <div><br>
                            <h5 class="card-title fw-bolder">1400.0 MAD</h5>
                        </div>
                        <div class="d-flex align-items-center gap-3 mt-3">
                            <a href="tp1.php" class="btn btn-outline-dark px-3 py-2 rounded-pill m-0">
                                ADD TO BAG
                            </a>
                            <a href="fav.php">
                                <i class="bi bi-heart fs-4 text-dark fav-icon"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-4 my-3">
                <div class="card" style="width: 15rem;">
                    <a href="tp9.php" target="_blank"><img src="assets/ap9.webp" class="card-img-top hover-move" style="height:auto" alt="tracksuit"></a>
                    <div class="card-body justify-content-evenly mb-2">
                        <p class="mb-0">
                            BLACK CHUNKY BUCKLE LEATHER BELT
                        </p>
                        <div><br>
                            <h5 class="card-title fw-bolder">150.00 MAD</h5>
                        </div>
                        <div class="d-flex align-items-center gap-3 mt-3">
                            <a href="tp1.php" class="btn btn-outline-dark px-3 py-2 rounded-pill m-0">
                                ADD TO BAG
                            </a>
                            <a href="fav.php">
                                <i class="bi bi-heart fs-4 text-dark fav-icon"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-4 my-3">
                <div class="card" style="width: 15rem;">
                    <a href="tp10.php" target="_blank"><img src="assets/ap10.webp" class="card-img-top hover-move" style="height:auto" alt="tracksuit"></a>
                    <div class="card-body justify-content-evenly mb-2">
                        <p class="mb-0">
                            BLACK REVERSIBLE PREMIUM LEATHER BELT
                        </p>
                        <div><br>
                            <h5 class="card-title fw-bolder">190.00 MAD</h5>
                        </div>
                        <div class="d-flex align-items-center gap-3 mt-3">
                            <a href="tp1.php" class="btn btn-outline-dark px-3 py-2 rounded-pill m-0">
                                ADD TO BAG
                            </a>
                            <a href="fav.php">
                                <i class="bi bi-heart fs-4 text-dark fav-icon"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-4 my-3">
                <div class="card" style="width: 15rem;">
                    <a href="tp11.php" target="_blank"><img src="assets/ap11.webp" class="card-img-top hover-move" style="height:auto" alt="tracksuit"></a>
                    <div class="card-body justify-content-evenly mb-2">
                        <p class="mb-0">
                            WHITE ABSTRACT PRINT LEATHER BELT
                        </p>
                        <div><br>
                            <h5 class="card-title fw-bolder">240.00 MAD</h5>
                        </div>
                        <div class="d-flex align-items-center gap-3 mt-3">
                            <a href="tp1.php" class="btn btn-outline-dark px-3 py-2 rounded-pill m-0">
                                ADD TO BAG
                            </a>
                            <a href="fav.php">
                                <i class="bi bi-heart fs-4 text-dark fav-icon"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-4 my-3">
                <div class="card" style="width: 15rem;">
                    <a href="tp12.php" target="_blank"><img src="assets/ap12.webp" class="card-img-top hover-move" style="height:auto" alt="tracksuit"></a>
                    <div class="card-body justify-content-evenly mb-2">
                        <p class="mb-0">
                            BEIGE BRAIDED BELT
                        </p>
                        <div><br><br>
                            <h5 class="card-title fw-bolder">190.00 MAD</h5>
                        </div>
                        <div class="d-flex align-items-center gap-3 mt-3">
                            <a href="tp1.php" class="btn btn-outline-dark px-3 py-2 rounded-pill m-0">
                                ADD TO BAG
                            </a>
                            <a href="fav.php">
                                <i class="bi bi-heart fs-4 text-dark fav-icon"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-4 my-3">
                <div class="card" style="width: 15rem;">
                    <a href="tp13.php" target="_blank"><img src="assets/ap13.jpg" class="card-img-top hover-move" style="height:auto" alt="tracksuit"></a>
                    <div class="card-body justify-content-evenly mb-2">
                        <p class="mb-0">
                            Vintage Museum Artefacts Silk Tie
                        </p>
                        <div><br>
                            <h5 class="card-title fw-bolder">120.00 MAD</h5>
                        </div>
                        <div class="d-flex align-items-center gap-3 mt-3">
                            <a href="tp1.php" class="btn btn-outline-dark px-3 py-2 rounded-pill m-0">
                                ADD TO BAG
                            </a>
                            <a href="fav.php">
                                <i class="bi bi-heart fs-4 text-dark fav-icon"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-4 my-3">
                <div class="card" style="width: 15rem;">
                    <a href="tp14.php" target="_blank"><img src="assets/ap14.jpg" class="card-img-top hover-move" style="height:auto" alt="tracksuit"></a>
                    <div class="card-body justify-content-evenly mb-2">
                        <p class="mb-0">
                            Vintage 90s Chritsian Dior Silk Tie
                        </p>
                        <div><br>
                            <h5 class="card-title fw-bolder">100.00 MAD</h5>
                        </div>
                        <div class="d-flex align-items-center gap-3 mt-3">
                            <a href="tp1.php" class="btn btn-outline-dark px-3 py-2 rounded-pill m-0">
                                ADD TO BAG
                            </a>
                            <a href="fav.php">
                                <i class="bi bi-heart fs-4 text-dark fav-icon"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>


            <div class="col-lg-3 col-md-4 my-3">
                <div class="card" style="width: 15rem;">
                    <a href="tp15.php" target="_blank"><img src="assets/ap15.jpg" class="card-img-top hover-move" style="height:auto" alt="tracksuit"></a>
                    <div class="card-body justify-content-evenly mb-2">
                        <p class="mb-0">
                            Vintage 80s Christian Dior Tie 
                        </p>
                        <div><br>
                            <h5 class="card-title fw-bolder">120.00 MAD</h5>
                        </div>
                        <div class="d-flex align-items-center gap-3 mt-3">
                            <a href="tp1.php" class="btn btn-outline-dark px-3 py-2 rounded-pill m-0">
                                ADD TO BAG
                            </a>
                            <a href="fav.php">
                                <i class="bi bi-heart fs-4 text-dark fav-icon"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-4 my-3">
                <div class="card" style="width: 15rem;">
                    <a href="tp16.php" target="_blank"><img src="assets/ap16.jpg" class="card-img-top hover-move" style="height:auto" alt="tracksuit"></a>
                    <div class="card-body justify-content-evenly mb-2">
                        <p class="mb-0">
                            Vintage 1990s Giorgio Armani Patterned Silk Tie
                        </p>
                        <div><br>
                            <h5 class="card-title fw-bolder">150.00 MAD</h5>
                        </div>
                        <div class="d-flex align-items-center gap-3 mt-3">
                            <a href="tp1.php" class="btn btn-outline-dark px-3 py-2 rounded-pill m-0">
                                ADD TO BAG
                            </a>
                            <a href="fav.php">
                                <i class="bi bi-heart fs-4 text-dark fav-icon"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-12 text-center mt-5">
                <a href="#" class="btn btn-btn-sm btn-outline-dark rounded-1 fw-bold shadow-none">More</a>
            </div>
        </div>
    </div>

        <br>

<?php include 'includes/footer.php' ?>

        <br>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
        </script>
</body>

</html>