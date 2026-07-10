<?php 
    include '../includes/header.php';
    include '../includes/database.php';

    $label = $_GET['label'];
    // category table query
    $sqlstate = $pdo->query("SELECT * FROM category 
                                WHERE label = '$label'");
    $categories = $sqlstate->fetchAll(PDO::FETCH_ASSOC);
?>

    <title><?= $label ?> Page</title>
    <style>
        .position-absolute:hover{
            background-color: black;
            color: white;
            border: none;
        }
    </style>

<body>

    <?php 
        include '../includes/nav.php';
    ?>
    
    <h2 class="pt-5 mb-4 text-center fw-bold"><?= $_GET['label'] ?>'s Vintage</h2>
    <div class="container">
        <div class="row">
            <?php 
                foreach($categories as $style){ 
            ?>
            <div class="col-lg-4 col-md-6 my-3">
                <div class="card position-relative border-0" style="width: 18rem;">
                    <a href="product.php?style=<?= $style['style'] ?>">
                        <img src="../uploadImage/style/<?= $style['styleImage'] ?>" 
                                class="card-img-top hover-move" alt="">
                    </a>
                    <div class="card-body justify-content-evenly mb-2">
                        <a href="product.php?style=<?= $style['style'] ?>" 
                            class="position-absolute bottom-0 start-50 translate-middle-x mb-5 btn btn-light px-3 py-1 rounded-pill shadow-none">
                            <?= $style['style'] ?>
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