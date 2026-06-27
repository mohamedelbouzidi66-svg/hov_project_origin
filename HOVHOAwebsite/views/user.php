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

<?php include '../includes/nav.php'; ?>

    <div class="container">
        <div class="row">
            
            <?php 
                foreach($categories as $category): 
            ?>
            <div class="col-lg-4 my-1">
                <div class="card">
                    <a href="style.php?label=<?= $category['label'] ?>">
                        <img src="../uploadImage/label/<?= $category['labelImage'] ?>" 
                            class="card-img-top hover-move" alt="MEN">
                    </a>
                    <div class="card-body justify-content-evenly mb-2">
                        <h5 class="card-title fw-bolder"><?=$category['label'] ?>'s Vintage</h5>
                        <a href="style.php?label=<?= $category['label'] ?>" 
                            class="btn btn-outline-dark px-3 py-2 rounded-pill m-0">Shop Now
                        </a>
                    </div>
                </div>
            </div>
            <?php 
                endforeach 
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