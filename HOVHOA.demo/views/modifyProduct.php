<?php
    include '../includes/header.php';
    include '../includes/database.php';
    session_start();

    $idProduct = $_GET['idProduct'];

?>
    <title>modify product</title>
        <form method="POST" enctype="multipart/form-data" action="modifyproductCode.php"
                class="p-4 border rounded shadow-sm">
            <h3 class="mb-4">Modify Product</h3>

            <input type="hidden" name="idProduct" value="<?= $idProduct ?>">

            <div class="mb-3">
                <label class="form-label">New Image</label>
                <input type="file" name="newImage" class="form-control" required>
            </div>

            <div class="mb-3">
                <label class="form-label">New Label</label>
                <select name="newLabel" class="form-select" required>
                    <option value="">Select Label</option>
                    <?php 
                        $categories = $pdo->query('SELECT DISTINCT label 
                                                FROM category')->fetchAll(PDO::FETCH_ASSOC);
                        foreach($categories as $category){ 
                    ?>
                    <option value="<?php echo $category['label'] ?>">
                        <?php echo $category['label'] ?>
                    </option>
                    <?php 
                        } 
                    ?>
                </select>
            </div>

            <div class="mb-3">
                <label class="form-label">New Style</label>
                <select name="newStyle" class="form-select" required>
                    <option value="">Select Style</option>
                    <?php 
                        $categories = $pdo->query('SELECT DISTINCT style 
                                                FROM category')->fetchAll(PDO::FETCH_ASSOC);
                        foreach($categories as $category){ 
                    ?>
                    <option value="<?php echo $category['style'] ?>">
                        <?php echo $category['style'] ?>
                    </option>
                    <?php 
                        } 
                    ?>
                </select>
            </div>

            <div class="mb-3">
                <label class="form-label">New Description</label>
                <textarea name="newDescription" 
                            class="form-control" rows="4" placeholder="New Description" required>
                </textarea>
            </div>

            <div class="mb-3">
                <label class="form-label">New Price</label>
                <input type="number" min="0" name="newPrice" 
                        class="form-control" placeholder="Enter New price" required>
            </div>

            <div class="mb-3">
                <label class="form-label">New Quantity</label>
                <input type="number" min="0" name="newQuantity" 
                        class="form-control" placeholder="Enter New Quantity" required value="1">
            </div>

            <div class="mb-3">
                <label class="form-label">New Discount</label>
                <input type="number" min="0" name="newDiscount" 
                        class="form-control" placeholder="Enter New Discount" required value="0">
            </div>

            <input type="submit" class="btn btn-dark w-100" name="modifyProduct" value="Modify Product">

        </form>