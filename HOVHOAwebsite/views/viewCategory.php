<?php
    include '../includes/header.php';
    include '../includes/database.php';

    $style = $_GET['style'];
    $sqlState = $pdo->prepare('SELECT * FROM product 
                                WHERE style = ?');
    $sqlState->execute([$style]);
    $products = $sqlState->fetchAll(PDO::FETCH_ASSOC);
?>
    <br>
    <div class="content">
        <h3 class="text-center text-uppercase"><?= $style ?> Products</h3>
        <br>

        <?php 
            $products = $pdo->query("SELECT * FROM product
                                    WHERE style = '$style'
                                    ");
            if($products->rowCount() == 0){
        ?>
            <h5 class="mt-5 pt-5 mb-4 text-center fw-light">No Products For Now</h5>
        <?php
            }else{
        ?>

        <table class="table w-75 mx-auto">
            <thead>
                <tr>
                    <th scope="col">Image</th>
                    <th scope="col">Label</th>
                    <th scope="col">Style</th>
                    <th scope="col">Description</th>
                    <th scope="col">Price</th>
                    <th scope="col">Quantity</th>
                    <th scope="col">Discount</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody id="tableBody">
                <?php
                    foreach ($products as $index => $product) {
                        ?>
                <tr class="<?= $index >= 10 ? 'hidden-row' : '' ?>">
                    <td>
                        <img src="../uploadImage/product/<?= $product['image'] ?>" width="100">
                    </td>
                    <td><?= $product['label'] ?></td>
                    <td><?= $product['style'] ?></td>
                    <td><?= $product['description'] ?></td>
                    <td><?= $product['price'] ?></td>
                    <td><?= $product['quantity'] ?></td>
                    <td><?= $product['discount'] ?></td>
                    <td>
                        <a href="modifyProduct.php?idProduct=<?php echo $product['idProduct'] ?>" 
                            class="btn btn-sm btn-success"><i class="bi bi-pencil-square"></i>
                        </a>
                        <a href="deleteProduct.php?idProduct=<?php echo $product['idProduct'] ?>" 
                            onclick="return confirm('Do you really want to delete this Product')" 
                            class="btn btn-sm btn-danger"><i class="bi bi-trash"></i>
                        </a>
                    </td>
                </tr>
                <?php
                    }
                    ?>
            </tbody>
        </table>
        <?php
            }
        ?>
    </div>
    </div>