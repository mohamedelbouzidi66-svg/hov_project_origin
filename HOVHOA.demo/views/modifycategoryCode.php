<?php
    include '../includes/header.php';
    include '../includes/database.php';
    session_start();

    if(isset($_POST['modifyCategory'])){

        $newLabel = htmlspecialchars($_POST['newLabel']);
        $newlabelImage = $_FILES['newlabelImage'];
        $newStyle = htmlspecialchars($_POST['newStyle']);
        $newstyleImage = $_FILES['newstyleImage'];
        $created_at = date('Y-m-d');
        $id_category = $_POST['id_category'];
        
        if (!empty($newLabel) &&
            !empty($newlabelImage) && 
            !empty($newStyle) && 
            !empty($newstyleImage) && 
            !empty($created_at) && 
            !empty($id_category)) {

            $tmpNamelabel = $_FILES['newlabelImage']['tmp_name'];
            $newFilenamelabel = $_FILES['newlabelImage']['name'];
            move_uploaded_file($tmpNamelabel, '../uploadImage/label/' . $newFilenamelabel);

            $tmpNamestyle = $_FILES['newstyleImage']['tmp_name'];
            $newFilenamestyle = $_FILES['newstyleImage']['name'];
            move_uploaded_file($tmpNamestyle, '../uploadImage/style/' . $newFilenamestyle);

            $sqlstate = $pdo->prepare('UPDATE category
                                            SET label = ?,
                                            labelImage = ?,
                                            style = ?,
                                            styleImage = ?,
                                            created_at = ?
                                            WHERE id_category = ?');
            $sqlstate->execute([$newLabel,
                                $newFilenamelabel,
                                $newStyle,
                                $newFilenamestyle,
                                $created_at,
                                $id_category]);

            $_SESSION['message'] = "Category Modified Successfully";
            $_SESSION['type'] = "success";
        } else {
            $_SESSION['message'] = "Category Can Not Be Modified!";
            $_SESSION['type'] = "danger";
        }
        header('location:category.php');
        exit();
    }
?>