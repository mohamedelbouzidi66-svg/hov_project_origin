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

    <div class="container">
        <div class="row">
            
            <?php 
                foreach($categories as $label){ 
            ?>
            <div class="col-lg-4 col-md-6 my-1">
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

            <div class="col-lg-4 my-1">
                <div class="card">
                    <a href="sale.php">
                        <img src="" 
                            class="card-img-top hover-move" alt="MEN">
                    </a>
                    <div class="card-body justify-content-evenly mb-2">
                        <h5 class="card-title fw-bolder">Weekly Sale</h5>
                        <a href="sale.php" 
                            class="btn btn-outline-dark px-3 py-2 rounded-pill m-0">Shop Now
                        </a>
                    </div>
                </div>
            </div>

        <br>

<?php include '../includes/footer.php' ?>

</body>
</html>