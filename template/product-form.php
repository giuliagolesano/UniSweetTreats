<div>
    <form action="save_product.php" method="POST" enctype="multipart/form-data">
        <ul>
            <li>
                <div>
                    <label for="upload-photo">Upload photo:</label>
                    <input type="file" id="upload-photo" name="upload-photo" required/>
                </div>
            </li>
            <li>
                <div>
                    <label for="name">Product name:</label>
                    <input type="text" id="name" name="name" required/>
                </div>
            </li>
            <li>
                <div>
                    <label for="description">Description:</label>
                    <textarea id="description" name="description" rows="5" cols="50">Write here the description...</textarea>
                </div>
            </li>
            <li>
                <div>
                    <label for="price">Price:</label>
                    <input type="text" id="price" name="price" required/>
                </div>
            </li>
            <li>
                <div>
                    <button type="submit" class="save-button">Salva</button>
                </div>
            </li>
        </ul>
    </form>
</div>