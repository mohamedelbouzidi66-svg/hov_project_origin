<?php
    include '../includes/header.php';
    include '../includes/database.php';
    session_start();

    $id_category = $_GET['id_category'];

?>
    <title>modify category</title>
        <form method="POST" enctype="multipart/form-data" action="modifycategoryCode.php"
                class="p-4 border rounded shadow-sm">
            <h3 class="mb-4">Modify Category</h3>

            <input type="hidden" name="id_category" value="<?= $id_category ?>">

            <div class="mb-3">
                <label class="form-label">New Label</label>
                <input type="text" name="newLabel" class="form-control" required>
            </div>

            <div class="mb-3">
                <label class="form-label">New Label Image</label>
                <input type="file" name="newlabelImage" class="form-control" required>
            </div>

            <div class="mb-3">
                <label class="form-label">New Style</label>
                <input type="text" name="newStyle" class="form-control" required>
            </div>

            <div class="mb-3">
                <label class="form-label">New Style Image</label>
                <input type="file" name="newstyleImage" class="form-control" required>
            </div>

            <input type="submit" class="btn btn-dark w-100" name="modifyCategory" value="Modify Category">

        </form>