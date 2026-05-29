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

    <h2 class="mt-5 pt-5 mb-4 text-center fw-bold">Sports Vintage</h2>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-4 col-md-6 my-3">
                <div class="card position-relative border-0" style="width: 18rem;">
                    <a href="kit.php"><img src="../assets/kit.jpg" class="card-img-top hover-move" alt=""></a>
                    <div class="card-body justify-content-evenly mb-2">
                        <a href="kit.php" class="position-absolute bottom-0 start-50 translate-middle-x mb-5 btn btn-light px-3 py-1 rounded-pill shadow-none">
                            Retro Kits</a>
                    </div>
                </div>
            </div>
    
                <div class="col-lg-4 col-md-6 my-3">
                    <div class="card position-relative border-0" style="width: 21rem;">
                    <a href="jacket.php"><img src="../assets/jacket.webp" class="card-img-top hover-move" alt=""></a>
                        <div class="card-body justify-content-evenly mb-2">
                            <a href="jacket.php" class="position-absolute bottom-0 start-50 translate-middle-x mb-5 btn btn-light px-3 py-1 rounded-pill shadow-none">
                                Retro Jackets</a>
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