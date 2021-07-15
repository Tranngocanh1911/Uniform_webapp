<div class="container">
    <form method="post" enctype="multipart/form-data">
        <h3>ADD PRODUCT</h3>
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" required class="form-control" id="first-name" name="name">
        </div>
        <div class="mb-3">
            <label for="last-name" class="form-label">Price</label>
            <input type="number" required class="form-control" id="last-name" name="price">
        </div>
        <div class="mb-3">
            <label for="avt" class="form-label">Picture</label>
            <input type="file" class="form-control" id="avt" name="fileToUpload">
        </div>
        <div class="mb-3">
            <label for="avt" class="form-label">Category</label>
            <select name="category_id" id="">
                <option value="1">Adult</option>
                <option value="2">Children</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
