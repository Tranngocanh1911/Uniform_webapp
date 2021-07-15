<div class="container">
    <form method="post"  enctype="multipart/form-data">
        <h3>UPDATE PRODUCT</h3>
        <?php if(isset($product)):?>
            <div class="mb-3">
                <label for="first-name" class="form-label">Name</label>
                <input type="text" required class="form-control" id="first-name" name="name" value="<?php echo $product->getName()?>">
            </div>
            <div class="mb-3">
                <label for="last-name" class="form-label">Price</label>
                <input type="text" required class="form-control" id="last-name" name="price" value="<?php echo $product->getPrice()?>">
            </div>
            <div class="mb-3">
                <label for="avt" class="form-label">Picture</label>
                <input type="file" class="form-control" id="avt" name="fileToUpload">
            </div>
            <div class="mb-3">
                <img width="50px" src="<?php echo $product->getImage()?>" alt="<?php echo $product->getImage()?>">
            </div>
            <div class="mb-3">
                <label for="avt" class="form-label">Category</label>
                <select name="category_id" id="">
                    <option value="1">Adult</option>
                </select>
            </div>
        <?php endif ?>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
