<?php require "partials/head.php" ?>
<?php require "partials/nav.php" ?>

<div class="container">
    <h2>Add Tag</h2>
    <div>
        <form action="/add/tag" method='POST'>
            <div>
                <label for="name">Name of tag</label>
                <input type="text" name='name' id='name'>
            </div>
            <button type="submit">Upload</button>
        </form>
    </div>
</div>
<?php require "partials/footer.php" ?>