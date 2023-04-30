<?php require "partials/head.php" ?>
<?php require "partials/nav.php" ?>

<div class="container">
    <h2>Add Image</h2>
    <div>
        <form action="/add/image" method='POST' enctype="multipart/form-data">
            <div>
                <label for="title">Title</label>
                <input type="text" name='title' id='title'>
            </div>
            <div>
                <label for="description">Description</label>
                <input type="text" name='description' id='description'>
            </div>
            <div>
                <label for="image">Upload Image</label>
                <input type="file" name="image" id="image">
            </div>
            <button type="submit">Upload</button>
        </form>
    </div>
</div>
<?php require "partials/footer.php" ?>