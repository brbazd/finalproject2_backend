<?php require "partials/head.php" ?>
<?php require "partials/nav.php" ?>

<?php

/* print_r($imagesInTag);
die(); */





?>
<div class="container">

    <h2><?=$selectedTag->name ?></h2>
    
    <div class="elList">

    
    <?php foreach($newImages as $newImage) { ?>
        
        <div class="elContainer">
            <div>
                <div class="imgContainer">
                    <img src="http://localhost:8081/<?=$newImage->url ?>" alt class="imgContent">
                </div>
                <div class="imgInfo">
                    <h3><?=$newImage->title ?></h3>
                    <span class="desc"><?=$newImage->description ?></span>
                </div>
            </div>
            <div>
                <a href="/edit/image?id=<?=$newImage->id?>">Edit</a>
                <a href="/unlink?imageid=<?=$newImage->id ?>&tagid=<?=$selectedTag->id?>" style="color:red;">Delete</a>
            </div>
        </div>
        
    <?php } ?>

    </div>
    
    <div class="editSection">
        <h2>Edit Tag / Add Tag To Image</h2>
        <form action="tag" method="POST">
            <input type="text" name="id" value="<?=$selectedTag->id ?>" style="display:none">
            <div class="inputContainer">
                <label for="name">Change name</label>
                <input type="text" name="name" id="name" value="<?=$selectedTag->name ?>">
            </div>
            <div class="inputContainer">
                <label for="imageToTag">Add image to tag</label>
                <select name="imageToTag" id="imageToTag">
                    <option value=""></option>
                    <?php foreach($availableImages as $availableImage) { ?>
                        <option value="<?=$availableImage->id ?>"><?=$availableImage->id ?> - <?=$availableImage->title ?> </option>
                    <?php } ?>
                </select>
            </div>
        
            <button type="submit">Apply Changes</button>
        </form>

    </div>
    
            
</div>


<?php require "partials/footer.php" ?>


<style>


    .elList {
        display: flex;
        flex-direction: column;
    }

    .elContainer {
        height: 200px;
        display: flex;
        justify-content: space-between;
        align-items: center;
        border-bottom: 1px solid #333;
    }

    .elContainer > div {
        display: flex;
        justify-content: space-between;
    }

    .imgInfo {
        margin: 10px;
    }

    .imgContainer {
        height: 160px;
        width: 240px;
        overflow: hidden;
    }

    .imgContent {
        width: 100%;
    }

    h3 {
        font-size: 28px;
        margin: 6px 0;
    }

    .desc {
        font-style: italic;
    }

    h2 {
        font-size: 42px;
        margin: 6px 0;
    }

    .editSection {
        border-bottom: 1px solid #333;
        padding: 16px 0;
    }

    .inputContainer {
        margin: 5px;
    }

</style>