<div class="single-product">
    <div class="product-container">
        <form action="#" method="POST" enctype="multipart/form-data" class="product-details">
            <h2 class="text-center">Add New Product</h2>
            <div class="photo-upload mb-3">
                <label for="upload-photo">Upload photo:</label>
                <input type="file" id="upload-photo" name="upload-photo" required class="form-control">
            </div>
            <div class="customization mb-3">
                <label for="name">Product name:</label>
                <input type="text" id="name" name="name" required class="form-control">
            </div>
            <div class="customization mb-3">
                <label for="description">Description:</label>
                <textarea id="description" name="description" rows="5" class="form-control">Write here the description...</textarea>
            </div>
            <div class="quantity mb-3">
                <label for="price">Price:</label>
                <input type="text" id="price" name="price" required class="form-control">
            </div>
            <button type="submit" class="add-to-cart">Save</button>
        </form>
    </div>
</div>
