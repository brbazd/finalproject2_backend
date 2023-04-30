<?php require "partials/head.php" ?>
<?php require "partials/nav.php" ?>

<div class="container">

    <h3>Image ID: <?=$image->id ?></h3>
    <h4>Image Title: <?=$image->title ?></h4>
    <p>Image description: <?=$image->description ?></p>
    <img src="http://localhost:8081/<?=$image->url ?>" alt>
    
    <h2>Edit Image</h2>

    <form action="image" method="POST" enctype="multipart/form-data">
        <input type="text" name="id" value="<?=$image->id ?>" style="display:none">
        <div>
            <label for="title">Change title</label>
            <input type="text" name="title" id="title" value="<?=$image->title ?>">
        </div>
        <div>
            <label for="description">Change description</label>
            <input type="text" name="description" id="description" value="<?=$image->description ?>">
        </div>
        <div>
            <label for="image">Change Image</label>
            <input type="file" name="image" id="image">
        </div>
    
        <button type="submit">Apply Changes</button>
    </form>

</div>



<style>

    img {
        display: block;
        max-height: 600px;
        margin: 0 auto;
    }

</style>
        

<?php require "partials/footer.php" ?>