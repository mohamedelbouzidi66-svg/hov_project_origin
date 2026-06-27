<?php 
    include '../includes/header.php';
    include '../includes/database.php';

    $categories = $pdo->query(" SELECT label, labelImage
                                FROM category
                                GROUP BY label
                                ")->fetchAll(PDO::FETCH_ASSOC);
?>

    <title>HouseOfVintage</title>
<body>

<?php include '../includes/nav.php' ?>

    <section class="section">
        <div class="section-content">
            <h1 class="display-5 fw-bold">House Of Vintage</h1>
            <h3 class="display-5 fw-light">House Of Art.</h3>
        </div>
    </section>

    <h2 class="mt-5 pt-5 mb-4 text-center fw-bold">Our Collections</h2>
    <div class="container">
        <div class="row">
            
            <?php 
                foreach($categories as $label){ 
            ?>
            <div class="col-lg-4 col-md-6 my-3">
                <div class="card">
                    <a href="style.php?label=<?= $label['label'] ?>">
                        <img src="../uploadImage/label/<?= $label['labelImage'] ?>" 
                        class="card-img-top hover-move" alt="MEN">
                    </a>
                    <div class="card-body justify-content-evenly mb-2">
                        <h5 class="card-title fw-bolder"><?= $label['label'] ?>'s Vintage</h5>
                        <a href="style.php?label=<?= $label['label'] ?>" 
                            class="btn btn-outline-dark px-3 py-2 rounded-pill m-0">Shop Now
                        </a>
                    </div>
                </div>
            </div>
            <?php 
                } 
            ?>

        <br>

<?php include '../includes/footer.php' ?>

</body>
</html>