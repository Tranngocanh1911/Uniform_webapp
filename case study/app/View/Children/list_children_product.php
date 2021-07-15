<div class="container">
    <a href="admin-home.php?page=create-product">ADD PRODUCT</a>
    <table class="table">
        <thead>
        <tr>
            <!--            <th scope="col">ID</th>-->
            <th scope="col">Product picture</th>
            <th scope="col">Name</th>
            <th scope="col">Price</th>
            <th scope="col">Category</th>
            <th scope="col" colspan="2">Action</th>
        </tr>
        </thead>
        <tbody>
        <?php if (isset($products)) {
            foreach ($products as $product) :?>
                <tr>
                    <!--                    <th scope="row">--><?php //echo $product->getId() ?><!--</th>-->
                    <td><img width="100px" src="<?php echo $product->getImage() ?>" alt=""></td>
                    <td><?php echo $product->getName() ?></td>
                    <td><?php echo $product->getPrice() ?></td>
                    <td><?php echo $product->getCategory() ?></td>
                    <td><a href="admin-home.php?page=update-product&id=<?php echo $product->getId()?>" class="btn btn-warning btn-lg">Edit</a></td>
                    <td><a href="admin-home.php?page=delete-product&id=<?php echo $product->getId()?>" class="btn btn-danger btn-lg">Delete</a></td>
                </tr>
            <?php endforeach;
        } ?>
        </tbody>
    </table>
</div>

<?php include_once '../layouts/footer.php' ?>
