<?php include '../includes/header.php' ?>

    <title>Men Page</title>
    <style>
        .position-absolute:hover{
            background-color: black;
            color: white;
            border: none;
        }
    </style>
<body>

<?php include '../includes/nav.php' ?>

    <br><br>

    <h2 class="mt-5 pt-5 mb-4 text-center fw-bold">Men’s Vintage</h2>
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-6 my-3">
                <div class="card position-relative border-0" style="width: 18rem;">
                    <a href="tracksuit.php"><img src="../assets/tracksuit.jpg" class="card-img-top hover-move" alt=""></a>
                    <div class="card-body justify-content-evenly mb-2">
                        <a href="tracksuit.php" class="position-absolute bottom-0 start-50 translate-middle-x mb-5 btn btn-light px-3 py-1 rounded-pill shadow-none">
                            Tracksuit</a>
                    </div>
                </div>
            </div>
    
                <div class="col-lg-4 col-md-6 my-3">
                    <div class="card position-relative border-0" style="width: 18rem;">
                    <a href="leather.php"><img src="../assets/leather.webp" class="card-img-top hover-move" alt=""></a>
                        <div class="card-body justify-content-evenly mb-2">
                            <a href="leather.php" class="position-absolute bottom-0 start-50 translate-middle-x mb-5 btn btn-light px-3 py-1 rounded-pill shadow-none">
                                Leather jackets</a>
                        </div>
                    </div>
                </div>

            <div class="col-lg-4 col-md-6 my-3">
                <div class="card position-relative border-0" style="width: 18rem;">
                    <a href="jeans.php"><img src="../assets/jeans.jpg" class="card-img-top hover-move" alt=""></a>
                    <div class="card-body justify-content-evenly mb-2">
                        <a href="jeans.php" class="position-absolute bottom-0 start-50 translate-middle-x mb-5 btn btn-light px-3 py-1 rounded-pill shadow-none">
                            Jeans</a>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-6 my-3">
                <div class="card position-relative border-0" style="width: 18rem;">
                    <a href="tshirts.php"><img src="../assets/tshirts.webp" class="card-img-top hover-move" alt=""></a>
                    <div class="card-body justify-content-evenly mb-2">
                        <a href="tshirts.php" class="position-absolute bottom-0 start-50 translate-middle-x mb-5 btn btn-light px-3 py-1 rounded-pill shadow-none">
                            T-shirts</a>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-6 my-3">
                <div class="card position-relative border-0" style="width: 20rem">
                    <a href="workwear.php"><img src="../assets/workwear.avif" class="card-img-top hover-move" alt=""></a>
                    <div class="card-body justify-content-evenly mb-2">
                        <a href="workwear.php" class="position-absolute bottom-0 start-50 translate-middle-x mb-5 btn btn-light px-3 py-1 rounded-pill shadow-none">
                            Workwear</a>
                        </div>
                    </div>
                </div>

            <div class="col-lg-4 col-md-6 my-3">
                <div class="card position-relative border-0" style="width: 18rem;">
                    <a href="accessories.php"><img src="../assets/accessories.jpg" class="card-img-top hover-move" alt=""></a>
                    <div class="card-body justify-content-evenly mb-2">
                        <a href="accessories.php" class="position-absolute bottom-0 start-50 translate-middle-x mb-5 btn btn-light px-3 py-1 rounded-pill shadow-none">
                            Accessories</a>
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