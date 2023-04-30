<?php require "partials/head.php" ?>
<?php require "partials/nav.php" ?>

<?php

foreach ($tags as $tag){
    if($lastTag[0] == $tag->id){
        $lastTagPresent = true;
    } else {
        $lastTagPresent = false;
    }
}
?>

<div class="container">
    
    <h2>All Tags</h2>
    <div>
        <?php foreach($tags as $tag){ ?>
            <div>
                <h3><?=$tag->name ?></h3>
                <a href="/edit/tag?id=<?=$tag->id?>">Edit</a>
                <a href="/delete/tag?id=<?=$tag->id?>" style="color:red;">Delete</a>
            </div>
        <?php } ?>

        <?php if($totalTagCount > 10){ ?>
            <?php if($_GET['page'] != 1 || !isset($_GET['page'])){ ?>
                <a href="/view/tags?page=<?=$_GET['page']-1?>">Previous</a>
            <?php } ?>
            <?php if($lastTagPresent == false) { ?>
                <a href="/view/tags?page=<?=$_GET['page']+1?>">Next</a>
            <?php } ?>
        <?php } ?>
    </div>
</div>



<?php require "partials/footer.php" ?>