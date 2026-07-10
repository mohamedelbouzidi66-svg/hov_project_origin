<?php
    include '../includes/header.php';
    include '../includes/database.php';
    session_start();

    $idProduct = $_GET['idProduct'];
    $product = $pdo->query("SELECT * FROM product 
                            WHERE idProduct = '$idProduct'
                            ")->fetch(PDO::FETCH_ASSOC);
?>

    <title>modify product</title>
        <!-- modify product form -->
        <form method="POST" enctype="multipart/form-data" action="modifyproductCode.php"
                class="p-4 border rounded shadow-sm">
            <h3 class="mb-4">Modify Product</h3>

            <input type="hidden" name="idProduct" value="<?= $_GET['idProduct'] ?>">

            <div class="mb-3">
                <label class="form-label">New Image</label><br>
                <img src="../uploadImage/product/<?= $product['image'] ?>" 
                    alt="Current image" 
                    class="mt-2"
                    style="width:100px;">
                <input type="file" name="newImage" class="form-control">
            </div>

            <div class="mb-3">
                <label class="form-label">New Label</label>
                <select name="newLabel" class="form-select">
                    <option value="<?= $product['label'] ?>"><?= $product['label'] ?></option>
                    <?php 
                        // label column query
                        $labels = $pdo->query('SELECT DISTINCT label 
                                                    FROM category
                                                    ')->fetchAll(PDO::FETCH_ASSOC);
                        foreach($labels as $label){ 
                    ?>
                        <option value="<?php echo $label['label'] ?>">
                            <?php echo $label['label'] ?>
                        </option>
                    <?php 
                        } 
                    ?>
                </select>
            </div>

            <div class="mb-3">
                <label class="form-label">New Style</label>
                <select name="newStyle" class="form-select" required>
                    <option value="<?= $product['style'] ?>"><?= $product['style'] ?></option>
                    <?php 
                        // style column query
                        $styles = $pdo->query('SELECT DISTINCT style 
                                                    FROM category
                                                    ')->fetchAll(PDO::FETCH_ASSOC);
                        foreach($styles as $style){ 
                    ?>
                    <option value="<?php echo $style['style'] ?>">
                        <?php echo $style['style'] ?>
                    </option>
                    <?php 
                        } 
                    ?>
                </select>
            </div>

            <div class="mb-3">
                <label class="form-label">New Description</label>
                <input type="text" name="newDescription" 
                        class="form-control" value="<?= $product['description'] ?>">
            </div>

            <div class="mb-3">
                <label class="form-label">New Price</label>
                <input type="number" min="0" name="newPrice" 
                        class="form-control" value="<?= $product['price'] ?>">
            </div>

            <div class="mb-3">
                <label class="form-label">New Quantity</label>
                <input type="number" min="0" name="newQuantity" 
                        class="form-control" value="<?= $product['quantity'] ?>">
            </div>

            <div class="mb-3">
                <label class="form-label">New Discount</label>
                <input type="number" min="0" name="newDiscount" 
                        class="form-control" value="<?= $product['discount'] ?>">
            </div>

            <input type="submit" class="btn btn-dark w-100" name="modifyProduct" value="Modify Product">

        </form>