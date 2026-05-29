<?php include '../includes/header.php' ?>
    <title>HouseOfVintage</title>
    <style>

        .section {
            height: 100vh;
            background-image:url('../assets/background.webp');
            background-size: cover;
            background-position: center;

            display: flex;
            justify-content: center;
            align-items: center;

            text-align: center;
            color: white;
            position: relative;
        }

        /* dark overlay */
        .section::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;

            width: 100%;
            height: 100%;

            background: rgba(0,0,0,0.5);
        }

        .section-content {
            position: relative;
            z-index: 2;
        }
    </style>
<body>

<?php include '../includes/nav.php' ?>

    <br><br>

    <section class="section">
        <div class="section-content">
            <h1 class="display-5 fw-bold">House Of Vintage</h1>
            <h1 class="display-5 fw-bold">House Of Art.</h1>
        </div>
    </section>

    <h2 class="mt-5 pt-5 mb-4 text-center fw-bold">Our Collections</h2>
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-6 my-3">
                <div class="card" style="width: 17rem;">
                    <a href="men.php" target="_blank"><img src="../assets/men1.jpg" class="card-img-top hover-move" alt="MEN"></a>
                    <div class="card-body justify-content-evenly mb-2">
                        <h5 class="card-title fw-bolder">Men’s Vintage</h5>
                            <p class="mb-0">
                                Vintage men’s clothing brings back timeless fashion.
                            </p><br>
                        <a href="men.php" target="_blank" class="btn btn-outlne-dark rounded-pill btn-dark">Shop Now</a>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-6 my-3">
                <div class="card" style="width: 18rem;">
                    <a href="women.php"><img src="../assets/woman1.jpg" class="card-img-top hover-move" alt="WOMEN"></a>
                    <div class="card-body justify-content-evenly mb-2">
                        <h5 class="card-title fw-bolder">Women’s Vintage</h5>
                        <p class="mb-0">
                                Vintage women’s fashion mixes elegance and retro style. 
                            </p><br>
                        <a href="women.php" class="btn btn-outlne-dark rounded-pill btn-dark">Shop Now</a>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-6 my-3">
                <div class="card" style="width: 23.5rem;">
                    <a href="sports.php"><img src="../assets/sports.webp" class="card-img-top hover-move" alt="SPORTS"></a>
                    <div class="card-body justify-content-evenly mb-2">
                        <h5 class="card-title fw-bolder">Sports Vintage</h5>
                        <p class="mb-0">
                                Sports vintage fashion combines retro athletic style with modern streetwear.
                        </p><br>
                        <a href="sports.php" class="btn btn-outlne-dark rounded-pill btn-dark">Shop Now</a>
                    </div>
                </div>
            </div>

            <div class="col-lg-12 text-center mt-5">
                <a href="#" class="btn btn-btn-sm btn-outline-dark rounded-1 fw-bold shadow-none">More</a>
            </div>
        </div>
    </div>


        <br>

<?php include '../includes/footer.php' ?>

        <br>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
        </script>
</body>

</html>