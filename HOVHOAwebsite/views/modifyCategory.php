<?php
    include '../includes/header.php';
    include '../includes/database.php';
    session_start();

    $id_category = $_GET['id_category'];
    $category = $pdo->query("SELECT * FROM category 
                            WHERE id_category = '$id_category'
                            ")->fetch(PDO::FETCH_ASSOC);
?>

    <title>modify category</title>
        <!-- modify catgeory form -->
        <form method="POST" enctype="multipart/form-data" action="modifycategoryCode.php"
                class="p-4 border rounded shadow-sm">
            <h3 class="mb-4">Modify Category</h3>

            <input type="hidden" name="id_category" value="<?= $_GET['id_category'] ?>">

            <div class="mb-3">
                <label class="form-label">New Label</label>
                <input type="text" name="newLabel" class="form-control" value="<?= $category['label'] ?>">
            </div>

            <div class="mb-3">
                <label class="form-label">New Label Image</label><br>
                <img src="../uploadImage/label/<?= $category['labelImage'] ?>" 
                    alt="Current image" 
                    class="mt-2"
                    style="width:100px;">
                <input type="file" name="newlabelImage" class="form-control">
            </div>

            <div class="mb-3">
                <label class="form-label">New Style</label>
                <input type="text" name="newStyle" class="form-control" value="<?= $category['style'] ?>">
            </div>

            <div class="mb-3">
                <label class="form-label">New Style Image</label><br>
                <img src="../uploadImage/style/<?= $category['styleImage'] ?>" 
                    alt="Current image" 
                    class="mt-2"
                    style="width:100px;">
                <input type="file" name="newstyleImage" class="form-control">
            </div>

            <input type="submit" class="btn btn-dark w-100" name="modifyCategory" value="Modify Category">

        </form>