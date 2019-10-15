<?php 
    require_once('../private/initialize.php'); 

    $page_title = 'Products - Coffee Club';
    include(SHARED_PATH . '/header.php');

    $products = getAllProducts($conn);

?>

<main>
    <h2>Products</h2>
    <div class="products">
        <?php while($row = $products->fetch()) { ?>
        <div class="product-tile">
            <h3><?= $row['product_name']; ?></h3>
            <img src="<?= url_for($row['product_img_src']); ?>" alt="<?= $row['product_name']; ?>" width="300" height="200">
            <p><?= $row['product_description']; ?></p>
            <p><?= $row['product_cost']; ?></p>
        </div>


        <?php }//end while ?>
    </div>
</main>



<?php include(SHARED_PATH . '/footer.php'); ?>